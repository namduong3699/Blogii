<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    protected $table = 'entry';
    public $timestamp = true;

    public function user() {
    	return $this->belongsTo('App\User');
    }

    public function like() {
    	return $this->hasMany('App\Like');
    }

    public function comment() {
    	return $this->hasMany('App\Comment')->where('replyTo', '=', '0');
    }
}
