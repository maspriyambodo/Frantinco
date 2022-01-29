<input type="hidden" name="tahuntxt" value="<?php echo Enkrip($param[0]); ?>"/>
<input type="hidden" name="bulantxt" value="<?php echo Enkrip($param[1]); ?>"/>
<div class="card card-custom" data-card="true">
    <div class="card-header">
        <div class="card-title">
            <a href="<?php echo base_url('Report/Category/Dashboard/index/'); ?>" class="btn btn-default"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
        <div class="card-toolbar">
            <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="toggle" data-toggle="tooltip" data-placement="top" title="minimize">
                <i class="ki ki-arrow-down icon-nm"></i>
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" style="width:100%;"></table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        var bulan = $('input[name="bulantxt"]').val();
        dt_tabel(bulan);
    });
    function dt_tabel(bulan) {
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
            buttons: [
                {extend: 'print', footer: true},
                {extend: 'copyHtml5', footer: true},
                {extend: 'excelHtml5', footer: true},
                {extend: 'csvHtml5', footer: true},
                {extend: 'pdfHtml5', footer: true}
            ],
            lengthMenu: [
                [10, 50, 100, 500, -1],
                ['10', '50', '100', '500', 'all']
            ],
            "ajax": {
                "url": "Report/Category/Bulan/dt_table?token=" + bulan,
                dataSrc: ''
            },
            columns: [
                {
                    data: 'kode_product',
                    title: 'CODE'
                },
                {
                    data: 'nama_kategori',
                    title: 'NAME'
                },
                {
                    data: 'tr_date',
                    title: 'DATE'
                },
                {
                    data: 'qty',
                    title: 'QTY',
                    className: "text-center"
                }
            ]
        });
        $('table thead').addClass('text-center');
    }
</script>