@extends('layout.app')

@section('titulo')
Listar Usuarios
@endsection

@section('contenido')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
<div class="flex flex-col justify-center items-center w-fulls">
    <a href="/registrar"><button class="bg-green-700 hover:bg-green-400 text-white font-bold py-2 px-4 rounded mb-4">Crear nuevo usuario</button></a>
    <div class="w-96">
        <table class="min-w-full bg-white border rounded-md overflow-hidden">
            <thead class="bg-green-700 text-white">
                <tr>
                    <th class="py-2 px-4 border">Nombre</th>
                    <th class="py-2 px-4 border">Identificación</th>
                    <th class="py-2 px-4 border">Teléfono</th>
                    <th class="py-2 px-4 border">Dirección</th>
                    <th class="py-2 px-4 border">Editar</th>
                    <th class="py-2 px-4 border">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datos as $data)
                <tr class="border-t hover:bg-gray-50">
                    <td class="py-2 px-4 border">{{ $data->name }}</td>
                    <td class="py-2 px-4 border">{{ $data->identification }}</td>
                    <td class="py-2 px-4 border">{{ $data->phone }}</td>
                    <td class="py-2 px-4 border">{{ $data->address }}</td>
                    <td class="py-2 px-4 border"><a href="{{route("actualizar", $data->id)}}"><i class="fa-solid fa-pen-to-square"></i></a></td>
                    <td class="py-2 px-4 border"><i class="fa-solid fa-trash"></i></td>
                </tr>
                @endforeach

                <!-- Puedes agregar más filas según sea necesario -->
            </tbody>
        </table>
    </div>
</div>
@endsection
