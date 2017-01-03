$(document).ready(() => {
    if ($('#rows').val()) {
        $('#columns').prop('disabled', false);
    }
    fillRows();
    fillColumns();
});

$('#rows').on('input', () => {
    $('#columns').val('');
    fillRows();
    if ($('#rows').val()) {
        $('#columns').prop('disabled', false);
    } else {
        $('#columns').prop('disabled', true);
    }
});
$('#columns').on('input', () => {
    fillColumns();
});

function fillRows() {
    $('.fila').remove();
    $('#columns').val('');
    var nFilas = $('#rows').val();
    for (var i = 0; i < nFilas; i++) {
        $('#theater').append('<div class="row fila" id="fila' + i + '"></div>');
    }
}

function fillColumns() {
    var nColumnas = $('#columns').val();
    $('.fila').empty().each((index, el) => {
        for (var i = 0; i < nColumnas; i++) {
            $('<div class="text-center columna" id="columna' + i + '"><img src="http://88.8.199.15:81/Imagenes/Libre_1.bmp" alt=""></div>').appendTo(el);
        }
    });
}