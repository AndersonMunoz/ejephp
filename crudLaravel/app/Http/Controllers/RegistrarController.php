<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;

class RegistrarController extends Controller
{
    public function  index() {
        return view(view:'registrar');
    }
    public function store(Request $request) {
        $this ->validate($request,[
            'name'=>'required|min:3|max:50',
            'identification'=>'required|unique:users|min:10',
            'phone'=>'required|integer|min:6',
            'address' => 'required|min:3'
        ]);
        User::create([
            'name'=>$request->name,
            'identification'=>$request->identification,
            'phone'=>$request->phone,
            'address'=>$request->address
        ]);

        return redirect()->route('listar');
    }

}
