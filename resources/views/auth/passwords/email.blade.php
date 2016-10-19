@extends('auth.layout')

@section('title','Reset Password')

<!-- Main Content -->
@section('content')
    <form class="form" role="form" method="POST" action="{{ url('/password/email') }}">
        {{ csrf_field() }}
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <input class="form-control" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <button class="btn btn-primary btn-block" type="submit">Send Reset Link</button>
        </div>
    </form>
@endsection
