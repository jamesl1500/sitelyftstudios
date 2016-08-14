$(function(){
    var work = false;

    if(window.location.hostname == "localhost") {
        var newURL = window.location.protocol + "//" + window.location.hostname + '/sitelyftstudios/';
    }else{
        var newURL = window.location.protocol + "//" + window.location.hostname + '/';
    }

    function removeAlerts(){
        $(".error").css('display', 'none').remove();
        $(".success").css('display', 'none').remove();
        $(".warning").css('display', 'none').remove();
    }

    $(document).on('submit', '#contactForm', function(){
       if(work != true)
       {
           work = true;

           removeAlerts();

           // Vars
           var fullname = $("#sl_c_fullname");
           var email = $("#sl_c_email");
           var subject = $("#sl_c_subject");
           var message = $("#sl_c_message");

           if (fullname.val() == "")
           {
               fullname.addClass('input-danger');
               work = false;
           }

           if (email.val() == "")
           {
               email.addClass('input-danger');
               work = false;
           }

           if (subject.val() == "")
           {
               subject.addClass('input-danger');
               work = false;
           }

           if (message.val() == "")
           {
               message.addClass('input-danger');
               work = false;
           }

           $.post(newURL + 'contact/contactFormProcess', {fullname: fullname.val(), email: email.val(), subject: subject.val(), message: message.val()}, function(data){
               var obj = jQuery.parseJSON(data);

               if(obj.code == 1)
               {
                   $(".responseHold").prepend("<div class='clearfix success'>" + obj.string + "</div>");
                   work = false;
               }else{
                   $(".responseHold").prepend("<div class='clearfix error'>" + obj.string + "</div>");
                   work = false;
               }
           });
       }
        return false;
    });
});