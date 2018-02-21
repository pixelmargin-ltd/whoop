<?php

use \App\Models\Admin\Messages\WelcomeMessage;
use \App\Http\Controllers\Admin\Message\MessageController;

?>

<?php $__env->startSection('title', 'Welcome Message List'); ?>
<?php $__env->startSection('content'); ?>
    <style>
        .ui-sortable-helper {
            display: table;
        }
    </style>
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
                                    <span class="widget-caption">
                                        <a href="<?php echo e(route('welcome_messages.create')); ?>"
                                           class="btn btn-default btn-xs shiny icon-only blue addnewbtn">
                                            <i class="fa fa-plus"></i>
                                        </a>&nbsp;
                                        Welcome Message List
                                    </span>
                                </div>

                                <div class="widget-body">
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
                                    <?php if(is_array($welcomeMessages) && count($welcomeMessages) > 0): ?>
                                        <table class="table table-striped table-hover table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Icon</th>
                                                <th>Title</th>
                                                <th>Sub-title</th>
                                                <th>Message</th>
                                                <th>Status (Active/Disabled)</th>
                                                <th>Options</th>
                                                <th>Sort</th>
                                            </tr>
                                            </thead>
                                            <tbody id="sortable">
                                            <?php $__currentLoopData = $welcomeMessages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $welcomeMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr data-id="<?php echo e($welcomeMessage['id']); ?>">
                                                    <td width="60px">
                                                        <img src="<?php echo e(getImageUrl(basename($welcomeMessage['icon']),WelcomeMessage::ICON_PATH)); ?>"
                                                             width="50px"></td>
                                                    <td><?php echo e($welcomeMessage['title']); ?></td>
                                                    <td><?php echo e($welcomeMessage['sub_title']); ?></td>
                                                    <td><?php echo e($welcomeMessage['message']); ?></td>
                                                    <td width="200px">
                                                        <label class="switch">
                                                            <input type="checkbox" id="messageStatusUpdate"
                                                                   data-id="<?php echo e($welcomeMessage['id']); ?>"
                                                                    <?php echo e($welcomeMessage['status'] === MessageController::STATUS_ACTIVE?'checked':''); ?>>
                                                            <span class="slider"></span>
                                                        </label>
                                                    </td>
                                                    <td width="200px">
                                                        <a href="<?php echo e(route('welcome_messages.edit',$welcomeMessage['id'])); ?>"
                                                           class="btn btn-info btn-xs edit">
                                                            <i class="fa fa-edit"></i> Edit</a>
                                                        <?php echo displayDeleteForm(route('welcome_messages.destroy',$welcomeMessage['id'])); ?>

                                                    </td>
                                                    <td width="50px">
                                                        <span class="ui-icon ui-icon-arrowthick-2-n-s">
                                                        </span>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    <?php else: ?>
                                        <h2>No welcome messages to display</h2>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-script'); ?>
    <script>
        $(function () {
            $("#sortable").sortable({
                update: function (event, ui) {
                    var data = {};
                    $.each($(this).find('tr'), function (index, element) {
                        var messageID = $(element).data('id');
                        data[messageID] = index;
                    });

                    $.post('<?php echo e(route('message_center.sort_update')); ?>', {
                        _token: "<?php echo e(csrf_token()); ?>",
                        _method: "PUT",
                        data: data,
                        model: 'WelcomeMessage'
                    }).done(function (response) {
                        response = JSON.parse(response);
                        if (response.status !== 'Success') {
                            alert('Sort Order Update Failed.');
                        }
                    }).fail(function (response) {
                        alert('Sort Order Update Failed.');
                    });
                }
            });
            $("#sortable").disableSelection();

            $('.switch .slider').click(function () {
                var checkBox = $(this).parents('.switch').find('input[type="checkbox"]');
                $.post('<?php echo e(route('message_center.status_update')); ?>', {
                    _token: "<?php echo e(csrf_token()); ?>",
                    _method: "PUT",
                    status: checkBox.prop('checked'),
                    id: checkBox.data('id'),
                    model: 'WelcomeMessage'
                }).done(function (response) {
                    response = JSON.parse(response);
                    if (response.status !== 'Success') {
                        alert('Status Update Failed.');
                    }
                }).fail(function (response) {
                    alert('Status Update Failed.');
                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.baselayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>