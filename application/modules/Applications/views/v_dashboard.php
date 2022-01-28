<input id="tokentxt" name="tokentxt" type="hidden" value="<?php echo $token; ?>"/>
<div class="clearfix d-block d-xl-none my-2 border"></div>
<div class="row">
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-6">
                <div class="col bg-primary px-6 py-8 rounded-xl mr-7 mb-7">
                    <span class="svg-icon svg-icon-3x d-block my-2">
                        <i class="text-white fas fa-box" style="font-size: 48px;"></i>
                        <b id="tot_brand" class="text-white font-weight-bold font-size-h1 count">0</b>
                    </span>
                    <a href="<?php echo base_url('Report/Brand/Dashboard/index/'); ?>" class="text-white font-weight-bold font-size-h6">
                        TOTAL BRAND
                    </a>
                </div>
            </div>

            <div class="col-md-6">
                <div class="col bg-primary px-6 py-8 rounded-xl mr-7 mb-7">
                    <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                        <i class="text-white fas fa-box" style="font-size: 48px;"></i>
                        <b id="tot_category" class="text-white font-weight-bold font-size-h1 count">0</b>
                    </span>
                    <a href="<?php echo base_url('Report/Category/Dashboard/index/'); ?>" class="text-white font-weight-bold font-size-h6">
                        TOTAL CATEGORY
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="row">
            <div class="col-md-6">
                <div class="col bg-primary px-6 py-8 rounded-xl mr-7 mb-7">
                    <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                        <i class="text-white fas fa-box" style="font-size: 48px;"></i>
                        <b id="tot_categorysub" class="text-white font-weight-bold font-size-h1 count">0</b>
                    </span>
                    <a href="#" class="text-white font-weight-bold font-size-h6">
                        TOTAL SUB CATEGORY
                    </a>
                </div>
            </div>

            <div class="col-md-6">
                <div class="col bg-primary px-6 py-8 rounded-xl mr-7 mb-7">
                    <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                        <i class="text-white fas fa-box" style="font-size: 48px;"></i>
                        <b id="tot_product" class="text-white font-weight-bold font-size-h1 count">0</b>
                    </span>
                    <a href="#" class="text-white font-weight-bold font-size-h6">
                        TOTAL PRODUCT
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix my-4"></div>
<div class="row">
    <div class="col-md-6">
        <div class="col bg-primary px-6 py-8 rounded-xl mr-7 mb-7">
            <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                <i class="text-white fas fa-file-alt" style="font-size: 48px;"></i>
                <b id="tot_transact" class="text-white font-weight-bold font-size-h1 count">0</b>
            </span>
            <a href="#" class="text-white font-weight-bold font-size-h6">
                TOTAL TRANSACTION
            </a>
        </div>
    </div>
    <div class="col-md-6">
        <div class="col bg-primary px-6 py-8 rounded-xl mr-7 mb-7">
            <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                <i class="text-white fas fa-boxes" style="font-size: 48px;"></i>
                <b id="tot_qty" class="text-white font-weight-bold font-size-h1 count">0</b>
            </span>
            <a href="#" class="text-white font-weight-bold font-size-h6">
                TOTAL QUANTITY
            </a>
        </div>
    </div>
</div>
<div class="clearfix my-4"></div>
<div class="row">
    <div class="col-md-6">
        <div class="card card-custom" data-card="true" id="kt_card_1">
            <div class="card-header">
                <div class="card-title">
                    Brand Demand
                </div>
                <div class="card-toolbar">
                    <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="toggle" data-toggle="tooltip" data-placement="top" title="Minimalkan">
                        <i class="ki ki-arrow-down icon-nm"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="chartdivs" id="chartdiv" style="height:450px !important;"></div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card card-custom" data-card="true" id="kt_card_1">
            <div class="card-header">
                <div class="card-title">
                    Category Demand
                </div>
                <div class="card-toolbar">
                    <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="toggle" data-toggle="tooltip" data-placement="top" title="Minimalkan">
                        <i class="ki ki-arrow-down icon-nm"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="chartdivs" id="chartdiv2" style="height:450px !important;"></div>
            </div>
        </div>
    </div>
</div>

<div class="clearfix my-4"></div>

<div class="row">
    <div class="col-md-6">
        <div class="card card-custom" data-card="true" id="kt_card_1">
            <div class="card-header">
                <div class="card-title">
                    Sub Category Demand
                </div>
                <div class="card-toolbar">
                    <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="toggle" data-toggle="tooltip" data-placement="top" title="Minimalkan">
                        <i class="ki ki-arrow-down icon-nm"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="chartdivs" id="chartdiv3" style="height:450px !important;"></div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card card-custom" data-card="true" id="kt_card_1">
            <div class="card-header">
                <div class="card-title">
                    Product Demand
                </div>
                <div class="card-toolbar">
                    <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="toggle" data-toggle="tooltip" data-placement="top" title="Minimalkan">
                        <i class="ki ki-arrow-down icon-nm"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="chartdivs" id="chartdiv4" style="height:450px !important;"></div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
<script>
    $(document).ready(function () {

        dashboard_info();

        var tokentxt = $('input[name="tokentxt"]').val();

        am4core.ready(function () {

            am4core.useTheme(am4themes_animated);
            am4core.addLicense("ch-custom-attribution");
            var chart = am4core.create("chartdiv", am4charts.PieChart3D);
            chart.dataSource.url = "Applications/Dashboard/Chart_brand?token=" + tokentxt;
            chart.hiddenState.properties.opacity = 0;
            chart.legend = new am4charts.Legend();

            var series = chart.series.push(new am4charts.PieSeries3D());
            series.dataFields.value = "qty";
            series.dataFields.category = "nama";
        });

        am4core.ready(function () {

            am4core.useTheme(am4themes_animated);
            am4core.addLicense("ch-custom-attribution");
            var chart = am4core.create("chartdiv2", am4charts.XYChart);
            chart.scrollbarX = new am4core.Scrollbar();
            chart.dataSource.url = "Applications/Dashboard/chart_category?token=" + tokentxt;

            var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.dataFields.category = "kd_produk";
            categoryAxis.renderer.grid.template.location = 0;
            categoryAxis.renderer.minGridDistance = 30;
            categoryAxis.renderer.labels.template.horizontalCenter = "right";
            categoryAxis.renderer.labels.template.verticalCenter = "middle";
            categoryAxis.renderer.labels.template.rotation = 300;
            categoryAxis.tooltip.disabled = true;
            categoryAxis.renderer.minHeight = 110;

            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.renderer.minWidth = 50;
            valueAxis.title.text = "SALES CATEGORY";
            valueAxis.title.fontWeight = 800;

            var series = chart.series.push(new am4charts.ColumnSeries());
            series.sequencedInterpolation = true;
            series.dataFields.valueY = "qty";
            series.dataFields.categoryX = "kd_produk";
            series.tooltipText = "TOTAL [bold]{nama}[/]: [bold]{valueY}[/]";
            series.columns.template.strokeWidth = 0;
            series.columns.template.width = am4core.percent(30);

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

            var label = categoryAxis.renderer.labels.template;
            label.wrap = true;
            label.maxWidth = 120;

            chart.cursor = new am4charts.XYCursor();

        });

        am4core.ready(function () {

            am4core.useTheme(am4themes_animated);
            am4core.addLicense("ch-custom-attribution");
            var chart = am4core.create("chartdiv3", am4charts.XYChart);
            chart.scrollbarX = new am4core.Scrollbar();
            chart.dataSource.url = "Applications/Dashboard/chart_categorysub?token=" + tokentxt;

            var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.dataFields.category = "kd_produk";
            categoryAxis.renderer.grid.template.location = 0;
            categoryAxis.renderer.minGridDistance = 30;
            categoryAxis.renderer.labels.template.horizontalCenter = "right";
            categoryAxis.renderer.labels.template.verticalCenter = "middle";
            categoryAxis.renderer.labels.template.rotation = 300;
            categoryAxis.tooltip.disabled = true;
            categoryAxis.renderer.minHeight = 110;

            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.renderer.minWidth = 50;
            valueAxis.title.text = "SALES SUB CATEGORY";
            valueAxis.title.fontWeight = 800;

            var series = chart.series.push(new am4charts.ColumnSeries());
            series.sequencedInterpolation = true;
            series.dataFields.valueY = "qty";
            series.dataFields.categoryX = "kd_produk";
            series.tooltipText = "TOTAL [bold]{nama}[/]: [bold]{valueY}[/]";
            series.columns.template.strokeWidth = 0;
            series.columns.template.width = am4core.percent(30);

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

            var label = categoryAxis.renderer.labels.template;
            label.wrap = true;
            label.maxWidth = 120;

            chart.cursor = new am4charts.XYCursor();

        });

        am4core.ready(function () {

            am4core.useTheme(am4themes_animated);
            am4core.addLicense("ch-custom-attribution");
            var chart = am4core.create("chartdiv4", am4charts.XYChart);
            chart.scrollbarX = new am4core.Scrollbar();
            chart.dataSource.url = "Applications/Dashboard/chart_product?token=" + tokentxt;

            var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.dataFields.category = "kd_produk";
            categoryAxis.renderer.grid.template.location = 0;
            categoryAxis.renderer.minGridDistance = 30;
            categoryAxis.renderer.labels.template.horizontalCenter = "right";
            categoryAxis.renderer.labels.template.verticalCenter = "middle";
            categoryAxis.renderer.labels.template.rotation = 300;
            categoryAxis.tooltip.disabled = true;
            categoryAxis.renderer.minHeight = 110;

            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.renderer.minWidth = 50;
            valueAxis.title.text = "SALES PRODUCT";
            valueAxis.title.fontWeight = 800;

            var series = chart.series.push(new am4charts.ColumnSeries());
            series.sequencedInterpolation = true;
            series.dataFields.valueY = "qty";
            series.dataFields.categoryX = "kd_produk";
            series.tooltipText = "TOTAL [bold]{nama}[/]: [bold]{valueY}[/]";
            series.columns.template.strokeWidth = 0;
            series.columns.template.width = am4core.percent(30);

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

            var label = categoryAxis.renderer.labels.template;
            label.wrap = true;
            label.maxWidth = 120;

            chart.cursor = new am4charts.XYCursor();

        });

        function dashboard_info() {
            $.ajax({
                url: "Applications/Dashboard/info_sum/",
                type: 'GET',
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    $('#tot_brand').attr('data-value', data.tot_brand);
                    $('#tot_category').attr('data-value', data.tot_category);
                    $('#tot_categorysub').attr('data-value', data.tot_categorysub);
                    $('#tot_product').attr('data-value', data.tot_product);
                    $('#tot_transact').attr('data-value', data.tot_transact);
                    $('#tot_qty').attr('data-value', data.tot_qty);
                    animate_counter();
                }
            });
        }

        function animate_counter() {
            $('.count').each(function () {
                $(this).prop('Counter', 0).animate({
                    Counter: $(this).data('value')
                }, {
                    duration: 3000,
                    easing: 'swing',
                    step: function (now) {
                        $(this).text(numeral(now).format('0,0'));
                    }
                });
            });
        }
    });
</script>