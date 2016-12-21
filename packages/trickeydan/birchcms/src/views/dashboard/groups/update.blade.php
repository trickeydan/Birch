@extends('birch::layouts.dashboard')

@section('title','Updating Group - ' . $group->name)
@section('description','Updating Details')

@section('content')
    {!! Form::model($group,array('route' => ['admin.groups.update',$group],'role' => 'form','method' => 'put')) !!}

    <div class="form-group">
            {!! Form::label('name','Name') !!}
            {!! Form::text('name',$group->name,['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
            {!! Form::label('slug','Slug') !!}
            {!! Form::text('slug',$group->slug,['class' => 'form-control','disabled']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('parentgroup_id','Parent Group') !!}
        {!! Form::select('parentgroup_id',$groups,$group->parent->slug,['class' => 'form-control']) !!}
    </div>

    <a href="{{route('admin.groups.view',$group)}}"><p class="btn btn-danger">Back to Group</p></a>
    {!! Form::submit('Update',['class' => 'btn btn-success']) !!}

    {!! Form::close() !!}
@endsection