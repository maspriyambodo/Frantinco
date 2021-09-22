<div class="modal fade" id="modal_edit" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modal_editLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_editLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="Close_edit()">
                    <i aria-hidden="true" class="fas fa-times"></i>
                </button>
            </div>
            <form id="form_edit" action="<?php echo site_url('Master/Product/Brand/Update/'); ?>" method="post">
                <input type="hidden" name="<?php echo $csrf['name'] ?>" value="<?php echo $csrf['hash'] ?>"/>
                <input type="hidden" name="e_id"/>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="e_brand">Brand:</label>
                        <div class="input-group">
                            <input id="e_brand" type="text" name="e_brand" class="form-control" required="" autocomplete="off" onchange="Check_brand_edit(this.value)"/>
                            <input id="old_name" type="hidden" name="old_name"/>
                            <div id="e_check_code" class="input-group-append"></div>
                        </div>
                        <input id="e_code_stat" type="hidden" name="code_stat" value=""/>
                        <div id="e_code_msg"></div>
                    </div>
                    <div class="form-group">
                        <label for="e_desc">Description:</label>
                        <textarea id="e_desc" name="e_desc" class="form-control" required=""></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" onclick="Close_edit()"><i class="far fa-times-circle text-danger"></i> Cancel</button>
                    <button type="button" class="btn btn-default" onclick="Save_edit()"><i class="fas fa-save text-success"></i> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>