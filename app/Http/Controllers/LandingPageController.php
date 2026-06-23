<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\Faq;
use App\Models\SiteSetting;
use App\Models\TrainingProgram;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class LandingPageController extends Controller
{
    public function index(): View
    {
        $settings = SiteSetting::query()
            ->get()
            ->groupBy('section')
            ->map(fn ($items) => $items->pluck('value', 'key')->all())
            ->all();

        if (! empty($settings['hero']['background_image'])) {
            $settings['hero']['background_image_url'] = Storage::disk('s3')->url($settings['hero']['background_image']);
        }

        return view('landing.index', [
            'settings' => $settings,
            'trainings' => TrainingProgram::active()->orderBy('sort_order')->orderBy('title')->get(),
            'faqs' => Faq::active()->orderBy('sort_order')->orderBy('question')->get(),
        ]);
    }

    public function sendContact(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:150'],
            'message' => ['required', 'string', 'min:10', 'max:2000'],
        ]);

        ContactMessage::create($data);

        return back()->with('success', 'Pesan berhasil dikirim. Tim kami akan segera menghubungi Anda.');
    }
}
