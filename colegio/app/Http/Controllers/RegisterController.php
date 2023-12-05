<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;

class RegisterController extends Controller
{
    public function  index() {
        return view('register');
    }
    /* public function store(Request $request) {
        $this ->validate($request,[
            'name'=>'required|regex:/^[\pL\s]+$/u|min:3|max:50',
            'identification'=>'required|unique:users|integer|digits:10',
            'phone'=>'required|integer|digits:10',
            'address' => 'required|min:3'
        ]);

        User::create([
            'name'=>$request->name,
            'identification'=>$request->identification,
            'phone'=>$request->phone,
            'address'=>$request->address
        ]);

        return redirect()->route('listar');
    } */

}
