<?php

namespace App\Http\Controllers;

use Lang;
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
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string|max:255',
            'alt' => 'nullable|string|max:255',
            'undertitle' => 'nullable|string|max:255',
        ]);

        $imageName = time() .'_' .$request->image->getClientOriginalName();

        $media = Media::create();
        $media->name = $request->input('name');
        $media->path = 'images/' . $imageName;
        $media->alt = $request->input('alt') ? $request->input('alt') : null;
        $media->undertitle = $request->input('undertitle') ? $request->input('undertitle') : null;
        $request->image->move(public_path('images'), $imageName);
        $user = auth()->user();
        $user->image_id = $media->id;

        $media->save();
        $user->save();

        $success = \Lang::get('app.dash_media_first_upload_success');
        return redirect(url()->previous())
            ->with('success',$success)
            ->with('image',$imageName);
    }
}
