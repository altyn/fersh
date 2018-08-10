<?php

namespace App\Models\Bids;

use Illuminate\Database\Eloquent\Model;

class ModelName extends Model
{
    protected $table = 'bids';

    protected $guarded = ['id'];

    protected $fillable = [
        'name',
        'phone',
        'email',
        'spec',
        'desc'
    ];

}
