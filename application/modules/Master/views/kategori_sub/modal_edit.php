<div class="modal fade" id="modal_edit" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modal_edit" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_editLabel">modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="Close_edit()">
                    <i aria-hidden="true" class="fas fa-times"></i>
                </button>
            </div>
            <form id="form_edit" action="<?php echo site_url('Master/Product/Sub/Update'); ?>" method="post">
                <div class="modal-body">
                    <input type="hidden" name="<?php echo $csrf['name'] ?>" value="<?php echo $csrf['hash'] ?>"/>
                    <input type="hidden" name="e_id"/>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="e_category">Category:</label>
                            <br>
                            <select id="e_category" name="e_category" class="form-control custom-select select2" required="" style="width: 100%;">
                                <option value="">Search Category</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="e_subtxt">Sub Category Name:</label>
                            <div class="input-group">
                                <input id="e_subtxt" type="text" name="e_subtxt" class="form-control" autocomplete="off" required="" onchange="Check_kategori_edit(this.value)"/>
                                <input type="hidden" name="old_name"/>
                                <div id="e_check_code" class="input-group-append"></div>
                            </div>
                            <input id="e_code_stat" type="hidden" name="e_code_stat" value="1"/>
                            <div id="e_code_msg"></div>
                        </div>
                        <div class="form-group">
                            <label for="e_desctxt">Description:</label>
                            <textarea id="e_desctxt" name="e_desctxt" class="form-control" rows="4"></textarea>
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