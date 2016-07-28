<div class='mainSignupFullCont'>
    <!-- Login Cont -->
    <div class="signupContainer card card-default card-center col-lg-2 col-md-3 col-sm-4 col-xs-10">
        <div class="headEl text-center">
            <h3 class="f500">Forgot Password</h3>
        </div>
        <div class="middleSignupCont">
            <?php echo form_open('forgot_password/requestPasswordReset', array('id' => 'forgotPasswordMainRequestForm', 'action' => '')); ?>
            <div class="inputType col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <input type="text" id="sl_user_or_email" class="f500" name="sl_user_or_email" placeholder="Username or Email" />
            </div>
            <input type="submit" class="btn btn-full-width btn-primary btn-embossed" value="Recover Password" />
            </form>
        </div>
        <div class="bottomForm">
            <a href="<?php echo $base_url; ?>login" class="btn btn-embossed btn-full-width btn-default">Login</a>
        </div>
    </div>
</div>