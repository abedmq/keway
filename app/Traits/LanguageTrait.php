<?php


namespace App\Traits;


use App\Models\Language;
use Illuminate\Database\Eloquent\Builder;

trait LanguageTrait
{

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('exclude_deleted', function (Builder $builder) {
            $builder->with('children', 'language');
            $builder->default();
        });

    }

    function getTranslatesAttribute()
    {
        return implode(',', $this->children->pluck('title')->toArray());
    }

    function language()
    {
        return $this->belongsTo(Language::class);
    }

    function scopeDefault($q)
    {
        $q->where('language_id', get_default_language_id());
    }

    function scopeFilterLanguage($q)
    {
        $q->where('language_id', get_language_id_by_code(app()->getLocale()));
    }

    function parent()
    {
        return $this->belongsTo(self::class);
    }

    function children()
    {
        return $this->hasMany(self::class, 'parent_id')->withoutGlobalScopes();
    }

    function getBase($key)
    {
        return $this->parent ? $this->parent->{$key} : $this->{$key};
    }

    function getTrans($key, $lang = '')
    {
        if ($lang)
            if (get_default_language_id() == $lang)
                return $this->{$key};
        return ($child = $this->children->where('language_id', get_language_id_by_code(app()->getLocale()))->first()) ? $child->{$key} : ($lang ? "" : $this->{$key});
    }

    function saveWithLang($data)
    {
        $default = array_slice($data, 0);
        unset($default['lang']);
        $dataLang = [];
        foreach (Language::list() as $item) {
            $dataLang[$item->id] = $default;
        }
        foreach ($data['lang'] as $key => $datum) {
            foreach ($datum as $lang_id => $v) {
                $dataLang[$lang_id][$key] = $v;
            }
        }

        foreach ($dataLang as $lang_id => $item) {
            if ($lang_id == get_default_language_id()) {
                $item['language_id'] = $lang_id;
                $this->fill($item);
                $this->save();
            } else {
                $this->children()->updateOrCreate(['language_id' => $lang_id], $item);
            }
        }
        return true;
    }

    function deleteItem()
    {
        $this->children()->delete();
        $this->delete();
    }
}
