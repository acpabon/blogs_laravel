@extends('adminlte::page')

@section('title', 'Posts')

@section('content_header')
    <h1>Posts</h1>
@stop

@section('content')
    @livewire('admin.postindex')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop