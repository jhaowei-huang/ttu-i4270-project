<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'user_id';

    public $incrementing = false;
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'username', 'password', 'email', 'name', 'address', 'department',
        'position', 'phone', 'phone_ext', 'fax', 'fax_ext', 'verification'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    public function userVerification()
    {
        return $this->hasOne('App\Model\UserVerification', 'user_id', 'user_id');
    }

    public function passwordReset()
    {
        return $this->hasOne('App\Model\PasswordReset', 'user_id', 'user_id');
    }

    public function registrations()
    {
        return $this->hasMany('App\Model\Registration', 'user_id', 'user_id');
    }
}
