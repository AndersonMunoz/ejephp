@extends('layout.app')

@section('titulo')
Actualizar Usuario
@endsection

@section('contenido')
<div class="flex justify-center">
    <div class="w-96 flex justify-center">
      <form action="{{route('editar',$user->id)}}" method="post" class="w-96 flex flex-col p-3">
        @csrf
        @method("PUT")
        <label  for="name">Nombre:</label>
        <input type="text" id="name" name="name" class="form-control border border-gray-400 p-2 rounded-md" required value="{{$user->name}}">
        
        <label  for="identification">Identificación:</label>
        <input type="text" id="identification" name="identification" class="form-control border border-gray-400 p-2 rounded-md" required value="{{$user->identification}}">

        <label  for="phone">Teléfono:</label>
        <input type="tel" id="phone" name="phone" class="form-control border border-gray-400 p-2 rounded-md" required value="{{$user->phone}}">

        <label  for="address">Dirección:</label>
        <input type="text" id="address" name="address" class="form-control  border border-gray-400 p-2 rounded-md" required value="{{$user->address}}">

        <button type="submit" class="mt-10 bg-green-700 hover:bg-green-400 text-white py-2 px-4 rounded-md ">Actualizar</button>
      </form>
    </div>
  </div>
@endsection
