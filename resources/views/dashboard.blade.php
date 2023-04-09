{{-- Llamamos la vista de la cual heredamos la estructura --}}
@extends('dashboard.master')
@section('titulo', 'Agregar Post')
@section('contenido')
@include('dashboard.partials.validation-error')

   

    <div class="bt-20">
        <div>
            <section class="p-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md">
                            <div class="card bg-dark text-light">
                                <div class="card-body text-center">
                                    <div class="h1 mb-3">
                                        <i class="bi bi-laptop"></i>
                                    </div>
                                    <a href="{{ url('/dashboard/post') }}" class="btn btn-primary">Publicaciones</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="card bg-secondary text-light">
                                <div class="card-body text-center">
                                    <div class="h1 mb-3">
                                        <i class="bi bi-person-square"></i>
                                    </div>
                                    <a href="{{ url('/dashboard/category') }}" class="btn btn-dark">Categorias</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </div>

    @endsection
