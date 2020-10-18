@extends('layouts.admin')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Asistentes</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="user_table" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="singleLine">Modalidad</th>
                            <th class="singleLine">Tipo Documento</th>
                            <th class="singleLine">Documento</th>
                            <th class="singleLine">Nombre</th>
                            <th class="singleLine">Apellidos</th>
                            <th class="singleLine">Departamento</th>
                            <th class="singleLine">Ciudad</th>
                            <th class="singleLine">Ocupacion</th>
                            <th class="singleLine">Correo</th>
                            <th class="singleLine">Entidad</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#user_table').DataTable({
                language: {
                    url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
                },
                processing: true,
                serverSide: true,
                autoWidth: false,
                scrollX: false,
                scrollY: true,
                ajax: {
                    url: "{{ route('assistan') }}",
                },
                columns: [{
                        data: 'modalityName'
                    },
                    {
                        data: 'type_docu'

                    },
                    {
                        data: 'document'

                    },
                    {
                        data: 'name'

                    },
                    {
                        data: 'last_name'

                    },
                    {
                        data: 'departament'

                    },
                    {
                        data: 'cityName'

                    },
                    {
                        data: 'position'

                    },
                    {
                        data: 'email'

                    },
                    {
                        data: 'entity'

                    },
                ]
            });

        });

    </script>
@endsection
