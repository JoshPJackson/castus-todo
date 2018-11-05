<?php

namespace App\Http\Controllers;

use App\Events\NewToDoItemAdded;
use App\Jobs\SendTodoEmail;
use App\Todo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use Log;
use Mail;
use Validator;

class TodoController extends Controller
{
    /**
     * index - grab the stored todo item data from the database
     * and render it into a view
     * @return [type] [description]
     */
    public function index()
    {
        $todoTable = new Todo;
        $todos = $todoTable::all();

        $data = array();
        $data['todoList'] = $todos;

        return view('index', compact('todos'));
    }

    /**
     * create - add a new item to the todo table. Requires an id and
     * a todo.
     *
     * @param  Request $request Laravel request object
     * @return Response         Laravel response object
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'todoItem'     => 'required',
        ]);

        if ($validator->fails()) {
            $data = array();
            $data['errors'] = $validator->errors()->all();
            $data['success'] = false;

            return response()->json($data);

        } else {

            $todoItem = new Todo();
            $todoItem->todo = Input::get("todoItem");

            $todoItem->due_at = Input::get('due_at');
            $todoItem->save();

            if (!empty($todoItem->due_at)) {
                event(new NewToDoItemAdded($todoItem));
            }

            $data = new \StdClass();
            $data->id = $todoItem->id;

            return (response()->redirectTo('/'));
        }
    }



    public function setCompleted(Todo $todo) {
        $todo->completed = (Input::get('completed') == 'true' ? 1 : 0);
        $todo->save();
        return (response()->json(array('success' => true), 200));
    }

    public function deleteCompleted () {
        $toBeDeleted = Input::get('toDelete');
        $allToDos = Todo::all();

        foreach ($toBeDeleted as $idToDelete) {
            foreach ($allToDos as $todo) {
                if ($todo->id == $idToDelete) {
                    $todo->delete();
                }
            }
        }
    }
}