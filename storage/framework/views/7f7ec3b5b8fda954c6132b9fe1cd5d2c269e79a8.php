<?php $__env->startSection('content'); ?>
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
                                            Add New Quote Message
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
                                                <?php echo Form::open(['name' => 'frmAddQuoteMessage', 'id' => 'frmAddQuoteMessage', 'files' => true, 'class' => 'form-horizontal', 'method' => 'post', 'enctype' => 'multipart/form-data', 'route' => 'quote-messages.add']); ?>

                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label no-padding-right"
                                                               for="title"></label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="typeahead form-control search_user" id="search_user" name="search_user" placeholder="Search by First Name, Last Name or Zipcode">
                                                            <div class="user-data"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label no-padding-right"
                                                               for="title">Title</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="title" name="title">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label no-padding-right"
                                                               for="title">Sub Heading</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="sub_heading" name="sub_heading">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label no-padding-right"
                                                               for="title">Job Title</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="job_title" name="job_title">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label no-padding-right" for="message">Message</label>
                                                        <div class="col-sm-10">
                                                            <textarea name="message" class="form-control" id="message" rows="5"></textarea>
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
                                                               for="title">Normal Price</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="normal_price" name="normal_price">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label no-padding-right"
                                                               for="title">Whoop! Me Happy Price</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="whoop_price" name="whoop_price">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10">
                                                            <button type="submit" name="submitQuoteMessage" id="submitQuoteMessage" class="btn btn-primary">Add</button>
                                                            <button type="reset" name="btnCancelAdd"
                                                                    id="btnCancelAdd" class="btn">Cancel
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