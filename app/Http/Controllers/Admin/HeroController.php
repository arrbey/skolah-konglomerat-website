<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\ManagesSettings;
use App\Http\Controllers\Controller;

class HeroController extends Controller
{
    use ManagesSettings;

    protected string $section = 'hero';

    protected array $fields = [
        'title' => ['label' => 'Headline', 'rules' => ['required', 'string', 'max:160']],
        'subtitle' => ['label' => 'Sub-headline', 'textarea' => true, 'rules' => ['nullable', 'string', 'max:500']],
        'cta_primary_text' => ['label' => 'CTA Primary Text', 'rules' => ['required', 'string', 'max:50']],
        'cta_primary_url' => ['label' => 'CTA Primary URL', 'rules' => ['required', 'string', 'max:500']],
        'cta_secondary_text' => ['label' => 'CTA Secondary Text', 'rules' => ['nullable', 'string', 'max:50']],
        'cta_secondary_url' => ['label' => 'CTA Secondary URL', 'rules' => ['nullable', 'string', 'max:500']],
    ];

    protected array $fileFields = [
        'background_image' => ['path' => 'hero'],
    ];
}
