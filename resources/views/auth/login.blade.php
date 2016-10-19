@extends('auth.layout')

@section('title','Login')

@section('content')
    <form role="form" method="POST" action="{{ url('/login') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
            <input class="form-control" type="text" name="username" placeholder="Username" value="{{ old('username') }}" required autofocus>
            @if ($errors->has('username'))
                <span class="help-block">
                    <strong>{{ $errors->first('username') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <input class="form-control" type="password" name="password" placeholder="Password" required>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember"> <small>Remember Me</small>
                    </label>
                </div>
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-block" type="submit">Log In</button>
        </div>
        @if(config('site.enable_password_reset'))
            <a href="{{ url('/password/reset') }}" class="forgot">Forgot your password?</a>
        @endif
        @if(config('site.enable_user_registration'))
            <a href="{{ url('/register') }}" class="forgot">Register</a>
        @endif
    </form>
@endsection
