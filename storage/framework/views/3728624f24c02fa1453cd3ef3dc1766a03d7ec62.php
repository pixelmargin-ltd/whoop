<?php $__env->startSection('title', 'Messages List'); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.includes.navigation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <style>
        
        .message_icon {
            width: 40px;
            height: 40px;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            border-radius: 50%;
        }
    </style>
    <div class="main-container container-fluid">
        <div class="page-container">
            <?php echo $__env->make('admin.includes.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="page-content">
                <div class="page-body">
                    <div class="row">
                        <div class="col-xs-12 col-md-12">
                            <div class="widget">
                                <div class="widget-header ">
                                    <span class="widget-caption">
                                        <a href="<?php echo e(route('messages.create')); ?>"
                                           class="btn btn-default btn-xs shiny icon-only blue addnewbtn">
                                            <i class="fa fa-plus"></i>
                                        </a>&nbsp;
                                        Messages List
                                    </span>
                                </div>

                                <div class="widget-body">
                                    <?php if(Session::has('success')): ?>
                                        <div class="alert alert-success fade in">
                                            <?php echo e(Session::pull('success')); ?>

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
                                    <table class="table table-striped table-hover table-bordered" id="usertable">
                                        <thead>
                                        <tr role="row">
                                            <th>
                                                Title
                                            </th>
                                            <th>
                                                Message
                                            </th>
                                            <th>
                                                Type
                                            </th>
                                            <th>
                                                Icon
                                            </th>
                                            <th>
                                                User
                                            </th>
                                            <th>
                                                Options
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if(isset($messages)): ?>
                                            <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr role="row">
                                                    <td>
                                                        <?php echo $message['title']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $message['message']; ?>

                                                    </td>
                                                    <td>
                                                        <?php echo $message['type']; ?>

                                                    </td>
                                                    <td>
                                                        <img class="message_icon"
                                                             src="<?php echo $message['icon_url']; ?>">
                                                    </td>
                                                    <td>
                                                        <?php echo $message['user']->full_name; ?>

                                                    </td>
                                                    <td>
                                                        <a href="<?php echo e(route('messages.edit',
                                                      ['id'=>$message['id']])); ?>"
                                                           class="btn btn-info btn-xs edit">
                                                            <i class="fa fa-edit"></i>
                                                            Edit
                                                        </a>
                                                        <?php echo displayDeleteForm(route('messages.destroy',['id'=>$message['id']])); ?>

                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                        </tbody>
                                    </table>
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