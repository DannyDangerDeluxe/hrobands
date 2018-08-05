<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gig extends Model
{
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
        'band_two_id', 'band_three_id', 'user_id'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'gigs';
}
