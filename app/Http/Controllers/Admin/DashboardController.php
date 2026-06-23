<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\Faq;
use App\Models\SiteSetting;
use App\Models\TrainingProgram;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $warnings = [];

        foreach ([['hero', 'title'], ['contact', 'whatsapp_number'], ['footer', 'copyright_text']] as [$section, $key]) {
            if (! SiteSetting::getValue($section, $key)) {
                $warnings[] = "Konten {$section}.{$key} belum diisi.";
            }
        }

        if (TrainingProgram::active()->count() === 0) {
            $warnings[] = 'Belum ada training aktif.';
        }

        if (Faq::active()->count() === 0) {
            $warnings[] = 'Belum ada FAQ aktif.';
        }

        return view('admin.dashboard', [
            'activeTrainings' => TrainingProgram::active()->count(),
            'activeFaqs' => Faq::active()->count(),
            'unreadMessages' => ContactMessage::where('is_read', false)->count(),
            'warnings' => $warnings,
        ]);
    }
}
