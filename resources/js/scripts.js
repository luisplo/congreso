
$(document).ready(function () {
    $('#modality_evaluator').hide();
    $('#modality_comun').hide();
    $('#modality_hotbed').hide();
    $('#modality_assistant').hide();
    $('#modality_presentation').hide();
});
$("#departament").change(function () {
    var depID = $("#departament").val();
    $.ajax({
        url: '/city/' + depID,
        type: 'GET',
        dataType: 'json'
    }).done(function (response) {
        $('#city').empty().append('<option disabled selected>-- Seleccione --</option>');
        response.forEach(element => {
            $("#city").append('<option value="' + element.id + '">' + element.name + '</option>');
        });
    }).fail(function (e) {
        console.error("error: ", e);
    });
});

$("#modality").change(function () {
    var modality = $("#modality").val();
    if (modality == 1 || modality == 3) {
        $('#modality_comun').show(1000);
        $('#modality_hotbed').hide(1000);
        $('#modality_assistant').hide(1000);
        $('#modality_presentation').hide(1000);
        $('#modality_evaluator').hide(1000);
    }
    if (modality == 1) {
        $('#modality_hotbed').hide(1000);
        $('#modality_assistant').hide(1000);
        $('#modality_presentation').show(1000);
    }
    if (modality == 2) {
        $('#modality_comun').hide(1000);
        $('#modality_hotbed').hide(1000);
        $('#modality_assistant').show(1000);
        $('#modality_presentation').hide(1000);
        $('#modality_evaluator').hide(1000);
    }
    if (modality == 3) {
        $('#modality_hotbed').show(1000);
        $('#modality_assistant').hide(1000);
        $('#modality_presentation').hide(1000);
    }
    if (modality == 4) {
        $('#modality_evaluator').show(1000);
        $('#modality_comun').hide(1000);
        $('#modality_hotbed').hide(1000);
        $('#modality_assistant').hide(1000);
        $('#modality_presentation').hide(1000);
    }

});


