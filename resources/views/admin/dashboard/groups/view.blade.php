@extends('admin.layouts.dashboard')

@section('title','View Group - ' . $group->name)
@section('description','Manage Group')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-primary">
                <!-- Default panel contents -->
                <div class="panel-heading">Group Details</div>

                <!-- Table -->
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Name</td>
                            <td>{{$group->name}}</td>
                        </tr>
                        <tr>
                            <td>Slug</td>
                            <td>{{$group->slug}}</td>
                        </tr>
                        <tr>
                            <td>Parent</td>
                            <td>{{$group->parent or 'None'}}</td>
                        </tr>
                        <tr>
                            <td>Member Count</td>
                            <td>{{$group->users->count()}}</td>
                        </tr>
                        <tr>
                            <td>Child Groups</td>
                            <td>{{$group->children->count()}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-primary">
                <!-- Default panel contents -->
                <div class="panel-heading">Options</div>

                <div class="list-group">
                    <a href="#"><button type="button" class="list-group-item disabled">Permissions</button></a>
                    <a href="#"><button type="button" class="list-group-item disabled">Members</button></a>
                    <a href="#"><button type="button" class="list-group-item disabled">Update Details</button></a>
                    <a href="{{route('admin.groups.delete',$group)}}"><button type="button" class="list-group-item">Delete Group</button></a>
                </div>
            </div>

        </div>
@endsection