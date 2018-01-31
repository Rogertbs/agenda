<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agendas;
use App\Medicos;
use App\Pacientes;

class AgendasController extends Controller
{
    //

    public function __construct() {
       $this->middleware('jwt.auth');
   }

   public function index()
   {
       $agendas = new Agendas;
       $agendas = $agendas->with('medicos');
       $agendas = $agendas->with('pacientes');
       $agendas = $agendas->get();

       return response()->json($agendas);
   }

   public function show($id)
   {

        // $agenda = Agendas::find($id);
        // $medico = Medicos::where('id', $agenda->id_medico);
        // $paciente = Pacientes::where('id', $agenda->id_paciente);
        // $agenda = $agenda->first();
        // $medico = $medico->get();
        // $paciente = $paciente->get();
        $agenda = Agendas::where('id', $id)
          ->with('medicos')
          ->with('pacientes')
          ->first();



       if(!$agenda){
           return response()->json([
               'message' => 'Record not found',
           ], 404);
       }

       return response()->json([
          'agenda' => $agenda,
          // 'paciente' => $paciente,
          // 'medico' => $medico
        ], 200);
   }

   public function store(Request $req)
   {
       $agenda = new Agendas();
       $agenda->fill($req->all());
       $agenda->save();

       return response()->json($agenda, 201);
   }

   public function update(Request $req, $id)
   {
       $agenda = Agendas::find($id);

       if(!$medico){
           return response()->json([
               'message' => 'Record not found',
           ],404);
       }

       $agenda->fill($req->all());
       $agenda->save();

       return response()->json($agenda, 200);
   }

   public function destroy($id)
   {
       $agenda = Agendas::find($id);

       if(!$agenda){
           return response()->json([
               'message' => 'Record not found',
           ], 400);
       }

       $agenda->delete();

       return response()->json(['message', 'Agenda deletada com sucesso!'], 202);
   }
}
