@extends('admin.layouts.dashboard')

@section('title','Groups')
@section('description','Manage Groups')

@section('content')
    <div class="panel panel-primary">
        <!-- Default panel contents -->
        <div class="panel-heading">
            All Groups
            <a href="{{route('admin.groups.create')}}"><button class="btn btn-info btn-sm" type="button">Create Group</button></a>
        </div>

    @if($groups->count() != 0)
        <!-- Table -->
            <table class="table">
                <thead>
                    <td>Name</td>
                    <td>Slug</td>
                    <td>Parent</td>
                    <td>Members</td>
                    <td>Child Groups</td>
                    <td>Options</td>
                </thead>
                <tbody>
                @foreach($groups as $grp)
                    <tr>
                        <td>{{$grp->name}}</td>
                        <td>{{$grp->slug}}</td>
                        <td>{{$grp->parent or 'None'}}</td>
                        <td>{{$grp->users->count()}}</td>
                        <td>{{$grp->children->count()}}</td>
                        <td><a href="#">View</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <div class="panel-body">
                <p>There are no groups</p>
            </div>
        @endif
    </div>
@endsection