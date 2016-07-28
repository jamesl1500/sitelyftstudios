<div class='mainSignupFullCont'>
    <!-- Login Cont -->
    <div class="signupContainer card card-default card-center col-lg-2 col-md-3 col-sm-4 col-xs-10">
        <div class="headEl text-center">
            <h3 class="f500">Signup</h3>
        </div>
        <div class="middleSignupCont">
            <?php echo form_open('signup/signupProcess', array('id' => 'signupMainForm', 'action' => '')); ?>
            <div class="topSideBySide">
                <div class="inputType f col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-left">
                    <input type="text" class="f500" id="sl_firstname" name="sl_firstname" placeholder="Firstname" />
                </div>
                <div class="inputType l col-lg-6 col-md-6 col-sm-6 col-xs-12 col-lg-6 pull-right">
                    <input type="text" class="f500" id="sl_lastname" name="sl_lastname" placeholder="Lastname" />
                </div>
            </div>
            <div class="inputType col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <input type="text" id="sl_username" class="f500" name="sl_username" placeholder="Username" />
            </div>
            <div class="inputType col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <input type="email" id="sl_email" class="f500" name="sl_email" placeholder="Email" />
            </div>
            <div class="topSideBySide">
                <div class="inputType f col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-left">
                    <input type="password" id="sl_password" class="f500" name="sl_password" placeholder="Password" />
                </div>
                <div class="inputType l col-lg-6 col-md-6 col-sm-6 col-xs-12 col-lg-6 pull-right">
                    <input type="password" id="sl_password_confirm" class="f500" name="sl_password_confirm" placeholder="Confirm" />
                </div>
            </div>
            <input type="submit" class="btn btn-full-width btn-primary btn-embossed" value="Signup" />
            </form>
        </div>
        <div class="bottomForm">
            <a href="<?php echo $base_url; ?>forgot_password" class="btn btn-embossed btn-full-width btn-default">Forgot Password</a>
        </div>
    </div>
</div>