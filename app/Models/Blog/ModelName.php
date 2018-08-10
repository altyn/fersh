<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;

class ModelName extends Model
{
    protected $table = 'blog';

    protected $guarded = ['id'];

    protected $fillable = [
        'title',
        'desc',
        'content',
        'thumbnail',
        'thumbdesc',
        'viewed',
        'status',
        'author',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'title' => 'json',
        'desc' => 'json',
        'content' => 'json',
        'thumbnail' => 'json',
        'thumbdesc' => 'json'
    ];

    public function getTitle()
    {
        $lc = app()->getLocale();
        if($lc == 'ky' || $lc == 'ru'){
            return $this->title['ru'];
        } else {
            return $this->title['en'];
        }
    }

    // Status of post
    public function getStatus()
    {
        if($this->status)
            return 'status-active';
        else
            return 'status-inactive';
    }

    // View
    public function getView()
    {
        return $this->viewed;
    }

    public function incrementViewed($step = 1)
    {
        $this->viewed += $step;
        $this->save();
    }
   
    // Get created filtered date 
    public function getDate()
    {
        $fullDate = $this->created_at;
        $date = date('d-m-Y', strtotime($fullDate));
        return $date;
    }

}