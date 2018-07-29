<?php

namespace App\Http\Controllers;

use App\Band;
use App\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    private $userId;
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
        $this->userId = auth()->user()->band_id;

        if($this->userId){
            $band = Band::find($this->userId);

            return view('user.band')->with([
                'band' => (array) $band->getAttributes(),
                'band_id' => $this->userId,
            ]); 
        }else{            
            $genreArray = [];
            $genres = DB::select('
                SELECT * FROM genres
            ');

            foreach ($genres as $key => $val) {
                $genreTemp['id'] = $val->id;
                $genreTemp['name'] = $val->name;
                $genreTemp['parent'] = $val->parent;
                array_push($genreArray, $genreTemp);
            }
            
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
            return redirect('dash/band')
                        ->withErrors($validator)
                        ->withInput($request->all());

        // validator success
        }else{
            $band = Band::create();
            $band->name = $request->input('name');
            $band->website = $request->input('website');
            $band->founded = $request->input('founded');
            $band->genre_id = $request->input('genre');
            $band->description = $request->input('description');
            $band->save();

            $user = auth()->user();
            $user->band_id = $band->id;
            $user->save();

            return redirect('dash/band');
        }
    }

    public function showMedia()
    {
        return view('user.media')->with([
            'image' => auth()->user()->image_id ? Media::getMediaById(auth()->user()->image_id) : null,
            'band_id' => $this->userId ? $this->userId : auth()->user()->band_id
        ]); 
    }
}
