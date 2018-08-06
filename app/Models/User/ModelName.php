<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class ModelName extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable,
        CanResetPassword,
        HasRoles,
        Notifiable;

    protected $table = 'users';

    protected $hidden = ['password', 'remember_token'];

    protected $guarded = ['id'];

    protected $fillable = [
        'login',
        'email',
        'password',
        'provider_user_id',
        'provider_name',
        'newsletter',
        'created_at',
        'updated_at',
    ];

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getAuthPassword() {
        return $this->passwod;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function verifyUser(){
        return $this->hasOne('App\Models\VerifyUsers\ModelName');
    }

}