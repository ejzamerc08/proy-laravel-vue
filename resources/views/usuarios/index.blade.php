{{-- Llamamos la vista de la cual heredamos la estructura --}}
@extends('dashboard.master')
@section('titulo', 'Usuarios')
@section('contenido')
@include('dashboard.partials.validation-error')

    <main>

        <div class="container py-4">
            <h2>Usuarios</h2>
            <a href="{{ url('usuarios/create') }}" class="btn btn-primary btn-sm">Nuevo Usuario</a>
            <table class="table table-dark table-striped">
                <thead>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>E-mail</th>
                    <th>Rol</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </thead>
                <tbody>
                    @foreach ($usuarios as $usuario)
                        <tr>
                            <td>{{ $usuario->id }}</td>
                            <td>{{ $usuario->name }}</td>
                            <td>{{ $usuario->email }}</td>
                            <td>
                                @if (!empty($usuario->getRoleNames()))
                                    @foreach ($usuario->getRoleNames() as $rolName)
                                        {{ $rolName }}
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                <a href="{{ 'usuarios/' . $usuario->id . '/edit' }}" class="bi bi-pencil"></a>
                            </td>
                            <td>
                                <form action="{{ 'usuarios/'.$usuario->id }}" method="post">
                                    @csrf
                                    @method("DELETE")
                                    <button class="bi bi-eraser-fill" type="submit"></button>
                                </form>
                            </td>
                           

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </main>




@endsection
