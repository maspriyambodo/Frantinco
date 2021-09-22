window.onload = function () {
    toastr.options = {
        closeButton: true,
        debug: false,
        newestOnTop: false,
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
function Add(){
    $.ajax({
        url: "<?php echo base_url('Master/Product/Kategori/Get_brand'); ?>",
        type: 'GET',
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            var i;
            for (i = 0; i < data.length; i++) {
                var sel = document.getElementById("brandtxt");
                var opt = document.createElement("option");
                opt.value = data[i].id;
                opt.text = data[i].nama;
                sel.add(opt, sel.options[i]);
            }
        }, error: function (jqXHR) {
            toastr.warning('error ' + jqXHR.status + ' ' + jqXHR.statusText);
        }
    });
}
function Edit(id) {
    var a, b, c, d;
    a = $('input[name="e_id"]');
    b = $('input[name="e_nama"]');
    c = $('textarea[name="e_desc"]');
    d = $('input[name="old_name"]');
    a.val('');
    b.val('');
    c.val('');
    $.ajax({
        url: "<?php echo base_url('Master/Product/Kategori/Get_detail?id='); ?>" + id,
        type: 'GET',
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            a.val(data.id_kategori);
            b.val(data.nama_kategori);
            c.val(data.desc_kategori);
            d.val(data.nama_kategori);
            Get_brand(data.brand_id);
        }, error: function (jqXHR) {
            toastr.warning('error ' + jqXHR.status + ' ' + jqXHR.statusText);
        }
    });
}
function Get_brand(id) {
    $.ajax({
        url: "<?php echo base_url('Master/Product/Kategori/Get_brand'); ?>",
        type: 'GET',
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            var i;
            for (i = 0; i < data.length; i++) {
                var sel = document.getElementById("e_brand");
                var opt = document.createElement("option");
                opt.value = data[i].id;
                opt.text = data[i].nama;
                sel.add(opt, sel.options[i]);
                if (opt.value == id) {
                    $('select option[value="' + id + '"]').attr('selected', true);
                }
            }
        }, error: function (jqXHR) {
            toastr.warning('error ' + jqXHR.status + ' ' + jqXHR.statusText);
        }
    });
}
function Close_edit() {
    var a, b, c;
    a = $('input[name="e_id"]');
    b = $('input[name="e_nama"]');
    c = $('textarea[name="e_desc"]');
    a.val('');
    b.val('');
    c.val('');
    $('#e_code_msg').empty();
    $('#e_check_code').empty();
}
function Delete(id) {
    $.ajax({
        url: "<?php echo base_url('Master/Product/Kategori/Get_detail?id='); ?>" + id,
        type: 'GET',
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            $('input[name="d_id"]').val(data.id_kategori);
            document.getElementById('modal_deleteLabel').innerHTML = 'Delete ' + data.nama_kategori;
        }, error: function (jqXHR) {
            toastr.warning('error ' + jqXHR.status + ' ' + jqXHR.statusText);
        }
    });
}
function Close_delete() {
    $('input[name=d_id]').val('');
    document.getElementById('modal_deleteLabel').innerHTML = '';
}
function Check_kategori_add(val) {
    $('#check_code').empty();
    $('#code_msg').empty();
    $.ajax({
        url: "<?php echo base_url('Master/Product/Kategori/Check_nama?nama='); ?>" + val,
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
    var a, b, c, result;
    a = $('input[name="code_stat"]').val();
    b = $('textarea[name="desctxt"]').val();
    c = $('input[name="namatxt"]').val();
    if (!c || !a) {
        result = toastr.warning('Please fill category name');
    } else if (a == 0) {
        result = toastr.warning('Please use another category name');
    } else if (!b) {
        result = toastr.warning('Please fill description category');
    } else {
        result = $('#form_add').submit();
    }
    return result;
}
function Close_add() {
    $('#code_msg').empty();
    $('#brandtxt').empty();
    $('#check_code').empty();
    $('input[name="namatxt"]').val('');
    $('textarea[name="desctxt"]').val('');
}
function Check_kategori_edit(val) {
    $('#e_check_code').empty();
    $('#e_code_msg').empty();
    $.ajax({
        url: "<?php echo base_url('Master/Product/Kategori/Check_nama?nama='); ?>" + val,
        type: 'GET',
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            var old_name, new_name;
            old_name = $('input[name="old_name"]').val();
            new_name = $('input[name="e_nama"]').val(val);
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
    var a, b, c, result;
    a = $('input[name="e_code_stat"]').val();
    b = $('textarea[name="e_desc"]').val();
    c = $('input[name="e_nama"]').val();
    if (!c || !a) {
        result = toastr.warning('Please fill category name');
    } else if (a == 0) {
        result = toastr.warning('Please use another category name');
    } else if (!b) {
        result = toastr.warning('Please fill description category');
    } else {
        result = $('#form_edit').submit();
    }
    return result;
}