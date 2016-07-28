<div class='mainSignupFullCont'>
    <!-- Login Cont -->
    <div class="signupContainer card card-default card-center col-lg-2 col-md-3 col-sm-4 col-xs-10">
        <div class="headEl text-center">
            <h3 class="f500">Change Password</h3>
        </div>
        <div class="middleSignupCont">
            <?php echo form_open('forgot_password/requestPasswordReset', array('id' => 'forgotPasswordChangeForm', 'action' => '')); ?>
            <div class="inputType col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <input type="text" id="sl_password" class="f500" name="sl_password" placeholder="New Password" />
            </div>
            <div class="inputType col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <input type="text" id="sl_password_confirm" class="f500" name="sl_password_confirm" placeholder="Confirm password" />
            </div>
            <input type="submit" class="btn btn-full-width btn-primary btn-embossed" value="Change Password" />
            </form>
        </div>
        <div class="bottomForm">
            <a href="<?php echo $base_url; ?>login" class="btn btn-embossed btn-full-width btn-default">Login</a>
        </div>
    </div>
</div>