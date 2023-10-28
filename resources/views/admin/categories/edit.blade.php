@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    <h1>Editar categoria</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            {!! Form::model($category, ['route' => ['admin.categories.update', $category], 'method' => 'put']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nombre Categoria'); !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre Categoria']); !!}
                    @error('name')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                
                <div class="form-group">
                    {!! Form::label('slug', 'Slug Categoria'); !!}
                    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Slug Categoria', 'readonly']); !!}
                    @error('slug')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {!! Form::submit('Actualizar categoria', ['class' => 'btn btn-primary']); !!}
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