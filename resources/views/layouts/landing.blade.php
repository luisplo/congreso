<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js">
    </script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js">
    </script>

    <!-- Styles -->
    <link rel="stylesheet" href="https://allyoucan.cloud/cdn/icofont/1.0.1/icofont.css" integrity="sha384-jbCTJB16Q17718YM9U22iJkhuGbS0Gd2LjaWb4YJEZToOPmnKDjySVa323U+W7Fv" crossorigin="anonymous">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top header-transparent">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xl-11 d-flex align-items-center">
                    <h1 class="logo mr-auto"><a href="/">1º Congreso virtual</a></h1>
                    <!-- Uncomment below if you prefer to use an image logo -->
                    <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

                    <nav class="nav-menu d-none d-lg-block">
                        <ul>
                            <li class="active"><a href="#" class="back-to-home">Inicio</a></li>
                            <li><a href="#team">Conferencistas</a></li>
                            <li><a href="#portfolio">Cronograma</a></li>
                            <li><a href="#contact">Contacto</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#modalRegister">Registro</a></li>
                            @auth
                            <li><a href="{{ url('/home') }}">Login</a></li>
                            @else
                            <li><a href="{{ route('login') }}">Login</a></li>
                            @endif
                        </ul>
                    </nav><!-- .nav-menu -->
                </div>
            </div>
        </div>
    </header><!-- End Header -->
    <!-- ======= Intro Section ======= -->
    <section id="intro">
        <div class="intro-container">
            <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">
                <ol class="carousel-indicators"></ol>
                <div class="carousel-inner" role="listbox">
                    @foreach ($carouselImg as $key => $value)
                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}" style="background-image: url(storage/{{ $value->url }})">
                    </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </section><!-- End Intro Section -->
    <main id="main">
        <!-- Begin Page Content -->
        <div class=" py-4">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
        <!-- End of Main Content -->
        <section class="section-bg mb-5">
            <div class="container " data-aos="fade-up">
                <header class="section-header mb-4">
                    <h3>Cursos</h3>
                </header>
                <div class="row portfolio-container  d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">

                    <div class="col-lg-9 col-md-9 portfolio-item filter-app">
                        <table class="table table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">HORARIO</th>
                                    <th scope="col">CURSO</th>
                                    <th scope="col" width="25%">ENLACE DE REGISTRO</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>08:00 a.m. - 11:00 a.m.</td>
                                    <td>Transferencia Servicios Ecosistémicos en Sistemas Agroforestales con Café y Cacao.</td>
                                    <td><a href="https://n9.cl/amhl" target="_blank">https://n9.cl/amhl </a></td>
                                </tr>
                                <tr>
                                    <td>08:00 a.m. - 11:00 a.m.</td>
                                    <td>Taller Innovación en la Agroindustria del Cacao y Chocolate.</td>
                                    <td><a href="https://n9.cl/kx3yg" target="_blank">https://n9.cl/kx3yg</a></td>
                                </tr>
                                <tr>
                                    <td>08:00 a.m. - 11:00 a.m.</td>
                                    <td> Tecnologías Aplicables al Cultivo de Trucha.</td>
                                    <td><a href="https://n9.cl/ri5q" target="_blank">https://n9.cl/ri5q</a></td>
                                </tr>
                                <tr>
                                    <td>08:00 a.m. - 11:00 a.m.</td>
                                    <td>Gestión del Recurso Hídrico y Nutricional en Cultivos Hortofrutícolas de Acuerdo a las BPA </td>
                                    <td><a href="https://n9.cl/zfi4" target="_blank">https://n9.cl/zfi4</a></td>
                                </tr>
                            </tbody>
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col" class="text-center" colspan="3">JORNADA TARDE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>02:00 p.m. - 05:00 p.m.</td>
                                    <td>Hacia una Producción Agropecuaria Regenerativa.</td>
                                    <td><a href="https://n9.cl/l4u3" target="_blank">https://n9.cl/l4u3</a></td>
                                </tr>
                                <tr>
                                    <td>02:00 p.m. - 05:00 p.m.</td>
                                    <td>Elaboración de Cervezas Artesanales e Hidromieles, ciencia y Arte.</td>
                                    <td><a href="https://n9.cl/lsyff" target="_blank">https://n9.cl/lsyff</a></td>
                                </tr>
                                <tr>
                                    <td>02:00 p.m. - 05:00 p.m.</td>
                                    <td> Fundamentos del Cultivo de Tilapia en Biofloc.</td>
                                    <td><a href="https://n9.cl/ut7l" target="_blank">https://n9.cl/ut7l</a></td>
                                </tr>
                                <tr>
                                    <td>02:00 p.m. - 05:00 p.m.</td>
                                    <td>Fundamentos de Teledetección y su aplicación a la Agricultura de Precisión.</td>
                                    <td><a href="https://n9.cl/m84r" target="_blank">https://n9.cl/m84r</a></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
        </section>
        <!-- ======= Footer ======= -->
        <footer id="footer">
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 footer-info">
                            <h3>1º Congreso virtual</h3>
                        </div>
                        <div class="col-lg-4 col-md-6 footer-contact">
                            <h4>Redes Sociales</h4>
                            <div class="social-links">
                                <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="facebook"><i class="fab fa-facebook"></i></a>
                                <a href="#" class="instagram"><i class="fab fa-instagram"></i></a>
                                <a href="#" class="google-plus"><i class="fab fa-google-plus"></i></a>
                                <a href="#" class="linkedin"><i class="fab fa-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 footer-newsletter">
                            <h4>PQRS</h4>
                            <p>Sistema de peticiones, quejas o reclamos.</p>
                            <a href="http://congresocipres.com/">congresocipres.com</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    &copy; Copyright <strong>Congreso SENA</strong>. Todos los derechos reservados
                </div>
                <div class="credits">
                    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                </div>
            </div>
        </footer>
        <!-- End Footer -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        <div class="modal fade" id="modalRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Registro</h4>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <form method="post" id="sample_form" class="form-horizontal">
                                @csrf
                                <div class="form-group">
                                    <label>Modalidad</label>
                                    <select class="form-control" required id="modality" name="modality">
                                        <option value="" selected>-- Seleccione --</option>
                                        @foreach ($modality as $key => $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('modality')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg">
                                        <label>Tipo de Documento</label>
                                        <select class="form-control" required id="type_document" name="type_document">
                                            <option value="" selected>-- Seleccione --</option>
                                            @foreach ($typeDocu as $key => $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('type_document')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg">
                                        <label>N&ordm; de Documento</label>
                                        <input type="number" class="form-control" required id="document" name="document" />
                                        @error('document')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Nombres</label>
                                    <input type="text" class="form-control" required id="name" name="name" />
                                    @error('name')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Apellidos</label>
                                    <input type="text" class="form-control" required id="last_name" name="last_name" />
                                    @error('last_name')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg">
                                        <label>Departamento</label>
                                        <select class="form-control" required name="departament" id="departament">
                                            <option value="" selected>-- Seleccione --</option>
                                            @foreach ($departament as $key => $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('departament')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg">
                                        <label>Ciudad</label>
                                        <select class="form-control" required id="city" name="city">
                                            <option value="" selected>-- Seleccione --</option>
                                        </select>
                                        @error('city')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Cargo u Ocupaci&oacute;n</label>
                                    <input type="text" class="form-control" required id="position" name="position" />
                                    @error('position')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Correo Personal</label>
                                    <input type="email" class="form-control" required id="email" name="email" />
                                    @error('email')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div id="modality_comun">
                                    @include('landing.register.comun')
                                </div>
                                <div id="modality_hotbed">
                                    @include('landing.register.hotbed')
                                </div>
                                <div id="modality_assistant">
                                    @include('landing.register.assistant')
                                </div>
                                <div id="modality_presentation">
                                    @include('landing.register.presentation')
                                </div>
                                <div id="modality_evaluator">
                                    @include('landing.register.evaluator')
                                </div>

                                <div class="modal-footer">
                                    <input type="submit" class="btn btn-block btn-primary" value="Guardar" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $('#sample_form').on('submit', function(event) {
                    event.preventDefault();
                    action_url = "{{ route('register.store') }}";
                    $.ajax({
                        url: action_url,
                        method: "POST",
                        data: $(this).serialize(),
                        dataType: "json",
                        success: function(data) {
                            var html = '';
                            if (data.errors) {
                                for (var count = 0; count < data.errors.length; count++) {
                                    toastr.error(data.errors[count]);
                                }
                            }
                            if (data.success) {
                                toastr.success(data.success);
                                $('#sample_form')[0].reset();
                                $('#modalRegister').modal('hide');
                            }
                        }
                    });
                });
            });
        </script>
</body>

</html>