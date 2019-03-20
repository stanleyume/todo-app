<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use DB;

class TodoController extends Controller
{

    public function index() {
      $todos = Todo::all();

      return view('todos.index', compact('todos'));
    }
    public function get_todos()
    {
      $todos = Todo::all();
      return compact('todos');
      // return response($todos, 200, $headers = ['Content-type'=>'application/json']);
    }

    public function create(Request $request)
    {
      try {
        DB::beginTransaction();
        $todo = new Todo;
        $todo->title = $request->title;
        $todo->save();
        DB::commit();
        return response($todo, 200, $headers = ['Content-type'=>'application/json']);
      } catch (Exception $e) {
        DB::rollback();
        return response('Failed', 500, $headers = ['Content-type'=>'application/json']);
      }

    }

    public function update(Request $request, Todo $todo)
    {
      try {
        DB::beginTransaction();

        $todo->title = $request->title;
        if($request->done == true)
          $todo->done = true;
        else
          $todo->done = false;

        $todo->update();

        DB::commit();
        return response($todo, 200, $headers = ['Content-type'=>'application/json']);
      } catch (Exception $e) {
        DB::rollback();
        return response('Failed', 500, $headers = ['Content-type'=>'application/json']);
      }
    }

    public function delete(Request $request, Todo $todo)
    {
      $todo->delete();
      return response('Success', 200, $headers = ['Content-type'=>'application/json']);
    }
}
