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

                        <div class="row">
                            <div class="col-md-6">
                                <!-- Nav tabs -->
                                <div class="card">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#jp" aria-controls="jp" role="tab" data-toggle="tab">Japanese</a></li>
                                        <li role="presentation"><a href="#rm" aria-controls="rm" role="tab" data-toggle="tab">Romaji</a></li>
                                        <li role="presentation"><a href="#en" aria-controls="en" role="tab" data-toggle="tab">English</a></li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="jp">
                                            @foreach ($song->lines as $line)
                                                @if ( $line->lang == 'jp')
                                                    {{ $line->line_number }}: {{ $line->terms }} <br/>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div role="tabpanel" class="tab-pane" id="rm">
                                            @foreach ($song->lines as $line)
                                                @if ( $line->lang == 'rm')
                                                    {{ $line->line_number }}: {{ $line->terms }} <br/>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div role="tabpanel" class="tab-pane" id="en">
                                            @foreach ($song->lines as $line)
                                                @if ( $line->lang == 'en')
                                                    {{ $line->line_number }}: {{ $line->terms }} <br/>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection