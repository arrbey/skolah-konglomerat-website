<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\ManagesSettings;
use App\Http\Controllers\Controller;

class FooterController extends Controller
{
    use ManagesSettings;

    protected string $section = 'footer';

    protected array $fields = [
        'tagline' => ['label' => 'Tagline', 'textarea' => true, 'rules' => ['nullable', 'string', 'max:500']],
        'copyright_text' => ['label' => 'Copyright Text', 'rules' => ['required', 'string', 'max:200']],
    ];
}
