<?php

namespace App\Http\Controllers;

use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        return redirect()->to(route('home') . '#projects');
    }

    public function show(Project $project)
    {
        abort_unless($project->is_published, 404);

        return redirect()->to(route('home') . '#project-' . $project->slug);
    }
}
