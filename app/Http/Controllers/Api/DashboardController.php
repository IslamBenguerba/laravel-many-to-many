<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(){
        // $project = Project::all();
        $query = Project::with(["category"]);
        $project = $query->paginate(10);
        return response()->json([
            "results" => $project]);
    }
}
