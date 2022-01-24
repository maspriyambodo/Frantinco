
<div class="card card-custom">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <div class="text-center">
                        <b>brand</b>
                    </div>
                </div>
                <div class="chartdivs" id="chartdiv"></div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="text-center">
                        <b>category</b>
                    </div>
                </div>
                <div class="chartdivs" id="chartdiv2"></div>
            </div>
        </div>
        <div class="clearfix my-4 border"></div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <div class="text-center">
                        <b>sub category</b>
                    </div>
                </div>
                <div class="chartdivs" id="chartdiv3"></div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="text-center">
                        <b>product</b>
                    </div>
                </div>
                <div class="chartdivs" id="chartdiv4"></div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
<script>
    $(document).ready(function () {

        am4core.ready(function () {

            am4core.useTheme(am4themes_animated);
            am4core.addLicense("ch-custom-attribution");
            var chart = am4core.create("chartdiv", am4charts.PieChart3D);
            chart.hiddenState.properties.opacity = 0;

            chart.legend = new am4charts.Legend();

            chart.data = [
                {
                    country: "Lithuania",
                    litres: 501.9
                },
                {
                    country: "Czech Republic",
                    litres: 301.9
                }
            ];

            var series = chart.series.push(new am4charts.PieSeries3D());
            series.dataFields.value = "litres";
            series.dataFields.category = "country";

        });

        am4core.ready(function () {

            am4core.useTheme(am4themes_animated);
            am4core.addLicense("ch-custom-attribution");
            var chart = am4core.create("chartdiv2", am4charts.XYChart);
            chart.scrollbarX = new am4core.Scrollbar();

            chart.data = [
                {
                    "country": "USA",
                    "visits": 3025
                }, {
                    "country": "China",
                    "visits": 1882
                }, {
                    "country": "Japan",
                    "visits": 1809
                }, {
                    "country": "Germany",
                    "visits": 1322
                }, {
                    "country": "UK",
                    "visits": 1122
                }
            ];

            var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.dataFields.category = "country";
            categoryAxis.renderer.grid.template.location = 0;
            categoryAxis.renderer.minGridDistance = 30;
            categoryAxis.renderer.labels.template.horizontalCenter = "right";
            categoryAxis.renderer.labels.template.verticalCenter = "middle";
            categoryAxis.renderer.labels.template.rotation = 300;
            categoryAxis.tooltip.disabled = true;
            categoryAxis.renderer.minHeight = 110;

            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.renderer.minWidth = 50;
            valueAxis.title.text = "Jumlah Masjid";
            valueAxis.title.fontWeight = 800;

            var series = chart.series.push(new am4charts.ColumnSeries());
            series.sequencedInterpolation = true;
            series.dataFields.valueY = "visits";
            series.dataFields.categoryX = "country";
            series.tooltipText = "[{categoryX}: bold]{valueY}[/]";
            series.columns.template.strokeWidth = 0;

            series.tooltip.pointerOrientation = "vertical";

            series.columns.template.column.cornerRadiusTopLeft = 10;
            series.columns.template.column.cornerRadiusTopRight = 10;
            series.columns.template.column.fillOpacity = 0.8;

            var hoverState = series.columns.template.column.states.create("hover");
            hoverState.properties.cornerRadiusTopLeft = 0;
            hoverState.properties.cornerRadiusTopRight = 0;
            hoverState.properties.fillOpacity = 1;

            series.columns.template.adapter.add("fill", function (fill, target) {
                return chart.colors.getIndex(target.dataItem.index);
            });

            chart.cursor = new am4charts.XYCursor();

        });
        
        am4core.ready(function () {

            am4core.useTheme(am4themes_animated);
            am4core.addLicense("ch-custom-attribution");
            var chart = am4core.create("chartdiv3", am4charts.XYChart);
            chart.scrollbarX = new am4core.Scrollbar();

            chart.data = [
                {
                    "country": "USA",
                    "visits": 3025
                }, {
                    "country": "China",
                    "visits": 1882
                }, {
                    "country": "Japan",
                    "visits": 1809
                }, {
                    "country": "Germany",
                    "visits": 1322
                }, {
                    "country": "UK",
                    "visits": 1122
                }
            ];

            var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.dataFields.category = "country";
            categoryAxis.renderer.grid.template.location = 0;
            categoryAxis.renderer.minGridDistance = 30;
            categoryAxis.renderer.labels.template.horizontalCenter = "right";
            categoryAxis.renderer.labels.template.verticalCenter = "middle";
            categoryAxis.renderer.labels.template.rotation = 300;
            categoryAxis.tooltip.disabled = true;
            categoryAxis.renderer.minHeight = 110;

            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.renderer.minWidth = 50;
            valueAxis.title.text = "Jumlah Masjid";
            valueAxis.title.fontWeight = 800;

            var series = chart.series.push(new am4charts.ColumnSeries());
            series.sequencedInterpolation = true;
            series.dataFields.valueY = "visits";
            series.dataFields.categoryX = "country";
            series.tooltipText = "[{categoryX}: bold]{valueY}[/]";
            series.columns.template.strokeWidth = 0;

            series.tooltip.pointerOrientation = "vertical";

            series.columns.template.column.cornerRadiusTopLeft = 10;
            series.columns.template.column.cornerRadiusTopRight = 10;
            series.columns.template.column.fillOpacity = 0.8;

            var hoverState = series.columns.template.column.states.create("hover");
            hoverState.properties.cornerRadiusTopLeft = 0;
            hoverState.properties.cornerRadiusTopRight = 0;
            hoverState.properties.fillOpacity = 1;

            series.columns.template.adapter.add("fill", function (fill, target) {
                return chart.colors.getIndex(target.dataItem.index);
            });

            chart.cursor = new am4charts.XYCursor();

        });
        
        am4core.ready(function () {

            am4core.useTheme(am4themes_animated);
            am4core.addLicense("ch-custom-attribution");
            var chart = am4core.create("chartdiv4", am4charts.XYChart);
            chart.scrollbarX = new am4core.Scrollbar();

            chart.data = [
                {
                    "country": "USA",
                    "visits": 3025
                }, {
                    "country": "China",
                    "visits": 1882
                }, {
                    "country": "Japan",
                    "visits": 1809
                }, {
                    "country": "Germany",
                    "visits": 1322
                }, {
                    "country": "UK",
                    "visits": 1122
                }
            ];

            var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.dataFields.category = "country";
            categoryAxis.renderer.grid.template.location = 0;
            categoryAxis.renderer.minGridDistance = 30;
            categoryAxis.renderer.labels.template.horizontalCenter = "right";
            categoryAxis.renderer.labels.template.verticalCenter = "middle";
            categoryAxis.renderer.labels.template.rotation = 300;
            categoryAxis.tooltip.disabled = true;
            categoryAxis.renderer.minHeight = 110;

            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.renderer.minWidth = 50;
            valueAxis.title.text = "Jumlah Masjid";
            valueAxis.title.fontWeight = 800;

            var series = chart.series.push(new am4charts.ColumnSeries());
            series.sequencedInterpolation = true;
            series.dataFields.valueY = "visits";
            series.dataFields.categoryX = "country";
            series.tooltipText = "[{categoryX}: bold]{valueY}[/]";
            series.columns.template.strokeWidth = 0;

            series.tooltip.pointerOrientation = "vertical";

            series.columns.template.column.cornerRadiusTopLeft = 10;
            series.columns.template.column.cornerRadiusTopRight = 10;
            series.columns.template.column.fillOpacity = 0.8;

            var hoverState = series.columns.template.column.states.create("hover");
            hoverState.properties.cornerRadiusTopLeft = 0;
            hoverState.properties.cornerRadiusTopRight = 0;
            hoverState.properties.fillOpacity = 1;

            series.columns.template.adapter.add("fill", function (fill, target) {
                return chart.colors.getIndex(target.dataItem.index);
            });

            chart.cursor = new am4charts.XYCursor();

        });
    });
</script>