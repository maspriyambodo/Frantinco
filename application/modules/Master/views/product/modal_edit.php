<div class="modal fade" id="modal_edit" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modal_edit" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_editLabel">modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="Close_edit()">
                    <i aria-hidden="true" class="fas fa-times"></i>
                </button>
            </div>
            <form id="form_edit" action="<?php echo site_url('Master/Product/Management/Update/'); ?>" method="post">
                <div class="modal-body">
                    <input type="hidden" name="<?php echo $csrf['name'] ?>" value="<?php echo $csrf['hash'] ?>"/>
                    <input type="hidden" name="e_id"/>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="e_subtxt">Sub-Category:</label>
                            <br>
                            <select id="e_subtxt" name="e_subtxt" class="form-control custom-select" required="" style="width: 100%;">
                                <option value="">Search sub-category</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="e_codetxt">PRODUCT LINE:</label>
                            <div class="input-group">
                                <input id="e_codetxt" type="text" name="e_codetxt" class="form-control" autocomplete="off" required="" onchange="Check_edit(this.value)"/>
                                <input type="hidden" name="old_name"/>
                                <div id="e_check_code" class="input-group-append"></div>
                            </div>
                            <input id="e_code_stat" type="hidden" name="e_code_stat" value="1"/>
                            <div id="e_code_msg"></div>
                        </div>
                        <div class="form-group">
                            <label for="e_product">PRODUCT NAME:</label>
                            <input id="e_product" type="text" name="e_product" class="form-control" autocomplete="off" required=""/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" onclick="Close_edit()"><i class="far fa-times-circle"></i> Cancel</button>
                    <button type="button" class="btn btn-default" onclick="Save_edit()"><i class="far fa-save text-success"></i> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>