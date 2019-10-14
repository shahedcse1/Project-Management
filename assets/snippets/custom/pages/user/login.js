$(document).ready(function () {
    $('#user-alert').hide();
    $('#signup_alert').hide();
});

var SnippetLogin = function () {
    var e = $("#m_login"), i = function (e, i, a) {
        var l = $('<div class="m-alert m-alert--outline alert alert-' + i + ' alert-dismissible" role="alert">\t\t\t<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>\t\t\t<span></span>\t\t</div>');
        e.find(".alert").remove(), l.prependTo(e), mUtil.animateClass(l[0], "fadeIn animated"), l.find("span").html(a)
    }, a = function () {
        e.removeClass("m-login--forget-password"), e.removeClass("m-login--signup"), e.addClass("m-login--signin"), mUtil.animateClass(e.find(".m-login__signin")[0], "flipInX animated")
    }, l = function () {
        $("#m_login_forget_password").click(function (i) {
            i.preventDefault(), e.removeClass("m-login--signin"), e.removeClass("m-login--signup"), e.addClass("m-login--forget-password"), mUtil.animateClass(e.find(".m-login__forget-password")[0], "flipInX animated")
        }), $("#m_login_forget_password_cancel").click(function (e) {
            e.preventDefault(), a()
        }), $("#m_login_signup").click(function (i) {
            i.preventDefault(), e.removeClass("m-login--forget-password"), e.removeClass("m-login--signin"), e.addClass("m-login--signup"), mUtil.animateClass(e.find(".m-login__signup")[0], "flipInX animated")
        }), $("#m_login_signup_cancel").click(function (e) {
            e.preventDefault(), a()
        })
    };
    return {
        init: function () {
            l(), $("#m_login_signin_submit").click(function (e) {
                e.preventDefault();
                var a = $(this), l = $(this).closest("form");
                l.validate({
                    rules: {
                        email: {required: !0, email: !0},
                        password: {required: !0}
                    }
                }), l.valid() && (a.addClass("m-loader m-loader--right m-loader--light").attr("disabled", !0), l.ajaxSubmit({
                    url: "",
                    success: function (e, t, r, s) {
                        setTimeout(function () {
                            a.removeClass("m-loader m-loader--right m-loader--light").attr("disabled", !1), i(l, "danger", "Incorrect username or password. Please try again.")
                        }, 2e3)
                    }
                }))
            }), $("#m_login_signup_submit").click(function (l) {
                l.preventDefault();
                var t = $(this), r = $(this).closest("form");
                r.validate({
                    rules: {
                        fullname: {required: !0},
                        email: {required: !0, email: !0},
                        password: {required: !0},
                        rpassword: {required: !0},
                        agree: {required: !0}
                    }
                }), r.valid() && (t.addClass("m-loader m-loader--right m-loader--light").attr("disabled", !0), r.ajaxSubmit({
                    url: "",
                    success: function (l, s, n, o) {
                        setTimeout(function () {
                            t.removeClass("m-loader m-loader--right m-loader--light").attr("disabled", !1), r.clearForm(), r.validate().resetForm(), a();
                            var l = e.find(".m-login__signin form");
                            l.clearForm(), l.validate().resetForm(), i(l, "success", "Thank you. To complete your registration please check your email.")
                        }, 2e3)
                    }
                }))
            }), $("#m_login_forget_password_submit").click(function (l) {
                l.preventDefault();
                var t = $(this), r = $(this).closest("form");
                r.validate({
                    rules: {
                        email: {
                            required: !0,
                            email: !0
                        }
                    }
                }), r.valid() && (t.addClass("m-loader m-loader--right m-loader--light").attr("disabled", !0), r.ajaxSubmit({
                    url: "",
                    success: function (l, s, n, o) {
                        setTimeout(function () {
                            t.removeClass("m-loader m-loader--right m-loader--light").attr("disabled", !1), r.clearForm(), r.validate().resetForm(), a();
                            var l = e.find(".m-login__signin form");
                            l.clearForm(), l.validate().resetForm(), i(l, "success", "Cool! Password recovery instruction has been sent to your email.")
                        }, 2e3)
                    }
                }))
            })
        }
    }
}();
jQuery(document).ready(function () {
    SnippetLogin.init()
});
$(".number").on("keypress keyup blur", function (event) {
    //this.value = this.value.replace(/[^0-9\.]/g,'');
    $(this).val($(this).val().replace(/[^0-9\.]/g, ''));
    if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
        event.preventDefault();
    }
});

$("#signupForm").on('submit', function (e) {

    var userName = $('#userName').val(),
        userPin = $('#userPin').val(),
        email = $('#email').val(),
        mobile = $('#phone').val(),
        password = $('#password').val(),
        rePass = $('#rePass').val();


    if (userPin == '') {
        $('#user-alert').html('User Pin is required.').show();
        return false;
    }
    if (userName == '') {
        $('#user-alert').html('User Name is required.').show();
        return false;
    }
    if (email == '') {
        $('#user-alert').html('Email is required.').show();
        return false;
    }
    if(IsEmail(email)==false){
        $('#user-alert').html('Email is Invalid.').show();
        return false;
    }
    if (password == '') {
        $('#user-alert').html('Password is required.').show();
        return false;
    }
    if (rePass == '') {
        $('#user-alert').html('Retype Password is required.').show();
        return false;
    }
    if (password != rePass) {
        $('#user-alert').html('Password is not match with ReType Password.').show();
        return false;
    }
    if (mobile == '') {
        $('#user-alert').html('Mobile No is required.').show();
        return false;
    }
    else {
        $.ajax({
            type: "POST",
            url: site_url + 'auth/signUp',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {
                $('#submit').attr("disabled", "disabled");
            },
            success: function (data) {
                swal("Sign Up!", "Sign up success!", "success")
            }
        });
    }
});
function IsEmail(email) {
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if(!regex.test(email)) {
        return false;
    }else{
        return true;
    }
}
$("#userPin").change(function () {
    var userPin = $("#userPin").val();

    $.ajax({
        type: "POST",
        url: site_url + 'admin/checkpin',
        data: {
            userPin: userPin

        },
        success: function (data) {
            if (data) {

                $('#submit').removeAttr("disabled");
                $("#userPinMsg")
                    .text("Valid user Pin")
                    .css('color', 'green');
            } else {
                $('#submit').attr("disabled", true);
                $("#userPinMsg")
                    .text("This User Pin number already exist !!")
                    .css('color', 'red');

            }
        }
    });
});