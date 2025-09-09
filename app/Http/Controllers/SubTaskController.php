<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubTaskStoreRequest;
use App\Models\SubTask;
use App\Models\Task;
use Illuminate\Http\Request;

class SubTaskController extends Controller
{
  public function create($project_id, $task_id) // ← ルート名順に2個指定しないと引数がズレる
  {
    $task = Task::findOrFail($task_id);
    $project = $task->project;

    // dd($task, $project);

    return view('sub_tasks.create', compact('task', 'project'));
  }

  public function store(SubTaskStoreRequest $request, $project_id, $task_id)
  {

    // FormRequestで既にバリデーション済みなので、validated()メソッドを使用
    $validated = $request->validated();

    $subTask = new SubTask();
    $subTask->fill($validated);
    $subTask->task_id = $task_id; // task_idは別途セット
    $subTask->save();

    $task = Task::findOrFail($task_id);
    return redirect()->route('tasks.show', [
      'project_id' => $task->project_id,
      'task_id'    => $task_id
    ])->with('success', 'サブタスクを作成しました');
  }

  public function show($project_id, $task_id, $sub_task_id)
  {
     // リレーションでたどる + N+1対策のwithを使用
    $subTask = SubTask::with(['task.project'])->findOrFail($sub_task_id);

    // viewには$subTaskだけ渡す
    return view('sub_tasks.show', compact('subTask'));
  }

  public function update(Request $request, $project_id, $task_id, $sub_task_id)
  {
    // バリデーション
    $validated = $request->validate([
      'name' => 'required|string|max:30',
      'content' => 'nullable|string',
    ]);

    // サブタスク取得
    $subTask = SubTask::findOrFail($sub_task_id);

    // 更新処理
    $subTask->name    = $validated['name'];
    $subTask->content = $validated['content'] ?? null;
    $subTask->save();

    // 親タスク詳細へリダイレクト
    return redirect()->route('tasks.sub_tasks.show', [
      'project_id' => $project_id,
      'task_id'    => $task_id,
      'sub_task_id' => $sub_task_id
    ])->with('success', 'サブタスクを更新しました');
  }

  public function destroy($project_id, $task_id, $sub_task_id)
  {
    $subTask = SubTask::findOrFail($sub_task_id);
    $subTask->delete();

    return redirect()->route('tasks.show', [
      'project_id' => $project_id,
      'task_id'    => $task_id
    ])->with('success', 'サブタスクを削除しました');
  }
}