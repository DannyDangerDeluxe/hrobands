<?php

namespace App\Http\Controllers;

use App\Media;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImageUploadController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function imageUploadPost(Request $request)
    {
        // dd('Hallo', $request, url()->previous()); exit;

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string|max:255',
            'alt' => 'nullable|string|max:255',
            'undertitle' => 'nullable|string|max:255',
        ]);

        // dd($request->image->getClientOriginalName(), $request->image); exit;

        $imageName = time() .'_' .$request->image->getClientOriginalName();

        $media = Media::create();
        $media->name = $imageName;
        $media->path = public_path('images') . $imageName;
        $media->alt = $request->input('alt') ? $request->input('alt') : null;
        $media->undertitle = $request->input('undertitle') ? $request->input('undertitle') : null;

        $request->image->move(public_path('images'), $imageName);

        $media->save();

        return redirect(url()->previous())
            ->with('success','You have successfully upload image.')
            ->with('image',$imageName);
    }
}
