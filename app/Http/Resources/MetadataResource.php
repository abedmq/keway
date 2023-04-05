<?php

namespace App\Http\Resources;

use App\Models\Language;
use App\Models\Setting;
use Illuminate\Http\Resources\Json\JsonResource;

class MetadataResource extends JsonResource {

    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $settings = [];
        $this->getLang('about_us', $settings);
        $this->getLang('term_and_condition', $settings);
        $this->getLang('privacy', $settings);
        return Setting::whereIn('key', $settings)->pluck('value', 'key');
    }

    function getLang($key, &$settings)
    {
        $languages = Language::active()->get();
        foreach ($languages as $language)
        {
            $settings[] = $key . "_" . $language->code;
        }
    }
}
