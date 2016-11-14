// switch between login and sign up forms animations, with option for mobile screens
$(document).ready(function () {
    $('#btn-login').click(function () {
        if($(window).width() > 530)
        {
            $('#signup-form').fadeOut({queue: false, duration: 400});
            $('#login-form').delay(400).fadeIn(400);
            $('#form-container').animate(
                {
                    "left": "48%",
                    "right": "1em"
                }, 800);
        }else{
            $('#signup-form').fadeOut(100);
            $('#login-form').fadeIn(100);
        }
    });
});
$(document).ready(function () {
    $('#btn-signup').click(function () {
        if ($(window).width() > 530){
            $('#login-form').fadeOut({queue: false, duration: 400});
            $('#signup-form').delay(400).fadeIn(400);
            $('#form-container').animate(
                {
                    "left": "1em",
                    "right": "48%"
                }, 800);
        }else{
            $('#login-form').fadeOut(100);
            $('#signup-form').fadeIn(100);
        }
    });
});
//in case of page reload, the previously active form is displayed
$(document).ready(function () {
    var hash = window.location.hash;
    if(hash == '#login')
    {
        // alert(hash);
    }
    else if(hash == '#signup')
    {
        $('#login-form').css("display","none");
        $('#form-container').css("right","48%");
        $('#signup-form').css("display", "block");
    }
});

//input focus styles
$(document).ready(function () {
    $('input:nth-child(4n+4)').focus(function () {
        var inputID = this.id;
        $('.'+inputID).css("display","none");
        $('.active'+inputID).css("display","inline");
        $('label[for='+inputID+']').css({color:"rgb(132,149,183)", "text-transform": "uppercase","font-size":"small"});
    }).blur(function () {
        var inputID = this.id;
        $('.active'+inputID).css("display","none");
        $('.'+inputID).css("display","inline");
        $('label[for='+inputID+']').css(
            {
                "color":"rgb(179,188,209)",
                "text-transform": "capitalize",
                "font-size": "inherit"
            });
    });
});


