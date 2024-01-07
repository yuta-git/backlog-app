<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    
    public function index () 
    {
        $projects = Project::select('id', 'name')->get();
        // dd($projects);
        return view('projects.index', compact('projects'));
    }

}
