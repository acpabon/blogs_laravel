@extends('adminlte::page')

@section('title', 'Etiquetas')

@section('content_header')
    <h1>Etiquetas</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.tags.store']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nombre Etiqueta'); !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre Etiqueta']); !!}
                    @error('name')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                
                <div class="form-group">
                    {!! Form::label('slug', 'Slug Etiqueta'); !!}
                    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Slug Etiqueta', 'readonly']); !!}
                    @error('slug')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('color', 'Color Etiqueta'); !!}
                    {!! Form::select('color', $colors, null, ['class' => 'form-control', 'placeholder' => 'Color Etiqueta']); !!}
                    @error('color')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {!! Form::submit('Crear Etiqueta', ['class' => 'btn btn-primary']); !!}
            {!! Form::close() !!}            
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        document.addEventListener("DOMContentLoaded", ()=>{
            const name = document.getElementById("name");

            name.addEventListener("keyup", ()=>{
                let slug_tmp = name.value.replaceAll(' ', '-');
                document.getElementById('slug').value = slug_tmp;
            })
        })
    </script>
@stop