<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){

        $projects = Project::all();
        return view('index', compact('projects'));
    }

    public function create()
    {
        return view('actions.create');
    }

    public function store(Request $request)
    {
        Project::create($request->all());
        return redirect()->route('index')->with('success', 'Project created successfully.');
    }

    public function edit(Project $project)
    {
        return view('actions.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $project->update($request->all());
        return redirect()->route('index')->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('index')->with('success', 'Project deleted successfully.');
    }
}