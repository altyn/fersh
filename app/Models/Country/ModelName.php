<?php

namespace App\Models\Country;

use Illuminate\Database\Eloquent\Model;
 
class ModelName extends Model
{    
    protected $table = 'countries';

    protected $guarded = ['id'];

    protected $fillable = [
        'country_id', 
    		'title_ru',
        'title_en'
    ];

    public function getTitle()
    {
    	$lc = app()->getLocale();
    	if($lc == 'ky' || $lc == 'ru'){
    		return $this->title_ru;
    	} else {
    		return $this->title_en;
    	}
    }
}