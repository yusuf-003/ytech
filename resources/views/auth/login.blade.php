@extends('layouts.main')

@section('content')
<div id="home" class="intro route bg-image" style="background-image: url(img/intro-bg.jpg)">
    <div class="overlay-itro"></div>
    <div class="intro-content display-table">
        <div class="table-cell">
            <div class="container">
                    
            
                <div class="row">
                    
                    <div class="col-sm-3" style="blackground:red;"></div>

                        <div class="col-sm-6" style="background:white; border-radius:10px;">
                            <div class="panel-heading">Login</div>
                                <div class="panel-body">
                                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                                                {{ csrf_field() }}

                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                <label for="email" class="col-md-6 control-label">E-Mail Address</label>

                                                <div class="col-md-12">
                                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                                    @if ($errors->has('email'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                <label for="password" class="col-md-6 control-label">Password</label>

                                                <div class="col-md-12">
                                                        <input id="password" type="password" class="form-control" name="password">

                                                        @if ($errors->has('password'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('password') }}</strong>
                                                            </span>
                                                        @endif
                                                </div>
                                        </div>

                                        <div class="form-group">
											<div class="col-md-6 col-md-offset-4">
												<div class="checkbox">
													<label>
														<input type="checkbox" name="remember"> Remember Me
													</label>
												</div>
											</div>
                                        </div>

                                        <div class="form-group">
											<div class="col-md-12 col-md-offset-12">
												<button type="submit" class=" btnD btn-lg">
													<i class="fa fa-btn fa-sign-in"></i> Login
												</button>

												<a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
											</div>
                                        </div>
                                    </form>
                                </div>
                        </div>
					<div class="col-sm-3" style="blackground:red;"></div>			 
                </div>
            </div>
        </div>
    </div>  
</div>
  
@endsection
