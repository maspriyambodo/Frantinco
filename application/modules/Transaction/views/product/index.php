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
            <?php
            if ($privilege['create']) {
                echo '<div class="text-right col-md-6">'
                . '<div class="form-group">'
                . '<button type="button" class="btn btn-primary mr-2" data-toggle="modal" data-target="#modal_add"><i class="far fa-plus-square"></i> Add new</button>'
                . '</div>'
                . '</div>';
                require_once 'modal_add.php';
            } else {
                null;
            }
            ?>
        </div>
    </div>
</div>
<div class="clearfix" style="margin:10px;"></div>
<div class="card card-custom">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" style="width:100%;">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th>no</th>
                        <th>product<br>line</th>
                        <th>qty</th>
                        <th>date</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>
<input type="hidden" name="err_msg" value="<?php echo $this->session->flashdata('err_msg'); ?>"/>
<input type="hidden" name="succ_msg" value="<?php echo $this->session->flashdata('succ_msg'); ?>"/>
<?php
unset($_SESSION['err_msg']);
unset($_SESSION['succ_msg']);
echo '<script>';
require_once 'transact.js';
echo '</script>';
