<div class="card card-custom">
    <div class="card-body">
        <?php
        if ($privilege['create']) { // jika memiliki privilege tambah data / create
            echo '<div class="text-right">'
            . '<div class="form-group">'
            . '<button type="button" class="btn btn-primary mr-2" data-toggle="modal" data-target="#modal_add" onclick="Add()"><i class="far fa-plus-square"></i> Add new</button>'
            . '</div>'
            . '</div>';
            require_once 'modal_add.php'; // jika bisa menambah data dengan modal, jika tidak maka button dibuat menjadi  href
        } else {
            null;
        }
        ?>
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" style="width:100%;">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th>no</th>
                        <th>category</th>
                        <th>description</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($data as $value) {
                        static $id = 1;
                        $id_category = Enkrip($value->id);
                        echo '<tr>'
                        . '<td class="text-center">' . $id++ . '</td>'
                        . '<td>' . $value->nama . '</td>'
                        . '<td>' . $value->description . '</td>'
                        . '<td class="text-center">'
                        . '<div class="btn-group">'
                        . '<button id="editbtn" type="button" class="btn btn-icon btn-xs btn-default" title="Edit ' . $value->nama . '" value="' . $id_category . '" data-toggle="modal" data-target="#modal_edit" onclick="Edit(this.value)"><i class="far fa-edit text-warning"></i></button>'
                        . '<button id="delbtn" type="button" class="btn btn-icon btn-xs btn-default" title="Delete ' . $value->nama . '" value="' . $id_category . '" data-toggle="modal" data-target="#modal_delete" onclick="Delete(this.value)"><i class="fas fa-trash-alt text-danger"></i></button>'
                        . '</div>'
                        . '</td>'
                        . '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<input type="hidden" name="err_msg" value="<?php echo $this->session->flashdata('err_msg'); ?>"/>
<input type="hidden" name="succ_msg" value="<?php echo $this->session->flashdata('succ_msg'); ?>"/>
<?php
if ($privilege['update']) {
    require_once 'modal_edit.php'; // jika bisa mengubah data dengan modal, jika tidak maka button dibuat menjadi  href
}
if ($privilege['delete']) {
    require_once 'modal_delete.php';
} else {
    null;
}
unset($_SESSION['err_msg']);
unset($_SESSION['succ_msg']);
echo '<script>';
require_once 'kategori.js';
echo '</script>';