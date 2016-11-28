@extends('layouts.master')

@section('content')
    <div class="jumbtoron">
        <h1 class="resource-header">Your Grow Journals</h1>

        <a href="/journals/create" class="btn btn-primary btn-resource-header page-header">New Entry</a>
    </div>
    <hr>
    <table class="table table-striped table-hover table-resource-index">
        <tbody class="">
        <tr><th class="col-md-5">Entry</th></tr>
        @foreach($journals as $journal)
            <tr>
                <td class="col-md-5"><a href="/journals/{{$journal->id}}/">{{$journal->title}}</a></td>


            </tr>
        @endforeach
        </tbody>
    </table>
    <script type="text/javascript">
        function getConfirmation(){
            var retVal = confirm("WARNING! Really delete this?");
            if( retVal == true ){
                return true;
            }
            else{
                return false;
            }
        }
    </script>
@stop
