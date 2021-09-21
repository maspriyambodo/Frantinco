<div class="modal fade" id="modal_edit" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modal_editLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_editLabel">Edit Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="Close_edit()">
                    <i aria-hidden="true" class="fas fa-times text-danger"></i>
                </button>
            </div>
            <form id="form_edit" action="<?php echo site_url('Master/Product/Kategori/Update/'); ?>" method="post">
                <div class="modal-body">
                    <input type="hidden" name="<?php echo $csrf['name'] ?>" value="<?php echo $csrf['hash'] ?>"/>
                    <input type="hidden" name="e_id"/>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="e_brand">Brand:</label>
                                <select id="e_brand" name="e_brand" class="form-control custom-select" required="" style="width: 100%;"></select>
                            </div>
                            <div class="form-group">
                                <label for="e_nama">Category:</label>
                                <div class="input-group">
                                    <input id="e_nama" type="text" name="e_nama" class="form-control" autocomplete="off" required="" onchange="Check_kategori_edit(this.value)"/>
                                    <input type="hidden" name="old_name"/>
                                    <div id="e_check_code" class="input-group-append"></div>
                                </div>
                                <input id="e_code_stat" type="hidden" name="e_code_stat" value=""/>
                                <div id="e_code_msg"></div>
                            </div>
                            
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="e_desc">Description:</label>
                                <textarea id="e_desc" name="e_desc" class="form-control" required="" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default font-weight-bold" data-dismiss="modal" onclick="Close_edit()"><i class="far fa-times-circle"></i> Cancel</button>
                    <button type="button" class="btn btn-default font-weight-bold" onclick="Save_edit()"><i class="far fa-save text-success"></i> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>