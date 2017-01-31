<?php

namespace App\Http\Controllers;

use App\Line;
use App\Term;
use App\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LinesController extends Controller
{
    public function edit($song, $line) {
    	$line_jp_text = $this->getLineComposed($song, $line, 'jp');
    	$line_rm_text = $this->getLineComposed($song, $line, 'rm');
    	$song_id = $song;
    	$line_number = $line;
        $line_count = Song::find($song)->line_count;
    	return view('lines.edit', compact('song_id', 'line_number', 'line_count', 'line_jp_text', 'line_rm_text'));
    }

    public function store(Request $request) {
    	$this->validate($request, [
            'line_jp_text' => 'required',
            'line_rm_text' => 'required',
            'song_id' => 'required',
            'line_number' => 'required'
        ]);
    	
    	$song_id = $request->song_id;
    	$line_number = $request->line_number;

    	$line_jp_text = $request->line_jp_text;
    	Term::saveTextTerms($song_id, $line_number, $line_jp_text, 'jp');

    	$line_rm_text = $request->line_rm_text;
    	Term::saveTextTerms($song_id, $line_number, $line_rm_text, 'rm');

    	return Redirect::route('lines.edit', array('song' => $song_id, 'line' => $line_number));
    }

    private function getLineComposed($song_id, $line_number, $lang) {
    	$result = '';
    	
    	$terms = Term::where('song_id', $song_id)->where('line_number', $line_number)->where('lang', $lang)->get();
    	foreach ($terms as $term) {
    		if($result != '') {
    			$result = $result . ' ';
    		}
    		$result = $result . $term->text;
    	}

    	if($result === '') {
	    	$line = Line::where('song_id', $song_id)->
	    		where('line_number', $line_number)->
	    		where('lang', $lang)->first();
	    	if ($line) {
	    		$result = $line->text;
	    	}
    	}
    	return $result;
    }
}
