<?php

namespace App\Models\VerifyUsers;

use Illuminate\Database\Eloquent\Model;

class ModelName extends Model
{
    protected $table = 'verify_users';

    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo('App\Models\User\ModelName', 'user_id');
    }
}
