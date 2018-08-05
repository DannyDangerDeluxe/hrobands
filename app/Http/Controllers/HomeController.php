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
        $bandImages = [];
        $user = auth()->user();
        if($user->band_id){
            $bandsMedia = DB::select('SELECT * FROM bands_media WHERE band_id = ' .$user->band_id);

            foreach($bandsMedia as $media){
                if($media->band_id === $user->band_id){
                    $image = DB::select('SELECT * FROM media WHERE id = ' .$media->media_id);
                    $image = (array) array_first($image);
                    $image['path'] = '/' .$image['path'];
                    array_push($bandImages, $image);
                }
            }
        }
        return view('user.media')->with([
            'image' => auth()->user()->image_id ? Media::getMediaById(auth()->user()->image_id) : null,
            'user_id' => $user->id ? $user->id : null,
            'band_id' => $user->band_id ? $user->band_id : null,
            'images' => $bandImages
        ]); 
    }

    public function showProfile()
    {
        $user = auth()->user();
        $band = Band::find($user->band_id);
        $image = auth()->user()->image_id ? Media::getMediaById(auth()->user()->image_id) : null;
        $bandImages = [];

        $bandsMedia = DB::select('SELECT * FROM users_media WHERE user_id = ' .$user->id);

        if(isset($bandsMedia)){
            foreach($bandsMedia as $media){
                if($media->user_id === $user->id){
                    $tempImg = DB::select('SELECT * FROM media WHERE id = ' .$media->media_id);
                    $tempImg = (array) array_first($tempImg);
                    $tempImg['path'] = '/' .$tempImg['path'];
                    array_push($bandImages, $tempImg);
                }
            }
        }

        // dd($user, $band, $image);

        return view('user.profile')->with([
            'user' => $user,
            'band' => $band ? $band : null,
            'image' => $image,
            'images' => isset($bandImages[0]) ? $bandImages : null 
        ]);
    }

    public function showGigs()
    {
        $user = auth()->user();
        $bandId = $user->band_id ? $user->band_id : null;

        return view('user.gigs')->with([
            'user' => $user,
            'bandId' => $bandId
        ]);
    }
}
