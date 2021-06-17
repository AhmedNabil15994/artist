<?php $__env->startSection('title','إعدادات لوحه التحكم'); ?>
<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('/assets/css/default-skin.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('/assets/css/photoswipe.css')); ?>">
<style type="text/css" media="screen">
    body{
        overflow-x: hidden;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sub-header'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="py-2 py-lg-6 subheader-transparent" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-1">
            <!--begin::Page Heading-->
            <div class="d-flex align-items-baseline flex-wrap mr-5">
                <!--begin::Page Title-->
                <h3 class="text-dark font-weight-bold my-1 mr-5 m-subheader__title--separator">إعدادات لوحه التحكم</h3>
                <!--end::Page Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item">
                        <a href="<?php echo e(URL::to('/')); ?>" class="text-muted"><i class="m-nav__link-icon la la-home"></i></a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="<?php echo e(URL::to('/panelSettings')); ?>" class="text-muted">إعدادات لوحه التحكم</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="<?php echo e(URL::current()); ?>" class="text-muted">تعديل</a>
                    </li>
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page Heading-->
        </div>
        <!--end::Info-->
        <!--begin::Toolbar-->
        <!--end::Toolbar-->
    </div>
</div>
<!--begin::Card-->
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <span class="card-icon">
                <i class="menu-icon flaticon-settings-1"></i>
            </span>
            <h3 class="card-label">تعديل</h3>
        </div>
    </div>
    <div class="card-body">
        <ul class="nav nav-tabs  m-tabs-line" role="tablist">
            <li class="nav-item m-tabs__item">
                <a class="nav-link m-tabs__link active" data-toggle="tab" href="#AddTabs" role="tab"><i class="la la-refresh"></i>حفظ</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="AddTabs" role="tabpanel">
                <form class="forms m-form m-form--group-seperator-dashed" method="POST" action="<?php echo e(URL::to('/generalSettings/update/2')); ?>">  
                    <?php echo csrf_field(); ?>
                    <?php $__currentLoopData = $data->data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item => $variable): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="form-group m-form__group row" style="padding-right: 0;padding-left: 0;padding-bottom: 10px;">
                        <div class="col-lg-12">
                            <label class="label label-danger label-pill label-inline mr-2 <?php echo e($item == 0 ? 'mt-15' : ''); ?>" style="margin-bottom: 20px;"><?php echo e($variable->key); ?></label>
                            <?php if($variable->var_type == 0): ?>
                            <input class="form-control" type="number" name="value<?php echo e($variable->id); ?>" value="<?php echo e($variable->value); ?>" maxlength="" placeholder="">
                            <?php elseif($variable->var_type == 4): ?>
                            <div class="form-group m-form__group row" style="padding-right: 0;padding-left: 0;padding-bottom: 10px;">
                                <div class="col-lg-12">
                                    <div class="dropzone dropzone-default" id="kt_dropzone_111" data-area="<?php echo e($variable->id); ?>">
                                        <div class="dropzone-msg dz-message needsclick">
                                            <h3 class="dropzone-msg-title"><i class="flaticon-upload-1 fa-4x"></i></h3>
                                            <span class="dropzone-msg-desc">اسحب الملفات هنا أو انقر هنا للرفع .</span>
                                        </div>
                                        <?php if($variable->value != ''): ?>
                                        <div class="dz-preview dz-image-preview" id="my-preview">  
                                            <div class="dz-image">
                                                <img alt="image" src="<?php echo e($variable->value); ?>">
                                            </div>  
                                            <div class="dz-details">
                                                <div class="dz-size">
                                                    <span><strong><?php echo e(\App\Models\Page::getPhotoSize($variable->value)); ?></strong></span>
                                                </div>
                                                <div class="dz-filename">
                                                    
                                                </div>
                                                <div class="PhotoBTNS">
                                                    <div class="my-gallery" itemscope="" itemtype="" data-pswp-uid="1">
                                                       <figure itemprop="associatedMedia" itemscope="" itemtype="">
                                                            <a href="<?php echo e($variable->value); ?>" itemprop="contentUrl" data-size="555x370"><i class="flaticon-search"></i></a>
                                                            <img src="<?php echo e($variable->value); ?>" itemprop="thumbnail" style="display: none;">
                                                        </figure>
                                                    </div>
                                                    <a class="DeletePhoto" data-area="<?php echo e($variable->id); ?>"><i class="flaticon-delete" data-name="<?php echo e($variable->value); ?>" data-clname="Photo"></i> </a>                                               
                                                </div>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <span class="m-form__help LastUpdate">تم الحفظ فى :  <?php echo e($variable->created_at); ?></span>
                        </div>
                    </div>   
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </form>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-6">
                <input name="Submit" type="submit" class="btn btn-success AddBTN " value="حفظ" id="SubmitBTN">
                
                <input type="reset" class="btn btn-danger Reset" value="مسح الحقول">
                <input name="Add" type="hidden" value="TRUE" id="SaveBTN">
            </div>
        </div>
    </div>
</div>
<!--end::Card-->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('modals'); ?>
<?php echo $__env->make('Partials.photoswipe_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('/assets/components/panelSettings.js')); ?>"></script>
<script src="<?php echo e(asset('/assets/js/photoswipe.min.js')); ?>"></script>
<script src="<?php echo e(asset('/assets/js/photoswipe-ui-default.min.js')); ?>"></script>
<script src="<?php echo e(asset('/assets/components/myPhotoSwipe.js')); ?>"></script>     
<?php $__env->stopSection(); ?>


<?php echo $__env->make('Layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/Server/Projects/Edite2/Backend/app/Modules/Variables/Views/panel.blade.php ENDPATH**/ ?>