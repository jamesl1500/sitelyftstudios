<?php
/*
 * This files will server as the header templating system for the enitre site!
 */
class Header
{
    protected $default = 'index';
    public static $base_url = 'http://localhost/sitelyftstudios/';

    static public function render($page, $theme = 'transparent-logged-out')
    {
        if(!empty($page) && !empty($theme))
        {
            // Switch between the themes
            switch($page)
            {
                case 'index':
                case 'about':
                case 'signup':
                case 'forgot_password':
                    ?>
                        <header class="navbar navbar-logged-out full-navbar-background navbar-fixed-top">
                            <div class="navbar-inner container">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav-link-holder" aria-expanded="false">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                    <a class="navbar-brand" href="<?php echo self::$base_url; ?>">
                                        <!--<div class="logo">
                                            <div class="topLogo">
                                                <h3 class="f500">Sitelyft</h3>
                                            </div>
                                            <div class="bottomLogo">
                                                <h4 class="f500">Studios</h4>
                                            </div>
                                        </div>-->
                                        <img src="<?php echo base_url('assets/images/icons/sitelyft-circle-logo.png'); ?>" />
                                    </a>
                                </div>
                                <div class="nav-links-right collapse navbar-collapse" id="main-nav-link-holder">
                                    <ul class="nav navbar-nav navbar-right">
                                        <li><a href="<?php echo self::$base_url; ?>about_us">About Us</a></li>
                                        <li><a href="<?php echo self::$base_url; ?>our_services">Our Services</a></li>
                                        <li><a href="<?php echo self::$base_url; ?>pricing">Pricing</a></li>
                                        <li><a href="<?php echo self::$base_url; ?>pricing">Contact Us</a></li>
                                    </ul>
                                </div>
                            </div>
                        </header>
                    <?php
                break;
                case 'dashboard':
                    ?>
                        <!-- Main Header -->
                        <header class="navbar navbar-logged-in full-navbar-background navbar-fixed-top">
                            <div class="navbar-inner container-fluid">
                                <div class="navbar-left-header">
                                    <a class="navbar-brand" href="<?php echo self::$base_url; ?>">
                                        
                                    </a>
                                </div>
                            </div>
                        </header>

                        <!-- Sidebar -->
                        <aside class="sidebar main-sidebar pull-left">

                        </aside>
                    <?php
                break;
            }
        }
    }
}