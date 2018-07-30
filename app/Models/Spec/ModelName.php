<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 6/30/18
 * Time: 1:29 PM
 */

namespace App\Models\Spec;

use Illuminate\Database\Eloquent\Model;

use App\Models\UserDetails\ModelName as UserDetails;

class ModelName extends Model
{
    protected $table = 'specialization';

    protected $guarded = ['id'];

    protected $casts = [
        'title' => 'json'
    ];

    protected $fillable = [
        'title'
    ];

    /**
     * @return mixed
     */
    public function getTitle()
    {
        $lc = app()->getLocale();
        if($lc == 'ky' || $lc == 'ru'){
            return $this->title['ru'];
        } else {
            return $this->title['en'];
        }
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    public function getCountSpecs()
    {
        $users = UserDetails::where('spec->ru->sphere', $this->id)->get();
        return count($users);
    }

}