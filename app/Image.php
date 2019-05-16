<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    protected $fillable = ['sheet_id', 'filename', 'thumbnail_filename', 'user_id', 'mimetype',
        'exposure_time', 'f_number', 'iso_speed_ratings', 'film_type', 'developer',
        'make', 'model'];

    public function sheet()
    {
        return $this->belongsTo('App\Sheet');
    }
}
