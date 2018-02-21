<?php $__env->startSection('title', 'Add New Message'); ?>
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
                                            Add New Message
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

                                                <?php echo Form::open(['name' => 'frmAddCategory', 'id' => 'frmAddCategory', 'files' => true, 'class' => 'form-horizontal', 'method' => 'post', 'enctype' => 'multipart/form-data', 'route' => 'messages.create']); ?>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label no-padding-right"
                                                           for="title">Title</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" id="title" name="title"
                                                               value="<?php echo e(isset($message)?$message['title']:''); ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label no-padding-right"
                                                           for="message">Message</label>
                                                    <div class="col-sm-10">
                                                        <textarea name="message" id="message"><?php echo e(isset($message)?$message['message']:''); ?></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label no-padding-right"
                                                           for="type">Type</label>
                                                    <div class="col-sm-10">
                                                        <select id="type" name="type">
                                                            <option>Default</option>
                                                            <option>Welcome</option>
                                                            <option>Pinned</option>
                                                            <option>Quote</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label no-padding-right"
                                                           for="icon">Icon</label>
                                                    <div class="col-sm-10">
                                                            <span class="file-input btn btn-azure btn-file">
                                                                <input type="file" name="icon" id="icon">
                                                            </span>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label no-padding-right"
                                                           for="users">User</label>
                                                    <div class="col-sm-10">
                                                        <select id="users" name="users">
                                                            <option>User 1</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-offset-2 col-sm-10">
                                                        <button type="submit" name="btnAddMessage" id="btnAddCategory"
                                                                class="btn btn-primary">Add
                                                        </button>
                                                        <button type="reset" name="btnCancelAdd" id="btnCancelAdd"
                                                                class="btn">Cancel
                                                        </button>
                                                    </div>
                                                </div>
                                                <?php echo Form::close(); ?>

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