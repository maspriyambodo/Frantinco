<div class="modal fade" id="modal_add" data-backdrop="static" tabindex="modal_add-1" role="dialog" aria-labelledby="modal_add" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_addLabel">Add new product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="Close_add()">
                    <i aria-hidden="true" class="fas fa-times"></i>
                </button>
            </div>
            <form id="form_add" action="<?php echo site_url('Master/Product/Management/Save/'); ?>" method="post">
                <input type="hidden" name="<?php echo $csrf['name'] ?>" value="<?php echo $csrf['hash'] ?>"/>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="subtxt">Sub-Category:</label>
                                <br>
                                <select id="subtxt" name="subtxt" class="form-control custom-select" required="" style="width: 100%;">
                                    <option value="">Search sub-category</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="producttxt">PRODUCT NAME:</label>
                                <input id="producttxt" type="text" name="producttxt" class="form-control" autocomplete="off" required=""/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="codetxt">PRODUCT LINE:</label>
                                <div class="input-group">
                                    <input id="codetxt" type="text" name="codetxt" class="form-control" autocomplete="off" required="" onchange="Check_add(this.value)"/>
                                    <div id="check_code" class="input-group-append"></div>
                                </div>
                                <input id="code_stat" type="hidden" name="code_stat" value=""/>
                                <div id="code_msg"></div>
                            </div>
                            <div class="form-group">
                                <label for="desctxt">Description:</label>
                                <textarea id="desctxt" name="desctxt" class="form-control" rows="4"></textarea>
                            </div>
                        </div>
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