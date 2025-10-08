@extends('layouts.app_authre')

@section('content')

	 <form method="POST" action="{{ route('register') }}">
                        @csrf

							<div class="form-group mb-lg">
								<label>Name</label>
								<input name="name" id="name" type="text" class="form-control input-lg @error('name') is-invalid @enderror" value="{{ old('name') }}" required autocomplete="name" autofocus />
                                 @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>

							<div class="form-group mb-lg">
								<label>E-mail Address</label>
								<input name="email" type="email" class="form-control input-lg @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}" required autocomplete="email/>
                                 @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror+
							</div>

							<div class="form-group mb-none">
								<div class="row">
									<div class="col-sm-6 mb-lg">
										<label>Password</label>
										<input name="pwd" type="password" class="form-control input-lg" />
									</div>
									<div class="col-sm-6 mb-lg">
										<label>Password Confirmation</label>
										<input id="password_confirmation" type="password" class="form-control input-lg " name="password_confirmation" required autocomplete="new-password" />
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-8">
									<div class="checkbox-custom checkbox-default">
										<input id="AgreeTerms" name="agreeterms" type="checkbox"/>
										<label for="AgreeTerms">I agree with <a href="#">terms of use</a></label>
									</div>
								</div>
								<div class="col-sm-4 text-right">
									<button type="submit" class="btn btn-primary hidden-xs">Sign Up</button>
									<button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Sign Up</button>
								</div>
							</div>

							

							<p class="text-center">Already have an account? <a href="{{route('login')}}">Sign In!</a>

						</form>
                    
@endsection
