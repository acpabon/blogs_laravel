@extends('adminlte::page')

@section('title', 'Etiquetas')

@section('content_header')
    <h1>Etiquetas</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <a href="{{ route('admin.tags.create') }}" class="btn btn-secondary">Agregar etiqueta</a>
        </div>

        <div class="card-body">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Slug</th>
                        <th>Color</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <td>{{ $tag->id }}</td>
                            <td>{{ $tag->name }} </td>
                            <td>{{ $tag->slug }} </td>
                            <td>{{ $tag->color }} </td>
                            <td>
                                <a href="{{ route('admin.tags.edit', $tag)}}" class="btn btn-primary">Editar</a>
                            </td>
                            <td>
                                <form action="{{ route('admin.tags.destroy', $tag) }}" method="POST">
                                    @csrf
                                    @method('delete')

                                    <button type="submit" class="btn btn-danger">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop