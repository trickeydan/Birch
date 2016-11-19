@extends('admin.layouts.dashboard')

@section('title','Change Password')
@section('description','Change Your Password')

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {!! Form::open(array('route' => 'settings.changepassword.post','role' => 'form', 'method' => 'post')) !!}
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="form-group">
        {!! Form::label('oldpassword', 'Current Password') !!}
        {!! Form::password('oldpassword',['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('password', 'New Password') !!}
        {!! Form::password('password',['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('password_confirmation', 'Confirm New Password') !!}
        {!! Form::password('password_confirmation',['class' => 'form-control']) !!}
    </div>

    <a href="#"><p class="btn btn-danger">Back to Settings</p></a>
    {!! Form::submit('Change Password',['class' => 'btn btn-success']) !!}


    {!! Form::close() !!}
@endsection