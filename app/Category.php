<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function events()
    {
        return $this->belongsToMany('App\Event')->withTimestamps();
    }

    public static function categoryCheckbox()
    {
        $categories = self::orderBy('type')->get();

        $catCheckboxes = [];

        foreach ($categories as $category) {
            $catCheckboxes[$category['id']] = $category->type;
        }

        return $catCheckboxes;
    }
}
