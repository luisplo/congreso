<?php

namespace App\Http\Controllers;

use App\Models\Departament;
use App\Models\MainTheme;
use App\Models\Modality;
use App\Models\ModalityProject;
use App\Models\Register;
use App\Models\TypeDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $modality = Modality::all();
        $typeDocu = TypeDocument::all();
        $departament = Departament::all();
        $mainTheme = MainTheme::all();
        $modalityPro = ModalityProject::all();

        return view('landing.register.home', compact(['modality', 'typeDocu', 'departament', 'mainTheme', 'modalityPro']));
    }
    public function cityShow($id)
    {
        $city = Departament::find($id)->cities()->get();
        return $city;
    }
    public function registerStore(Request $request)
    {
        foreach ($request->except('_token') as $data => $value) {
            $valids[$data] = "required";
        }
        $request->validate($valids);
        $newRequest = Request::capture();
        $newRequest->replace($request->except(['departament']));
        try {
            Register::create($newRequest->all());
            $notification = array(
                'message' => 'Guardado Exitosamente',
                'alert-type' => 'success'
            );
        } catch (\Illuminate\Database\QueryException $ex) {
            Log::error('Error al guardar el registro: '.$ex);
            $notification = array(
                'message' => 'Error al Guardar',
                'alert-type' => 'error'
            );
        }
        return back()->with($notification);

    }
}
