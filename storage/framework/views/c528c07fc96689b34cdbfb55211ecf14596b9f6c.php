<?php $__env->startSection('content'); ?>
<div class="brand-logo">
    <img src="https://i.ibb.co/DpbskFt/Ud-Wangi-Agung.png" alt="logo">
</div>
<h4>Halo! selamat datang.</h4>
<h6 class="font-weight-light">Sign in untuk melanjutkan.</h6>

<form class="pt-3" action="<?php echo e(route('login')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <div class="form-group">
        <!-- <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email"> -->
        <input type="text" class="form-control form-control-lg <?php echo e($errors->has('username') || $errors->has('email') ?'is-invalid':''); ?>" name="login" value="<?php echo e(old('username') ? old('username') : old('email')); ?>" placeholder="Username or Email" required />
        <?php if($errors->has('username') || $errors->has('email')): ?>
            <span class="invalid-feedback">
                <strong><?php echo e($errors->first('username') ? $errors->first('username') : $errors->first('email')); ?></strong>
            </span>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <!-- <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password"> -->
        <input id="password" type="password" class="form-control form-control-lg <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="current-password" placeholder="Password">

        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="invalid-feedback" role="alert">
                <strong><?php echo e($message); ?></strong>
            </span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
    <div class="mt-3">
        <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
    </div>
</form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('auth.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/aditasyhari/Project Laravel/stok_barang_laravel-main/resources/views/auth/login.blade.php ENDPATH**/ ?>