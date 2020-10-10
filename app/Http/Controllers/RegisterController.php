<?php

namespace App\Http\Controllers;

use App\Models\Departament;
use App\Models\Register;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Validator;
use App\User;

class RegisterController extends Controller
{
    public function __construct()
    {

    }

    public function cityShow($id)
    {
        $city = Departament::find($id)->cities()->get();
        return $city;
    }
    public function registerStore(Request $request)
    {
        $rules = [
            'modality' => 'required',
            'type_document' => 'required',
            'document' => 'required|digits_between:4,15',
            'name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'departament' => 'required',
            'city' => 'required',
            'position' => 'required|string|max:150',
            'email' => 'required|email|max:100',
        ];

        $messages = [
            'modality.required' => 'Modalidad es requerido',
            'type_document.required' => 'Tipo de documento es requerido',
            'document.required' => 'Numero de documento es requerido',
            'document.digits_between' => 'Maximo 15, minimo 4 caracteres en el campo documento',
            'name.required' => 'El nombre es requerido',
            'name.string' => 'El nombre debe ser texto',
            'name.max' => 'Maximo 100 caracteres en el campo nombre',
            'last_name.required' => 'El apeliido es requerido',
            'last_name.string' => 'El apellido debe ser texto',
            'last_name.max' => 'Maximo 100 caracteres en el campo apellido',
            'departament.required' => 'Departamento es requerido',
            'city.required' => 'Ciudad es requerido',
            'position.required' => 'Cargo es requerido',
            'position.string' => 'El cargo debe ser texto',
            'position.max' => 'Maximo 150 caracteres en el campo cargo',
            'email.required' => 'Correo es requerido',
            'email.email' => 'Correo debe ser un email',
            'email.max' => 'Maximo 100 caracteres en el campo correo',
        ];

        $error = Validator::make($request->all(), $rules,$messages);
        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $newRequest = Request::capture();
        $newRequest->replace($request->except(['departament']));
        try {
            Register::create($newRequest->all());

            if($request->modality == 4){
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->document)
                ]);
                // Asignación del rol
                $user->assignRole('evaluator');
            }
            return response()->json(['success' => 'Guardado Exitosamente']);
        } catch (QueryException $ex) {
            Log::error($ex);
            return response()->json(['errors' => ['Error al guardar el registro']]);
        }
    }
}
