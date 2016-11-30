@extends('admin.layouts.dashboard')

@section('title','Create User')
@section('description','Add a new user')

@section('content')
    <p>Please enter details for the new user. The user will receive an email with their password.</p>
    {!! Form::open(array('route' => 'admin.users.create','role' => 'form', 'method' => 'post')) !!}
    @foreach($fields as $field => $data)
        <div class="form-group">
            @if(isset($data['autofill']))
                {!! Form::label($field, $data['title']) !!}
                {!! Form::text($field,$data['autofill'],['class' => 'form-control','disabled']) !!}
            @else
                {!! Form::label($field, $data['title']) !!}
                {!! Form::text($field,'',['class' => 'form-control']) !!}
            @endif
        </div>
    @endforeach

    <a href="{{route('admin.users.index')}}"><p class="btn btn-danger">Back to Users</p></a>
    {!! Form::submit('Create User',['class' => 'btn btn-success']) !!}

    {!! Form::close() !!}
@endsection