@extends('layouts.admin')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Datos</h6>
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
                            <th class="singleLine">Nombre Articulo</th>
                            <th class="singleLine">Nombre Autores</th>
                            <th class="singleLine">Entidad</th>
                            <th class="singleLine">Evaluacion Ponencia</th>
                            <th class="singleLine">Acciones</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>


<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Eliminar Dato</h4>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form method="post" id="sample_form" enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                        <div class="form-group">
                            <label class="control-label col-12">Nombre Articulo</label>
                            <div class="col-12">
                                <input type="text" required name="name_project" id="name_project"
                                    class="form-control" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-12">Nombre Autores</label>
                            <div class="col-12">
                                <input type="text" required name="name_owner" id="name_owner" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-12">Entidad</label>
                            <div class="col-12">
                                <input type="text" required name="entity" id="entity" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-12">Evaluacion Ponencia</label>
                            <div class="col-12">
                                <select name="speaker_cal" required class="form-control" id="speaker_cal">
                                    <option value="Aceptada">Aceptada</option>
                                    <option value="Aceptado con Comentarios">Aceptado con Comentarios</option>
                                    <option value="Rechazado">Rechazado</option>
                                </select>
                            </div>
                        </div>
                                <div class="form-group">
                            <label class="control-label col-12">Subir Archivo</label>
                            <div class="col-12">
                            <input type="file" class="form-control" name="file" id="file">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="action" id="action" value="Add" />
                    <input type="hidden" name="hidden_id" id="hidden_id" />
                    <input type="submit" name="action_button" id="action_button" class="btn btn-block btn-primary"
                        value="Guardar" />
                </div>
                </form>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="createModalHelper" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Eliminar Dato</h4>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <h4>¿Esta seguro que desea eliminar este dato?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" name="ok_button" id="ok_button" class="btn btn-primary">Eliminar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
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
            scrollX: true,
            scrollY: true,
            ajax: {
                url: "{{ route('note.index') }}",
            },
            columns: [{
                    data: 'name_project'
                },
                {
                    data: 'name_owner'

                },
                {
                    data: 'entity'

                },
                {
                    data: 'speaker_cal'

                },
                {
                    data: 'action',
                    orderable: false
                }
            ]
        });
            $('#create_record').click(function() {
                $('#sample_form')[0].reset();
                $('.modal-title').text('A\u00f1adir Dato');
                $('#action_button').val('Guardar');
                $('#action').val('Add');
                $('#form_result').html('');
                $('#createModal').modal('show');
            });

            $('#sample_form').on('submit', function(event) {
                event.preventDefault();
                var action_url = '';

                if ($('#action').val() == 'Add') {
                    action_url = "{{ route('note.store') }}";
                }

                if ($('#action').val() == 'Edit') {
                    action_url = "{{ route('note.update') }}";
                }

                $.ajax({
                    method: "POST",
                    data: new FormData(this),
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    url: action_url,
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
                            $('#createModal').modal('hide');
                        }
                    }
                });
            });

            $(document).on('click', '.edit', function() {
                var id = $(this).attr('id');
                $('#form_result').html('');
                $.ajax({
                    url: "/note/" + id + "/edit",
                    dataType: "json",
                    success: function(data) {
                        var data = data.result;

                        $('#name_project').val(data.name_project);
                        $('#name_owner').val(data.name_owner);
                        $('#entity').val(data.entity);
                        $('#speaker_cal').val(data.speaker_cal);

                        $('#hidden_id').val(id);
                        $('.modal-title').text('Editar Dato');
                        $('#action_button').val('Guardar');
                        $('#action').val('Edit');
                        $('#createModal').modal('show');
                    }
                });
            });

            var user_id;

            $(document).on('click', '.delete', function() {
                user_id = $(this).attr('id');
                $('.modal-title').text('Eliminar Dato');
                $('#createModalHelper').modal('show');
            });

            $('#ok_button').click(function() {
                $.ajax({
                    url: "note/destroy/" + user_id,
                    beforeSend: function() {
                        $('#ok_button').text('Eliminando...');
                    },
                    success: function(data) {
                        setTimeout(function() {
                            $('#createModalHelper').modal('hide');
                            $('#user_table').DataTable().ajax.reload();
                            toastr.success('Dato Eliminado');
                        }, 2000);
                    }
                })
            });
        });

</script>
@endsection
