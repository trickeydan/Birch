@extends('birch::layouts.dashboard')

@section('title','Pages')
@section('description','Manage Pages')

@section('content')
    <div class="panel panel-primary">
        <!-- Default panel contents -->
        <div class="panel-heading">
            All Pages
            <a href="#"><button class="btn btn-info btn-sm" type="button">Create Page</button></a>
        </div>
    @if($user->pages->count() != 0)
        <!-- Table -->
            <table class="table">
                <thead>
                    <td>Title</td>
                    <td>Location</td>
                    <td>Owner</td>
                    <td>Options</td>
                </thead>
                <tbody>
                @foreach($user->pages as $page)
                    <tr>
                        <td>{{$page->title}}</td>
                        <td>{{$page->urlslug}}</td>
                        <td>{{$page->ownable->name}}</td>
                        <td><a href="#">View</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <div class="panel-body">
                <p>There are no pages or you don't have access to any pages.</p>
            </div>
        @endif
    </div>
@endsection