$(document).ready(() => {
    if ($('#rows').val()) {
        $('#columns').prop('disabled', false);
    }
    fillRows();
    fillColumns();
});

$('#rows').on('input', () => {
    if ($('#rows').val()) {
        $('#columns').prop('disabled', false);
    } else {
        $('#columns').val('');
        $('#columns').prop('disabled', true);
    }
    fillRows();
    fillColumns();
});
$('#columns').on('input', () => {
    fillRows();
    fillColumns();
});

function fillRows() {
    $('.fila').remove();
    var nFilas = $('#rows').val();
    for (var i = 0; i < nFilas; i++) {
        $('#theater').append('<div class="row fila" id="fila' + i + '"></div>');
    }
}

function fillColumns() {
    var nColumnas = $('#columns').val();
    $('.fila').empty().each((index, el) => {
        for (var i = 0; i < nColumnas; i++) {
            $('<div class="text-center columna" id="columna' + i + '"><img src="/img/free_seat.png" alt=""></div>').appendTo(el);
        }
    });
}