<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\ManagesSettings;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    use ManagesSettings;

    protected string $section = 'contact';

    protected array $fields = [
        'title' => ['label' => 'Section Title', 'rules' => ['required', 'string', 'max:160']],
        'subtitle' => ['label' => 'Subtitle', 'textarea' => true, 'rules' => ['nullable', 'string', 'max:800']],
        'whatsapp_number' => ['label' => 'WhatsApp Number', 'rules' => ['required', 'string', 'max:30']],
        'whatsapp_message' => ['label' => 'WhatsApp Message', 'textarea' => true, 'rules' => ['nullable', 'string', 'max:500']],
        'email' => ['label' => 'Email', 'type' => 'email', 'rules' => ['nullable', 'email', 'max:150']],
        'address' => ['label' => 'Address', 'textarea' => true, 'rules' => ['nullable', 'string', 'max:500']],
        'form_enabled' => ['label' => 'Form Enabled (1/0)', 'rules' => ['required', 'in:0,1']],
    ];
}
