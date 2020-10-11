@extends('layouts.admin')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Software</h6>
        </div>
        <div class="card-body">
            <div>
                <a href="#" name="create_record" id="create_record"
                    class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-download fa-sm text-white-50"></i> Añadir</a>
            </div>
            <br>
            <div class="table-responsive">
                <table id="user_table" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="singleLine">Identificaci&oacute;n</th>
                            <th class="singleLine">Nombre Software</th>
                            <th class="singleLine">PIN</th>
                            <th class="singleLine">TestSetId</th>
                            <th class="singleLine">Acciones</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    @component('components.modal')
        @slot('title')
            Identificaci&oacute;n Software
        @endslot
        @slot('body')
            <div class="container">
                <span id="form_result"></span>
                <form method="post" id="sample_form" class="form-horizontal">
                    @csrf
                    <div class="form-group">
                        <label class="control-label col-12">Identificaci&oacute;n</label>
                        <div class="col-12">
                            <input type="text" required name="identification" id="identification" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-12">Nombre Software</label>
                        <div class="col-12">
                            <input type="text" required name="name" id="name" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-12">PIN</label>
                        <div class="col-12">
                            <input type="number" required name="pin" id="pin" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-12">TestSetId</label>
                        <div class="col-12">
                            <input type="text" required name="testSetId" id="testSetId" class="form-control" />
                        </div>
                    </div>
                    <br />
                @endslot
                @slot('footer')
                    <div class="form-group col-12" align="center">
                        <input type="hidden" name="action" id="action" value="Add" />
                        <input type="hidden" name="hidden_id" id="hidden_id" />
                        <input type="submit" name="action_button" id="action_button" class="btn btn-block btn-primary"
                            value="Guardar" />
                    </div>
                </form>

            </div>
        @endslot
    @endcomponent

    @component('components.modalHelper')
        @slot('title')
            Eliminar Identificaci&oacute;n Software
        @endslot
        @slot('body')
            <div class="container">

                <h4>¿Esta seguro que desea eliminar este dato?</h4>
            @endslot
            @slot('footer')
                <div>
                    <button type="button" name="ok_button" id="ok_button" class="btn btn-primary">Eliminar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        @endslot
    @endcomponent

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
                scrollX: true,
                scrollY: true,
                ajax: {
                    url: "{{ route('home') }}",
                },
                columns: [{
                        data: 'identification'
                    },
                    {
                        data: 'name'

                    },
                    {
                        data: 'pin'

                    },
                    {
                        data: 'test_set_id'

                    },
                    {
                        data: 'action',
                        orderable: false
                    }
                ]
            });

            $('#create_record').click(function() {
                $('#sample_form')[0].reset();
                $('.modal-title').text('A\u00f1adir Identificaci\u00F3n Software');
                $('#action_button').val('Guardar');
                $('#action').val('Add');
                $('#form_result').html('');
                $('#compModal').modal('show');
            });

            $('#sample_form').on('submit', function(event) {
                event.preventDefault();
                var action_url = '';

                if ($('#action').val() == 'Add') {
                    action_url = "{{ route('home.store') }}";
                }

                if ($('#action').val() == 'Edit') {
                    action_url = "{{ route('home.update') }}";
                }

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
                            $('#user_table').DataTable().ajax.reload();
                            $('#compModal').modal('hide');
                        }
                    }
                });
            });

            $(document).on('click', '.edit', function() {
                var id = $(this).attr('id');
                $('#form_result').html('');
                $.ajax({
                    url: "/software/" + id + "/edit",
                    dataType: "json",
                    success: function(data) {
                        var data = data.result;
                        $('#identification').val(data.identification);
                        $('#name').val(data.name);
                        $('#pin').val(data.pin);
                        $('#testSetId').val(data.test_set_id);

                        $('#hidden_id').val(id);
                        $('.modal-title').text('Editar Identificaci\u00F3n Software');
                        $('#action_button').val('Guardar');
                        $('#action').val('Edit');
                        $('#compModal').modal('show');
                    }
                });
            });

            var user_id;

            $(document).on('click', '.delete', function() {
                user_id = $(this).attr('id');
                $('.modal-title').text('Eliminar Identificaci\u00F3n Software');
                $('#compModalHelper').modal('show');
            });

            $('#ok_button').click(function() {
                $.ajax({
                    url: "software/destroy/" + user_id,
                    beforeSend: function() {
                        $('#ok_button').text('Eliminando...');
                    },
                    success: function(data) {
                        setTimeout(function() {
                            $('#compModalHelper').modal('hide');
                            $('#user_table').DataTable().ajax.reload();
                            toastr.success('Dato Eliminado');
                        }, 2000);
                    }
                })
            });
        });

    </script>
@endsection
