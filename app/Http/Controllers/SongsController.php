<?php

namespace App\Http\Controllers;

use App\Song;
use App\Line;
use App\Term;
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

        $song = Song::create($request->all());
        $text_jp = $request->text_jp;
        $line_count = Line::saveTextLines($song->id, $text_jp, 'jp');
        $text_rm = $request->text_rm;
        Line::saveTextLines($song->id, $text_rm, 'rm');
        $text_en = $request->text_en;
        Line::saveTextLines($song->id, $text_en, 'en');

        $song->line_count = $line_count;
        $song->save();
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
        Term::where('song_id', $song)->delete();
        Line::where('song_id', $song)->delete();
        Song::find($song)->delete();
        return redirect()->route('songs.index')
            ->with('success','Song deleted successfully');
    }

    public function edit(Song $song)
    {
        return view('songs.edit', compact('song'));
    }

    public function update(Request $request, $song)
    {
        $this->validate($request, [
            'name' => 'required',
            'artist' => 'required'
        ]);

        $song = Song::find($song);
        $song->name = $request->name;
        $song->artist = $request->artist;
        $song->video_url = $request->video_url;
        $song->save();

        return redirect()->route('songs.index')
            ->with('success','Song updated successfully');
    }
}
