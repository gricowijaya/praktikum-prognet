@extends('layouts.login.index')

@section('title', 'Login Admin')

@section('form')
							<form action="{{route('admins.login')}}" method="POST" class="signin-form">
                @csrf
			      		<div class="form-group mb-3">
			      			<label class="label" for="name">Admin Email</label>
			      			<input name="email" id="email" type="email" class="form-control" placeholder="Email" autofocus required>
			      		</div>
		            <div class="form-group mb-3">
		            	<label class="label" for="password">Password</label>
		              <input name="password" id="password" type="password" class="form-control" placeholder="Password" autofocus required>
		            </div>
		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
		            </div>
		            <div class="form-group d-md-flex">
		            	<div class="w-50 text-left">
			            	<label class="checkbox-wrap checkbox-primary mb-0">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
										</label>
									</div>
									<div class="w-50 text-md-right">
										<a href="#">Forgot Password</a>
									</div>
		            </div>
		          </form>
@endsection