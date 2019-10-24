<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';
    public $timestamps = true;

    public function user() {
    	return $this->belongsTo('App\User');
    }

    public function entry() {
    	return $this->belongsTo('App\Entry');
    }

    public function reply() {
    	return $this->hasMany('App\Comment', 'replyTo');
    }
}
