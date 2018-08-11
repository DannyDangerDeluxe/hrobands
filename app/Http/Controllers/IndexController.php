<?php

namespace App\Http\Controllers;

use App\Band;
use App\Gig;
use Prismic\Api;
use Prismic\LinkResolver;
use Prismic\Predicates;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class IndexController extends Controller
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
    }


    /**
     * Return Home View
     */
    public function showHome()
    {
        $url = env('PRISMIC_URL');
        $key = env('PRISMIC_KEY');
        $api = Api::get($url, $key);
        
        /*
        $bands = DB::select('
            SELECT * FROM bands 
            LEFT JOIN media 
            ON bands.media_id = media.media_id
            LIMIT 3
        ');
        */

        $response = $api->getSingle('home');   
        $document = $response->getData()->data;

        // dd($document); exit;

        // return view('user.index', ['users' => $users]);
        return view('index')->with([
            // 'bands' => $bands,
            'bands' => null,
            'title' => $document->title[0]->text,
            'welcome' => $document->welcome_text[0]->text,
            'header_image' => $document->header_image->url,
        ]);
    }


    public function showFaq()
    {
        $url = env('PRISMIC_URL');
        $key = env('PRISMIC_KEY');
        $api = Api::get($url, $key);

        $response = $api->getSingle('faq');    
        $document = $response->getData()->data;

        $faq = [];
        for($i = 0; $i  < count($document->homefaq); $i++){
            $entry = (array) $document->homefaq[$i];
            $entry['question-text'] = ((array)$entry['question-text'][0])['text'];         
            $entry['answer-text'] = ((array)$entry['answer-text'][0])['text'];  
            array_push($faq, $entry);
        }

        // dd($document->homefaq, $faq); exit;

        return view('impressum')->with([
            'faq_title' => $document->title[0]->text,
            'faq_content' => $faq
        ]);
    }

    public function showGigs()
    {
        $images = [];
        $gigs = Gig::all();
        foreach($gigs as $gig){
            array_push($images, $gig->gigImage);
        }

        return view('content.gigs')->with([
            'gigs' => $gigs,
            'images' => $images
        ]);
    }

    public function showBands()
    {
        $images = [];
        $images = [];
        $bands = Band::all();
        foreach($bands as $band){
            array_push($images, $band->bandImage);
        }

        // dd($bands, $images);

        return view('content.bands')->with([
            'bands' => $bands,
            'images' => $images
        ]);
    }

    public function showBandDetailPage(int $id)
    {
        $band = Band::find($id);
        $image = array_first($band->bandImage()->get());
        $images = $band->bandImages()->get();
        $genre = array_first($band->genre()->get());

        // dd($band, $image, $images, $genre);

        return view('content.band_detail')->with([
            'band' => $band,
            'image' => $image,
            'images' => $images,
            'genre' => $genre,
        ]);
    }
}
