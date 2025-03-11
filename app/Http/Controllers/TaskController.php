<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function index()
    {
        // $tasks = DB::table('tasks')->get();
        $tasks = Task::all(); //ORM
        return View(view: 'tasks', data: compact('tasks'));
    }
    public function create()
    {
        $task_name = $_POST['name'];
        // DB::table(table: 'tasks')->insert(values: ['name' => $task_name]);
        // ORM
        $task = new Task;
        $task -> name = $task_name;
        $task -> save();
        return redirect()->back();
    }
    public function destroy($id)
    {
        // DB::table('tasks')->where(column: 'id', operator: $id)->delete();
        Task::destroy($id);
        return redirect()->back();
    }
    public function edit($id)
    {
        // $task = DB::table('tasks')->where('id', $id)->first() ;
        $task = Task::where('id' , $id)->first();
        // $tasks = DB::table('tasks')->get();
        $tasks = Task::all();
        return view('tasks', compact('task', 'tasks'));
    }
    public function update()
    {
        $id = $_POST['id'];
        // DB::table('tasks')->where('id', '=', $id)->update(['name' => $_POST['name']]);
        Task::where('id', $id)->update(['name' => $_POST['name']]);
        return redirect(to: 'tasks');
    }
}
