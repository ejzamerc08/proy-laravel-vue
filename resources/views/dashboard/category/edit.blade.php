{{-- Llamamos la vista de la cual heredamos la estructura --}}
@extends('dashboard.master')
@section('titulo', 'Agregar Post')
@section('contenido')
@include('dashboard.partials.validation-error')
    <h1>Editar Categoria</h1>
    <form action="{{ url('dashboard/category/'.$post->id) }}" method="post">
        @method("PUT")
        @csrf
        {{-- form:post --}}
        {{-- Fila 1  --}}
        <main>
            <div class="row">
                {{-- Row para crear una fila --}}
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $post->name }}">
                </div>
                
                    {{-- Fila 2 --}}
                <div class="row form-group">
                    <label for="description">Descripción</label>
                    <textarea class="form-control" name="description" 
                    id="description" cols="30" rows='3'>{{$post->description}}</textarea>
                </div>
         

                    {{-- fila 4 --}}
                <div class="col s6">
                    <button class="btn btn-success btn-sm" type="submit">Guardar</button>
                    <a href="{{ url('dashboard/category') }}" class="btn btn-secondary btn-sm">Cancelar</a>
                </div>

                
            </div>
        </main>
    </form>
@endsection