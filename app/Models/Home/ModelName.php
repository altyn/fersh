<?php
namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;

use App\Models\Home\ModelName as Home;

class ModelName extends Model
{
    protected $table = 'home';

    protected $casts = [
        'active_users' => 'json',
        'info' => 'json'
    ];


}