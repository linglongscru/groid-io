@extends('layouts.master')

@section('content')
    <div class="jumbtoron">
        <h1 class="resource-header">New Grow Op</h1>

        <a href="{{ route('operational_units.index') }}" class="btn btn-primary btn-resource-header page-header">List Operational Units</a>
    </div>
    <hr>
    <h1>Create a new grow op</h1>
    <section class="content-main">
        <div class="row">
            <div class="col-md-6 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">New Grow Operation</div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{!! $error !!}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        {!! Form::model('operational_unit', ['method' => 'POST', 'route' => 'operational_units.store']) !!}
                        <div class="form-group post-title">
                            {!! Form::label('title', 'Entry Title: ') !!}
                            {!! Form::text('title', old('title')) !!}
                        </div>
                        <div class="form-group post-body">
                            {!! Form::label('body', 'Body: ') !!}
                            <br>
                            {!! Form::textarea('body', old('body')) !!}
                        </div>
                            @include('partials.get-auth-user')
                        <div class="form-group">
                            <button type="submit" id="submit" class="btn btn-primary btn-resource-header page-header">
                                Create Grow Op
                            </button>
                        </div>

                        {!! Form::close() !!}
                    </div>
                    <div class="title-container">
                        <div class="content">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
