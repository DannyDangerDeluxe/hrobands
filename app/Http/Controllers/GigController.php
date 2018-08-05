<?php

namespace App\Http\Controllers;

use App\Gig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class GigController extends Controller{
    
    public function __construct()
    {}

    public function registerGig(Request $request){
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|integer',
            'band_one_id' => 'required|integer',
            'name' => 'required|string|max:80',
            'location' => 'required|string|max:80',
            'street' => 'required|string|max:80',
            'number' => 'required|string|max:10',
            'zip' => 'required|string|max:10',
            'city' => 'required|string|max:80',
            'date' => 'required|date',
            'time' => 'nullable',
            'description' => 'nullable|string|max:5000',
            'price' => 'nullable',
            'band_two_id' => 'nullable|integer',
            'band_three_id' => 'nullable|integer',
            'link' => 'nullable|url|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // validator error handling
        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput($request->all());

        // validator success
        }else{
            $gig = Gig::create();
            $gig->name = $request->input('name');
            $gig->location = $request->input('location');
            $gig->street = $request->input('street');
            $gig->number = $request->input('number');
            $gig->zip = $request->input('zip');
            $gig->city = $request->input('city');
            $gig->date = $request->input('date');
            $gig->user_id = $request->input('user_id');
            $gig->band_one_id = $request->input('band_one_id');

            $gig->time = $request->input('time') ? $request->input('time') : null;
            $gig->description = $request->input('description') ? $request->input('description') : null;
            $gig->price = $request->input('price') ? $request->input('price') : null;
            $gig->band_two_id = $request->input('band_two_id') ? $request->input('band_two_id') : null;
            $gig->band_three_id = $request->input('band_three_id') ? $request->input('band_three_id') : null;
            $gig->link = $request->input('link') ? $request->input('link') : null;
            $gig->image = $request->input('image') ? $request->input('image') : null;

            dd('gig validated', $gig);
            $gig->save();
        }
    }
}