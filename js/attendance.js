$(document).ready(function () {

    // event ketika keyword ditulis
    $('#check').on('click', function () {

        // $.get
        $.get('../ajax/attendance.php?keyword=' + $('#keyword').val(), function (data) {
            $('#container').html(data);
        });

    });

});