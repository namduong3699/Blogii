<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    protected $table = 'password_resets';
    public $timestamps = true;

    protected $fillable = [
        'user_email',
        'token',
    ];

    public function user() {
    	return $this->belongsTo('App\User', 'user_email', 'email');
    }
}
