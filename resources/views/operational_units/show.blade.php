@extends('layouts.master')

@section('content')
    <div class="jumbtoron">
        <h1 class="resource-header">{{$operational_unit->title}}</h1>
        <button class="btn btn-primary btn-resource-header page-header" onclick="toggle_visibility('edit-resource-form');">
            Edit
        </button>
    </div>
    <hr>
    <div class="edit-resource-form" id="edit-resource-form">
        {!! Form::model('operational_unit', ['method' => 'PUT', 'action' => ['OperationalUnitsController@update', 'operational_unit' => $operational_unit->id]]) !!}
        <div class="form-group post-title">
            {!! Form::label('title', 'Entry Title: ') !!}
            {!! Form::text('title', $operational_unit->name) !!}
        </div>
        <div class="form-group post-body">
            {!! Form::label('body', 'Body: ') !!}
            <br>
            {!! Form::textarea('body', $operational_unit->body) !!}
        </div>
        @include('partials.get-auth-user')
        <div class="form-group">
            <button type="submit" id="submit" class="btn btn-primary">
                Submit Post
            </button>
        </div>
        {!! Form::close() !!}
    </div>
    <section id="body" class="operational_unit-body"><p>{{ $operational_unit->unit_name }}</p></section>

    <blockquote>user id: {{ $operational_unit->user_id }}</blockquote>

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
