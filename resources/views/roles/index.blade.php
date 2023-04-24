{{-- Llamamos la vista de la cual heredamos la estructura --}}
@extends('dashboard.master')
@section('titulo', 'Agregar Rol')
@section('contenido')
@include('dashboard.partials.validation-error')

    <main>

        <div class="container py-4">

            @can('crear-rol')
                <a href="{{ url('roles/create') }}" class="btn btn-primary btn-sm">Nuevo Rol</a>
            @endcan

            <table class="table table-dark table-striped">
                <thead>
                    {{-- Fila del encabezado --}}
                    <tr>
                        {{-- Columnas del encabezado --}}
                        <th>Rol</th>
                        <th>Permisos</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($roles as $rol)
                        <tr>
                            <td>{{ $rol->name }}</td>
                            <td>
                                @forelse ($rol->permissions as $permission)
                                <span class="badge text-bg-info">{{ $permission->name }}</span>
                                    
                                @empty
                                <span class="badge text-bg-info">No tiene permisos</span>
            
                                @endforelse
                            </td>
                            <td>
                                @can('editar-rol')
                                  <a href="{{ url('roles/'.$rol->id.'/edit') }}" class="bi bi-pencil"></a>  
                                @endcan
                            </td>
                            <td>
                                @can('eliminar-rol')
                                 <form action="{{ url('roles/'.$rol->id) }}" method="post">
                                    @method("DELETE")
                                    @csrf
                                    <button class="bi bi-eraser-fill" type="submit"></button>
                                </form>  
                                @endcan
                            </td>
                        </tr>
                    @empty
                        No hay roles
                    @endforelse
                </tbody>

            </table>

        </div>

    </main>




@endsection
