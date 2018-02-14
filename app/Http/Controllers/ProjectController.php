<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function project_batch(){
        return view('project.project_batch');
    }

    public function project_batch_detail($packet_id, $customer_id){
        return view('project.project_batch_detail');
    }
}
