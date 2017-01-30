<?php

namespace App\Http\Controllers;

use App\Song;
use App\Line;
use Illuminate\Http\Request;

class SongsController extends Controller
{
    public function index()
    {
        $songs = Song::all();
        return view('songs.index', compact('songs'));
    }

    public function create()
    {
        return view('songs.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'artist' => 'required'
        ]);

        $song_id = Song::create($request->all())->id;
        $text_jp = $request->text_jp;
        Line::saveTextLines($song_id, $text_jp, 'jp');
        $text_en = $request->text_en;
        Line::saveTextLines($song_id, $text_en, 'en');
        return redirect()->route('songs.index')
            ->with('success','Song created successfully');
    }

    public function show($song)
    {
        $song = Song::with('lines')->find($song);
        return view('songs.show', compact(['song']));
    }

    public function destroy($song)
    {
        Song::find($song)->delete();
        return redirect()->route('songs.index')
            ->with('success','Song deleted successfully');
    }
}
