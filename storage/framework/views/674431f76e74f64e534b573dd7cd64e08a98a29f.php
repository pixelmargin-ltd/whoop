<?php use \App\Models\Admin\Messages\WizardMessage; ?>

<?php if(isset($wizardMessage)): ?>
    <?php $__env->startSection('title', 'Edit Wizard Message'); ?>
<?php else: ?>
    <?php $__env->startSection('title', 'Add New Wizard Message'); ?>
<?php endif; ?>
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
                                            <?php if(isset($wizardMessage)): ?>
                                                Edit Wizard Message
                                            <?php else: ?>
                                                Add New Wizard Message
                                            <?php endif; ?>
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
                                                <?php
                                                if (isset($wizardMessage)) {
                                                    $action = route('wizard_messages.update',
                                                        $wizardMessage['id']);
                                                } else {
                                                    $action = route('wizard_messages.store');
                                                }
                                                ?>
                                                <form class="form" action="<?php echo e($action); ?>"
                                                      method="post" enctype="multipart/form-data">
                                                    <?php echo e(csrf_field()); ?>

                                                    <?php if(isset($wizardMessage)): ?>
                                                        <input type="hidden" name="_method" value="PUT">
                                                    <?php endif; ?>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label no-padding-right"
                                                               for="title">Title</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" id="title"
                                                                   name="title" value="<?php echo e(isset($wizardMessage)
                                                                      ?$wizardMessage['title']:''); ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label no-padding-right"
                                                               for="message">Message</label>
                                                        <div class="col-sm-10">
                                                            <textarea name="message" class="form-control"
                                                                      id="message" rows="5"><?php echo e(isset($wizardMessage)
                                                                      ?$wizardMessage['message']:''); ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label no-padding-right"
                                                               for="icon">Icon</label>
                                                        <div class="col-sm-10">
                                                            <?php if(isset($wizardMessage)): ?>
                                                                <img src="<?php echo e(getImageUrl(
                                                                basename($wizardMessage['icon']),
                                                                WizardMessage::ICON_PATH)); ?>"
                                                                     width="50px">
                                                            <?php endif; ?>
                                                            <span class="file-input btn btn-azure btn-file">
                                                                <input type="file" name="icon" id="icon">
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10">
                                                            <button type="submit" name="submitWizardMessage"
                                                                    id="submitWizardMessage"
                                                                    class="btn btn-primary">
                                                                <?php echo e(isset($wizardMessage)?'Update':'Add'); ?>

                                                            </button>
                                                            <button type="reset" name="btnCancelAdd"
                                                                    id="btnCancelAdd" class="btn">Cancel
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