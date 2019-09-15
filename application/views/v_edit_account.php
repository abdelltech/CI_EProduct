<form method="post" action="<?php echo site_url('users_c/validateFormUpdateAccount')?>">
    <div class="row">

        <input name="id"  type="hidden" value="<?php if(isset($id)) echo $id; ?>"/>
        
        <fieldset>
            <legend>Change Your Profile</legend>

            <!--<input name="id"  type="hidden" value=""  />-->

            <label>Login
                <input name="login"  type="text"  size="18" 	value="<?= set_value('login', $login);?>"  />
                <?= form_error('login');?>
            </label>

            <label>Password
                <input name="pass"  type="text"  size="18"  value="<?= set_value('pass', $pass);?>"  />
                <?= form_error('pass');?>
            </label>

            <label>Email
                <input name="email"  type="text"  size="18"  value="<?= set_value('email', $email);?>"  />
                <?= form_error('email');?>
            </label>

            <input class="button info" type="submit" name="btn_updateAccount" value="Update" />

        </fieldset>
    </div>
</form>