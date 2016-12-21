@extends('admin.layouts.dashboard')

@section('title','Create Group')
@section('description','Add a new group')

@section('content')
    {!! Form::open(array('route' => 'admin.groups.create','role' => 'form', 'method' => 'post')) !!}

    <div class="form-group">
            {!! Form::label('name','Name') !!}
            {!! Form::text('name',null,['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
            {!! Form::label('slug','Slug') !!}
            {!! Form::text('slug',null,['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('parentgroup_id','Parent Group') !!}
        {!! Form::select('parentgroup_id',$groups,'none',['class' => 'form-control']) !!}
    </div>

    <a href="{{route('admin.groups.index')}}"><p class="btn btn-danger">Back to Groups</p></a>
    {!! Form::submit('Create Group',['class' => 'btn btn-success']) !!}

    {!! Form::close() !!}
@endsection