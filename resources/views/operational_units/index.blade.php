@extends('layouts.master')

@section('content')
    <div class="jumbtoron">
        <h1 class="resource-header">Your Grow Ops</h1>

        <a href="{{ URL::to('operational_units/create') }}" class="btn btn-primary btn-resource-header page-header">New Entry</a>
    </div>
    <hr>
    <table class="table table-striped table-hover table-resource-index">
        <tbody class="">
        <tr><th class="col-md-5">Entry</th></tr>
        @foreach($ops as $op)
            <tr>
                <td class="col-md-5"><a href="/operational_units/{{$op->id}}/">{{$op->unit_name}}</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop
