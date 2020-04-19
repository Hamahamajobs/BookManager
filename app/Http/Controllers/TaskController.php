<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;


class TaskController extends Controller
{
    public function index()
    {
        return Task::all();
    }

    public function show(Task $task)
    {
        return $task;
    }

    public function store(Request $request)
    {
        /**json型でデータを受け取り、それらをTaskモデルに入れ登録する。以下のようなJsonを想定している。
         * {
            "title": "new title",
            "content": "new content",
            "person_in_charge": "new person_in_charge1"
            }
        */
        return Task::create($request->all());
    }

    public function update(Request $request, Task $task)
    {
        //選択させたタスクに、更新内容を反映させる。
        $task->update($request->all());
        
        return $task;
    }

    public function destroy(Task $task)
    {
        //選択されたタスクを削除する
        $task->delete();
        
        return $task;
    }
}
