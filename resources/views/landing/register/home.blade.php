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
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
</head>

<body>
    <div class="container card mb-5">
        <div class="card-body">


            <header class="section-header mt-5">
                <h3 class="section-title">Registro</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam gravida nibh et rutrum fringilla. Donec vitae efficitur urna. Cras risus metus, interdum quis pharetra eu, gravida ac dui.</p>
            </header>


            <form action="/register/create" method="POST">
                @csrf
                <div class="form-group">
                    <label>Modalidad</label>
                    <select class="form-control" id="modality" name="modality">
                        <option value="" selected>-- Seleccione --</option>
                        @foreach($modality as $key => $value)
                        <option value="{{$value->id}}">{{$value->name}}</option>
                        @endforeach
                    </select>
                    @error('modality')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="row">
                    <div class="form-group col-lg">
                        <label>Tipo de Documento</label>
                        <select class="form-control" id="type_document" name="type_document">
                            <option value="" selected>-- Seleccione --</option>
                            @foreach($typeDocu as $key => $value)
                            <option value="{{$value->id}}">{{$value->name}}</option>
                            @endforeach
                        </select>
                        @error('type_document')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-lg">
                        <label>N&ordm; de Documento</label>
                        <input type="number" class="form-control" id="document" name="document" />
                        @error('document')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>Nombres</label>
                    <input type="text" class="form-control" id="name" name="name" />
                    @error('name')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Apellidos</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" />
                    @error('last_name')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="row">
                    <div class="form-group col-lg">
                        <label>Departamento</label>
                        <select class="form-control" name="departament" id="departament">
                            <option value="" selected>-- Seleccione --</option>
                            @foreach($departament as $key => $value)
                            <option value="{{$value->id}}">{{$value->name}}</option>
                            @endforeach
                        </select>
                        @error('departament')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-lg">
                        <label>Ciudad</label>
                        <select class="form-control" id="city" name="city">
                            <option value="" selected>-- Seleccione --</option>
                        </select>
                        @error('city')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>Cargo u Ocupaci&oacute;n</label>
                    <input type="text" class="form-control" id="position" name="position" />
                    @error('position')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Correo Personal</label>
                    <input type="email" class="form-control" id="email" name="email" />
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
                <button type="submit" class="btn btn-primary col-12">Guardar</button>
            </form>
        </div>
    </div>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script>
        @if(Session::has('message'))
        var type = "{{Session::get('alert-type','info')}}"

        switch (type) {
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
        @endif
    </script>

</body>

</html>