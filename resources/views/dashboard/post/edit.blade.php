{{-- Llamamos la vista de la cual heredamos la estructura --}}
@extends('dashboard.master')
@section('titulo', 'Agregar Post')
@section('contenido')
@include('dashboard.partials.validation-error')
    <h1>Editar Post</h1>
    <form action="{{ url('dashboard/post/'.$post->id) }}" method="post">
        @method("PUT")
        @csrf
        {{-- form:post --}}
        {{-- Fila 1  --}}
        <main>
            <div class="row">
                {{-- Row para crear una fila --}}
                <div class="form-group">
                    <label for="name">Post</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $post->name }}">
                
                    {{-- Fila 2 --}}
                <div class="row form-group">
                    <label for="description">Contenido</label>
                    <textarea class="form-control" name="description" id="description" cols="30">
                        {{ $post->description }}
                    </textarea>
                </div>
                 {{-- Fila 3 --}}
            <div class="row form-group">
                <label for="description">Categoría</label>
                <select name="category" id="category">
                    <option value="">Seleccionar Categoria</option>
                    @foreach ($category as $category)
                        <option value="{{ $category->id }}"
                            @if ($category->id == $post->category_id){{ 'selected' }} @endif
                            >{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

                    {{-- fila 4 --}}
                <div class="col s6">
                    <button class="btn btn-success btn-sm" type="submit">Guardar</button>
                    <a href="{{ url('dashboard/post') }}" class="btn btn-secondary btn-sm">Cancelar</a>
                </div>

                </div>
            </div>
        </main>
    </form>
@endsection