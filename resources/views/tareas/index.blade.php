<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Tareas</title>
</head>
<body>
    <h1>Lista de Tareas</h1>

    <!-- Formulario para agregar nuevas tareas -->
    <form action="/tareas" method="POST">
        @csrf
        <input type="text" name="titulo" placeholder="Nueva tarea" required>
        <button type="submit">Agregar</button>
    </form>

    <ul>
        @foreach($tareas as $tarea)
            <li>
                {{ $tarea->titulo }} -
                <a href="/tareas/{{ $tarea->id }}/edit">Editar</a>

                <!-- Formulario para eliminar tarea -->
                <form action="/tareas/{{ $tarea->id }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>

