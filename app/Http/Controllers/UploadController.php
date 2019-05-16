<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\UploadRequest;
use App\Sheet;
use App\Image;

use Intervention\Image\ImageManagerStatic as IMG;

class UploadController extends Controller
{
    // dictionary to translate between exif format names and database names
    public $exifSettings = [
        "Make" => "make",
        "Model" => "model",
        "MimeType" => "mimetype",
        "ExposureTime" => "exposure_time",
        "FNumber" => "f_number",
        "ISOSpeedRatings" => "iso_speed_ratings"
    ];

    // calculate fnumbers from EXIF format which usually has fractional rational numbers
    public function fnumberCalculate($number)
    {
        // regex for a number divided by a number
        if (preg_match('/(\d+)\/(\d+)/', $number, $result)) {
            // divide numbers to get result
            $fnumber = $result[1] / $result[2];
            $fnumber = "f" . strval($fnumber);

            return $fnumber;
        } else {
            return $number;
        }
    }

    // Used stackoverflow to figure out storage issues in Laravel
    // https://stackoverflow.com/questions/47877203/laravel-how-to-get-a-file-stored-in-storage-app
    public function createImages($request, $sheet)
    {
        // cycle all images in request
        foreach ($request->images as $image) {
            // store image
            $filename = $image->store('public');

            // get filename without storage directory because does not match how accessed
            $filename_plain = substr($filename, 7);

            // create image file in Image Intervention for resizing
            $img = IMG::make("storage/" . $filename_plain);

            // resize for thumbnail, standard 35mm ratio
            $img->resize(300, 200);

            // create new thumbnail filename (just added thumb)
            $filename_thumb = "thumb" . $filename_plain;

            // save thumbnail to storage directory
            $img->save("storage/" . "thumb" . $filename_plain);

            // create database entry for image
            $image = Image::create([
                'user_id' => $sheet->user_id,
                'sheet_id' => $sheet->id,
                'filename' => $filename_plain,
                'thumbnail_filename' => "thumb" . $filename_plain
            ]);

            $exifdata = IMG::make("storage/" . $filename_plain)->exif();

            // if exifdata exists
            if ($exifdata) {
                foreach ($this->exifSettings as $key => $value) {
                    if (array_key_exists($key, $exifdata)) {
                        if ($key == "FNumber") {
                            $exifdata[$key] = $this->fnumberCalculate($exifdata[$key]);
                        }
                        $image->fill([$value => $exifdata[$key]]);
                    }
                }
            }
            // save each image
            $image->save();
        }
    }

    public function uploadSubmit(UploadRequest $request)
    {
        // name can have maximum of 35
        $request->validate([
            'name' => 'required|max:35'
        ]);

        $sheet = Sheet::firstOrCreate(["name" => $request->input("name")], ["user_id" => $request->input("user_id")]);

        $this->createImages($request, $sheet);

        return redirect('/sheets/' . $sheet->id)->with(['alert' => "Images Added."]);
    }
}
