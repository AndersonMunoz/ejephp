@extends('layout.app')

@section('titulo')
Listar Usuarios
@endsection

@section('contenido')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
<div class="flex flex-col justify-center items-center w-fulls">
    <a href="/registrar"><button class="bg-green-700 hover:bg-green-400 text-white font-bold py-2 px-4 rounded mb-4">Crear nuevo usuario</button></a>
    <div class="w-96 mr-80">
        <table class="min-w-full bg-white border rounded-md overflow-hidden">
            <thead class="bg-green-700 text-white">
                <tr>
                    <th class="py-2 px-4 border">Nombre</th>
                    <th class="py-2 px-4 border">Identificación</th>
                    <th class="py-2 px-4 border">Teléfono</th>
                    <th class="py-2 px-4 border">Dirección</th>
                    <th class="py-2 px-4 border">Editar</th>
                    <th class="py-2 px-4 border">Eliminar</th>
                    <th class="py-2 px-4 border">Descargar PDF</th>
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
                    <td class="py-2 px-4 border">
                        <form action="{{ route('eliminar', $data->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                    <td class="py-2 px-4 border"><a href="{{ route('descargar.pdf', $data->id) }}" target="_blank"><i class="fa-solid fa-file-pdf"></i></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
