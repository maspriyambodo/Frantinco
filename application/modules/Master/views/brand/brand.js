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
function Edit(id) {
    var e_id, e_brand, e_desc;
    e_id = $('input[name="e_id"]');
    e_brand = $('input[name="e_brand"]');
    e_desc = $('textarea[name="e_desc"]');
    $.ajax({
        url: "<?php echo base_url('Master/Product/Brand/Get_detail?id='); ?>" + id,
        type: 'GET',
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            if (data) {
                e_id.val(data.id_brand);
                e_brand.val(data.nama_brand);
                e_desc.val(data.desc_brand);
            } else {
                e_id.val('');
                e_brand.val('');
                e_desc.val('');
                toastr.error('error while getting data!');
            }
        },
        error: function (jqXHR) {
            toastr.warning('error ' + jqXHR.status + ' ' + jqXHR.statusText);
        }
    });
}
function Close_edit() {
    var e_id, e_brand, e_desc;
    e_id = $('input[name="e_id"]');
    e_brand = $('input[name="e_brand"]');
    e_desc = $('textarea[name="e_desc"]');
    e_id.val('');
    e_brand.val('');
    e_desc.val('');
    $('input[name="old_name"]').val('');
    $('#e_code_msg').empty();
    $('#e_check_code').empty();
}
function Check_brand_edit(val) {
    $('#e_check_code').empty();
    $('#e_code_msg').empty();
    var brandtxt = $('input[name="e_brand"]').val();
    if (!brandtxt) {
        $('input[name="code_stat"]').val(0);
        $('#e_check_code').append(
                '<span class="input-group-text">'
                + '<i class="fas fa-times text-danger"></i>'
                + '</span>'
                );
        $('#e_code_msg').append('<small class="text-danger">please fill brand name</small>');
    } else {
        $.ajax({
            url: "<?php echo base_url('Master/Product/Brand/Check_nama?nama='); ?>" + val,
            type: 'GET',
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                var old_name, new_name;
                old_name = $('input[name="old_name"]').val();
                new_name = $('input[name="e_brand"]').val(val);
                if (data.status) {
                    if (new_name === old_name) {
                        $('input[name="e_code_stat"]').val(0);
                        $('#e_check_code').append(
                                '<span class="input-group-text">'
                                + '<i class="fas fa-times text-danger"></i>'
                                + '</span>'
                                );
                        $('#e_code_msg').append('<small class="text-danger">' + data.msg + '</small>');
                    } else {
                        $('input[name="e_code_stat"]').val(1);
                        $('#e_check_code').empty();
                        $('#e_code_msg').empty();
                    }
                } else {
                    $('input[name="e_code_stat"]').val(1);
                    $('#e_check_code').append(
                            '<span class="input-group-text">'
                            + '<i class="far fa-check-circle text-success"></i>'
                            + '</span>'
                            );
                    $('#e_code_msg').append('<small class="text-success">' + data.msg + '</small>');
                }
            },
            error: function (jqXHR) {
                toastr.warning('error ' + jqXHR.status + ' ' + jqXHR.statusText);
            }
        });
    }
}
function Save_edit() {
    var a, old_name, e_brand, result;
    old_name = $('input[name="old_name"]').val();
    a = $('input[name="e_code_stat"]').val();
    e_brand = $('input[name="e_brand"]').val();
    if (!e_brand) {
        result = toastr.warning('Please fill brand name');
    } else if (a == 0) {
        result = toastr.warning('Please use another brand name');
    } else if (e_brand == old_name) {
        result = $('#form_edit').submit();
    } else {
        result = $('#form_edit').submit();
    }
    return result;
}
function Delete(id) {
    $.ajax({
        url: "<?php echo base_url('Master/Product/Brand/Get_detail?id='); ?>" + id,
        type: 'GET',
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            $('input[name="d_id"]').val(data.id_brand);
            document.getElementById('modal_deleteLabel').innerHTML = 'Delete Brand: ' + data.nama_brand;
        },
        error: function (jqXHR) {
            toastr.warning('error ' + jqXHR.status + ' ' + jqXHR.statusText);
        }
    });
}
function Close_delete() {
    document.getElementById('modal_deleteLabel').innerHTML = '';
    $('input[name="d_id"]').val('');
}