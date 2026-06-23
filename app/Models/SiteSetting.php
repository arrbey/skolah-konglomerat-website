<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = ['section', 'key', 'value'];

    public static function getValue(string $section, string $key, ?string $default = null): ?string
    {
        return static::query()
            ->where('section', $section)
            ->where('key', $key)
            ->value('value') ?? $default;
    }

    public static function setValue(string $section, string $key, mixed $value): void
    {
        static::query()->updateOrCreate(
            ['section' => $section, 'key' => $key],
            ['value' => $value]
        );
    }

    public static function section(string $section): array
    {
        return static::query()
            ->where('section', $section)
            ->pluck('value', 'key')
            ->all();
    }
}
