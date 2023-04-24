@extends('dashboard.master')
@section('titulo', 'Editar Rol')
@section('contenido')
    @include('dashboard.partials.validation-error')

    <div class="container py-4">
        <h1>Editar Rol</h1>

        <form action="{{ url('roles/' . $role->id) }}" method="post">
            @csrf
            @method('PUT') {{-- Para que vaya al controller.update --}}
            {{-- form:roles --}}
            {{-- Fila 1  --}}
            <main>
                {{-- Row para crear una fila --}}
                <div class="mb-3 row">
                    <label for="name">Nombre del Rol</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="name" id="name" value="{{ $role->name }}">
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
                                            <input type="checkbox" class="form-check-input" name="permission[]"
                                                value="{{ $id }}"
                                                {{ $role->permissions->contains($id) ? 'checked' : '' }}>
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
    </div>
@endsection
