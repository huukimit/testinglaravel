@extends('layout')

@section('title', 'Login - Demo PHPUnit')

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<form action="{{route('auth.postLogin')}}" method="post" class="form">
					{{csrf_field()}}
					
					<div class="form-inline">
						<label for="email" class="form-label">Email</label>
						<input type="email" id="email" name="email" class="form-control"
						       required="required" value="{{old('email')}}"/>
					</div>
					
					<div class="form-inline">
						<label for="password" class="form-label">Password</label>
						<input type="password" id="password" name="password" class="form-control"
						       required="required" value=""/>
					</div>
					
					<div class="form-inline">
						<div class="form-group pull-left">
							<input type="checkbox" id="remember" name="remember" class="form-control"
							       {{old('remember') ? 'checked="checked"' : ''}} value="1"/>
							<label for="remember">Rememeber me?</label>
						</div>
						
						<div class="form-group pull-right">
							<button type="submit" class="btn btn-warning">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection