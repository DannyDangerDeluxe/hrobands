<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DevController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    /**
     * Return Home View
     */
    public function showPage()
    {
        $bands = DB::select('SELECT * FROM bands');

        $genres = DB::select('SELECT * FROM genres');

        return view('dev')->with([
            'bands' => $bands,
            'genres' => $genres
        ]);
    }


    /**
     * Add gig from formular
     */
    public function addGig(Request $request)
    {
        return redirect('dev');
    }


    /**
     * Add band from formular
     */
    public function addBand(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'genre' => 'numeric',
            'founded' => 'numeric',
            'website' => 'string|max:255',
            'desc' => 'string|max:1000',
        ]);

        $id = DB::table('bands')->insertGetId(
            [
                'name' => $request->input('name'), 
                'genre' => $request->input('genre'),
                'founded' => $request->input('founded'),
                'website' => $request->input('website'),
                'text' => $request->input('desc'),
            ]
        );

        if( isset($id) ){
            $id2 = DB::table('bands')->insertGetId(
                [
                    'media_id' => $id, 
                    'gigs_id' => $id,
                ]
            );
            if( isset($id2) ){
                return redirect('/'); 
            }
        }
        
        return redirect('/error');
    }
}
