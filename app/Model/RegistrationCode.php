<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RegistrationCode extends Model
{
    protected $primaryKey = 'registration_code_id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\Model\User', 'user_id', 'user_id');
    }
}
