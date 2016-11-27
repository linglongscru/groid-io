@extends('spark::layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ Lang::get('titles.home') }}</div>

                    <div class="panel-body">
                        <p>Your account is already active!</p>
                        <p><em>Have fun!</em></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
