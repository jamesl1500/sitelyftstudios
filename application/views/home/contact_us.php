<div class="mainBanner">
    <div class="coverfill cover">
        <div class="innerMainbanner container">
            <div class="topBrandTell">
                <h3 class="f300">Contact Us</h3>
            </div>
        </div>
    </div>
</div>
<div class="mainContainer firstCont container">
    <div class="middleDesk">
        <p>We are here to help and we welcome anyone to reach out to us. Feel free to ask us anything about our services, prices, or any inquires you may have. We will try to get back to you as soon as possible!</p>
    </div>
</div>
<div class="holder secondCont container">
    <div class="h1 pull-left col-lg-8">
        <div class="blocks contact-left-form clearfix">
            <div class="topHead">
                <h3 class="f500">Shoot us a message!</h3>
            </div>
            <div class="formHolder col-lg-8">
                <?php echo form_open('contact/contactProcess', array('id' => 'contactForm', 'action' => '')); ?>
                    <div class="inputType">
                        <input type="text" class="f500" id="sl_c_fullname" name="sl_c_fullname" placeholder="Full Name" />
                    </div>
                    <div class="inputType">
                        <input type="email" class="f500" id="sl_c_email" name="sl_c_email" placeholder="Email" />
                    </div>
                    <div class="inputType">
                        <input type="text" class="f500" id="sl_c_subject" name="sl_c_subject" placeholder="Subject" />
                    </div>
                    <div class="inputType">
                        <textarea class="f500" id="sl_c_message" name="sl_c_message" placeholder="Message"></textarea>
                    </div>
                    <div class="responseHold"></div>
                    <input type="submit" class="btn btn-wide btn-primary btn-embossed" value="Send" />
                <?php echo '</form>'; ?>
            </div>
        </div>
    </div>
    <div class="h2 pull-right col-lg-4">
        <div class="blocks contact-right-info">
            <h3 class="f500">Where to reach us</h3>
            <div class="content-hold">
                <ul>
                    <li><span class="f500">Email: </span> <span class="f300">james@sitelyftstudios.com</span></li>
                    <li><span class="f500">Phone Number: </span> <span class="f300">216-889-7822</span></li>
                    <li><span class="f500">Address: </span> <span class="f300">Lorain Ohio, 44053</span></li>
                </ul>
            </div>
        </div>
    </div>
</div>