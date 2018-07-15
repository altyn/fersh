<?php

namespace App\Models\UserVerify;

use Illuminate\Database\Eloquent\Model;

class ModelName extends Model
{
    protected $table = 'user_verify';

    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo('App\Models\User\ModelName', 'user_id');
    }
}
