<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\SiteSetting;
use App\Models\Skill;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'site' => SiteSetting::current(),
            'skills' => Skill::active()->ordered()->get(),
            'projects' => Project::published()->ordered()->limit(3)->get(),
        ]);
    }
}
