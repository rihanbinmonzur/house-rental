
@extends('layouts.app_auth')


@section('content')
	<div class="panel panel-sign">
					<div class="panel-title-sign mt-xl text-right">
						<h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Sign In</h2>
					</div>
					<div class="panel-body">
						 <form method="POST" action="{{ route('login') }}">
                        @csrf

							<div class="form-group mb-lg">
								<label>Username</label>
								<div class="input-group input-group-icon">
									<input name="email" type="text" class="form-control input-lg @error('email') is-invalid @enderror"  value="{{ old('email') }}" required autocomplete="email" autofocus/>
                                    
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-user"></i>
										</span>
									</span> 
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
								</div>
							</div>

							<div class="form-group mb-lg">
								<div class="clearfix">
									<label class="pull-left">Password</label>
									<a href="{{ route('password.request') }}" class="pull-right">Lost Password?</a>
								</div>
								<div class="input-group input-group-icon">
									<input name="password" type="password" class="form-control input-lg @error('password') is-invalid @enderror" id="password" required autocomplete="current-password"/>
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-lock"></i>
										</span>
									</span>
                                     @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
								</div>
							</div>

							<div class="row">
								<div class="col-sm-8">
									<div class="checkbox-custom checkbox-default">
										<input id="RememberMe" name="remember" id="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }}/>
										<label for="RememberMe">Remember Me</label>
									</div>
								</div>
								<div class="col-sm-4 text-right">
									<button type="submit" class="btn btn-primary hidden-xs">Sign In</button>
									<button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Sign In</button>
								</div>
							</div>

							

							<p class="text-center">Don't have an account yet? <a href="{{route('register')}}">Sign Up!</a>

						</form>
					</div>
				</div>


@endsection
