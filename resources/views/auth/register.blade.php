@extends('layout')

@section('title', 'Register - Demo PHPUnit')

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<form action="{{route('auth.postRegister')}}" method="post" class="form">
					{{csrf_field()}}
					
					<div class="form-inline">
						<label for="name" class="form-label">Name</label>
						<input type="text" id="name" name="name" class="form-control" value="{{old('name', '')}}"/>
					</div>
					
					<div class="form-inline">
						<label for="email" class="form-label">Email</label>
						<input type="email" id="email" name="email" class="form-control"
						       required="required" value="{{old('email', '')}}"/>
					</div>
					
					<div class="form-inline">
						<label for="password" class="form-label">Password</label>
						<input type="password" id="password" name="password" class="form-control"
						       required="required" value=""/>
					</div>
					
					<div class="form-inline">
						<label for="re-password" class="form-label">Password Confirmation</label>
						<input type="password" id="re-password" name="password_confirmation"
						       class="form-control" required="required" value=""/>
					</div>
					
					<div class="form-inline">
						<div class="form-group">
							<button type="submit" class="btn btn-warning">Register</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection