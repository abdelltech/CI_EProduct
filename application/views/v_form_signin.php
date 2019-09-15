<br />

<div class="row">
	<div class="panel">
		
		<?php echo form_open('users_c/validateFormSignin'); ?>

		<label for="login">Login</label>
		<input type="text" name="login" value="<?php echo set_value('login');?>" autofocus />
		<?php echo form_error('login','<span class="error">',"</span>");?>

		<br />

		<label for="pass">Password</label>
		<input type="password" name="pass" value="<?= set_value('pass');?>" />
		<?php echo form_error('pass','<span class="error">',"</span>");?>

		<br />

		<input  class="button" type="submit" value="Connexion" />
		<?php if(isset($error))echo '<span class="error">'.$error."</span>";?>

		<?php echo form_close(); ?>
	</div>
</div>