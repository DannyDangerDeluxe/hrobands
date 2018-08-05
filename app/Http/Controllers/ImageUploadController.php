<?php

namespace App\Http\Controllers;

use Lang;
use App\Band;
use App\Media;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImageUploadController extends Controller
{
    /**
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function userImageUpload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string|max:255',
            'alt' => 'nullable|string|max:255',
            'undertitle' => 'nullable|string|max:255',
        ]);

        $this->saveImage($request);

        $user = auth()->user();
        $user->image_id = $media->id;
        $user->save();

        $success = \Lang::get('lang.image_upload_success');
        return redirect(url()->previous())
            ->with('success',$success)
            ->with('image',$imageName);
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function profileImageUpload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string|max:255',
            'alt' => 'nullable|string|max:255',
            'undertitle' => 'nullable|string|max:255',
        ]);

        $image = $this->saveImage($request);
        $user = auth()->user();
        DB::table('users_media')->insert(
            [
                'user_id' => $user->id,
                'media_id' => $image->id
            ]
        );

        $success = \Lang::get('lang.image_upload_success');
        return redirect(url()->previous())
            ->with('success',$success);
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function bandImageUpload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string|max:255',
            'alt' => 'nullable|string|max:255',
            'undertitle' => 'nullable|string|max:255',
        ]);

        $image = $this->saveImage($request);
        $user = auth()->user();
        $band = Band::find(auth()->user()->band_id);

        DB::table('bands_media')->insert(
            [
                'band_id' => $band->id,
                'media_id' => $image->id
            ]
        );

        $success = \Lang::get('lang.image_upload_success');
        return redirect(url()->previous())
            ->with('success',$success);
    }

    private function saveImage(Request $request)
    {
        $imageName = time() .'_' .$request->image->getClientOriginalName();

        $media = Media::create();
        $media->name = $request->input('name');
        $media->path = 'images/' . $imageName;
        $media->alt = $request->input('alt') ? $request->input('alt') : null;
        $media->undertitle = $request->input('undertitle') ? $request->input('undertitle') : null;
        $request->image->move(public_path('images'), $imageName);
        $media->save();

        return $media;
    }
}
