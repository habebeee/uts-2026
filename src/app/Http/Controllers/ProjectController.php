<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->string('q')->trim()->toString();
        $status = $request->string('status')->toString() ?: 'all';

        $projects = Project::query()
            ->published()
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                        ->orWhere('short_description', 'like', "%{$search}%");
                });
            })
            ->when($status !== 'all', fn ($query) => $query->where('status', $status))
            ->ordered()
            ->get();

        return view('projects', compact('projects', 'search', 'status'));
    }

    public function show(Project $project)
    {
        abort_unless($project->is_published, 404);

        return view('project-detail', compact('project'));
    }
}
