@extends('template.app')
@section('style')
<link href="{{URL::asset('assets/css/extras/animate.min.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{URL::asset('css/custom_style.css')}}">
@endsection
@section('content')
<!-- Main content -->
	<div class="content-wrapper">

		<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content">

					<!-- Simple login form -->
					<form method="post" class="animated bounceInDown" name="login_form" action="{{ route('login_process') }}">
						<div class="panel panel-body login-form">
							<div class="text-center">
								<div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
								<h5 class="content-group">Login to your account <small class="display-block">Enter your credentials below</small></h5>
								<!-- <li><a href="#" class="animation" data-animation="bounceInDown"><i class="icon-play3"></i></a></li> -->
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="text" class="form-control" placeholder="Username" name="email">
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="password" class="form-control" placeholder="Password" name="password">
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-block">Sign in <i class="icon-circle-right2 position-right"></i></button>
							</div>

							<div class="text-center">
								<a href="login_password_recover.html">Forgot password?</a>
							</div>
						</div>
					</form>
					<!-- /simple login form -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->


</div>

<!-- /main content -->
@endsection
@section('script')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script type="text/javascript" src="{{URL::asset('assets/js/pages/animations_css3.js')}}"></script>
<script type="text/javascript">
	$('body').addClass('login-container');
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});
</script>
<script type="text/javascript" src="{{URL::asset('js/admin/login.js')}}"></script>
@endsection