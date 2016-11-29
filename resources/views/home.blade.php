@extends('spark::layouts.app')

@section('content')
    <home :user="user" inline-template>

        <div class="container">
            <!-- Application Dashboard -->
            @include('partials.flash')
            <ops></ops>
            <cycles></cycles>
            <strains></strains>
        </div>
    </home>
@endsection
