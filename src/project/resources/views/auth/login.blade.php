@extends('layouts.auth')

@section('title', ucfirst(__('auth.login')))

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
        	<div class="panel panel-default">
            	<div class="panel-heading">{{ucfirst(__('auth.login'))}}</div>
                <div class="panel-body">
                	@include('inc.errors')
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        	<label for="email" class="col-md-4 control-label">{{ucfirst(__('auth.email'))}}</label>
							
							<div class="col-md-6">
                           		<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                        	</div>
						</div>

						<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        	<label for="password" class="col-md-4 control-label">{{ucfirst(__('auth.password'))}}</label>

							<div class="col-md-6">
                            	<input id="password" type="password" class="form-control" name="password" required>
                            </div>
                        </div>

                        <div class="form-group">
                        	<div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ucfirst(__('auth.remember_me'))}}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                        	<div class="col-md-6 col-md-offset-4 text-right">
                            	<button type="submit" class="btn btn-primary">
                                	{{ucfirst(__('auth.login'))}}
                         		</button>
                        	</div>
						</div>
					</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection