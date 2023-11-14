<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function listar() {
        $datos = User::all();
        return view('listar',compact('datos'));
    }

    public function actualizar(){
        $datos = User::all();
        return view('actualizar',compact('datos'));
    }

}
