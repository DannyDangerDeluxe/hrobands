<?php

namespace App\Http\Controllers;

use App\Band;
use App\Gig;
use App\Media;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $userId = auth()->user()->band_id;
        $user = auth()->user();

        if($userId){
            $band = $user->band;
            $images = $band->bandImages;

            return view('user.band')->with([
                'band' => (array) $band->getAttributes(),
                'band_id' => $band->id,
                'bandImages' => $images
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
        $user = auth()->user();
        $band = $user->band;

        return view('user.media')->with([
            'image' => $user->profileImage ? $user->profileImage: null,
            'user_id' => $user->id ? $user->id : null,
            'band_id' => $user->band_id ? $user->band_id : null,
            'userImages' => $user->userImages,
            'bandImages' => $band->bandImages
        ]); 
    }

    public function showProfile()
    {
        $user = auth()->user();
        $band = $user->band;
        $image = $user->profileImage;
        $images = $user->userImages;

        // dd($user, $band, $image, $images);

        return view('user.profile')->with([
            'user' => $user,
            'band' => $band ? $band : null,
            'image' => $image ? $image : null,
            'images' => $images ? $images : null 
        ]);
    }

    public function showGigs()
    {
        $user = auth()->user();
        $bandId = $user->band_id ? $user->band_id : null;
        $gigs = null;
        $images = [];
        if($bandId){
            $gigs = Gig::where(['user_id' => $user->id, 'band_one_id' => $bandId])->get();
            if($gigs){
                foreach($gigs as $gig){
                    array_push($images, $gig->gigImage);
                }
            }
        }

        // dd($images);

        return view('user.gigs')->with([
            'user' => $user,
            'bandId' => $bandId,
            'gigs' => $gigs,
            'images' => $images
        ]);
    }
}
