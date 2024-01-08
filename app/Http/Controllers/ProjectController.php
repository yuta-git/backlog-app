<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{

    public function index(Request $request)
    {
        // $projects = Project::select('id', 'name')->get();
        // $projects = Project::select('id', 'name')->paginate(2);
        $search = $request->search;
        $query = Project::search($search); // $queryには WHERE句が付いている状態
        $projects = $query->select('id', 'name')->paginate(2);
        
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
        $project = Project::find($id);

        return view('projects.show', compact('project'));
    }

    public function edit($id)
    {
        $project = Project::find($id);

        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $project = Project::find($id);
        
        $project->name = $request->name;
        $project->content = $request->content;
        $project->save();

        return to_route('projects.show', ['id'=>$id]);
    }

    public function destroy($id)
    {
        $project = Project::find($id);

        $project->delete();

        return to_route('projects.index');
    }

}
