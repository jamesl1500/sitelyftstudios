$(function(){
    var work = false;
    var site_url = 'http://localhost/sitelyftstudios/';

    function removeAlerts(){
        $(".error").css('display', 'none').remove();
        $(".success").css('display', 'none').remove();
        $(".warning").css('display', 'none').remove();
    }

    // For the main stuff
    $(document).on('submit', '#forgotPasswordMainRequestForm', function(){
        if(work == false)
        {
            work = true;

            removeAlerts();

            var username_or_email = $("#sl_user_or_email");

            if (username_or_email.val() == "")
            {
                username_or_email.addClass('input-danger');
                work = false;
            }

            if(username_or_email != "")
            {
                $.post(site_url + 'forgot_password/requestPasswordReset', {username_or_email: username_or_email.val()}, function(data){
                    var obj = jQuery.parseJSON(data);

                    if(obj.code == 1)
                    {
                        $(".middleSignupCont").prepend("<div class='clearfix success'>" + obj.string + "</div>");
                        work = false;
                    }else
                    {
                        $(".middleSignupCont").prepend("<div class='clearfix error'>" + obj.string + "</div>");
                        work = false;
                    }
                });
            }else{
                work = false;
            }
        }
        return false;
    });
});