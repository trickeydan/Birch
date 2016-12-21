@extends('admin.layouts.dashboard')

@section('title','Update User - ' . $viewing->name)
@section('description','Update user\'s information')

@section('content')
    {!! Form::model($viewing,array('route' => ['admin.users.update',$viewing->username],'role' => 'form','method' => 'put')) !!}
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
                {!! Form::text($field,$viewing->$field,['class' => 'form-control']) !!}
            @else
                {!! Form::text($field,$viewing->$field,['class' => 'form-control','disabled']) !!}
            @endif
        </div>
    @endforeach

    <a href="{{route('admin.users.view',$viewing->username)}}"><p class="btn btn-danger">Back to {{$viewing->name}}</p></a>
    {!! Form::submit('Update Details',['class' => 'btn btn-success']) !!}

    {!! Form::close() !!}
@endsection