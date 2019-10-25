<?php

namespace App\Http\Controllers;

use App\Project;

class ProjectController extends Controller
{
    /**
     * Show the page to create a new project.
     */
    public function create()
    {
        $questions = json_encode([
            [
                'question' => 'yoo why are you running?',
                'answer' => 'coz ayam a G'
            ],
            [
                'question' => 'yoo why are you running?',
                'answer' => 'coz ayam a G'
            ],
            [
                'question' => 'yoo why are you running?',
                'answer' => 'coz ayam a nigg'
            ]
        ]);

        return view('projects.create', [
            'projects' => Project::all(),
            'questions' => $questions
        ]);
    }

    /**
     * Store a new project in the database.
     */
    public function store()
    {
        $this->validate(request(), [
            'name' => 'required',
            "description" => 'required'
        ]);
        Project::forceCreate([
            'name' => request('name'),
            'description' => request('description')
        ]);
        return ['message' => 'Project Created!'];
    }
}
