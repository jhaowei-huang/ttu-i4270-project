<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\Model\User', 'user_id', 'user_id');
    }

    public function keynote()
    {
        return $this->belongsTo('App\Model\Keynote', 'keynote_id', 'keynote_id');
    }
}
