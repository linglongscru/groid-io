@extends('spark::layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">{{ Lang::get('titles.home') }}</div>

				<div class="panel-body">
					<p>Your account is not active yet.</p>
					<p>We sent an email to your address.</p>
					<p>Check your spam folder first then</p>
					<p><a href='/resendEmail'>{{ Lang::get('auth.clickHereResend') }}</a></p>
                    <p>{{ Lang::get('auth.clickInEmail') }}</p>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
