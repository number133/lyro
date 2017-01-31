<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    protected $fillable = [
        'song_id', 'line_number', 'term_number', 'text', 'lang'
    ];

    public static function saveTextTerms($song_id, $line_number, $text, $lang) {
        Term::where('song_id', $song_id)->
                where('line_number', $line_number)->
                where('lang', $lang)->delete();
        $text_terms = preg_split('/\s+/', $text);
        $i = 1;
        foreach ($text_terms as $text_term) {
            Term::create([
                'song_id' => $song_id,
                'line_number' => $line_number,
                'term_number' => $i,
                'text' => $text_term,
                'lang' => $lang
            ]);
            $i++;
        }
    }
}
