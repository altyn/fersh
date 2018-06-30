<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 6/30/18
 * Time: 1:29 PM
 */

namespace App\Models\Spec;

use Illuminate\Database\Eloquent\Model;


class ModelName extends Model
{
    protected $table = 'specialization';

    protected $guarded = ['id'];

    protected $casts = [
        'title' => 'json'
    ];

    protected $fillable = [
        'name'
    ];

    /**
     * @return mixed
     */
    public function getTitle()
    {
        $lc = app()->getLocale();
        if($lc == 'ky' || $lc == 'ru'){
            return $this->title['ru'];
        } else {
            return $this->title['en'];
        }
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }


}