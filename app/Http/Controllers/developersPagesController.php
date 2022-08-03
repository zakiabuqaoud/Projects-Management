<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use App\Models\users_projects;
use Illuminate\Support\Facades\Auth;
use App\Notifications\CompleteProjectsNotifications;
use App\Notifications\cancelCompleteProjectsNotifications;

class developersPagesController extends Controller
{
    public function index()
    {
        $projects = Project::get();
        return View('developersPages.index', compact('projects'));
    }
    public function myProjects()
    {
        $projects = Project::with('users')->get();
        $userId = Auth::id();
        $projects = Project::whereRaw('id IN (SELECT projects FROM users_projects WHERE developers IN(SELECT developers FROM users_projects WHERE developers = ?))', [$userId])->latest()->get();
        //dd($projects->users());

        //SELECT projects FROM users_projects WHERE developers IN(SELECT developers FROM users_projects WHERE developers = 1)
        return View('developersPages.myProjects', compact('projects'));
    }

    public function completeProject(Request $request, $id)
    {
        $request->validate([
            'admin' => 'required|exists:users,id',
        ]);
        $user = Auth::user();
        $adminId = $request->post('admin');
        $admin = User::find($adminId);
        if ($adminId != $user->id) {
            $admin->notify(new CompleteProjectsNotifications($user));
        }
        $project = Project::findOrFail($id);
        $project->status = "complete";
        $project->save();
        return redirect(route('developersPages.myProjects'));
    }
    public function cancelCompleteProject(Request $request, $id)
    {
        $request->validate([
            'admin' => 'required|exists:users,id',
        ]);
        $user = Auth::user();
        $adminId = $request->post('admin');
        $admin = User::find($adminId);
        if ($adminId != $user->id) {
            $admin->notify(new cancelCompleteProjectsNotifications($user));
        }
        $project = Project::findOrFail($id);
        $project->status = "inComplete";
        $project->save();
        return redirect(route('developersPages.myProjects'));
    }
    public function forceCompleteProject(Request $request, $id)
    {
        $admin = Auth::user();
        ///////////////
        //find developers by his Project 
        
        

        /////////////////////
        $project = Project::findOrFail($id);
        $project->status = "complete";
        $project->save();
        return redirect(route('index'));
    }
    public function forceCancelCompleteProject(Request $request, $id)
    {
        $admin = Auth::user();
        $project = Project::findOrFail($id);
        $project->status = "inComplete";
        $project->save();
        return redirect(route('index'));
    }
}
//give projects where userid in auth === userid in pivot table
//هاتلي المشاريع التي يكون المطور المتاح حاليا يساوي المطور بالجدول الوسيط