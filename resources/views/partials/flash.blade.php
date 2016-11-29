@if(Session::has('flash_message'))
    <div class="alert alert-{{ Session::get('message_level') }} fade in"><em> {!! Session::get('flash_message') !!}</em>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button></div>
@endif