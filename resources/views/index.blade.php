<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Importar Archivos excel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="{{ route('exportar') }}">Exportar</a></li>
            </ul>
        </nav>
        <form method="POST" action="{{ route('importar') }}" enctype="multipart/form-data">
            <h3>Importar Excel</h3>
            @csrf
            <input type="file" name="documento" id="documento">
            <input type="submit" value="Importar">
        </form>
    </header>
    <main>
        @forelse($productos as $producto)
        <article>

            <head>
                {{ $producto->nombre }}
            </head>
            {{ $producto->descripcion }}
            <footer>
                ${{ $producto->precio }}
            </footer>
        </article>
        @empty
        <p> No has datos para mostrar </p>
        @endforelse
    </main>
</body>

</html>