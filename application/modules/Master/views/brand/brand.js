window.onload = function () {
    toastr.options = {
        closeButton: true,
        debug: false,
        newestOnTop: true,
        progressBar: false,
        positionClass: "toast-top-right",
        preventDuplicates: true,
        onclick: null,
        showDuration: "300",
        hideDuration: "2000",
        timeOut: false,
        extendedTimeOut: "2000",
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "fadeIn",
        hideMethod: "fadeOut"
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
        "serverSide": false,
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
        columnDefs: [
            {
                targets: 3,
                className: 'text-center',
                orderable: false
            }
        ]
    });
};
function Check_brand_add(val) {
    $('#check_code').empty();
    $('#code_msg').empty();
    var brandtxt = $('input[name="brandtxt"]').val();
    if (!brandtxt) {
        $('input[name="code_stat"]').val(0);
        $('#check_code').append(
                '<span class="input-group-text">'
                + '<i class="fas fa-times text-danger"></i>'
                + '</span>'
                );
        $('#code_msg').append('<small class="text-danger">please fill brand name</small>');
    } else {
        $.ajax({
            url: "<?php echo base_url('Master/Product/Brand/Check_nama?nama='); ?>" + val,
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
}
function Close_add() {
    $('#code_msg').empty();
    $('#check_code').empty();
    $('input[name="code_stat"]').val('');
    $('input[name="brandtxt"]').val('');
    $('textarea[name="desctxt"]').val('');
}
function Save_add() {
    var a, b, c, result;
    a = $('input[name="code_stat"]').val();
    b = $('textarea[name="desctxt"]').val();
    c = $('input[name="brandtxt"]').val();
    if (!c || !a) {
        result = toastr.warning('Please fill brand name');
    } else if (a == 0) {
        result = toastr.warning('Please use another brand name');
    } else if (!b) {
        result = toastr.warning('Please fill description brand');
    } else {
        result = $('#form_add').submit();
    }
    return result;
}