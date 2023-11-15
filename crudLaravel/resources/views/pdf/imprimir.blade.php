
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
</head>

<div class="flex flex-col justify-center items-center w-fulls">
    <div class="w-96 mr-80">
        <h1>Datos del usuario {{ $user->name }}<</h1>
        <table class="min-w-full bg-white border rounded-md overflow-hidden">
            <tr>
            <th>Nombre</th>
            <th>Identificación</th>
            <th>Teléfono</th>
            <th>Dirección</th>
        </tr>
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->identification }}</td>
            <td>{{ $user->phone }}</td>
            <td>{{ $user->address }}</td>
        </tr>
        </table>
    </div>
</div>