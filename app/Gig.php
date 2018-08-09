<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gig extends Model
{
	protected $primaryKey = 'id';

	/**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'location', 'street', 'number', 
        'zip', 'city', 'date', 'open_doors', 
        'price', 'text', 'link', 'band_one_id', 
        'band_two_id', 'band_three_id', 'user_id', 
        'image_id'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'gigs';

    public function gigImage()
    {
        return $this->hasOne('App\Media', 'id', 'image_id');
    }
}
