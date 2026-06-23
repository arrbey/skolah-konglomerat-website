<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\ManagesSettings;
use App\Http\Controllers\Controller;

class KeunggulanController extends Controller
{
    use ManagesSettings;

    protected string $section = 'kenapa';

    protected array $fields = [
        'title' => ['label' => 'Section Title', 'rules' => ['required', 'string', 'max:160']],
        'subtitle' => ['label' => 'Subtitle', 'textarea' => true, 'rules' => ['nullable', 'string', 'max:800']],
        'items' => ['label' => 'Value Props JSON', 'textarea' => true, 'rules' => ['required', 'json']],
        'stats' => ['label' => 'Stats JSON', 'textarea' => true, 'rules' => ['nullable', 'json']],
    ];
}
