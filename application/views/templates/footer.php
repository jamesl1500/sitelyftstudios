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
</body>
</html>