<div class='mainLoginFullCont'>
    <!-- Login Cont -->
    <div class="loginContainer card card-default card-center col-lg-2">
        <div class="headEl text-center">
            <h3 class="f500">Login</h3>
        </div>
        <div class="middleLoginCont">
            <?php
            if(isset($_GET['s']) && $_GET['s'] == 'act_success')
            {
                ?>
                    <div class='clearfix success'>Your account has been activated! Login now to make your first order!</div>
                <?php
            }
            ?>
            <?php echo form_open('login/loginProcess', array('id' => 'loginMainForm', 'action' => '')); ?>
                <div class="inputType">
                    <input type="email" class="f500" id="sl_email" name="sl_email" placeholder="Email" />
                </div>
                <div class="inputType">
                    <input type="password" class="f500" id="sl_password" name="sl_password" placeholder="Password" />
                </div>
                <input type="submit" class="btn btn-full-width btn-primary btn-embossed" value="Login" />
            </form>
        </div>
        <div class="bottomForm">
            <a href="<?php echo $base_url; ?>signup" class="btn btn-embossed btn-full-width btn-default">Signup Here!</a>
        </div>
    </div>
</div>