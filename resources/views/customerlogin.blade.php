@extends('layout')
@section('content')
	
		
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form action="{{ url('/customer_login_check') }}" method="post">
							{{ csrf_field() }}
							<input type="email" name="customer_email" id="customer_email" placeholder="Email" />
							<input type="password" name="customer_password" id="customer_password" placeholder="Password" />
							<span>
								<input type="checkbox" class="checkbox"> 
								Keep me signed in
							</span>
							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form action="{{ url('/customer_reg') }}" method="post">
							{{ csrf_field() }}
							<input type="text" name="customer_name" id="customer_name" required="" placeholder="Name">
							<input type="email" name="customer_email" id="customer_email" required="" placeholder="Email Address">
							<input type="phone" name="customer_phone" id="customer_phone" required="" placeholder="Phone">
							<input type="text" name="customer_address" id="customer_address" required="" placeholder="Address">	
							<input type="password" name="customer_password" id="customer_password" required="" placeholder="Password"/>
							<button type="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	
	
	
		
		@endsection('content')