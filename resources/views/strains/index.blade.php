@extends('layouts.master')

@section('content')
    <div class="jumbtoron">
        <h1 class="resource-header">Strains Database</h1>

        <a href="/journals/create" class="btn btn-primary btn-resource-header page-header">New Entry</a>
    </div>
    <hr>
    <table class="table table-striped table-hover table-resource-index">
        <tbody class="">
        {{ $strains->links() }}
        <tr><th class="col-md-5">Strain</th></tr>
        @foreach($strains as $strain)
            <tr>
                <td class="col-md-5"> <a style="display:block; width:5%; max-width:90px; min-width:60px;" href="/strains/{{$strain->id}}/"> <img src="{{ $strain->image }}" style="margin-right:1em; float:left; display:block;"/></a><a style="display:block; width:90%; min-height:90px; font-size:2em;" href="/strains/{{$strain->id}}/">{{$strain->name}}</a></td></td>
            </tr>
        @endforeach
        <tfoot><tr><td class="col-md-5">
                {{ $strains->links() }}</td></tr></tfoot>
        </tbody>
    </table>

@stop
