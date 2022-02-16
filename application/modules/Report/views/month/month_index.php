<input type="hidden" name="tokentxt" value="<?php echo Post_get('token'); ?>"/>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            <a href="<?php echo base_url('Report/Brand/Dashboard/index/'); ?>" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> back</a>
        </div>
        <div class="card-toolbar">
            <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="toggle" data-toggle="tooltip" data-placement="top" title="Minimalkan">
                <i class="ki ki-arrow-down icon-nm"></i>
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="table" class="table table-bordered table-hover table-striped" style="width:100%;">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th>no</th>
                        <th>category</th>
                        <th>sub<br>category</th>
                        <th>product</th>
                        <th>code</th>
                        <th>date</th>
                        <th>qty</th>
                    </tr>
                </thead>
                <tbody></tbody>
                <tfoot>
                    <tr>
                        <th colspan="7"></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        var tokentxt = $('input[name="tokentxt"]').val();
        $('#table').dataTable({
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
                {extend: 'print', footer: true, pageSize: 'LEGAL'},
                {extend: 'excelHtml5', footer: true},
                {extend: 'pdfHtml5', footer: true, pageSize: 'LEGAL'}
            ],
            lengthMenu: [
                [10, 50, 100, 500, -1],
                ['10', '50', '100', '500', 'all']
            ],
            "ajax": {
                "url": "<?php echo base_url('Report/Brand/Bulan/lists/'); ?>",
                "type": "GET",
                "data": {"tpken": tokentxt}
            },
            columnDefs: [
                {
                    targets: 0,
                    className: 'text-center'
                }
            ],
            "footerCallback": function (row, data, start, end, display) {
                var api = this.api();

                var intVal = function (i) {
                    return typeof i === 'string' ?
                            i.replace(/[\$,]/g, '') * 1 :
                            typeof i === 'number' ?
                            i : 0;
                };

                pageTotal = api
                        .column(6, {page: 'current'})
                        .data()
                        .reduce(function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                $(api.column(6).footer()).html(
                        'TOTAL: ' + numeral(pageTotal).format('0,0')
                        );
            }
        });
    });
</script>