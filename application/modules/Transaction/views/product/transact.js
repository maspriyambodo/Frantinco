window.onload = function () {
    var tahun;
    tahun = $('select[name="tahuntxt"]').val();
    dt_tabel(tahun);
};
$(document).ready(function () {
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "0",
        "timeOut": "0",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
    var a, b, tahun;
    a = $('input[name="err_msg"]').val();
    b = $('input[name="succ_msg"]').val();
    tahun = $('select[name="tahuntxt"]').val();
    if (a) {
        toastr.error(a);
    } else if (b) {
        toastr.success(b);
    }
});
function Tahun(id) {
    var tahuntxt = $("#tahuntxt option:selected").text();
    document.getElementById('pagetitle').innerHTML = 'Data | Transaction ' + tahuntxt;
    $('table').DataTable().clear();
    $('table').DataTable().destroy();
    dt_tabel(id);
}
function Close_add() {
    $('input[name="doctxt"]').val('');
}
function Save_add() {
    var a = $('input[name="doctxt"]').val();
    if (a) {
        $('#doctxt').attr('style','pointer-events: none !important;');
        $('#closebtn1').attr('disabled', '');
        $('#closebtn2').remove();
        $('#savebtn').attr('disabled', '');
        $('#savebtn').empty();
        $('#savebtn').append('<i class="far fa-clock"></i> Please wait');
        $('#form_add').submit();
    } else {
        toastr.error('please select file!');
    }

}
function dt_tabel(year) {
    $('table').dataTable({
        "serverSide": true,
        "order": [[0, "asc"]],
        "paging": true,
        "ordering": true,
        "info": true,
        "processing": true,
        "deferRender": true,
        "scrollCollapse": true,
        "scrollX": true,
        "scrollY": "400px",
        dom: `<'row'<'col-sm-6 text-left'l><'col-sm-6 text-right'f>>
                <'row'<'col-sm-12'tr>>
                <'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'p>>`,
        "ajax": {
            "url": "<?php echo site_url('Transaction/Product/Dashboard/lists?token='); ?>" + year,
            "type": "POST"
        },
        columnDefs: [
            {
                targets: 0,
                className: 'text-center',
                orderable: false
            }
        ]
    });
}