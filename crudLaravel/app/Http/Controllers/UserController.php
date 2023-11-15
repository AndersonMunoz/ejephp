<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use PDF;

class UserController extends Controller
{
    public function listar() {
        $datos = User::all();
        return view('listar',compact('datos'));
    }

    public function actualizar($id){

        $user = User::find($id);
        return view("actualizar",compact('user'));
    }
    public function editar (Request $request, $id){
        $user = User::find($id);
        $user -> name = $request -> post("name");
        $user -> identification = $request -> post("identification");
        $user -> phone = $request -> post("phone");
        $user -> address = $request -> post("address");
        $user->save();
        return redirect()->route('listar');
    }

    public function eliminar($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->route('listar');
    }

    public function descargarPDF($id){
        $user = User::find($id);
        $pdf = PDF::loadView('pdf.imprimir', compact('user'))->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->stream($user->name . '.pdf');
    }
}
