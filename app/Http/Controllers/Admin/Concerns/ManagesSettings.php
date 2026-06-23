<?php

namespace App\Http\Controllers\Admin\Concerns;

use App\Models\SiteSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

trait ManagesSettings
{
    public function edit(): View
    {
        return view('admin.settings.edit', [
            'section' => $this->section,
            'fields' => $this->fields,
            'values' => SiteSetting::section($this->section),
            'title' => ucfirst($this->section),
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $rules = [];
        foreach ($this->fields as $name => $meta) {
            $rules[$name] = $meta['rules'] ?? ['nullable', 'string'];
        }
        foreach ($this->fileFields as $name => $meta) {
            $rules[$name] = $meta['rules'] ?? ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'];
        }

        $data = $request->validate($rules);

        foreach ($this->fields as $name => $meta) {
            SiteSetting::setValue($this->section, $name, $data[$name] ?? null);
        }

        foreach ($this->fileFields as $name => $meta) {
            if ($request->hasFile($name)) {
                $oldPath = SiteSetting::getValue($this->section, $name);
                $path = $request->file($name)->store($meta['path'] ?? $this->section, 's3');
                SiteSetting::setValue($this->section, $name, $path);
                if ($oldPath) {
                    Storage::disk('s3')->delete($oldPath);
                }
            }
        }

        return back()->with('success', 'Konten berhasil disimpan.');
    }
}
