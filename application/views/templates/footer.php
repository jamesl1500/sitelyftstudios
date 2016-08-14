<script src="<?php echo site_url('assets/js/jquery.js'); ?>" type="text/javascript"></script>
<script src="<?php echo site_url('assets/js/bootstrap.js'); ?>" type="text/javascript"></script>
<script>
    $(function($) {
        // this script needs to be loaded on every page where an ajax POST may happen
        $.ajaxSetup({
            data: {
                '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
            }
        });
    });
</script>
<?php if(isset($javascript) && $javascript != ""){ ?>
    <script src="<?php echo site_url('assets/js/pages/'.$javascript.'.js'); ?>" type="text/javascript"></script>
<?php } ?>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-82435788-1', 'auto');
    ga('send', 'pageview');

</script>
</body>
</html>