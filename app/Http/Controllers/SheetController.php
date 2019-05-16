<?php

namespace App\Http\Controllers;

use App\Sheet;
use App\Image;

use Illuminate\Http\Request;

class SheetController extends Controller
{
    public function all(Request $request)
    {
        $user = $request->user();

        if ($user) {
            $sheets = $user->sheets()->orderBy('name', 'asc')->get();

            return view('home')->with([
                'sheets' => $sheets
            ]);
        } else {
            return view('home')->with([
                'sheets' => null
            ]);
        }
    }

    public function show($id)
    {
        $sheet = Sheet::with('user')->find($id);
        $images = Image::where('sheet_id', '=', $id)->get();

        if ($sheet) {
            return view('sheet')->with([
                'sheet' => $sheet,
                'images' => $images
            ]);
        } else {
            return view('404');
        }
    }

    public function delete($id)
    {
        $sheet = Sheet::find($id);
        $sheet->delete();

        return redirect('/')->with(['alert' => "Sheet deleted"]);
    }
}
