@extends('birch::layouts.dashboard')

@section('title','Members - ' . $group->name)
@section('description','Manage Group Members')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <!-- Default panel contents -->
                <div class="panel-heading">Group Members</div>

                <!-- Table -->
                <table class="table">
                    <tbody>
                        @foreach($group->users as $member)
                            <tr>
                                <td><a href="{{route('admin.users.view',$member)}}">{{$member->name}}&nbsp;({{$member->username}})</a></td>
                                <td><a href="{{route('admin.groups.members.remove',[$group,$member])}}">Remove</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection