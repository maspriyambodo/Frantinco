window.onload = function () {

};
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