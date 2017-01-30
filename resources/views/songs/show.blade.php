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
                        {{ $song->artist }} : {{ $song->name }}
                        <br>
                        @foreach ($song->lines as $line)
                            {{ $line->line_number }}: {{ $line->text }} <br/>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection