<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function events_1() {
        return $this->belongsToMany('App\Event')->withTimestamps();
    }

    public static function catCheckbox()
    {
        $categories = self::orderBy('type')->get();

        $catCheckbox = [];

        foreach ($categories as $category) {
            $catCheckbox[$category['id']] = $category->type;
        }

        return $catCheckbox;
    }
}
