<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
    protected $primaryKey = 'id';
    
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
    protected $table = 'bands';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'website', 'founded', 'description', 'genre_id', 'image_media_id'
    ];

    public function users()
    {
        return $this->hasMany('App\User', 'band_id', 'id');
    }

    public function bandImages()
    {
        return $this->belongsToMany('App\Media', 'bands_media');
    }

    public function __construct(){

    }
}
