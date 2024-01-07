<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{

    public function index()
    {
        $projects = Project::select('id', 'name')->get();
        // dd($projects);
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

}
