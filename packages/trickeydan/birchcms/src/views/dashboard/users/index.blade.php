@extends('admin.layouts.dashboard')

@section('title','Users')
@section('description','Manage Users')

@section('content')
    <div class="panel panel-primary">
        <!-- Default panel contents -->
        <div class="panel-heading">
            All Users
            <a href="{{route('admin.users.create')}}"><button class="btn btn-info btn-sm" type="button">Create User</button></a>
        </div>

    @if($users->count() != 0)
        <!-- Table -->
            <table class="table">
                <thead>
                    <td>Name</td>
                    <td>Username</td>
                    <td>Group</td>
                    <td>Options</td>
                </thead>
                <tbody>
                @foreach($users as $usr)
                    <tr>
                        <td>{{$usr->name}}</td>
                        <td>{{$usr->username}}</td>
                        <td>{{$usr->group}}</td>
                        <td><a href="{{route('admin.users.view',$usr->username)}}">View</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <div class="panel-body">
                <p>You are the only user.</p>
            </div>
        @endif
    </div>
@endsection