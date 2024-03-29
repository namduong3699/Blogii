<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialAccount extends Model
{
    protected $table = 'social_accounts';
    protected $fillable = ['user_id', 'provider_user_id', 'provider'];
    public $timestamps = true;

    public function user() {
    	return $this->belongsTo('App\User');
    }
}