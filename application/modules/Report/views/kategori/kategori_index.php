<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
<div class="card card-custom">
    <div class="card-body">
        <div class="form-group row">
            <label for="tahuntxt" class="col-md-2 col-form-label">Choose Year:</label>
            <div class="col-md-4">
                <select id="tahuntxt" name="tahuntxt" class="form-control custom-select" onchange="Tahun(this.value)">
                    <?php
                    foreach ($year as $value) {
                        if ($value->text == date('Y')) {
                            echo '<option value="' . $value->id . '" selected>' . $value->text . '</option>';
                        } else {
                            echo '<option value="' . $value->id . '">' . $value->text . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
    </div>
</div>
<div class="clearfix my-4"></div>
<div class="card card-custom" data-card="true">
    <div class="card-header">
        <div class="card-title">
            Annual Report
        </div>
        <div class="card-toolbar">
            <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="toggle" data-toggle="tooltip" data-placement="top" title="minimize">
                <i class="ki ki-arrow-down icon-nm"></i>
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="text-center">
            <b><u id="title_chartdiv" class="count"></u></b>
        </div>
        <div id="chartdiv" class="chartdivs"></div>
    </div>
</div>
<div class="clearfix my-4"></div>
<div class="card card-custom" data-card="true">
    <div class="card-header">
        <div class="card-title">
            Report by Category
        </div>
        <div class="card-toolbar">
            <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="toggle" data-toggle="tooltip" data-placement="top" title="minimize">
                <i class="ki ki-arrow-down icon-nm"></i>
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="text-center">
            <b><u id="title_chartdiv_a" class="count"></u></b>
        </div>
        <div id="chartdiv_a" class="chartdivs"></div>
    </div>
</div>
<div class="clearfix my-4"></div>
<div class="card card-custom" data-card="true">
    <div class="card-header">
        <div class="card-title">
            Report details
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

        var tahun = $('select[name="tahuntxt"]').val();
        dt_tabel(tahun);
        chartdiv(tahun);
        chartdiv_a(tahun);
        
        function Tahun(id) {
            var tahuntxt = $("#tahuntxt option:selected").text();
            document.getElementById('pagetitle').innerHTML = 'Category Report ' + tahuntxt;
            chartdiv(id);
            chartdiv_a(id);
            $('table').DataTable().clear();
            $('table').DataTable().destroy();
            dt_tabel(id);
        }
        function chartdiv(year) {
            am4core.ready(function () {
                am4core.useTheme(am4themes_animated);
                am4core.addLicense("ch-custom-attribution");
                
                var chart = am4core.create("chartdiv", am4charts.XYChart);
                chart.colors.step = 2;
                chart.scrollbarX = new am4core.Scrollbar();
                chart.exporting.menu = new am4core.ExportMenu();
                chart.dataSource.url = 'Report/Category/Dashboard/chartdiv?token=' + year;
                
                var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
                categoryAxis.dataFields.category = "bulan";
                categoryAxis.renderer.grid.template.location = 0;
                categoryAxis.renderer.minGridDistance = 12;
                categoryAxis.renderer.labels.template.horizontalCenter = "right";
                categoryAxis.renderer.labels.template.verticalCenter = "middle";
                categoryAxis.renderer.labels.template.rotation = 300;
                categoryAxis.tooltip.disabled = true;
                categoryAxis.renderer.minHeight = 30;
                categoryAxis.title.text = 'Month of Sales';
                categoryAxis.title.fontWeight = 800;
                
                let label = categoryAxis.renderer.labels.template;
                label.wrap = true;
                label.maxWidth = 120;
                
                var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
                valueAxis.renderer.minWidth = 50;
                valueAxis.title.text = "Total Sales";
                valueAxis.title.fontWeight = 800;

                var series = chart.series.push(new am4charts.ColumnSeries());
                series.sequencedInterpolation = true;
                series.dataFields.valueY = "qty";
                series.dataFields.categoryX = "bulan";
                series.tooltipText = "Total Sales month {categoryX}: [bold]{valueY}[/]";
                series.columns.template.strokeWidth = 0;
                series.tooltip.pointerOrientation = "vertical";
                series.columns.template.column.cornerRadiusTopLeft = 10;
                series.columns.template.column.cornerRadiusTopRight = 10;
                series.columns.template.column.fillOpacity = 0.8;

                var hoverState = series.columns.template.column.states.create("hover");
                hoverState.properties.cornerRadiusTopLeft = 0;
                hoverState.properties.cornerRadiusTopRight = 0;
                hoverState.properties.fillOpacity = 1;
                
                chart.cursor = new am4charts.XYCursor();
            });
        }
        function chartdiv_a(year) {
            am4core.ready(function () {
                am4core.useTheme(am4themes_animated);
                am4core.addLicense("ch-custom-attribution");
                
                var chart = am4core.create("chartdiv_a", am4charts.XYChart);
                chart.colors.step = 2;
                chart.scrollbarX = new am4core.Scrollbar();
                chart.exporting.menu = new am4core.ExportMenu();
                chart.dataSource.url = 'Report/Category/Dashboard/chartdiv_a?token=' + year;
                
                var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
                categoryAxis.dataFields.category = "kode_product";
                categoryAxis.renderer.grid.template.location = 0;
                categoryAxis.renderer.minGridDistance = 12;
                categoryAxis.renderer.labels.template.horizontalCenter = "right";
                categoryAxis.renderer.labels.template.verticalCenter = "middle";
                categoryAxis.renderer.labels.template.rotation = 300;
                categoryAxis.tooltip.disabled = true;
                categoryAxis.renderer.minHeight = 30;
                categoryAxis.title.text = 'Product Line';
                categoryAxis.title.fontWeight = 800;
                
                let label = categoryAxis.renderer.labels.template;
                label.wrap = true;
                label.maxWidth = 120;
                
                var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
                valueAxis.renderer.minWidth = 50;
                valueAxis.title.text = "Total Sales";
                valueAxis.title.fontWeight = 800;

                var series = chart.series.push(new am4charts.ColumnSeries());
                series.sequencedInterpolation = true;
                series.dataFields.valueY = "qty";
                series.dataFields.categoryX = "kode_product";
                series.tooltipText = "Total Sales {nama_kategori}: [bold]{valueY}[/]";
                series.columns.template.strokeWidth = 0;
                series.tooltip.pointerOrientation = "vertical";
                series.columns.template.column.cornerRadiusTopLeft = 10;
                series.columns.template.column.cornerRadiusTopRight = 10;
                series.columns.template.column.fillOpacity = 0.8;

                var hoverState = series.columns.template.column.states.create("hover");
                hoverState.properties.cornerRadiusTopLeft = 0;
                hoverState.properties.cornerRadiusTopRight = 0;
                hoverState.properties.fillOpacity = 1;
                
                chart.cursor = new am4charts.XYCursor();
            });
        }
        function dt_tabel(year) {
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
                "ajax": {
                    "url": "Report/Category/Dashboard/dt_table?token=" + year,
                    dataSrc: ''
                },
                columns: [
                    {
                        data: 'nama_kategori',
                        title: 'Category'
                    },
                    {
                        data: 'JANUARI',
                        title: 'JAN',
                        className: "text-center",
                        "searchable": false
                    },
                    {
                        data: 'FEBRUARI',
                        title: 'FEB',
                        className: "text-center",
                        "searchable": false
                    },
                    {
                        data: 'MARET',
                        title: 'MAR',
                        className: "text-center",
                        "searchable": false
                    },
                    {
                        data: 'APRIL',
                        title: 'APR',
                        className: "text-center",
                        "searchable": false
                    },
                    {
                        data: 'MEI',
                        title: 'MEI',
                        className: "text-center",
                        "searchable": false
                    },
                    {
                        data: 'JUNI',
                        title: 'JUN',
                        className: "text-center",
                        "searchable": false
                    },
                    {
                        data: 'JULI',
                        title: 'JUL',
                        className: "text-center",
                        "searchable": false
                    },
                    {
                        data: 'AGUSTUS',
                        title: 'AUG',
                        className: "text-center",
                        "searchable": false
                    },
                    {
                        data: 'SEPTEMBER',
                        title: 'SEP',
                        className: "text-center",
                        "searchable": false
                    },
                    {
                        data: 'OKTOBER',
                        title: 'OCT',
                        className: "text-center",
                        "searchable": false
                    },
                    {
                        data: 'NOVEMBER',
                        title: 'NOV',
                        className: "text-center",
                        "searchable": false
                    },
                    {
                        data: 'DESEMBER',
                        title: 'DEC',
                        className: "text-center",
                        "searchable": false
                    }
                ]
            });
        }
    });
</script>