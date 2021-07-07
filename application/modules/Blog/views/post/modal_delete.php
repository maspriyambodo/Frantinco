<div class="modal fade" id="modal_delete" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modal_delete" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_deleteLabel">Delete Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="fas fa-times"></i>
                </button>
            </div>
            <form action="<?php echo site_url('Blog/Post/Delete/'); ?>" method="post">
                <div class="modal-body">
                    <input type="hidden" name="<?php echo $csrf['name'] ?>" value="<?php echo $csrf['hash'] ?>"/>
                    <input type="hidden" name="id_post"/>
                    <div class="form-group">
                        Are you sure want to delete post?
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal"><i class="far fa-times-circle"></i> Cancel</button>
                    <button type="submit" class="btn btn-danger font-weight-bold"><i class="far fa-trash-alt"></i> Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function Delete(id) {
        $('input[name="id_post"]').val(id);
        $('#modal_delete').modal({show: true, backdrop: 'static', keyboard: false});
    }
</script>