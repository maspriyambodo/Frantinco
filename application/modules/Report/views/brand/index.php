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
<div class="clearfix" style="margin:10px;"></div>
<div class="card card-custom" data-card="true">
    <div class="card-header">
        <div class="card-title">
            Report by month
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
<div class="clearfix" style="margin:50px 0px;"></div>
<div class="card card-custom" data-card="true">
    <div class="card-header">
        <div class="card-title">
            Brand Comparison
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
<div class="clearfix" style="margin:50px 0px;"></div>
<div class="card card-custom" data-card="true">
    <div class="card-header">
        <div class="card-title">
            Brand Report details
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
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
<?php
echo '<script>';
require_once 'report_brand.js';
echo '</script>';
