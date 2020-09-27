<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.home');
    }
    public function carouselCreate(){
        $data = Carousel::all();
        return view('admin.carousel',compact(['data']));
    }
    public function carouselStore(Request $request)
    {
        $user = Auth::id();
        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $path = Storage::disk('public')->put('carouselt', $file);
        $save = [
            'file_name' => $fileName,
            'url' => $path,
            'user_id'=> $user
        ];
        Carousel::create($save);
        return response()->json();
    }
}
