<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PorjectRequest;
use App\Models\Project;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    //
    
        //
        public function index(){
            $data = [
                "projects" => Project::all(),
            ]; 
            return view('portfolio.index', $data);
        }
        public function indexLight(){
            $data = [
                "projects" => Project::all(),
            ]; 
            return view('portfolio.homepage', $data);
        }
    
        public function show($id)
        {
            $project = Project::findOrFail($id);
            // $comic = Comic::findOrFail($id);
            return view('portfolio.show', ["project" => $project]);
        }
        public function create()
        {
            return view("portfolio.create");
        }
    
        public function store(PorjectRequest $request)
        {
            $data = $request->validated();
            // $data = $request->validate([
            //     // "titolo" => "nullable|string|max:255",
            //     // "descrizione" => "required|string",
            //     // "link_git_hub" => "nullable|string",
            //     // "image" => 'require|image'
            // ]);
            $data["image"] = Storage::put("newProject", $data["image"]);
            $newProject = new Project();
    
            $newProject->fill($data);
    
            $newProject->save();
    
            return redirect()->route('admin.home.index', $newProject);
        }
    
        public function destroy($id){
            $project = Project::findOrFail($id);
    
            $project->delete();
            return redirect()->route("admin.home.index");
        }

        public function edit($id)
        {
            $project = Project::findOrFail($id);

            return view("portfolio.edit", ["project" => $project]);
        }

        public function update(PorjectRequest $request, $id)
        {
            $project = Project::findOrFail($id);
            $data = $request->validated();
            
            $data["image"] = Storage::put("newProject", $data["image"]);
            $project->update($data);
    
            return redirect()->route('admin.portfolio.show', $project->id);
        }
        public function logout()
        {
            Auth::logout();
            return redirect()->route('portfolio.homepage');
        }
}
