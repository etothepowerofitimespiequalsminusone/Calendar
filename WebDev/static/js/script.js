// switch between login and sign up forms animations, with option for mobile screens
$(document).ready(function () {
    $('#btn-login').click(function () {
        if($(window).width() > 530)
        {
            $('#signup-form').fadeOut({queue: false, duration: 600});
            $('#login-form').delay(600).fadeIn(700);
            $('#form-container').animate(
                {
                    "left": "48%",
                    "right": "1em"
                }, 1200);
        }else{
            $('#signup-form').fadeOut(100);
            $('#login-form').fadeIn(100);
        }
    });
});
$(document).ready(function () {
    $('#btn-signup').click(function () {
        if ($(window).width() > 530){
            $('#login-form').fadeOut({queue: false, duration: 600});
            $('#signup-form').delay(600).fadeIn(600);
            $('#form-container').animate(
                {
                    "left": "1em",
                    "right": "48%"
                }, 1200);
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
        $('label[for='+inputID+']').css({color:"rgb(132,149,183)", "text-transform": "uppercase","font-size":"x-small"});
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


// var signup = document.getElementById('btn-signup');
// var login = document.getElementById('btn-login');
// var signupForm = document.getElementById('signup-form');
// var loginForm = document.getElementById('login-form');
// var formContainer = document.getElementById('form-container');
// signup.addEventListener("click",function () {
//
// });




// var input = document.getElementsByTagName('input:nth-child(4n+4)');
// input.addEventListener("focus",function () {
//     alert("this works!");
// });



    // $(document).ready(function () {
    //     $('input').focus(function () {
    //         $(this).next().;
    //     });
    // });

// function validate(){
//     var request;
//     request = new ajaxRequest();
//     request.open("GET","checkemail.php",true);
//
//     request.onreadystatechange = function () {
//         if(this.readyState == 4)
//             if(this.status == 200)
//             {
//
//             }
//     }
//     request.send();
// }
//
// function ajaxRequest()
// {
//     try{var request = new XMLHttpRequest()}
//     catch(e1){
//         try{request = new ActiveXObject("Msxml2.XMLHTTP")}
//         catch(e2){
//             try{request = new ActiveXObject("Microsoft.XMLHTTP")}
//             catch(e3){
//                 request = false;
//             }}}
//     return request;
// }

// $(document).ready(function () {
//     $('input').focus(function () {
//         $('').attr("src","static/img/active/lock.png")
//     });
//
// });


// move towards middle and fadeOut
//once reaches middle fade in other and move to right place


