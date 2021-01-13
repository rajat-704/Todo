@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                <div class="row">
                    <div class="col-10"><h2>Task List</h2></div>
                    <div class="col-2">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Sort By
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="/">All</a>
                            <a class="dropdown-item" href="/complete">Completed</a>
                            <a class="dropdown-item" href="/incomplete">Incomplete</a>
                        </div>
                    </div>
                </div>
                    
                    
                        </div>
                 </div>
                <div class="card-body">                    
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Start</th>
                                <th scope="col">End</th>
                                <th scope="col">Completed</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($tasks as $task)
                            <tr>
                                <th scope="row">1</th>
                                <th scope="col">{{$task->title}}</th>
                                <th scope="col">{{$task->description}}</th>
                                <th scope="col">{{$task->created_at}}</th>
                                <th scope="col">{{$task->updated_at}}</th>
                                @if($task->completed == "true"){
                                    <th scope="col">Completed</th>
                                }
                                @else{
                                    <th scope="col"><a href="/completed/{{$task->id}}">Click To Complete</a></th>
                                }
                                @endif
                                <th scope="col"><a href="/edit/{{$task->id}}">Edit</a></th>
                                <th scope="col"><a href="/delete/{{$task->id}}">Delete</a></th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
