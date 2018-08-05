<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'media';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'path', 'alt', 'undertitle'
    ];

    public function __construct(){
    }

    public function profileImage()
    {
        return $this->hasOne('App\User', 'image_id', 'id');
    }

    public function bandImages()
    {
        return $this->belongsToMany('App\Band', 'bands_media');
    }

    public function userImages()
    {
        return $this->belongsToMany('App\User', 'users_media');
    }
    
    public static function getMediaById($id)
    {
        return Media::find($id);
    }
}
