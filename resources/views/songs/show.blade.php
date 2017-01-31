@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Song
                        <div class="pull-right">
                            <a href="/songs">Back</a>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <div class="panel-body">
                        @if ($song->video_url)
                            <iframe width="420" height="315"
                                src="{{ $song->video_url }}">
                            </iframe>
                        @endif
                        <br>
                        {{ $song->artist }} : {{ $song->name }}
                        <br>
                        @foreach ($song->lines as $line)
                            {{ $line->line_number }}: {{ $line->terms }} <br/>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection