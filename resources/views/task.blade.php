@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                @foreach($task as $task)
                <form action="/updateTask" method="post">
                        @csrf
                        <input type="hidden" value="{{$task->id}}" name="id" >
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" value="{{$task->title}}" name="title" placeholder="Title">
                        </div>
                        <div class="form-group">
                            <label for="edate">End Date</label>
                            <input type="date" class="form-control" id="end" value="{{$task->updated_at}}" name="end">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3">{{$task->description}}</textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
