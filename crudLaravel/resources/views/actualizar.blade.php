@extends('layout.app')

@section('titulo')
Actualizar Usuario
@endsection

@section('contenido')
<div class="flex justify-center">
    <div class="w-96 flex justify-center">
      <form method="post" class="w-96 flex flex-col p-3">
        @csrf
        <label class="p-3" for="name">Nombre:</label>
        <input type="text" id="name" name="name" class="p-3 border border-gray-400 p-2 rounded-md" required>

        <label class="p-3" for="identification">Identificación:</label>
        <input type="text" id="identification" name="identification" class="p-3 border border-gray-400 p-2 rounded-md" required>

        <label class="p-3" for="phone">Teléfono:</label>
        <input type="tel" id="phone" name="phone" class="p-3 border border-gray-400 p-2 rounded-md" required>

        <label class="p-3" for="address">Dirección:</label>
        <input type="text" id="address" name="address" class=" p-3 border border-gray-400 p-2 rounded-md" required>

        <button type="submit" class="mt-10 p-3 bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">Actualizar</button>
      </form>
    </div>
  </div>


@endsection
