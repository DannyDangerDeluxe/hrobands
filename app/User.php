<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'band_id', 'image_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $table = 'users';

    protected $connection = 'mysql';
    
    public function __construct()
    {}

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function band()
    {
        return $this->belongsTo('App\Band', 'band_id', 'id');
    }

    public function profileImage()
    {
        return $this->belongsTo('App\Media', 'image_id', 'id');
    }

    public function userImages()
    {
        return $this->belongsToMany('App\Media', 'users_media');
    }
}
