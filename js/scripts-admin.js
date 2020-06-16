(function ($) {
    "use strict";

    // Add active state to sidbar nav links
    var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
    $("#layoutSidenav_nav .sb-sidenav a.nav-link").each(function () {
        if (this.href === path) {
            $(this).addClass("active");
        }
    });

    // Toggle the side navigation
    $("#sidebarToggle").on("click", function (e) {
        e.preventDefault();
        $("body").toggleClass("sb-sidenav-toggled");
    });

})(jQuery);

$(document).ready(function () {

    $(document).on('click','#editCustomer',function(){
        var id = $(this).data("id");
        var nama = $(this).data("nama");
        var no_telp = $(this).data("notelp");
        var birth = $(this).data("birth");
        var exp = $(this).data("exp");

        $("#modalEdit .modal-body #id").val(id);
        $("#modalEdit .modal-body #nama").val(nama);
        $("#modalEdit .modal-body #no_telp").val(no_telp);
        $("#modalEdit .modal-body #birth").val(birth);
        $("#modalEdit .modal-body #exp").val(exp);
    });

    $(document).on('click', '#editBarber', function () {
        var id = $(this).data("id");
        var nama = $(this).data("nama");
        var no_telp = $(this).data("notelp");
        var alamat = $(this).data("alamat");
        var exp = $(this).data("exp");

        $("#modalEdit .modal-body #id").val(id);
        $("#modalEdit .modal-body #nama").val(nama);
        $("#modalEdit .modal-body #no_telp").val(no_telp);
        $("#modalEdit .modal-body #alamat").val(alamat);
        $("#modalEdit .modal-body #exp").val(exp);
    });

});