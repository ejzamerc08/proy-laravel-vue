{{-- Llamamos la vista de la cual heredamos la estructura --}}
@extends('dashboard.master')
@section('titulo', 'Agregar Post')
@section('contenido')
@include('dashboard.partials.validation-error')
    <h1>Registrar Categoría</h1>
    <form action="{{ route('category.store') }}" method="post">
        @csrf
        {{-- form:post --}}
        {{-- Fila 1  --}}
        <main>
            <div class="row">
                {{-- Row para crear una fila --}}
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" name="name" id="name">
                <div class="row form-group">
                    <label for="description">Descripción</label>
                    <textarea class="form-control" name="description" id="description" cols="30"></textarea>

                </div>

                <div class="col s6">
                    <button class="btn btn-success btn-sm" type="submit">Publicar</button>
                    <a href="{{ url('dashboard/category') }}" class="btn btn-secondary btn-sm">Cancelar</a>
                </div>

                </div>
            </div>
        </main>
    </form>
@endsection