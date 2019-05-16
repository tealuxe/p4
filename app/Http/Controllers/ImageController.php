<?php

namespace App\Http\Controllers;

use App\Image;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function show($id)
    {
        $image = Image::with('sheet')->find($id);

        if ($image) {
            return view('image')->with([
                'image' => $image
            ]);
        } else {
            return view('404');
        }
    }

    public function edit($id)
    {
        $image = Image::with('sheet')->find($id);

        if ($image) {
            return view('edit')->with([
                'image' => $image
            ]);
        } else {
            return view('404');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'make' => 'max:80',
            'model' => 'max:80',
            'f_number' => 'max:80',
            'exposure_time' => 'max:80',
            'iso_speed_ratings' => 'max:80',
            'film_type' => 'max:80',
            'developer' => 'max:80',
            'comment' => 'max:1500'
        ]);

        // save image with all fields
        $image = Image::with('sheet')->find($id);
        $image->comment = $request->comment;
        $image->make = $request->make;
        $image->model = $request->model;
        $image->exposure_time = $request->exposure_time;
        $image->f_number = $request->f_number;
        $image->iso_speed_ratings = $request->iso_speed_ratings;
        $image->film_type = $request->film_type;
        $image->developer = $request->developer;

        $image->save();

        // redirect method from class
        return redirect('/images/' . $id . "/edit")->with(['alert' => 'Image details updated.']);
    }

    public function delete($id)
    {
        $image = Image::find($id);
        $sheet_id = $image->sheet_id;
        $image->delete();

        return redirect('/sheets/' . $sheet_id)->with(['alert' => "Image deleted."]);
    }
}

