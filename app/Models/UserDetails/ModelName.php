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
        'avatar',
        'birthday',
        'country',
        'city',
        'sex',
        'freelancer',
        'contacts',
        'spec',
        'bio',
        'views',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'contacts' => 'json',
        'avatar' => 'json',
        'spec' => 'json',
        'bio' => 'json',
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
            if($this->views == 0){
                $this->views += $step;
                $this->save();
            }
        }else{
            $this->views += $step;
            $this->save();
        }
    }

}