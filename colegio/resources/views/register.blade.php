@extends('layout.app')

@section('titulo')
Registrar Usuario
@endsection

@section('contenido')
<div class="flex justify-center">
    <div class="w-96 flex justify-center">
      <form method="post" class="w-96 flex flex-col p-3">
        @csrf
        <label class="p-3" for="name">Nombre:</label>
        <input type="text" id="name" name="name" class="border border-gray-400 p-2 rounded-md" required>
        @error('name')
                    <p class="bg-red-600 text-white text-center rounded-lg">{{ $message }}</p>
        @enderror
        <label class="p-3" for="lastname">Apellido:</label>
        <input type="text" id="lastname" name="lastname" class="border border-gray-400 p-2 rounded-md" required>
        @error('lastname')
                    <p class="bg-red-600 text-white text-center rounded-lg">{{ $message }}</p>
        @enderror
        <label class="p-3" for="email">Email:</label>
        <input type="text" id="email" name="email" class="border border-gray-400 p-2 rounded-md" required>
        @error('email')
                    <p class="bg-red-600 text-white text-center rounded-lg">{{ $message }}</p>
        @enderror
        <label class="p-3" for="rol">Rol:</label>
        <select class="bg-white rounded border border-gray-300 focus:border-indigo-500 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            <option name="" id="">Seleccione una opción</option>
            <option name="" id="admin" value="admin">Administrador</option>
            <option name="" id="teacher" value="teacher">Profesor</option>
            <option name="" id="student" value="student">Estudiante</option>
        </select>
        @error('rol')
                    <p class="bg-red-600 text-white text-center rounded-lg">{{ $message }}</p>
        @enderror
        <label class="p-3" for="area">Área de especialización:</label>
        <input type="text" id="area" name="area" class="border border-gray-400 p-2 rounded-md" required>
        @error('area')
                    <p class="bg-red-600 text-white text-center rounded-lg">{{ $message }}</p>
                @enderror

        <label class="p-3" for="date">Fecha de nacimeinto:</label>
        <input type="date" class="bg-white rounded border border-gray-300 focus:border-indigo-500 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">

        @error('date')
                    <p class="bg-red-600 text-white text-center rounded-lg">{{ $message }}</p>
                @enderror


        <button type="submit" class="mt-10 p-3 bg-sky-700 hover:bg-sky-400 text-white py-2 px-4 rounded-md ">Registrar</button>

      </form>
    </div>
  </div>


@endsection
