<?php

namespace App\Http\Controllers;

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
        $bands = DB::select('
            SELECT * FROM bands 
            LEFT JOIN media 
            ON bands.media_id = media.media_id
            LIMIT 3
        ');

        // return view('user.index', ['users' => $users]);
        return view('index', ['bands' => $bands]);
    }
}
