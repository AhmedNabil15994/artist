<div class="modal fade" id="newMemberModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تأكيد انشاء العضوية:</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label>الصورة الشخصية: </label>
                        </div>        
                        <div class="col-md-8">
                            <img class="image" src="<?php echo e(asset('/assets/images/logoServers.png')); ?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label>رقم الهوية: </label>
                        </div>        
                        <div class="col-md-8">
                            <input type="text" class="form-control identity_no" disabled readonly value="">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label>تاريخ انتهاء الهوية: </label>
                        </div>        
                        <div class="col-md-8">
                            <input type="text" class="form-control identity_end_date" disabled readonly value="">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label>صورة الهوية: </label>
                        </div>        
                        <div class="col-md-8">
                            <img class="identity_image" src="<?php echo e(asset('/assets/images/logoServers.png')); ?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label>رقم الشحنة: </label>
                        </div>        
                        <div class="col-md-8">
                            <input type="tel" class="form-control deliver_no" value="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success">انشاء العضوية</button>
            </div>
        </div>
    </div>
</div><?php /**PATH /var/www/Server/Projects/Edite2/Backend/resources/views/Partials/newMemberModal.blade.php ENDPATH**/ ?>