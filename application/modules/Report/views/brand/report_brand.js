$(document).ready(function () {
    var tahun = $('select[name="tahuntxt"]').val();
    Chart_1(tahun);
    chartdiv(tahun);
    dt_tabel(tahun);
});
function Tahun(id) {
    var tahuntxt = $("#tahuntxt option:selected").text();
    document.getElementById('pagetitle').innerHTML = 'Brand Report ' + tahuntxt;
    Chart_1(id);
    chartdiv(id);
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
        chart.dataSource.url = 'Report/Brand/Dashboard/Chart_1/' + year;
        var series = chart.series.push(new am4charts.PieSeries3D());
        series.dataFields.value = "total";
        series.dataFields.category = "brand";
    });
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
        series.columns.template.adapter.add("fill", function (fill, target) {
            return chart.colors.getIndex(target.dataItem.index);
        });

        var hoverState = series.columns.template.column.states.create("hover");
        hoverState.properties.cornerRadiusTopLeft = 0;
        hoverState.properties.cornerRadiusTopRight = 0;
        hoverState.properties.fillOpacity = 1;

        chart.cursor = new am4charts.XYCursor();
    });
}
function dt_tabel(year) {
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
            "url": "Report/Brand/Dashboard/lists",
            "type": "GET",
            "data": {"token": year}
        },
        columnDefs: [
            {
                "targets": 0,
                "className": 'text-center',
                "searchable": false
            },
            {
                "targets": [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13],
                "className": 'text-center'
            }
        ]
    });
}