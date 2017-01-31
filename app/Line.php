<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Line extends Model
{
    protected $fillable = [
        'song_id', 'line_number', 'text', 'lang'
    ];

    protected $appends = array('terms');

    public function getTermsAttribute()
    {
        $result = '';
        
        $terms = Term::where('song_id', $this->song_id)->
            where('line_number', $this->line_number)->
            where('lang', $this->lang)->
            get();
        foreach ($terms as $term) {
            if($result != '') {
                $result = $result . ' ';
            }
            $result = $result . $term->text;
        }
        return $result;  
    }

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

            Term::saveTextTerms($song_id, $i, $text_line, $lang);
            $i++;
        }
    }

    public function terms() {
        return $this->hasMany('App\Term', ['song_id', 'line_number', 'lang']);
    }
}
