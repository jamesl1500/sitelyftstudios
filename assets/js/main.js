$(function(){
    $.fn.Alert = function (message, type) {
        var t = $(this);
        if (message != "" && type != "") {
            if (t.hasClass('hidden')) {
                t.removeClass('hidden');
                if (t.hasClass('slideOutUp')) {
                    t.removeClass('slideOutUp');
                }
                t.addClass('slideInDown');
            }
            switch (type) {
                case 'error':
                    t.addClass('global_error');
                    t.html("<center><p><i class='fa fa-exclamation-circle'></i> " + message + "</p></center>");

                    setTimeout(function () {
                        t.removeClass('global_error');
                        t.addClass('hidden');
                    }, 4000);
                    break;
                case 'warning':
                    t.addClass('global_warning');
                    t.html("<center><p><i class='fa fa-exclamation-triangle'></i> " + message + "</p></center>");

                    setTimeout(function () {
                        t.removeClass('global_warning');
                        t.addClass('hidden');
                    }, 4000);
                    break;
                case 'success':
                    t.addClass('global_success');
                    t.html("<center><p><i class='fa fa-check-circle'></i> " + message + "</p></center>");

                    setTimeout(function () {
                        t.removeClass('global_success');
                        if (t.hasClass('slideInDown')) {
                            t.addClass('slideOutUp');
                            t.addClass('hidden');
                        }
                    }, 4000);
                    break;
            }
        }
    };
});