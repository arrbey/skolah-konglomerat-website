<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\ManagesSettings;
use App\Http\Controllers\Controller;

class MasalahController extends Controller
{
    use ManagesSettings;

    protected string $section = 'masalah';

    protected array $fields = [
        'title' => ['label' => 'Section Title', 'rules' => ['required', 'string', 'max:160']],
        'subtitle' => ['label' => 'Subtitle', 'textarea' => true, 'rules' => ['nullable', 'string', 'max:800']],
        'items' => ['label' => 'Items JSON', 'textarea' => true, 'helper' => 'Format: array JSON berisi title dan description.', 'rules' => ['required', 'json']],
    ];
}
