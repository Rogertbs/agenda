<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medicos;

class MedicosController extends Controller
{

    public function __construct() {
       $this->middleware('auth', ['except' => ['index', 'show']]);
   }
    //
    public function index()
    {
        $medicos = Medicos::all();
        return response()->json($medicos);
    }

    public function show($id)
    {
        $medico = Medicos::find($id);

        if(!$medico)
        {
            return response()->json([
                'message' => 'Record not fund',
            ], 404);
        }

        return response()->json($medico);
    }

    public function store(Request $req)
    {
        $medico = new Medicos();
        $medico->fill($req->all());
        $medico->save();

        return response()->json($medico, 201);
    }

    public function update(Request $req, $id)
    {
        $medico = Medicos::find($id);

        if(!$medico){
            return response()->json([
                'message' => 'Record not found',
            ], 404);
        }
            $medico->fill($req->all());
            $medico->save();

            return response()->json($medico, 200);

    }

    public function destroy($id)
    {
        $medico = Medicos::find($id);

        if(!$medico){
            return response()->json([
                'message' => 'Record not found',
            ], 400);
        }

        $medico->delete();

        return response()->json(['message', 'Médico deletado com sucesso!'], 202);
    }
}
