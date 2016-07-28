$(function(){
    var work = false;
    var site_url = 'http://localhost/sitelyftstudios/';
    
    function removeAlerts(){
        $(".error").css('display', 'none').remove();
        $(".success").css('display', 'none').remove();
        $(".warning").css('display', 'none').remove();
    }
    
    $(document).on('submit','#signupMainForm', function()
    {
       if(work == false)
       {
           work = true;
           
           removeAlerts();
           
           var firstname = $("#sl_firstname");
           var lastname = $("#sl_lastname");
           var username = $("#sl_username");
           var email = $("#sl_email");
           var password = $("#sl_password");
           var confirm_pass = $("#sl_password_confirm");

           if (firstname.val() == "")
           {
               firstname.addClass('input-danger');
               work = false;
           }

           if (lastname.val() == "")
           {
               lastname.addClass('input-danger');
               work = false;
           }

           if (username.val() == "")
           {
               username.addClass('input-danger');
               work = false;
           }

           if (email.val() == "")
           {
               email.addClass('input-danger');
               work = false;
           }

           if (password.val() == "")
           {
               password.addClass('input-danger');
               work = false;
           }

           if (confirm_pass.val() == "")
           {
               confirm_pass.addClass('input-danger');
               work = false;
           }

           if(firstname.val() != "" && lastname.val() != "" && username.val() != "" && email.val() != "" && password.val() != "" && confirm_pass.val() != "")
           {
               $.post(site_url + 'signup/signupProcess', {firstname: firstname.val(), lastname: lastname.val(), username: username.val(), email: email.val(), password: password.val(), confirm_password: confirm_pass.val()}, function(data){
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
               $(".middleSignupCont").prepend("<div class='clearfix error'>Please fill in all of the fields!</div>");
               work = false;
           }
       }
       return false;
    });
});