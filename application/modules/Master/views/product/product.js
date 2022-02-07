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
            "url": "Master/Product/Management/lists",
            "type": "GET"
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
    var a, b, c, d, result;
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
function Edit(id) {
    $('input[name="e_id"]').val(id);
    $.ajax({
        url: "<?php echo base_url('Master/Product/Management/Get_detail?id='); ?>" + id,
        type: 'GET',
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            $('input[name="old_name"]').val(data.e_codetxt);
            $('input[name="e_codetxt"]').val(data.e_codetxt);
            $('input[name="e_product"]').val(data.e_product);
            document.getElementById('modal_editLabel').innerHTML = 'Edit ' + data.e_codetxt;
            var sel = document.getElementById("e_subtxt");
            var opt = document.createElement("option");
            opt.value = data.id_subkategori;
            opt.text = data.e_subtxt;
            sel.add(opt, sel.options);
            $('select option[value="' + data.id_subkategori + '"]').attr('selected', true);
        },
        error: function (jqXHR) {
            toastr.warning('error ' + jqXHR.status + ' ' + jqXHR.statusText);
        }
    });
}
function Close_edit() {
    document.getElementById('modal_editLabel').innerHTML = '';
    $('input[name="old_name"]').val('');
    $('#e_subtxt').empty();
    $('#e_subtxt').append('<option value="">Search sub-category</option>');
    $('#e_code_msg').empty();
    $('#e_check_code').empty();
    $('input[name="e_product"]').val('');
    $('input[name="e_codetxt"]').val('');
}
function Check_edit(val) {
    $('#e_check_code').empty();
    $('#e_code_msg').empty();
    $.ajax({
        url: "<?php echo base_url('Master/Product/Management/Check_product?nama='); ?>" + val,
        type: 'GET',
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            var old_name, new_name;
            old_name = $('input[name="old_name"]').val();
            new_name = $('input[name="e_codetxt"]').val(val);
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
function Save_edit() {
    var a, b, c, old_name, e_subtxt, result;
    old_name = $('input[name="old_name"]').val();
    a = $('input[name="e_code_stat"]').val();
    b = $('input[name="e_product"]').val();
    e_subtxt = $('select[name="e_subtxt"]').val();
    c = $('input[name="e_codetxt"]').val();
    if (!c) {
        result = toastr.warning('Please fill product line');
    } else if (!b) {
        result = toastr.warning('Please fill product name');
    } else if (a == 0) {
        result = toastr.warning('Please use another sub-category name');
    } else if (!e_subtxt) {
        result = toastr.warning('Please select sub-category name');
    } else if (c == old_name) {
        result = $('#form_edit').submit();
    } else {
        result = $('#form_edit').submit();
    }
    return result;
}
function Delete(id) {
    $('input[name="d_id"]').val(id);
    $.ajax({
        url: "<?php echo base_url('Master/Product/Management/Get_detail?id='); ?>" + id,
        type: 'GET',
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            document.getElementById('modal_deleteLabel').innerHTML = 'Delete ' + data.e_codetxt;
            document.getElementById('delbody').innerHTML = 'deleting <b>' + data.e_codetxt + ' ' + data.e_product + '</b> may cause system crash';
        }, error: function (jqXHR) {
            toastr.warning('error ' + jqXHR.status + ' ' + jqXHR.statusText);
        }
    });
}
function Close_delete() {
    $('input[name="d_id"]').val('');
    document.getElementById('modal_deleteLabel').innerHTML = '';
    document.getElementById('delbody').innerHTML = '';
}