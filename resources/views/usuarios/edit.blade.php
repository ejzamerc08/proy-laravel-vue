@extends('dashboard.master')
@section('titulo', 'Editar Usuario')
@section('contenido')
@include('dashboard.partials.validation-error')


<main>

    <div class="container py-4">
        <h2>Edición de Usuarios</h2>
        @include('dashboard.partials.validation-error')
        <form action="{{ url('usuarios/'.$user->id) }}" method="post">
            @csrf
            @method("PUT")
            {{-- form:roles --}}
            {{-- Fila 1  --}}
            <main>
                {{-- Row para crear una fila --}}
                <div class="mb-3 row">
                    <label for="name">Nombre del Usuario:</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
                    </div>
                </div>
                {{-- Fila 2 --}}
                <div class="mb-3 row">
                    <label for="name">E-mail:</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="email" id="email" value="{{ $user->email }}">
                    </div>
                </div>
                {{-- Fila 3 --}}
                <div class="mb-3 row">
                    <label for="name">Password:</label>
                    <div class="col-sm-5">
                        <input type="password" class="form-control" name="password" id="password" value="">
                    </div>
                </div>
                {{-- Fila 4 --}}
                <div class="mb-3 row">
                    <label for="name">Confirmar Password:</label>
                    <div class="col-sm-5">
                        <input type="password" class="form-control" name="confirm-password" id="confirm-password" value="">
                    </div>
                </div>
              
                {{-- Fila 5 --}}
                <div class="mb-3 row">
                    <label for="description">Rol</label>
                    <select name="roles" id="roles" class="form-select" required>
                        <option value="">Seleccionar el Rol</option>
                        @foreach ($roles as $id=>$rol)
                            <option value="{{ $id }}">{{ $rol }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Fila 6 --}}

                <div class="col s6">
                    <button class="btn btn-success btn-sm" type="submit">Guardar</button>
                    <a href="{{ url('usuarios') }}" class="btn btn-secondary btn-sm">Cancelar</a>
                </div>
    
            </main>
        </form>
      
    </div>

</main>

@endsection