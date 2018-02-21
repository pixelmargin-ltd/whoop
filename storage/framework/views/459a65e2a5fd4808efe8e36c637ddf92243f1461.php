<?php $__env->startSection('title', 'Request By Post List'); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.includes.navigation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="main-container container-fluid">
        <div class="page-container">
            <?php echo $__env->make('admin.includes.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="page-content">
                <div class="page-body">
                    <div class="row">
                        <div class="col-xs-12 col-md-12">
                            <div class="widget">

                                <div class="widget-header ">
                                    <span class="widget-caption">Request By Post List</span>
                                </div>

                                <div class="widget-body">
                                    <?php if(Session::has('success')): ?>
                                        <div class="alert alert-success fade in">
                                            <?php echo e(Session::get('success')); ?>

                                        </div>
                                    <?php endif; ?>
                                        <ul class="nav nav-tabs">
                                            <li class="active">
                                                <a data-toggle="tab" href="#cities">Pending</a>
                                            </li>
                                            <li>
                                                <a data-toggle="tab" href="#others">Posted</a>
                                            </li>
                                        </ul>

                                        <div class="tab-content">
                                            <div id="cities" class="tab-pane fade in active">
                                                <?php echo $__env->make('admin.home_button.partials.pending_table', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                            </div>
                                            <div id="others" class="tab-pane fade">
                                                <?php echo $__env->make('admin.home_button.partials.posted_table', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.baselayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>