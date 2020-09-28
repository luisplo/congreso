<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use App\Models\Carousel;
use App\Models\City;
use App\Models\Departament;
use App\Models\MainTheme;
use App\Models\Modality;
use App\Models\ModalityProject;
use App\Models\Speaker;
use App\Models\TypeDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LandingController extends Controller
{
    public function __construct()
    {
        
    }

    public function index(){
        $carouselImg = Carousel::all();
        $speakerImg = Speaker::all();
        $calendarImg = Calendar::all();
 
        return view('landing.home',compact(['carouselImg', 'speakerImg', 'calendarImg']));
    }

}
