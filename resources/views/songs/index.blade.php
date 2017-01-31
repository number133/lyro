@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Songs
                        <div class="pull-right">
                            <a href="/home">Home</a>
                            <a href="/songs/create">New Song</a>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <div class="panel-body">

                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Artist</th>
                                <th width="280px">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($songs as $song)
                                <tr>
                                    <td>{{ $song->name }}</td>
                                    <td>{{ $song->artist }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('songs.show',$song->id) }}">Show</a>
                                        <a class="btn btn-primary" href="{{ route('songs.edit',$song->id) }}">Edit</a>
                                        <a class="btn btn-primary" href="{{ route('lines.edit', [$song->id, 1]) }}">Edit Lines</a>
                                        {!! Form::open(['method' => 'DELETE','route' => ['songs.destroy', $song->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection