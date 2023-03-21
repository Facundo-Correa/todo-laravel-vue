<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ToDo;

class ToDoController extends Controller
{
    public function index(Request $request)
    {
        $input = ToDo::create([
            'texto'=>$request->e
        ]);

        $input->save();
    }

    public function load (){
        return ToDo::All();
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $todoDelete = ToDo::where('id',$id)->delete();
    }

    public function edit(Request $request)
    {
        $editTodo = Todo::where('id', $request->id);
        if($request->text != '')
        {
            $editTodo->update([
                'texto'=>$request->text
            ]);
        }
    }
}
