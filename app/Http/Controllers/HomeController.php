<?php

namespace App\Http\Controllers;

use App\Models\Ally;
use App\Models\Calendar;
use App\Models\Carousel;
use App\Models\Speaker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use DataTables;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function assistan(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('registers')
                ->join('modalities', 'registers.modality', '=', 'modalities.id')
                ->join('type_documents', 'registers.type_document', '=', 'type_documents.id')
                ->join('cities', 'registers.city', '=', 'cities.id')
                ->join('departaments', 'cities.departament_id', '=', 'departaments.id')
                ->select('modalities.name as modalityName','registers.*', 'type_documents.name as type_docu', 'cities.name as cityName', 'departaments.name as departament')
                ->where('registers.modality','=',2)
                ->get();
            return DataTables::of($data)
                ->make(true);
        }
        return view('admin.assistan');
    }
    public function speakerReport(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('registers')
                ->join('modalities', 'registers.modality', '=', 'modalities.id')
                ->join('type_documents', 'registers.type_document', '=', 'type_documents.id')
                ->join('cities', 'registers.city', '=', 'cities.id')
                ->join('departaments', 'cities.departament_id', '=', 'departaments.id')
                ->join('main_themes', 'main_themes.id', '=', 'registers.main_theme')
                ->select('modalities.name as modalityName', 'registers.*', 'main_themes.name as main_themeName','type_documents.name as type_docu', 'cities.name as cityName', 'departaments.name as departament')
                ->where('registers.modality', '=', 1)
                ->get();
            return DataTables::of($data)
                ->make(true);
        }
        return view('admin.speakerReport');
    }

    public function evaluatorSession(Request $request){

    }

    public function evaluator(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('registers')
                ->join('modalities', 'registers.modality', '=', 'modalities.id')
                ->join('type_documents', 'registers.type_document', '=', 'type_documents.id')
                ->join('cities', 'registers.city', '=', 'cities.id')
                ->join('departaments', 'cities.departament_id', '=', 'departaments.id')
                ->join('main_themes', 'main_themes.id', '=', 'registers.main_theme')
                ->select('modalities.name as modalityName', 'registers.*', 'main_themes.name as main_themeName', 'type_documents.name as type_docu', 'cities.name as cityName', 'departaments.name as departament')
                ->where('registers.modality', '=', 4)
                ->get();
            return DataTables::of($data)
                ->make(true);
        }
        return view('admin.evaluator');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('landing.home');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('registers')
                ->join('modalities', 'registers.modality', '=', 'modalities.id')
                ->join('type_documents', 'registers.type_document', '=', 'type_documents.id')
                ->join('cities', 'registers.city', '=', 'cities.id')
                ->join('departaments', 'cities.departament_id', '=', 'departaments.id')
                ->join('main_themes', 'main_themes.id', '=', 'registers.main_theme')
                ->select('modalities.name as modalityName', 'registers.*', 'main_themes.name as main_themeName', 'type_documents.name as type_docu', 'cities.name as cityName', 'departaments.name as departament')
                ->where('registers.modality', '=', 1)
                ->get();
            return DataTables::of($data)
                ->make(true);
        }
        return view('admin.home');
    }

    public function carouselCreate()
    {
        $imgCarousel = Carousel::all();
        return view('admin.carousel', compact(['imgCarousel']));
    }

    public function carouselStore(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:jpeg,jpg,png',
        ]);
        $user = Auth::id();
        $file = $request->file('image');
        $fileName = $file->getClientOriginalName();
        $path = Storage::disk('public')->put('carousel', $file);
        $save = [
            'file_name' => $fileName,
            'url' => $path,
            'user_id' => $user
        ];
        Carousel::create($save);
        return redirect()->back();
    }

    public function carouselDestroy($id)
    {
        $data = Carousel::findOrFail($id);
        $data->delete();
        return redirect()->back();
    }

    public function calendarCreate()
    {
        $imgCalendar = Calendar::all();
        return view('admin.calendar', compact(['imgCalendar']));
    }

    public function calendarStore(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:jpeg,jpg,png',
        ]);
        $user = Auth::id();
        $file = $request->file('image');
        $fileName = $file->getClientOriginalName();
        $path = Storage::disk('public')->put('calendar', $file);
        $save = [
            'file_name' => $fileName,
            'url' => $path,
            'user_id' => $user
        ];
        Calendar::create($save);
        return redirect()->back();
    }

    public function calendarDestroy($id)
    {
        $data = Calendar::findOrFail($id);
        $data->delete();
        return redirect()->back();
    }

    public function CalendarDownload($id)
    {
        $data = Calendar::find($id);
        return Storage::disk('public')->download($data->url, $data->file_name);
    }

    public function speakerCreate()
    {
        $imgSpeaker = Speaker::all();
        return view('admin.speaker', compact(['imgSpeaker']));
    }

    public function speakerStore(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'name_detail' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png',
        ]);
        $user = Auth::id();
        $file = $request->file('image');
        $fileName = $file->getClientOriginalName();
        $path = Storage::disk('public')->put('speaker', $file);
        $save = [
            'name' => $request->name,
            'name_detail' => $request->name_detail,
            'file_name' => $fileName,
            'url' => $path,
            'user_id' => $user
        ];
        Speaker::create($save);
        return redirect()->back();
    }

    public function speakerDestroy($id)
    {
        $data = Speaker::findOrFail($id);
        $data->delete();
        return redirect()->back();
    }

    public function allyCreate()
    {
        $imgAlly = Ally::all();
        return view('admin.ally', compact(['imgAlly']));
    }

    public function allyStore(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'image' => 'required|mimes:jpeg,jpg,png',
        ]);
        $user = Auth::id();
        $file = $request->file('image');
        $fileName = $file->getClientOriginalName();
        $path = Storage::disk('public')->put('ally', $file);
        $save = [
            'name' => $request->name,
            'file_name' => $fileName,
            'url' => $path,
            'user_id' => $user
        ];
        Ally::create($save);
        return redirect()->back();
    }

    public function allyDestroy($id)
    {
        $data = Ally::findOrFail($id);
        $data->delete();
        return redirect()->back();
    }
}
