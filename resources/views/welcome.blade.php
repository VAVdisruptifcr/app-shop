@extends('layouts.app')

@section('title', 'Bienvenido a App shop')

@section('body-class', 'landing-page')

@section('styles')
    <style>
        .team .row .col-md-4 {
            margin-bottom: 3em;
        }
        .row {
          display: -webkit-box;
          display: -webkit-flex;
          display: -ms-flexbox;
          display: flex;
          flex-wrap: wrap;
        }
        .row > [class*='col-'] {
          display: flex;
          flex-direction: column;
        }
        h1 {
            margin-bottom: 0;
        }
    </style>
@endsection

@section('content')
    <div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
                <div class="container">
                    <div class="row">
                        <div class="col-md-11">
                            <h1 class="title">Bienvenido a CustomApps API Taylors.</h1>
                            <h3>Desarrollo de web apps para la era digital a la medida de tus necesidades.</h3>
                        </div>
                        <div class="col-md-3">
                            <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="btn btn-danger btn-raised btn-lg">
                            <i class="fa fa-play"></i> Es tu día de suerte
                            </a>
                        </div>
                    </div>
                </div>
    </div>

    <div class="main main-raised">
        <div class="container">
            <div class="section text-center section-landing">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h2 class="title">Productos que te facilitan la vida</h2>
                        <h5 class="description">La vida se vuelve complicada, en ocasiones con tanta información cuesta decidir que nos conviene más para rendir el poco tiempo libre que tenemos, en esta shop virtual, puedes hacer lo mismo que en una shop física pero sin salir de casa, para que disfrutes tiempo de calidad con tus seres queridos, mientras nosotros salimos a dejarte lo que compres</h5>
                    </div>
                </div>

                <div class="features">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="info">
                                <div class="icon icon-primary">
                                    <i class="material-icons">chat</i>
                                </div>
                                <h4 class="info-title">Atención en tiempo real</h4>
                                <p>En nuestra plataforma respondemos lo más breve posible las dudas que surgan sobre el uso de nuestra plataforma, los productos, políticas de entrega o cualquier otra duda.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info">
                                <div class="icon icon-success">
                                    <i class="material-icons">verified_user</i>
                                </div>
                                <h4 class="info-title">Seguridad en tus pagos</h4>
                                <p>Sientete seguro comprando en Disruptif Tienda Virtual. Trabajamos continuamente en los protocolos de seguridad para que compres en nuestra plataforma utilizando el medio de pago que prefieras con entera seguridad.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info">
                                <div class="icon icon-danger">
                                    <i class="material-icons">fingerprint</i>
                                </div>
                                <h4 class="info-title">Información confidencial</h4>
                                <p>Tu datos personales están resguardados bajo clavez encriptadas que ni siquiera nuestros programadores pueden observar. Tu información de cuentas, ni ninguna otra jamás serán utilizados fuera de esta plataforma.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section text-center">
                <h2 class="title">Productos Disponibles</h2>

                <div class="team">
                    <div class="row">
                        @foreach ($products as $product)
                        <div class="col-md-4">
                            <div class="team-player">
                                <img src="{{ $product->featured_image_url }}" alt="Thumbnail Image" class="img-raised img-circle">

                                <h4 class="title">
                                <a href="{{ url('/products/'.$product->id) }}"> {{ $product->name }} </a>
                                <br>
                                    <small class="text-muted">{{ $product->category_name }}</small>
                                </h4>
                                <p class="description"> {{ $product->description }} </p>
                                
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="text-center">
                        {{ ($products->links()) }}
                    </div>
                </div>

            </div>


            <div class="section landing-section">
                <div class="row">
                    <div class="col-md-9 col-md-offset-2">
                        <h2 class="text-center title">Crea con Nosotros</h2>
                        <h4 class="text-center description">Tienes un proyecto en mente del cual nos podamos hacer cargo y confeccionar algo maravillosamente útil para tu negocio o emprendimiento? Deseamos que nos cuentes un poco más. Lo leeremos, y, si lo indicas, en instantes estarás recibiendo nuestro presupuesto para tu proyecto.</h4>
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
