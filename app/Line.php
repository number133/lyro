<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Line extends Model
{
    protected $fillable = [
        'song_id', 'line_number', 'text', 'lang'
    ];

    public static function saveTextLines($song_id, $text, $lang) {
        $text_lines = explode("\n", $text);
        $i = 1;
        foreach ($text_lines as $text_line) {
            Line::create([
                'song_id' => $song_id,
                'line_number' => $i,
                'text' => $text_line,
                'lang' => $lang
            ]);
            $i++;
        }
    }
}
