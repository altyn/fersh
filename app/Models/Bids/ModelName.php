<?php

namespace App\Models\Bids;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\Spec\ModelName as Spec;

class ModelName extends Model
{
    protected $table = 'bids';

    protected $guarded = ['id'];

    protected $fillable = [
        'name',
        'phone',
        'email',
        'spec',
        'title',
        'desc'
    ];

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function specialization() :BelongsTo
    {
        return $this->belongsTo(Spec::class, 'spec', 'id');
    }

    public function getDescription()
    {
        return $this->desc;
    }


}
