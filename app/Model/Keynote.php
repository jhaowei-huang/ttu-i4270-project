<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Keynote extends Model
{
    protected $primaryKey = 'keynote_id';
    protected $guarded = [];

    public function registrations()
    {
        return $this->hasMany('App\Model\Registration', 'keynote_id', 'keynote_id');
    }
}
