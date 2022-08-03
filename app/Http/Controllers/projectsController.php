<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class projectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Project::with('user'));
        $projects = Project::get();
        return View('project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::get();
        return View('project.create', compact("users"));
    }
    //admin => login => addproject => users work  project
    //project => more of user *to* 
    //view => maltiSelect  is worked
    //pivot table is worked
    //$request=>ischeck=>sync userid=>projectid=>store
    //admin login  
    //middleware => protected create,store,update,edit,trash,delete
    //inside middleware if type = admin pass to pages



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validator($request);
        // dd($request->post('select'));
        $project = Project::create($request->all());
        //dd($project);
        $this->saveDevelopers($request, $project);
        return redirect(route('index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*
    public function show($id)
    {
        $projects = Project::findOrFail($id);
        return view('project.index', compact('projects'));
    }
    */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("project.edit", [
            "users" => User::get(),
            "project" => Project::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validator($request);
        $project = Project::findOrFail($id);
        $this->saveDevelopers($request, $project);
        $project->update($request->all());
        return redirect(route('index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
        return redirect()->route('index');
    }
    public function trash()
    {
        return view('project.trash', [
            'projects' => Project::onlyTrashed()->get(),
        ]);
    }
    public function restore(Request $request, $id)
    {
        $project = Project::onlyTrashed()->findOrFail($id);
        $project->restore();
        return redirect()->route('index');
    }
    public function forceDelete($id)
    {
        $project = Project::onlyTrashed()->findOrFail($id);
        $project->forceDelete();
        return redirect()->route('trash');
    }
    public function validator($request)
    {
        $request->validate([
            'name' => ["required", "min:8"],
            'type' => ["required"],
            'userOne' => ["exists:users,id"]
        ]);
    }
    public function saveDevelopers(Request $request, $project)
    {
        // dd($request->has('checkbox'));
        $ids = [];
        if ($request->has('checkbox')) {


            $ids = [];
            //dd($request->checkbox);
            //    dd($ids);
            //$ids = $request->checkbox;
            $ids = $request->checkbox;
            // dd($ids);
            //dd($project->users());
            $project->users()->sync($ids);
        }
        $project->users()->sync($ids);
        /*
        if ($request->has('select')) {
            dd($request->select);
        }*/
    }
}
