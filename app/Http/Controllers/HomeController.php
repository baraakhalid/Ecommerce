<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Experience;
use App\Models\Info;
use App\Models\Language;
use App\Models\Project;
use App\Models\Setting;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Psy\Readline\Hoa\Console;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infos=Info::all();
        $educations=Education::all();
        $experiences=Experience::all();
        $projects=Project::all();
        $settings=Setting::all();
        $array =json_decode($infos[0]->languages);
        
        $skills=Skill::all();
      
        return response()->view('portfolio.index',['infos'=>$infos, 'array'=>$array,'educations'=>$educations,'experiences'=>$experiences,'projects'=>$projects,'settings'=>$settings,'skills'=>$skills]);

    }

   
}
