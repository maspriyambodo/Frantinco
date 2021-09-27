<div class="modal fade" id="modal_add" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modal_add" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_addLabel">Upload Report</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="Close_add()">
                    <i aria-hidden="true" class="fas fa-times"></i>
                </button>
            </div>
            <form id="form_add" action="<?php echo site_url('Transaction/Product/Dashboard/Upload/'); ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="<?php echo $csrf['name'] ?>" value="<?php echo $csrf['hash'] ?>"/>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="doctxt">Upload File:</label>
                        <input id="doctxt" type="file" name="doctxt" class="form-control" accept=".xlsx, .xls" required=""/>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" onclick="Close_add()"><i class="far fa-times-circle text-danger"></i> Cancel</button>
                    <button type="submit" class="btn btn-default"><i class="fas fa-save text-success"></i> Save</button>
                </div>
            </form>
        </div>
    </div>
</div>