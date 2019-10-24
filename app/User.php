<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = "user";
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'email', 'password', 'birthday', 'social_id', 'type', 'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function following() {
        return $this->belongsToMany('App\User', 'follow', 'user_id', 'follow_id');
    }

     public function followers() {
        return $this->belongsToMany('App\User', 'follow', 'follow_id', 'user_id');
    }

    public function isFollowing(User $user) {
        return !! $this->following()->where('follow_id', $user->id)->count();
    }

    public function isFollowedBy(User $user) {
        return !! $this->followers()->where('user_id', $user->id)->count();
    }

    public function friends() {
        return $this->following->merge($this->followers);
    }

    public function isFriend(User $user) {
        return !! $this->friends()->where('user_id', $user->id)->count();
    }

    public function follow() {
        return $this->hasMany('App\Follow', 'user_id');
    }

    public function entry() {
        return $this->hasMany('App\Entry', 'user_id');
    }

    public function comment() {
        return $this->hasMany('App\Comment', 'user_id');
    }

    public function like() {
        return $this->hasMany('App\Like', 'user_id');
    }

}
