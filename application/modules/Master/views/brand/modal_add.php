<div class="modal fade" id="modal_add" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modal_add" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_addLabel">Add new brand</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="Close_add()">
                    <i aria-hidden="true" class="fas fa-times"></i>
                </button>
            </div>
            <form id="form_add" action="<?php echo site_url('Master/Product/Brand/Add/'); ?>" method="post">
                <input type="hidden" name="<?php echo $csrf['name'] ?>" value="<?php echo $csrf['hash'] ?>"/>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="brandtxt">Brand:</label>
                        <div class="input-group">
                            <input id="brandtxt" type="text" name="brandtxt" class="form-control" required="" autocomplete="off" onchange="Check_brand_add(this.value)"/>
                            <div id="check_code" class="input-group-append"></div>
                        </div>
                        <input id="code_stat" type="hidden" name="code_stat" value=""/>
                        <div id="code_msg"></div>
                    </div>
                    <div class="form-group">
                        <label for="desctxt">Description:</label>
                        <textarea id="desctxt" name="desctxt" class="form-control" required=""></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" onclick="Close_add()"><i class="far fa-times-circle"></i> Cancel</button>
                    <button type="button" class="btn btn-default" onclick="Save_add()"><i class="fas fa-save text-success"></i> Save</button>
                </div>
            </form>
        </div>
    </div>
</div>