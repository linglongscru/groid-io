@extends('spark::layouts.app')

@section('content')
<home :user="user" inline-template>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <ops></ops>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">New Data</div>

                    <div class="panel-body">

                    </div>
                </div>
            </div>
            <div class="col-md-4 col-md-offset-0">
                <cycles></cycles>
            </div>
        </div>
        <div class="row">
            <strains></strains>
        </div>
    </div>
</home>
@endsection
