<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use DB;

class TaskController extends Controller {
    function showTask() {
        $tasks = DB::select( 'select * from todos' );
        return view( 'home', ['tasks' => $tasks] );
    }

    function completedTask() {
        $tasks = DB::select( 'select * from todos where completed = ?', ['true'] );
        return view( 'home', ['tasks' => $tasks] );
    }

    function incompletedTask() {
        $tasks = DB::select( 'select * from todos where completed = ?', ['false'] );
        return view( 'home', ['tasks' => $tasks] );
    }

    function createTask( Request $req ) {
        $task = new Todo;
        $task->title = $req->title;
        $task->description = $req->description;
        $task->completed = 'false';
        $task->created_at = $req->start;
        $task->updated_at = $req->end;
        $task->save();
        return redirect()->back();
    }

    function deleteTask( Request $req, $id ) {
        $task = DB::delete( 'delete from todos where id = ?', [$id] );
        return redirect()->back();
    }

    function completeTask( Request $req, $id ) {
        $task = DB::update( 'update todos set completed = ? where id = ?', ['true', $id] );
        return redirect()->back();
    }

    function fetchTask( Request $req, $id ) {
        $task = DB::select( 'select * from todos where id = ?', [$id] );
        return view( 'task', ['task'=> $task] );
    }

    function updateTask( Request $req ) {
        DB::update( 'update todos set title = ?, description = ?, created_at = ?, updated_at = ?
                    where id = ?', [$req->title, $req->description, $req->start, $req->end, $req->id] );
        return redirect( '/' );
    }
}
