@extends('admin.layouts.app')

@section('content')
    <h1>Banners</h1>
    <a href="{{ route('admin.banners.create') }}" class="btn btn-primary mb-3">Crear Nuevo Banner</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Imagen</th>
                <th>Título</th>
                <th>Subtítulo</th>
                <th>Enlace</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($banners as $banner)
                <tr>
                    <td>{{ $banner->id }}</td>
                    <td><img src="{{ asset('storage/' . $banner->image) }}" alt="Banner" width="100"></td>
                    <td>{{ $banner->title }}</td>
                    <td>{{ $banner->subtitle }}</td>
                    <td><a href="{{ $banner->link }}" target="_blank">Ver Enlace</a></td>
                    <td>
                        <a href="{{ route('admin.banners.edit', $banner) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('admin.banners.destroy', $banner) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
