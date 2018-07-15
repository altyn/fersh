<?php

namespace App\Models\UserPortfolio;

use Illuminate\Database\Eloquent\Model;
use App\Models\User\ModelName as User;

class ModelName extends Model
{
    protected $table = 'portfolio';

    protected $guarded = ['id'];

    protected $fillable = [
        'user_id',
        'description',
        'files',
        'links',
        'tags',
        'views',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'description' => 'json',
        'files' => 'json',
        'links' => 'json',
        'tags' => 'json',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Methods
    public function getDate()
    {
        $fullDate = $this->created_at;
        $date = date('d.m.Y', strtotime($fullDate));
        return $date;
    }

    public function incrementViewed($step = 1)
    {
        if($this->user_id == auth()->id()){
            
        }else{
            $this->views += $step;
            $this->save();
        }
    }

}