<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserVerification extends Model
{
    protected $primaryKey = 'user_verification_id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\Model\User', 'user_id', 'user_id');
    }
}
