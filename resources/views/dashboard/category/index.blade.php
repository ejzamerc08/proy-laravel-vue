@extends('dashboard.master')
@section('titulo', 'Categoria')
@section('contenido')

<main>
    <div class="container py-4">
        <h2>Categorias</h2>
        @can('create-category')
        <a href="{{ url('/dashboard/category/create') }}" class="btn btn-primary btn-sm">Nueva Categoría</a>
        @endcan
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Fecha de cración</th>
                    <th>Fecha de modificaición</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>          
            </thead>
            <tbody>
                @foreach ($category as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>{{ $category->created_at }}</td>
                        <td>{{ $category->updated_at }}</td>
                        
                        <td>
                            @can('editar-category')
                            <a href="{{ url('dashboard/category/'.$category->id.'/edit') }}" class="bi bi-pencil"></a>
                            @endcan 
                        </td>
                        
    
                        <td>
                            @can('borrar-category')
                            <form action="{{ url('dashboard/category/'.$category->id )}}" method="post">
                                @method("DELETE")
                                @csrf
                                <button class="bi bi-eraser-fill" type="submit"></button>
                            </form>
                            @endcan  
                        </td>
                    </tr>
                    
                @endforeach
            </tbody>
        </table>
    </div>
</main>
@endsection