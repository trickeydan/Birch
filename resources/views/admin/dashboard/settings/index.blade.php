@extends('admin.layouts.dashboard')

@section('title','Settings')
@section('description','Your Profile')

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-primary">
                <!-- Default panel contents -->
                <div class="panel-heading">Your Details</div>

                <!-- Table -->
                <table class="table">
                    <tbody>
                    @foreach($fields as $field => $data)
                        <tr>
                            <td>{{$data['title']}}</td>
                            <td>{{$user->$field}}</td>
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
                    <a href="{{route('settings.changepassword')}}"><button type="button" class="list-group-item">Change My Password</button></a>
                    <a href="#"><button type="button" class="list-group-item disabled">Update My Details</button></a>
                    <button type="button" class="list-group-item disabled">Report an issue</button>
                </div>
            </div>

        </div>
    </div>
@endsection