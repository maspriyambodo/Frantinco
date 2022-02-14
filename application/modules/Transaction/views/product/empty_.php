<div class="card card-custom">
    <div class="card-body">
        <div class="form-group row">
            <div class="col-md-6">
                <div class="form-group">
                    transaction not found
                </div>
            </div>
            <div class="col-md-6 text-right">
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
</div>
<input type="hidden" name="err_msg" value="<?php echo $this->session->flashdata('err_msg'); ?>"/>
<input type="hidden" name="succ_msg" value="<?php echo $this->session->flashdata('succ_msg'); ?>"/>
<?php
unset($_SESSION['err_msg']);
unset($_SESSION['succ_msg']);
echo '<script>';
require_once 'transact.js';
echo '</script>';
