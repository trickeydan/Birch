@extends('birch::layouts.dashboard')

@section('title','Change Password')
@section('description','Change Your Password')

@section('content')
    {!! Form::open(array('route' => 'admin.settings.changepassword.post','role' => 'form', 'method' => 'post')) !!}
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

    <a href="{{route('admin.settings.index')}}"><p class="btn btn-danger">Back to Settings</p></a>
    {!! Form::submit('Change Password',['class' => 'btn btn-success']) !!}


    {!! Form::close() !!}
@endsection