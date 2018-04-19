<?php

namespace App\Http\Controllers\Projects;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Project;

class projectController extends Controller
{
    //
/**
 * Show the create project
 *
 * @return void
 */
    public function create() {
        return view('form',['projects'=>Project::all()
        ]);
    }

/**
 * Store 
 *
 * @return void
 */
    public function store() {
        $this->validate(request(),[
            'name'=>'required',
            'description'=>'required'
        ]);

        Project::forceCreate([
            'name'=>request('name'),
            'description'=>request('description')
        ]);
        return ['message'=>'Succesfully created'];
    }

}
