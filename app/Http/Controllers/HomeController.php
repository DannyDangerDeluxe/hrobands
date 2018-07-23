<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.home');
    }

    public function showUserBand()
    {
        $id = auth()->user()->band_id;

        if($id){
            return view('user.band')->with([
                'band_id' => $id
            ]); 
        }else{            
            $genres = DB::select('
                SELECT * FROM genres
            ');

            $genreArray = [];
            foreach ($genres as $key => $val) {
                $genre_temp['id'] = $val->genre_id;
                $genre_temp['name'] = $val->genre_name;
                $genre_temp['parent'] = $val->genre_parent;
                array_push($genreArray, $genre_temp);
            }

            // dd($genreArray); exit;
            
            return view('user.band')->with([
                'band_id' => null,
                'genres' => $genreArray
            ]);
        }
    }

    public function registerBand(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'website' => 'nullable|url|max:255',
            'founded' => 'nullable|integer|min:4',
            'genre' => 'nullable|integer',
            'description' => 'nullable|string',
        ]);

        // validator error handling
        if ($validator->fails()) {
            dd('not valid', $request, $validator); exit;

        // validator success
        }else{
            dd('valid', $request); exit;
        }
    }
}
