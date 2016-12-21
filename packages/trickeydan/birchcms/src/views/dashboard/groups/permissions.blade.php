@extends('birch::layouts.dashboard')

@section('title','Permissions - ' . $group->name)
@section('description','Manage Group Permissions')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <!-- Default panel contents -->
                <div class="panel-heading">Group Permissions</div>

                <!-- Table -->
                <table class="table">
                    <tbody>
                        @foreach($group->permissions as $permission)
                            <tr>
                                <td>{{$permission->name}}</td>
                                <td><a href="#">Remove</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection