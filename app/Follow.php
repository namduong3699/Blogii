<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $table = 'follow';
    public $timestamps = false;

    // public function following() {
    //     return $this->belongsTo('App\User', 'user_id', 'id');
    // }

    // public function followed() {
    //     return $this->belongsTo('App\User', 'follow_id', 'id');
    // }

    public function entry() {
        return $this->hasMany('App\Entry', 'follow_id', 'user_id');
    }

    // public function comment() {
    //     return $this->hasMany('App\Comment', 'follow_id', 'user_id');
    // }

    // public function like() {
    //     return $this->hasMany('App\Like', 'follow_id', 'user_id');
    // }
}
