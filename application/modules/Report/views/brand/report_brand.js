$(document).ready(function () {
    var tahun = $('select[name="tahuntxt"]').val();
    Chart_1(tahun);
    Chart_2(tahun);
    dt_tabel(tahun);
});
function Tahun(id) {
    var tahuntxt = $("#tahuntxt option:selected").text();
    document.getElementById('pagetitle').innerHTML = 'Brand Report ' + tahuntxt;
    Chart_1(id);
    Chart_2(id);
    $('table').DataTable().clear();
    $('table').DataTable().destroy();
    dt_tabel(id);
}
function Chart_1(year) {
    am4core.ready(function () {
        am4core.useTheme(am4themes_animated);
        am4core.addLicense("ch-custom-attribution");
        var chart = am4core.create("chartdiv_a", am4charts.PieChart3D);
        chart.hiddenState.properties.opacity = 0;
        chart.legend = new am4charts.Legend();
        chart.dataSource.url = '<?php echo base_url("Report/Brand/Dashboard/Chart_1/"); ?>' + year;
        var series = chart.series.push(new am4charts.PieSeries3D());
        series.dataFields.value = "total";
        series.dataFields.category = "brand";
    });
}
function Chart_2(year) {
    am4core.ready(function () {
        am4core.useTheme(am4themes_animated);
        am4core.addLicense("ch-custom-attribution");
        var chart = am4core.create("chartdiv", am4charts.XYChart);
        chart.colors.step = 2;
        chart.scrollbarX = new am4core.Scrollbar();
        chart.exporting.menu = new am4core.ExportMenu();
        chart.dataSource.url = '<?php echo base_url("Report/Brand/Dashboard/Chart_2/"); ?>' + year;
        var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
        categoryAxis.dataFields.category = "bulan";
        categoryAxis.renderer.grid.template.location = 0;
        categoryAxis.renderer.minGridDistance = 12;
        categoryAxis.renderer.labels.template.horizontalCenter = "right";
        categoryAxis.renderer.labels.template.verticalCenter = "middle";
        categoryAxis.renderer.labels.template.rotation = 270;
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
        series.dataFields.valueY = "brand_1";
        series.dataFields.categoryX = "bulan";
        series.tooltipText = "Total Brand A month {categoryX}: [bold]{valueY}[/]";
        series.columns.template.strokeWidth = 0;
        series.tooltip.pointerOrientation = "vertical";
        series.columns.template.column.cornerRadiusTopLeft = 10;
        series.columns.template.column.cornerRadiusTopRight = 10;
        series.columns.template.column.fillOpacity = 0.8;
        series.name = 'Brand A';
        series.legendSettings.labelText = "{name}";

        var series2 = chart.series.push(new am4charts.ColumnSeries());
        series2.sequencedInterpolation = true;
        series2.dataFields.valueY = "brand_2";
        series2.dataFields.categoryX = "bulan";
        series2.tooltipText = "Total Sales Brand B month {categoryX}: [bold]{valueY}[/]";
        series2.columns.template.strokeWidth = 0;
        series2.tooltip.pointerOrientation = "vertical";
        series2.columns.template.column.cornerRadiusTopLeft = 10;
        series2.columns.template.column.cornerRadiusTopRight = 10;
        series2.columns.template.column.fillOpacity = 0.8;
        series2.name = 'Brand B';
        series2.legendSettings.labelText = "{name}";

        var hoverState = series.columns.template.column.states.create("hover");
        hoverState.properties.cornerRadiusTopLeft = 0;
        hoverState.properties.cornerRadiusTopRight = 0;
        hoverState.properties.fillOpacity = 1;
        chart.legend = new am4charts.Legend();
        chart.legend.position = 'top';
        chart.legend.paddingBottom = 20;
        chart.legend.labels.template.maxWidth = 300;
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
            "url": "<?php echo site_url('Report/Brand/Dashboard/dt_table/'); ?>" + year,
            dataSrc: ''
        },
        columns: [
            {
                data: 'id',
                title: 'NO',
                className: "text-center",
                "searchable": false
            },
            {
                data: 'nama',
                title: 'BRAND'
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
            },
            {
                data: null,
                title: 'TOTAL',
                className: "text-center total",
                "searchable": false,
                render: function (data) {
                    var num = numeral(data.total).format('0,0');
                    return num;
                }
            }
        ]
    });
}