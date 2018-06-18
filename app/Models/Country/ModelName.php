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

    /**
     * @return mixed
     */
    public function getTitle()
    {
    	$lc = app()->getLocale();
    	if($lc == 'ky' || $lc == 'ru'){
    		return $this->title_ru;
    	} else {
    		return $this->title_en;
    	}
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->country_id;
    }
}