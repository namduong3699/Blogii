<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'likes';
    public $timestamps = false;

    public function user() {
    	return $this->belongsTo('App\User');
    }

    public function entry() {
    	return $this->belongsTo('App\Entry');
    }
}
