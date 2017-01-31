@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit song line</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('songs.index') }}"> Back</a>
                </div>
            </div>
        </div>

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        

        {!! Form::open(array('route' => 'lines.store', 'method'=>'POST')) !!}
        <div class="row">
            <input type="hidden" name="song_id" value="{{ $song_id }}">
            <input type="hidden" name="line_number" value="{{ $line_number }}">

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Japanese line:</strong>
                    <input type="text" class="form-control" name="line_jp_text" value="{{ $line_jp_text }}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Romaji line:</strong>
                    <input type="text" class="form-control" name="line_rm_text" value="{{ $line_rm_text }}">
                </div>
            </div>
    
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection