<!DOCTYPE html>

<html lang="en">

    <!-- begin::Head -->

    <head>
        <meta charset="utf-8"/>
        <title>Login </title>
        <meta name="description" content="Latest updates and statistic charts">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
        <!--begin::Web font -->
        <script src="<?= base_url('assets/js/webfont.js'); ?>"></script>
        <script>
            WebFont.load({
                google: {"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]},
                active: function() {
                    sessionStorage.fonts = true;
                }
            });
        </script>
        <!--end::Web font -->
        <!--begin::Global Theme Styles -->
        <link href="<?= base_url('assets/vendors/base/vendors.bundle.css'); ?>" rel="stylesheet" type="text/css"/>
        <!--RTL version:<link href="assets/vendors/base/vendors.bundle.rtl.css" rel="stylesheet" type="text/css" />-->
        <link href="<?= base_url('assets/demo/demo5/base/style.bundle.css'); ?>" rel="stylesheet" type="text/css"/>
        <!--RTL version:<link href="assets/demo/demo5/base/style.bundle.rtl.css" rel="stylesheet" type="text/css" />-->
        <!--end::Global Theme Styles -->
        <!--begin::Page Vendors Styles -->
        <link href="<?= base_url('assets/vendors/custom/fullcalendar/fullcalendar.bundle.css'); ?>" rel="stylesheet"
              type="text/css"/>
        <!--RTL version:<link href="assets/vendors/custom/fullcalendar/fullcalendar.bundle.rtl.css" rel="stylesheet" type="text/css" />-->
        <!--end::Page Vendors Styles -->

        <link rel="shortcut icon" href="<?= base_url('assets/demo/demo5/media/img/logo/favicon.ico'); ?>"
              type="image/x-icon">
        <link rel="icon" href="<?= base_url('assets/demo/demo5/media/img/logo/favicon.ico'); ?>" type="image/x-icon">
    </head>

    <body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
        <div class="m-grid m-grid--hor m-grid--root m-page">
            <div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-2" id="m_login" style=" background-color:#29C3F3; background-image: url(<?= base_url('assets/app/media/img/bg/bg-3.jpg') ?>);">
                <div class="m-grid__item m-grid__item--fluid	m-login__wrapper">
                    <div class="m-login__container" style="background-color:#ebf3f2; padding: 5px;  border-radius: 35px; ">
                        <div class="m-login__logo">
                            <a href="#">
                                <img  width="200px;"src="<?= base_url('assets/demo/demo5/media/img/logo/logo.png') ?>"><br>
                            </a>
                            <?php if ($this->session->userdata('login_error')): ?>
                                <div class="alert alert-danger alert-dismissible fade show   m-alert m-alert--air" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    </button>
                                    <strong>Warning!!</strong> <?=
                                    $this->session->userdata('login_error');
                                    $this->session->unset_userdata('login_error');
                                    ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="m-login__signin" style="color:black; ">
                            <center>  
                                <h4> Login</h4><br>
                                Enter your User Pin and Password to Sign In
                            </center>
                            <form class="m-login__form m-form" action="<?php echo site_url('Auth/login'); ?>" method="post">
                                <div class="form-group m-form__group">
                                    <input class="form-control m-input" type="text"  placeholder="Email" name="useremail" autocomplete="off">
                                </div>
                                <div class="form-group m-form__group">
                                    <input class="form-control m-input m-login__form-input--last" type="password" placeholder="Password" name="password">
                                </div>
                                <div class="m-login__form-action">
                                    <button type="submit" style="background-color: #fff; color:black;"  class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">Sign In</button>
                                </div>
                            </form>
                        </div>
                        <div class="m-login__signup">
                            <center> 
                                <h4> Sign UP</h4><br>
                                Enter your Details  to Sign Up</center>
                            <div class="col-md-12">
                                <div class="alert alert-success alert-dismissible fade show   m-alert m-alert--air m-alert--outline m-alert--outline-2x" role="alert" id="signup_alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    </button>
                                </div>
                            </div>
                            <form class="m-login__form m-form" method="post" id="signupForm">
                                <div class="form-group m-form__group">
                                    <input class="form-control m-input number" type="text" placeholder="User Pin" name="userPin" id="userPin">
                                    <span id="userPinMsg"></span>
                                </div>
                                <div class="form-group m-form__group">
                                    <input class="form-control m-input" type="text" placeholder="User Name" name="userName"  id="userName">
                                </div>
                                <div class="form-group m-form__group">
                                    <input class="form-control m-input" type="text" placeholder="Mobile" name="phone" id="phone" >
                                </div>
                                <div class="form-group m-form__group">
                                    <input class="form-control m-input" type="text" placeholder="Email" name="email" id="email" >
                                </div>
                                <div class="form-group m-form__group">
                                    <input class="form-control m-input" type="password" placeholder="Password" name="password" id="password">
                                </div>
                                <div class="form-group m-form__group">
                                    <input class="form-control m-input m-login__form-input--last" type="password" placeholder="Confirm Password" id="rePass" name="rpassword">
                                </div>
                                <div class="m-login__form-action">
                                    <button  type="submit" id="submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn">
                                        Sign Up
                                    </button>
                                    &nbsp;
                                    <button id="m_login_signup_cancel" class="btn btn-outline-focus m-btn m-btn--pill m-btn--custom  m-login__btn">
                                        Cancel
                                    </button>
                                </div>
                            </form>
                            <div class="col-md-12">
                                <div class="alert alert-danger alert-dismissible fade show   m-alert m-alert--air m-alert--outline m-alert--outline-2x" role="alert" id="user-alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="m-login__account">
                            <span class="m-login__account-msg"style="color:black; ">
                                Don't have an account yet ?
                            </span>
                            &nbsp;&nbsp;
                            <a href="javascript:;" id="m_login_signup"style="color:black; " class="m-link m-link--light m-login__account-link">
                                Sign Up
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end:: Page -->

    <!--begin::Global Theme Bundle -->
    <script src="<?= base_url('assets/vendors/base/vendors.bundle.js') ?>" type="text/javascript"></script>
    <script src="<?= base_url('assets/demo/demo5/base/scripts.bundle.js') ?>" type="text/javascript"></script>
    <script>
            var site_url = "<?= site_url(); ?>";

<!-- Asset Management -->
    </script>
    <!--end::Global Theme Bundle -->
    <!--begin::Page Scripts -->
    <script src="<?= base_url('assets/snippets/custom/pages/user/login.js') ?>" type="text/javascript"></script>

    <!--end::Page Scripts -->
</body>

<!-- end::Body -->
</html>