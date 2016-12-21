@extends('birch::layouts.dashboard')

@section('title','Update Details')
@section('description','Change your information')

@section('content')
    {!! Form::model($user,array('route' => 'admin.settings.update','role' => 'form','method' => 'put')) !!}
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @foreach($fields as $field => $data)
        <div class="form-group">
            {!! Form::label($field, $data['title']) !!}
            @if($data['editable'])
                {!! Form::text($field,$user->$field,['class' => 'form-control']) !!}
            @else
                {!! Form::text($field,$user->$field,['class' => 'form-control','disabled']) !!}
            @endif
        </div>
    @endforeach

    <a href="{{route('admin.settings.index')}}"><p class="btn btn-danger">Back to Settings</p></a>
    {!! Form::submit('Update Details',['class' => 'btn btn-success']) !!}

    {!! Form::close() !!}
@endsection