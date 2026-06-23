<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TrainingProgram;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class TrainingController extends Controller
{
    public function index(): View
    {
        return view('admin.training.index', [
            'trainings' => TrainingProgram::orderBy('sort_order')->orderBy('title')->paginate(15),
        ]);
    }

    public function create(): View
    {
        return view('admin.training.form', ['training' => new TrainingProgram()]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);
        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('trainings', 's3');
        }
        $data['is_active'] = $request->boolean('is_active');

        TrainingProgram::create($data);

        return redirect()->route('admin.training.index')->with('success', 'Training berhasil dibuat.');
    }

    public function edit(TrainingProgram $training): View
    {
        return view('admin.training.form', ['training' => $training]);
    }

    public function update(Request $request, TrainingProgram $training): RedirectResponse
    {
        $data = $this->validated($request, true);
        if ($request->hasFile('image')) {
            $oldPath = $training->image_path;
            $data['image_path'] = $request->file('image')->store('trainings', 's3');
            if ($oldPath) {
                Storage::disk('s3')->delete($oldPath);
            }
        }
        $data['is_active'] = $request->boolean('is_active');

        $training->update($data);

        return redirect()->route('admin.training.index')->with('success', 'Training berhasil diperbarui.');
    }

    public function destroy(TrainingProgram $training): RedirectResponse
    {
        if ($training->image_path) {
            Storage::disk('s3')->delete($training->image_path);
        }
        $training->delete();

        return back()->with('success', 'Training berhasil dihapus.');
    }

    public function toggle(TrainingProgram $training): RedirectResponse
    {
        $training->update(['is_active' => ! $training->is_active]);

        return back()->with('success', 'Status training diperbarui.');
    }

    private function validated(Request $request, bool $isUpdate = false): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:200'],
            'description' => ['nullable', 'string', 'max:500'],
            'image' => [$isUpdate ? 'nullable' : 'required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'cta_text' => ['required', 'string', 'max:50'],
            'cta_url' => ['nullable', 'url', 'max:500'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);
    }
}
