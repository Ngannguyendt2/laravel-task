<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TaskController extends Controller
{
    //
    public function index()
    {
        $tasks = \App\Task::all();
        return view('tasks.list', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $task = new Task();
        $task->title = $request->title;
        $task->content = $request->contented;
        $task->created = $request->created;
        if($request->hasFile('inputFile')){
            $path=$request->file('inputFile')->store('images',"public");
            $task->image=$path;
        }

        $task->save();
        return redirect()->route("tasks.index");
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->route("tasks.index");
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->title = $request->title;
        $task->content = $request->contented;
        $task->created = $request->created;
        $file = $task->inputFile;
        if ($request->hasFile('inputFile')) {

            //xoa anh cu neu co
            $currentImg = $task->image;
            if ($currentImg) {
                Storage::delete('/public/' . $currentImg);
            }
            $fileName = $request->inputFileName;
            $task->image = $fileName;
            $request->file('inputFile')->storeAs('public/images', $fileName);
        }

        $task->save();
        return redirect()->route("tasks.index");
    }
}
