<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pacientes;

class PacientesController extends Controller
{
    //
    public function index()
    {
        $pacientes = Pacientes::all();
        return response()->json($pacientes);
    }

    public function show($id)
    {
        $paciente = Pacientes::find($id);

        if(!$paciente) {
            return response()->json([
                'message' => 'Record not found',
            ], 404);
        }

        return response()->json($paciente);
    }

    public function store(Request $req)
    {
        $paciente = new Pacientes();
        $paciente->fill($req->all());
        $paciente->save();

        return response()->json($paciente, 201);

    }

    public function update(Request $req, $id)
    {
        $paciente = Pacientes::find($id);

        if(!$paciente){
            return response()->json([
                'message' => 'Record not found',
            ], 404);
        }

        $paciente->fill($req->all());
        $paciente->save();

        return response()->json($paciente, 200);
    }

    public function destroy($id)
    {
        $paciente = Pacientes::find($id);

        if(!$paciente){
            return response()->json([
                'message' => 'Record not found',
            ], 400);
        }

        $medico->delete();

        return response()->json(['message', 'Paciente deletado com sucesso!'], 202);
    }
}
