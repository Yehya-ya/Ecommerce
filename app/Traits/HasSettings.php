<?php

namespace App\Traits;

use App\Models\Setting;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Collection;

trait HasSettings
{
    public function settingsRelation(): MorphMany
    {
        return $this->morphMany(Setting::class, 'owner');
    }

    public function settings(): Collection
    {
        return $this->settingsRelation()->get('key')->combine($this->settingsRelation()->get('value'));
    }

    public function setSetting($key, $value): void
    {
        $this->settingsRelation()->updateOrCreate(
            ['key' => $key],
            ['value' => json_encode($value)]
        );
    }

    public function getSetting($key, $default = null)
    {
        $setting = $this->settingsRelation()->firstOrNew(
            ['key' => $key],
            ['value' => json_encode($default)]
        );

        if ($setting->isDirty('key')) {
            if ($default === null) {
                return null;
            }
            $setting->save();
        }

        return json_decode($setting->value);
    }
}
