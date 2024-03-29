<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{

    public function index(Request $request)
    {
        $query = Project::search($request->search); // $queryには WHERE句が付いている状態
        $projects = $query->paginate(config('pagination.page_size'));

        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $project = Project::create([
            'name' => $request->name,
            'content' => $request->content
        ]);

        return to_route('projects.index');
    }

    public function show($id)
    {
        $project = Project::findOrFail($id); //find だとURLを直接いじられると落ちる

        return view('projects.show', compact('project'));
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);

        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);
        $project->fill([
            'name' => $request->name,
            'content' => $request->content,
        ])->save();

        return to_route('projects.show', ['id' => $project->id]);
    }

    public function destroy($id)
    {
        /*
        $project = Project::find($id);
        $project->delete();
        */
        Project::destroy($id);

        return to_route('projects.index');
    }
}
