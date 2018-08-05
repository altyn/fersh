<?php

namespace App\Models\UserDetails;

use Illuminate\Database\Eloquent\Model;
use App\Models\User\ModelName as User;
use App\Models\Spec\ModelName as Spec;

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
        'bio' => 'json'
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

    public function getFio()
    {
        $first = '';
        if(isset($this->first_name)){
            $first = $this->first_name;
        }

        $last = '';
        if(isset($this->last_name)){
            $last = $this->last_name;
        }
        
        return $first.' '.$last;
    }
    public function getSphere()
    {
        $spec = '';
        if(isset($this->spec['ru']['sphere'])){
            $spec = Spec::where('id', $this->spec['ru']['sphere'])->select('title')->first();
        }
        return $spec;
    }
    
    public function getShortBio(){
        $short = '';
        if(isset($this->bio['ru']['short'])){
            $short  = mb_substr($this->bio['ru']['short'], 0, 120, 'UTF-8')."...";
        }
        return $short;
        
    }

}