<h3><?php echo __('Reset Password', 'users') ?></h3>
<hr>

<?php if (Notification::get('success')) Alert::success(Notification::get('success')); ?>
<?php if (Notification::get('error'))   Alert::success(Notification::get('error')); ?>

<div class="row">
	<div class="col-md-3">
		<form method="post">

		<?php echo (Form::hidden('csrf', Security::token())); ?>

		<div class="form-group">
			<label><?php echo __('Username', 'users'); ?></label>
			<input type="text" value="<?php echo $user_login; ?>" name="login" class="form-control">
			<?php
			    if (isset($errors['users_user_doesnt_exists'])) echo Html::nbsp(3).'<span class="error">'.$errors['users_user_doesnt_exists'].'</span>';
			    if (isset($errors['users_empty_field'])) echo Html::nbsp(3).'<span class="error">'.$errors['users_empty_field'].'</span>';
			?>
		</div>

		<?php if (Option::get('captcha_installed') == 'true') { ?>
		<div class="form-group">
			<label><?php echo __('Captcha', 'users'); ?></label>
			<input type="text" name="answer" class="form-control"><?php if (isset($errors['users_captcha_wrong'])) echo Html::nbsp(3).'<span class="error">'.$errors['users_captcha_wrong'].'</span>'; ?>
			<br>
			<?php CryptCaptcha::draw(); ?>
		</div>
		<?php } ?>

		<div class="form-group">
			<input type="submit" class="btn btn-primary" value="<?php echo __('Send New Password', 'users'); ?>" name="reset_password_submit">
		</div>
		</form>
	</div>
</div>