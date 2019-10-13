<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// use App\Http\Resources\TodoResource;
use App\Todo;
use App\User;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        $user = User::where('name', 'fasih')->get();
        
        return response()->json([
            'todos' => $todos,
            'user' => $user
        ]);
    }

    public function store(Request $request)
    {
        $todo = Todo::create($request->all());
        return response()->json(
            [
            "code" => 200,
            "message" => "Task added successfully"
            ]
        );
        
        // return response()->json([
        //         'name' => 'fasih',
        //         'age' => 21
        //     ]);
        
        // return new TodoResource($todo);
        
    }

    public function update(Request $request, $id)
    {
        $todo = Todo::find($id);
        $todo->update($request->all());
        return response()->json([
            "code" => 200,
            "message" => "Todo edited successfully"
        ]);
    }

    public function destroy($id)
    {
        $todo = Todo::find($id);
        $todo->delete();
        return response()->json([
            "code" => 200,
            "message" => "Task deleted successfully"
        ]);
    }
}
