<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\services;

class ServicesController extends Controller
{
    //
    public function xpressresume(){


        // Read value from Model method
    $serviceData = services::getserviceData();

    // Pass to view
    return view('services.xpress_resume')->with("serviceData",$serviceData);

       
    }

    public function resumehighlighter(){

          // Read value from Model method
             $serviceData = services::getserviceData();
        return view('services.resume_highlighter')->with("serviceData",$serviceData);
    }

    public function resumewriting(){

         // Read value from Model method
         $serviceData = services::getserviceData();
        return view('services.resume_writing')->with("serviceData",$serviceData);
    }
    public function specialpackages(){
        
         // Read value from Model method
        $serviceData = services::getserviceData();
        return view('services.special_packages')->with("serviceData",$serviceData);
    }
}
