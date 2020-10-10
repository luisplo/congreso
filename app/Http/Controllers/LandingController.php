<?php

namespace App\Http\Controllers;

use App\Models\Ally;
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
        $modality = Modality::all();
        $typeDocu = TypeDocument::all();
        $departament = Departament::all();
        $mainTheme = MainTheme::all();
        $modalityPro = ModalityProject::all();
        $carouselImg = Carousel::all();
        $speakerImg = Speaker::all();
        $allyImg = Ally::all();
        $calendarImg = Calendar::all();

        return view('landing.home',compact(['carouselImg', 'speakerImg', 'allyImg', 'calendarImg', 'modality', 'typeDocu', 'departament', 'mainTheme', 'modalityPro']));
    }

}
