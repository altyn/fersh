<?php

namespace App\Models\UserDetails;

use Illuminate\Database\Eloquent\Model;
use App\Models\User\ModelName as User;

class ModelName extends Model
{
    protected $table = 'user_details';
    protected $guarded = ['id'];
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'birthday',
        'country',
        'city',
        'sex',
        'freelancer',
        'contacts',
        'spec',
        'bio',
    ];

    protected $casts = [
        'contacts' => 'json',
        'spec' => 'json',
        'bio' => 'json',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}