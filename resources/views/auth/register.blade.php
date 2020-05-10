@extends('layouts.main')

@section('content')
<div id="home" class="intro route bg-image" style="background-image: url(img/intro-bg.jpg)">
    <div class="overlay-itro"></div>
    <div class="intro-content display-table">
        <div class="table-cell">
            <div class="container">
                    
            
                <div class="row" style='margin-top:100px;'>
                    
                    <div class="col-sm-3" style="blackground:red;"></div>

                        <div class="col-sm-6" style="background:white; border-radius:10px;margin-top:15px;">
                                        <div class="panel-heading"><h2>Register</h2></div>
                                        <div class="panel-body">
                                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                                                {{ csrf_field() }}

                                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                    <label for="name" class="col-md-12 control-label">Name</label>

                                                    <div class="col-md-12">
                                                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                                                        @if ($errors->has('name'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('name') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                    <label for="email" class="col-md-12 control-label">E-Mail Address</label>

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
                                                    <label for="password" class="col-md-12 control-label">Password</label>

                                                    <div class="col-md-12">
                                                        <input id="password" type="password" class="form-control" name="password">

                                                        @if ($errors->has('password'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('password') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                                    <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                                    <div class="col-md-12">
                                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                                        @if ($errors->has('password_confirmation'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-md-12 col-md-offset-4">
                                                        <button type="submit" class="btn btnD btn-lg">
                                                            <i class="fa fa-btn fa-user"></i> Register
                                                        </button>
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




