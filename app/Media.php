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

    public function band()
    {
        return $this->belongsTo('App\Band');
    }
    
    public static function getMediaById($id)
    {
        return Media::find($id);
    }
}
