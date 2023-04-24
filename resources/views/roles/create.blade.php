@extends('dashboard.master')
@section('titulo', 'Agregar Rol')
@section('contenido')
    @include('dashboard.partials.validation-error')


    <h1>Registrar Rol</h1>
    <form action="{{ route('roles.store') }}" method="post">
        @csrf
        {{-- form:roles --}}
        {{-- Fila 1  --}}
        <main>
            {{-- Row para crear una fila --}}
            <div class="mb-3 row">
                <label for="name">Nombre del Rol</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                </div>
            </div>
            {{-- Fila 2 --}}
            <div class="mb-3 row">
                <label for="name">Permisos del Rol</label>
                <div class="col-sm-5">
                    <table>
                        <tbody>
                            @foreach ($permission as $id => $permiso)
                                <tr>
                                    <td>
                                        <input type="checkbox" class="form-check-input" name="permission[]"  value="{{ $id }}">
                                        {{ $permiso }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- Fila 3 --}}
          
            <div class="col s6">
                <button class="btn btn-success btn-sm" type="submit">Publicar</button>
                <a href="{{ url('roles') }}" class="btn btn-secondary btn-sm">Cancelar</a>
            </div>

        </main>
    </form>
@endsection
