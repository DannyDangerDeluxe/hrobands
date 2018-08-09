<?php

namespace App\Http\Controllers;

use App\Gig;
use App\Media;
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
            'open_doors' => 'nullable',
            'description' => 'nullable|string|max:5000',
            'price' => 'nullable',
            'band_two_id' => 'nullable|integer',
            'band_three_id' => 'nullable|integer',
            'link' => 'nullable|url|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'imagename' => 'nullable|string|max:80',
            'alt' => 'nullable|string|max:30',
            'undertitle' => 'nullable|string|max:100',
        ]);

        // validator error handling
        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput($request->all());

        // validator success
        }else{
            $imageName = time() .'_' .camel_case($request->image->getClientOriginalName());
            $img = new Media;
            $img->name = $request->input('imagename');
            $img->path = 'images/' . $imageName;
            $img->alt = $request->input('alt') ? $request->input('alt') : null;
            $img->undertitle = $request->input('undertitle') ? $request->input('undertitle') : null;
            $request->image->move(public_path('images'), $imageName);
            $img->save();
            
            $gig = new Gig;
            $gig->name = $request->input('name');
            $gig->location = $request->input('location');
            $gig->street = $request->input('street');
            $gig->number = $request->input('number');
            $gig->zip = $request->input('zip');
            $gig->city = $request->input('city');
            $gig->date = $request->input('date');
            $gig->user_id = auth()->user()->id;
            $gig->band_one_id = $request->input('band_one_id');

            $gig->open_doors = $request->input('open_doors') ? $request->input('open_doors') : null;
            $gig->description = $request->input('description') ? $request->input('description') : null;
            $gig->price = $request->input('price') ? $request->input('price') : null;
            $gig->band_two_id = $request->input('band_two_id') ? $request->input('band_two_id') : null;
            $gig->band_three_id = $request->input('band_three_id') ? $request->input('band_three_id') : null;
            $gig->link = $request->input('link') ? $request->input('link') : null;
            $gig->gigImage()->associate($img);

            $gig->save();

            $success = \Lang::get('lang.gig_save_success');
            return redirect(url()->previous())
                ->with('success',$success);
        }
    }
}