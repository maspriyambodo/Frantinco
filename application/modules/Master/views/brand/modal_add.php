<div class="modal fade" id="modal_add" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modal_add" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_addLabel">Add new brand</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="fas fa-times"></i>
                </button>
            </div>
            <form id="form_add" action="<?php echo site_url('Master/Product/Brand/Add/'); ?>" method="post">
                <input type="hidden" name="<?php echo $csrf['name'] ?>" value="<?php echo $csrf['hash'] ?>"/>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="brandtxt">Brand:</label>
                        <input id="brandtxt" type="text" name="brandtxt" class="form-control" required="" autocomplete="off"/>
                    </div>
                    <div class="form-group">
                        <label for="desctxt">Description:</label>
                        <textarea id="desctxt" name="desctxt" class="form-control" required=""></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="far fa-times-circle"></i> Cancel</button>
                    <button type="submit" class="btn btn-default"><i class="fas fa-save text-success"></i> Save</button>
                </div>
            </form>
        </div>
    </div>
</div>