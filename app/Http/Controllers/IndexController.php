<?php

namespace App\Http\Controllers;

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
        $this->middleware('guest');
    }


    /**
     * Return Home View
     */
    public function showHome()
    {
        $url = env('PRISMIC_URL');
        $key = env('PRISMIC_KEY');
        $api = Api::get($url, $key);
        
        $bands = DB::select('
            SELECT * FROM bands 
            LEFT JOIN media 
            ON bands.media_id = media.media_id
            LIMIT 3
        ');

        $response = $api->getSingle('home');   
        $document = $response->getData()->data;

        // dd($document); exit;

        // return view('user.index', ['users' => $users]);
        return view('index')->with([
            'bands' => $bands,
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
}
