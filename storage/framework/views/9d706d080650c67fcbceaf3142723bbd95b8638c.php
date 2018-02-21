<?php $__env->startSection('title', 'User Profile'); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('admin.includes.navigation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="main-container container-fluid addarticle">
   <!-- Page Container -->
   <div class="page-container">
      <?php echo $__env->make('admin.includes.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
      <!-- Page Content -->
      <div class="page-content">
         <div class="row">
            <div class="col-md-12">
               <?php if(isset($user)): ?>
               <div class="profile-container">
                  <div class="profile-header row">
                     
                     <div class="col-lg-2 col-md-4 col-sm-12 text-center">
                        <?php if(isset($user['photo'])): ?>
                        <img src="<?php echo e(asset('/upload/user/'.$user['photo'])); ?>" alt="" class="header-avatar">
                        <?php else: ?>
                        <img src="<?php echo e(asset('/upload/user/no-user.jpg')); ?>" alt="" class="header-avatar">
                        <?php endif; ?>
                     </div>
                     
                     <div class="col-lg-5 col-md-8 col-sm-12 profile-info">
                        <div class="header-fullname"><?php echo e($user['firstname']." ".$user['lastname']); ?></div>
                        <div class="header-information">
                           <?php if(isset($user['token_id'])): ?>
                           <div class="row">
                              <div class="col-md-4"><b>USER ID:</b></div>
                              <div class="col-md-8"><?php echo e($user['token_id']); ?></div>
                           </div>
                           <?php endif; ?>
                           <?php if(isset($user['email'])): ?>
                           <div class="row">
                              <div class="col-md-4"><b>Email:</b></div>
                              <div class="col-md-8"><?php echo e($user['email']); ?></div>
                           </div>
                           <?php endif; ?>
                           <?php if(isset($user['mobile'])): ?>
                           <div class="row">
                              <div class="col-md-4"><b>Contact:</b></div>
                              <div class="col-md-8"><?php echo e($user['mobile']); ?></div>
                           </div>
                           <?php endif; ?>
                           <?php if(isset($user['zipcode'])): ?>
                           <div class="row">
                              <div class="col-md-4"><b>Zip Code:</b></div>
                              <div class="col-md-8"><?php echo e($user['zipcode']); ?></div>
                           </div>
                           <?php endif; ?>
                           <?php if(isset($user['address'])): ?>
                           <div class="row">
                              <div class="col-md-4"><b>Address:</b></div>
                              <div class="col-md-8"><?php echo e($user['address']); ?></div>
                           </div>
                           <?php endif; ?>
                        </div>
                     </div>
                     <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12 profile-stats">
                        <div class="row">
                           <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 stats-col">
                              <div class="stats-value pink"><?php echo e($deals_left); ?></div>
                              <div class="stats-title">DEALS LEFT</div>
                           </div>
                           <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 stats-col">
                              <div class="stats-value pink"><?php echo e($unlocked_deals); ?></div>
                              <div class="stats-title">UNLOCKED DEALS</div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <?php endif; ?>
            </div>
         </div>
      </div>
      <!-- /Page Content -->
   </div>
   <!-- /Page Container -->
   <!-- Main Container -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.baselayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>