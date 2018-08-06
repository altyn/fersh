<?php

namespace App\Models\Newsletter;

use Illuminate\Database\Eloquent\Model;

class ModelName extends Model
{
    protected $table = 'newsletter';

    protected $guarded = ['id'];

    protected $fillable = [
        'user_id',
    ];


    /**
     * @return mixed
     */
    public function getUserID()
    {
        return $this->user_id;
    }


}
