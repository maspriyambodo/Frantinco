<div class="card card-custom">
    <div class="card-body">
        <?php
        if ($privilege['create']) {
            echo '<div class="text-right">'
            . '<div class="form-group">'
            . '<button type="button" class="btn btn-primary mr-2" data-toggle="modal" data-target="#modal_add"><i class="far fa-plus-square"></i> Add new</button>'
            . '</div>'
            . '</div>';
            require_once 'modal_add.php';
        } else {
            null;
        }
        ?>
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" style="width:100%;">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th>NO</th>
                        <th>CATEGORY</th>
                        <th>SUB<br>CATEGORY</th>
                        <th>ACTION</th>
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
if ($privilege['update']) {
    require_once 'modal_edit.php';
}
if ($privilege['delete']) {
    require_once 'modal_delete.php';
} else {
    null;
}
unset($_SESSION['err_msg']);
unset($_SESSION['succ_msg']);
echo '<script>';
require_once 'kategori_sub.js';
echo '</script>';