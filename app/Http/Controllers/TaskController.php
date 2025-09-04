<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Task;

class TaskController extends Controller
{
  public function create($project_id)
  {
    $project = Project::findOrFail($project_id);

    return view('tasks.create', compact('project'));
  }

  public function store(Request $request)
  {
    $task = Task::create([
      'name' => $request->name,
      'deadline' => $request->deadline,
      'content' => $request->content,
      'user_id' => $request->user_id,
      'project_id' => $request->project_id,
    ]);

    return to_route('projects.show', ['id' => $task->project_id]);
  }

  public function show($project_id, $task_id)
  {
    $task = Task::findOrFail($task_id);
    // $task->project; // 関連するプロジェクトをbladeで取得

    // dd($project, $task);

    return view('tasks.show', compact('task'));

  }

  public function edit($project_id, $task_id)
  {
    $project = Task::findOrFail($project_id)->project;
    $task = Task::findOrFail($task_id);

    return view('tasks.edit', compact('task', 'project'));
  }

  public function update(Request $request, $project_id, $task_id)
  {
    $task = Task::findOrFail($task_id);
    
    $task->fill([
      'name' => $request->name,
      'deadline' => $request->deadline,
      'content' => $request->content,
      'user_id' => $request->user_id,
      'project_id' => $project_id,
    ])->save();

    return to_route('projects.show', ['id' => $task->project->id]);
  }

  public function destroy($project_id, $task_id)
  {
    Task::destroy($task_id);

    return to_route('projects.show', ['id' => $project_id]);
  }
}