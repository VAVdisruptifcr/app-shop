@extends('layouts.app')

@section('title', 'Bienvenido a App shop')

@section('body-class', 'product-page')

@section('content')
    <div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
                
    </div>

    <div class="main main-raised">
        <div class="container">
            <div class="section">
                <h2 class="title text-center">Editar la categoría seleccionada</h2>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                <form method="post" action="{{ url('/admin/categories/'.$category->id.'/edit') }}">
                    {{ csrf_field() }}
                    
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Nombre de la categoría</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name', $category->name) }}">
                            </div>
                        </div>
                        
                        
                    </div>


                        <textarea class="form-control" name="description" placeholder="Describe nuevamente esta categoría" rows="5">{{ old('description', $category->description) }}</textarea>

                        <button class="btn btn-primary">Guardar cambios</button>
                        <a href="{{ url('/admin/categories') }}" class="btn btn-warning" >Cancelar edición</a>

                </form>

            </div>


            <div class="section landing-section">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h2 class="text-center title">Vende con Nosotros</h2>
                        <h4 class="text-center description">Tienes un producto bueno para que vendamos en nuestra tienda? Deseamos conocerlo y darle un lugar adecuado dentro de nuestra plataforma. Anímate a obtener ganancias hoy mismo con nosotros.</h4>
                        <form class="contact-form">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Nombre</label>
                                        <input type="email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Correo</label>
                                        <input type="email" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group label-floating">
                                <label class="control-label">Mensaje</label>
                                <textarea class="form-control" rows="4"></textarea>
                            </div>

                            <div class="row">
                                <div class="col-md-4 col-md-offset-4 text-center">
                                    <button class="btn btn-primary btn-raised">
                                        Enviar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>

@include('includes.footer')
@endsection
