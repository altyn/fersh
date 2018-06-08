<?php

namespace App\Models\Translation;

use Illuminate\Database\Eloquent\Model;
use App\Models\Translation\ModelName as Translation;


class ModelName extends Model
{
    protected $table = 'translations';

    protected $guarded = ['id'];

    protected $fillable = [
        'key',
        'ky',
        'ru',
        'en',
    ];

    // Title
    public static function getAll()
    {
        $array = Translation::all()->pluck(app()->getLocale(), 'key');
        return $array;
    }

}
