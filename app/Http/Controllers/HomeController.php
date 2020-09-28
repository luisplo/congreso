<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use App\Models\Carousel;
use App\Models\Speaker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
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
    public function logout()
    {
        Auth::logout();
        return redirect()->route('landing.home');
    }

    public function index()
    {
        return view('admin.home');
    }

    public function carouselCreate()
    {
        $imgCarousel = Carousel::all();
        return view('admin.carousel', compact(['imgCarousel']));
    }

    public function carouselStore(Request $request)
    {
        $user = Auth::id();
        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $path = Storage::disk('public')->put('carousel', $file);
        $save = [
            'file_name' => $fileName,
            'url' => $path,
            'user_id' => $user
        ];
        Carousel::create($save);
        return response()->json();
    }

    public function calendarCreate()
    {
        $imgCalendar = Calendar::all();
        return view('admin.calendar', compact(['imgCalendar']));
    }

    public function calendarStore(Request $request)
    {
        $user = Auth::id();
        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $path = Storage::disk('public')->put('calendar', $file);
        $save = [
            'file_name' => $fileName,
            'url' => $path,
            'user_id' => $user
        ];
        Calendar::create($save);
        return response()->json();
    }

    public function CalendarDownload($id)
    {
        $data = Calendar::find($id);
        return Storage::disk('public')->download($data->url,$data->file_name);
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
}
