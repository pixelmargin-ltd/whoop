<h5>Shows only latest 20</h5>
<table class="table table-striped table-hover table-bordered" id="posted_request_table">
    <thead>
    <tr role="row">
        <th>
            Requested User
        </th>
        <th>
            Requested Date
        </th>
        <th>
            Home Button Address
        </th>
        <th>
            Verification Status
        </th>
        <th>

        </th>
    </tr>
    </thead>
    <tbody>
    <?php if(isset($requestByPostPosted)): ?>
        <?php $__currentLoopData = $requestByPostPosted; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pendingRequest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($pendingRequest['requested_by']['full_name']); ?></td>
                <td><?php echo e(date('d/M/Y',strtotime($pendingRequest['created_at']))); ?></td>
                <td><?php echo e($pendingRequest['requested_by']['home_button']['full_address_string']); ?></td>
                <td><?php echo e($pendingRequest['user_action_status']); ?></td>
                <td>
                    <a href="<?php echo e(route('home-button.request.revert',$pendingRequest['id'])); ?>"
                       class="btn btn-info btn-xs edit"><i class="fa fa-info"></i>
                        Revert</a>
                    <?php echo displayDeleteForm(route('home-button.request.destroy',$pendingRequest['id'])); ?>

                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    </tbody>
</table>