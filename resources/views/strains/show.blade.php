@extends('layouts.master')

@section('content')
    <div class="jumbtoron">
        <h1 class="item-header">{{$strain->name}}</h1>
    </div>
    <p><button class="btn btn-primary"><a href="{{ URL::previous() }}">Back to List</a></button></p>
    <div class="content-main">
    <img class="strain-image" style="" src="{{ $strain->image }}" title="{{ $strain->name }}" alt="{{ $strain->description }}"/>
    <section id="strain-body">
        <div class="strain-body">
            <p class="small">Breeder: {{ $strain->seed_company }}</p>
            <p>{{ $strain->description }}</p>
        </div>
    </section>
    </div>


@stop
