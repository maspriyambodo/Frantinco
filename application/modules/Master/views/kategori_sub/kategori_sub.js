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
        dom: `<'row'<'col-sm-6 text-left'f><'col-sm-6 text-right'B>>
                <'row'<'col-sm-12'tr>>
                <'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,
        lengthMenu: [
            [10, 50, 100, 500, -1],
            ['10', '50', '100', '500', 'all']
        ],
        buttons: [
            {extend: 'print', footer: true},
            {extend: 'copyHtml5', footer: true},
            {extend: 'excelHtml5', footer: true},
            {extend: 'csvHtml5', footer: true},
            {extend: 'pdfHtml5', footer: true}
        ],
        "ajax": {
            "url": "Master/Product/Sub/lists",
            "type": "GET"
        },
        columnDefs: [
            {
                targets: 0,
                className: 'text-center'
            },
            {
                targets: 3,
                className: 'text-center'
            }
        ]
    });
    $('.select2').select2({
        ajax: {
            url: "Master/Product/Sub/Get_category",
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
    $('#categorytxt').empty();
    $('#categorytxt').append('<option value="">Search Category</option>');
    $('#code_msg').empty();
    $('#check_code').empty();
    $('input[name="subtxt"]').val('');
    $('textarea[name="desctxt"]').val('');
}
function Save_add() {
    var a, b, c, result;
    a = $('input[name="code_stat"]').val();
    c = $('input[name="subtxt"]').val();
    if (!c || !a) {
        result = toastr.warning('Please fill sub-category name');
    } else if (a == 0) {
        result = toastr.warning('Please use another sub-category name');
    } else {
        result = $('#form_add').submit();
    }
    return result;
}
function Check_kategori_add(val) {
    $('#check_code').empty();
    $('#code_msg').empty();
    $.ajax({
        url: "Master/Product/Sub/Check_sub?nama=" + val,
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
function Edit(id) {
    $('input[name="e_id"]').val(id);
    $.ajax({
        url: "Master/Product/Sub/Get_detail?id=" + id,
        type: 'GET',
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            $('input[name="old_name"]').val(data.subkategori);
            document.getElementById('modal_editLabel').innerHTML = 'Edit ' + data.subkategori;
            $('input[name="e_subtxt"]').val(data.subkategori);
            $('textarea[name="e_desctxt"]').val(data.desc_kategori);
            var sel = document.getElementById("e_category");
            var opt = document.createElement("option");
            opt.value = data.kategori_id;
            opt.text = data.kategori;
            sel.add(opt, sel.options);
            $('select option[value="' + data.kategori_id + '"]').attr('selected', true);
        },
        error: function (jqXHR) {
            toastr.warning('error ' + jqXHR.status + ' ' + jqXHR.statusText);
        }
    });
}
function Close_edit() {
    document.getElementById('modal_editLabel').innerHTML = '';
    $('input[name="old_name"]').val('');
    $('#e_category').empty();
    $('#e_category').append('<option value="">Search Category</option>');
    $('#e_code_msg').empty();
    $('#e_check_code').empty();
    $('input[name="e_subtxt"]').val('');
    $('textarea[name="e_desctxt"]').val('');
}
function Check_kategori_edit(val) {
    $('#e_check_code').empty();
    $('#e_code_msg').empty();
    $.ajax({
        url: "Master/Product/Sub/Check_sub?nama=" + val,
        type: 'GET',
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            var old_name, new_name;
            old_name = $('input[name="old_name"]').val();
            new_name = $('input[name="e_subtxt"]').val(val);
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
    var a, c, old_name, e_category, result;
    old_name = $('input[name="old_name"]').val();
    a = $('input[name="e_code_stat"]').val();
    e_category = $('select[name="e_category"]').val();
    c = $('input[name="e_subtxt"]').val();
    if (!c) {
        result = toastr.warning('Please fill sub-category name');
    } else if (a == 0) {
        result = toastr.warning('Please use another sub-category name');
    } else if (!e_category) {
        result = toastr.warning('Please select category name');
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
        url: "Master/Product/Sub/Get_detail?id=" + id,
        type: 'GET',
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            document.getElementById('modal_deleteLabel').innerHTML = 'Delete ' + data.subkategori;
        }, error: function (jqXHR) {
            toastr.warning('error ' + jqXHR.status + ' ' + jqXHR.statusText);
        }
    });
}
function Close_delete() {
    $('input[name=d_id]').val('');
    document.getElementById('modal_deleteLabel').innerHTML = '';
}