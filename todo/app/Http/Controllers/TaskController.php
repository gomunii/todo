<?php

namespace App\Http\Controllers;

use App\name;
use App\Http\Requests\CreateTask;
use App\Http\Requests\EditTask;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * タスク一覧
     * @param name $name
     * @return \Illuminate\View\View
     */
    public function index(name $name)
    {
      if (Auth::user()->id !== $name->user_id) {
             abort(403);
         }
        // ユーザーのフォルダを取得する
        $names = Auth::user()->names()->get();

        // 選ばれたフォルダに紐づくタスクを取得する
        $tasks = $name->tasks()->get();

        return view('tasks/index', [
            'names' => $names,
            'current_name_id' => $name->id,
            'tasks' => $tasks,
        ]);
    }

    /**
     * タスク作成フォーム
     * @param name $name
     * @return \Illuminate\View\View
     */
    public function showCreateForm(name $name)
    {
        return view('tasks/create', [
            'name_id' => $name->id,
        ]);
    }

    /**
     * タスク作成
     * @param name $name
     * @param CreateTask $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(name $name, CreateTask $request)
    {
        $task = new Task();
        $task->title = $request->title;
        $task->due_date = $request->due_date;

        $name->tasks()->save($task);

        return redirect()->route('tasks.index', [
            'id' => $name->id,
        ]);
    }

    /**
     * タスク編集フォーム
     * @param name $name
     * @param Task $task
     * @return \Illuminate\View\View
     */
     public function showEditForm(name $name, Task $task)
     {
       $this->checkRelation($name, $task);
     if ($name->id !== $task->name_id) {
         abort(404);
     }

     // 以下略
    }
    /**
     * タスク編集
     * @param name $name
     * @param Task $task
     * @param EditTask $request
     * @return \Illuminate\Http\RedirectResponse
     */
     public function edit(int $id, int $task_id, EditTask $request)
   {
       // 1
       $task = Task::find($task_id);

       // 2
       $task->title = $request->title;
       $task->status = $request->status;
       $task->due_date = $request->due_date;
       $task->save();

       // 3
       return redirect()->route('tasks.index', [
           'id' => $task->name_id,
       ]);
   }
}
