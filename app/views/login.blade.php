@extends('master')
@section('page_style')
{{HTML::style('css/bootstrapValidator/bootstrapValidator.min.css')}}
@stop
@section('body')
	<body class="login fixed">
		<div class="wrapper animated flipInY">
			<div class="logo"><a href="#"><i class="fa fa-bolt"></i> <span>AmazingSiteGenerator</span></a></div>
			<div class="box">
				<div class="header clearfix">
					<div class="pull-left"><i class="fa fa-sign-in"></i> Se connecter</div>
				</div>
				<form id="loginform" method="post">
					@if(Session::has('message'))
					<div class="alert alert-warning no-radius no-margin padding-sm"><i class="fa fa-info-circle"></i> {{Session::get('message')}}</div>
					@endif
					@if(Session::has('error'))
					<div class="alert alert-danger no-radius no-margin padding-sm"><i class="fa fa-info-circle"></i> {{Session::get('error')}}</div>
					@endif
					<div class="box-body padding-md">
						<div class="form-group">
							<input type="text" name="email" class="form-control" placeholder="E-Mail"/>
						</div>
						<div class="form-group">
							<input type="password" name="password" class="form-control" placeholder="Mot de passe"/>
						</div>          
						<div class="box-footer">                                                               
							<button type="submit" class="btn btn-success btn-block">Connexion</button>  
						</div>
					</div>
				</form>
			</div>
			<div class="box-extra clearfix">
				<a href="{{url('password-forgotten')}}" class="pull-left btn btn-xs">Mot de passe oublié ?</a>
				<a href="{{url('create-account')}}" class="pull-right btn  btn-xs">Créer un compte</a>
			</div>
			
			<footer>
				Copyright &copy; 2015 ASG inc.
			</footer>
		</div>
@stop
@section('scripts')
		<!-- Interface -->
        {{HTML::script('js/plugins/pace/pace.min.js')}}
		
		<!-- Forms -->
        {{HTML::script('js/plugins/bootstrapValidator/bootstrapValidator.min.js')}}
        {{HTML::script('js/plugins/iCheck/icheck.min.js')}}

		<script type="text/javascript">
			//iCheck
			$("input[type='checkbox'], input[type='radio']").iCheck({
				checkboxClass: 'icheckbox_minimal',
				radioClass: 'iradio_minimal'
			});
			
			$(document).ready(function() {
				$('#loginform').bootstrapValidator({
					message: 'This value is not valid',
					fields: {
						username: {
							message: 'The username is not valid',
							validators: {
								notEmpty: {
									message: 'The username is required and can\'t be empty'
								}
							}
						},
						password: {
							validators: {
								notEmpty: {
									message: 'The password is required and can\'t be empty'
								}
							}
						}
					}
				});
			});
		</script>
@stop