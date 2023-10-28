@extends('adminlte::page')

@section('title', 'Post')

@section('content_header')
    <h1>Edición de post</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($post, ['route' => ['admin.posts.update', $post], 'method' => 'put']) !!}
                {!! Form::hidden('user_id', auth()->user()->id); !!}
                <div class="form-group">
                    {!! Form::label('title', 'Titulo Post'); !!}
                    {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Titulo del post']); !!}
                    @error('title')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                
                <div class="form-group">
                    {!! Form::label('slug', 'Slug del post'); !!}
                    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Slug del post', 'readonly']); !!}
                    @error('slug')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('extract', 'Resumen del post'); !!}
                    {!! Form::textarea('extract', null, ['class' => 'form-control', 'placeholder' => 'Resumen del post']); !!}
                    @error('extract')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('description', 'Contenido del post'); !!}
                    {!! Form::textarea('description', null, ['class' => 'form-control']); !!}
                    @error('description')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <p class="font-weight-bold">Estado</p>
                    <label for="">{!! Form::radio('status', '1', true); !!} Borrador</label>
                    <label for="">{!! Form::radio('status', '2', false); !!} Publicado</label>
                    @error('status')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('category_id', 'Categoria del post'); !!}
                    {!! Form::select('category_id', $categories, null, ['class' => 'form-control', 'placeholder' => 'Categoria del post']); !!}
                    @error('category_id')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <p class="font-weight-bold">Etiquetas</p>
                    @foreach ($tags as $t)
                        <label class="mr-3" for="">{!! Form::checkbox('tags[]', $t->id, null); !!} {{ $t->name }}</label>
                    @endforeach
                    @error('tags')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {!! Form::submit('Editar Post', ['class' => 'btn btn-primary']); !!}
            {!! Form::close() !!}            
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <style>
        .ck-editor__editable[role="textbox"] {
            /* editing area */
            min-height: 200px;
        }
        .ck-content .image {
            /* block images */
            max-width: 80%;
            margin: 20px auto;
        }
    </style>
@stop

@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", ()=>{
            const title = document.getElementById("title");

            title.addEventListener("keyup", ()=>{
                let slug_tmp = title.value.replaceAll(' ', '-');
                document.getElementById('slug').value = slug_tmp;
            })
        });

        ClassicEditor.create( document.querySelector('#extract')).catch( error => {
            console.error( error );
        });
        
        ClassicEditor.create( document.querySelector('#description')).catch( error => {
            console.error( error );
        });
    </script>
@stop