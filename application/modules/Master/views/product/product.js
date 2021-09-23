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
    var a, b;
    a = $('input[name="err_msg"]').val();
    b = $('input[name="succ_msg"]').val();
    if (a) {
        toastr.error(a);
    } else if (b) {
        toastr.success(b);
    }
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
            "url": "<?php echo site_url('Master/Product/Management/lists') ?>",
            "type": "POST"
        },
        columnDefs: [
            {
                targets: 0,
                className: 'text-center',
                orderable: false
            },
            {
                targets: 4,
                className: 'text-center',
                orderable: false
            }
        ]
    });
    $('#subtxt').select2({
        ajax: {
            url: "<?php echo site_url('Master/Product/Management/Get_category') ?>",
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: data
                };
            },
            cache: false
        }
    });
});
function Close_add() {
    $('#subtxt').empty();
    $('#subtxt').append('<option value="">Search sub-category</option>');
    $('#code_msg').empty();
    $('#check_code').empty();
    $('input[name="producttxt"]').val('');
    $('input[name="codetxt"]').val('');
    $('textarea[name="desctxt"]').val('');
}
function Check_add(val) {
    $('#check_code').empty();
    $('#code_msg').empty();
    $.ajax({
        url: "<?php echo base_url('Master/Product/Management/Check_product?nama='); ?>" + val,
        type: 'GET',
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            if (data.status) {
                $('input[name="code_stat"]').val(0);
                $('#check_code').append(
                        '<span class="input-group-text">'
                        + '<i class="fas fa-times text-danger"></i>'
                        + '</span>'
                        );
                $('#code_msg').append('<small class="text-danger">' + data.msg + '</small>');
            } else {
                $('input[name="code_stat"]').val(1);
                $('#check_code').append(
                        '<span class="input-group-text">'
                        + '<i class="far fa-check-circle text-success"></i>'
                        + '</span>'
                        );
                $('#code_msg').append('<small class="text-success">' + data.msg + '</small>');
            }
        },
        error: function (jqXHR) {
            toastr.warning('error ' + jqXHR.status + ' ' + jqXHR.statusText);
        }
    });
}
function Save_add() {
    var a, b, c,d, result;
    a = $('input[name="code_stat"]').val();
    b = $('select[name="subtxt"]').val();
    c = $('input[name="codetxt"]').val();
    d = $('input[name="producttxt"]').val();
    if (!c || !a) {
        result = toastr.warning('Please fill product line');
    } else if (!b) {
        result = toastr.warning('Please choose sub-category');
    } else if (!d) {
        result = toastr.warning('Please fill product name');
    } else if (a == 0) {
        result = toastr.warning('Please use another product name');
    } else {
        result = $('#form_add').submit();
    }
    return result;
}