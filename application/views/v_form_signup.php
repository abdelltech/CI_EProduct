<form method="post" action="<?php echo site_url('users_c/validateFormSignup')?>">
    <div class="row">

        <input name="id"  type="hidden" value="<?php if(isset($id)) echo $id; ?>"/>
        
        <fieldset>
            <legend>Sign Up</legend>

            <!--<input name="id"  type="hidden" value=""  />-->

            <label>Login
                <input name="login"  type="text"  size="18"  autofocus 	  />
                <?= form_error('login');?>
            </label>

            <label>Password
                <input name="pass"  type="password"  size="18"   />
                <?= form_error('pass');?>
            </label>

            <label>Email
                <input name="email"  type="text"  size="18"    />
                <?= form_error('email');?>
            </label>

            <input class="button" type="submit"  value="Save" />

        </fieldset>
    </div>
</form>