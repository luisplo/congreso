<?php

namespace App\Http\Controllers;

use App\Models\Calification;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Exporter;
use Illuminate\Support\Facades\DB;


class CalificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Calification::all();
            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $button = '<div class="singleLine"><button type="button" name="edit" id="' . $data->id . '" class="edit d-inline btn btn-primary btn-sm"><i class="fas fa-edit"></i></button>&nbsp;';
                    $button .= '<button type="button" name="edit" id="' . $data->id . '" class="delete d-inline btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>&nbsp;';
                    $button .= '<a href="note/download/' . $data->id . '" class="d-inline btn btn-primary btn-sm"><i class="fas fa-download"></i></a></div>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.home');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function download($id)
    {
        $data = DB::table('califications')
            ->join('users', 'users.id', '=', 'califications.user_id')
            ->join('registers', 'users.email', '=', 'registers.email')
            ->join('modalities', 'registers.modality', '=', 'modalities.id')
            ->join('type_documents', 'registers.type_document', '=', 'type_documents.id')
            ->join('cities', 'registers.city', '=', 'cities.id')
            ->join('departaments', 'cities.departament_id', '=', 'departaments.id')
            ->join('main_themes', 'main_themes.id', '=', 'registers.main_theme')
            ->select('modalities.name as modalityName', 'main_themes.name as main_themeName', 'type_documents.name as type_docu', 'registers.document as documentEvaluator', 'registers.name as nameEvaluator', 'registers.last_name as lastNameEvaluator',  'departaments.name as departament', 'cities.name as cityName', 'califications.name_project', 'califications.name_owner', 'califications.entity', 'califications.speaker_cal')
            ->where('califications.id', '=', $id)
            ->get();
        $val = Calification::find($id)->first();
        $excel = Exporter::make('Csv');
        $excel->load($data);
        return $excel->stream($val->url);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $files = $request->file('file');
        $nombre_archivo = $files->getClientOriginalName();
        $form_data = array(
            'name_project' => $request->name_project,
            'name_owner' => $request->name_owner,
            'entity' => $request->entity,
            'speaker_cal' => $request->speaker_cal,
            'url' => $nombre_archivo,
            'user_id' => Auth::user()->id
        );
        try {
            Calification::create($form_data);
            Storage::disk('local')->put('calificaciones/' . $nombre_archivo . '/', \File::get($files));
            return response()->json(['success' => 'Guardado Exitosamente']);
        } catch (QueryException $ex) {
            return response()->json(['errors' => ['Error al guardar los datos']]);
            Log::critical($ex);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (request()->ajax()) {
            $data = Calification::findOrFail($id);
            return response()->json(['result' => $data]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $files = $request->file('file');
        $nombre_archivo = $files->getClientOriginalName();
        $form_data = array(
            'name_project' => $request->name_project,
            'name_owner' => $request->name_owner,
            'entity' => $request->entity,
            'speaker_cal' => $request->speaker_cal,
            'url' => $nombre_archivo,
            'user_id' => Auth::user()->id
        );
        try {
            Calification::whereId($request->hidden_id)->update($form_data);
            Storage::disk('local')->put('calificaciones/' . $nombre_archivo . '/', \File::get($files));

            return response()->json(['success' => 'Actualizado Con Exito']);
        } catch (QueryException $ex) {
            Log::critical($ex);
            return response()->json(['errors' => ['Error al guardar los datos']]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Calification::findOrFail($id);
        $data->delete();
    }
}
