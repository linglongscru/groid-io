@extends('layouts.master')

@section('content')
    <div class="jumbtoron">
        <h1 class="resource-header">{{$journal->title}}</h1>
        <button class="btn btn-primary btn-resource-header page-header" onclick="toggle_visibility('edit-resource-form');">
            Edit
        </button>
    </div>
    <hr>
    <div class="edit-resource-form" id="edit-resource-form">
        {!! Form::model('journal', ['method' => 'PUT', 'action' => ['JournalsController@update', 'journal' => $journal->id]]) !!}
        <div class="form-group post-title">
            {!! Form::label('title', 'Entry Title: ') !!}
            {!! Form::text('title', $journal->title) !!}
        </div>
        <div class="form-group post-body">
            {!! Form::label('body', 'Body: ') !!}
            <br>
            {!! Form::textarea('body', $journal->body) !!}
        </div>
        @include('partials.get-auth-user')
        <div class="form-group">
            <button type="submit" id="submit" class="btn btn-primary">
                Submit Post
            </button>
        </div>
        {!! Form::close() !!}
    </div>
    <section id="body" class="journal-body"><p>{{ $journal->body }}</p></section>

    <blockquote>user id: {{ $journal->user_id }}</blockquote>

    <script type="text/javascript">
        function toggle_visibility(id) {
            var e = document.getElementById(id);
            if(e.style.display == 'block')
                e.style.display = 'none';
            else
                e.style.display = 'block';
        }
    </script>
@stop
