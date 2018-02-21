<?php use \App\Models\Admin\Cities; ?>

<?php $__env->startSection('title', 'Edit City'); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.includes.navigation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="main-container container-fluid addarticle">
        <!-- Page Container -->
        <div class="page-container">
            <?php echo $__env->make('admin.includes.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
            <!-- Page Content -->
            <div class="page-content">
                <div class="page-body">
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-xs-12">
                            <div class="well invoice-container">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <h3 class="">
                                            <i class="fa fa-check"></i>
                                            Edit City
                                        </h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-xs-12">
                                        <div class="widget">
                                            <div class="">
                                                <?php if(Session::has('success')): ?>
                                                    <div class="alert alert-success fade in">
                                                        <?php echo e(Session::get('success')); ?>

                                                    </div>
                                                <?php endif; ?>
                                                <?php if(count($errors) > 0): ?>
                                                    <div class="alert alert-danger fade in">
                                                        <ul>
                                                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <li><?php echo e($error); ?></li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </ul>
                                                    </div>
                                                <?php endif; ?>
                                                <form action="<?php echo e(route('cities.update',$city['id'])); ?>"
                                                      method="post" enctype="multipart/form-data">
                                                    <?php echo e(csrf_field()); ?>

                                                    <input type="hidden" name="_method" value="PUT">
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label no-padding-right"
                                                               for="name">Name</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" id="name" name="name"
                                                                   value="<?php echo e($city['name']); ?>" disabled>
                                                        </div>
                                                    </div><div class="form-group">
                                                        <label class="col-sm-2 control-label no-padding-right"
                                                               for="credits_left">Credits Left</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" id="credits_left"
                                                                   name="credits_left" type="number"
                                                                   value="<?php echo e($city['credits_left']); ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label no-padding-right"
                                                               for="credits_total">Credits Total</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" id="credits_total"
                                                                   name="credits_total" type="number"
                                                                   value="<?php echo e($city['credits_total']); ?>">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label no-padding-right" for="inputEmail3">Image</label>
                                                        <div class="col-sm-10">
                                                            <img src="<?php echo e(getImageUrl($city['name'].'.'.Cities::IMG_EXTENSION,
                                                        'cities')); ?>"
                                                                 width="100">
                                                            <span class="file-input btn btn-azure btn-file">
                                                                <input type="file" name="image" id="image">
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10">
                                                            <button type="submit" name="btnAddDeal" id="btnAddDeal"
                                                                    class="btn btn-primary">Update
                                                            </button>
                                                            <button type="reset" name="btnCancelAdd" id="btnCancelAdd"
                                                                    class="btn">Cancel
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Page Body -->
            </div>
            <!-- /Page Content -->
        </div>
        <!-- /Page Container -->
        <!-- Main Container -->

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.baselayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>