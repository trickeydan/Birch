@extends('admin.layouts.dashboard')

@section('title','View User - ' . $viewing->name)
@section('description','Manage User')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-primary">
                <!-- Default panel contents -->
                <div class="panel-heading">User Details</div>

                <!-- Table -->
                <table class="table">
                    <tbody>
                    @foreach($fields as $field => $data)
                        <tr>
                            <td>{{$data['title']}}</td>
                            <td>{{$viewing->$field}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-primary">
                <!-- Default panel contents -->
                <div class="panel-heading">Options</div>

                <div class="list-group">
                    <a href="{{route('admin.users.view',$viewing->username)}}"><button type="button" class="list-group-item">Update Details</button></a>
                    <a href="#"><button type="button" class="list-group-item disabled">Reset Password</button></a>
                </div>
            </div>

        </div>
@endsection