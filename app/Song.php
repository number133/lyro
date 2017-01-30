<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $fillable = [
        'name', 'artist', 'video_url',
    ];

    public function lines() {
        return $this->hasMany('App\Line', 'song_id');
    }
}
