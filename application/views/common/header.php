

<!DOCTYPE html>
<html lang="en">

    <!-- begin::Head -->
    <head>
        <meta charset="utf-8"/>
        <title><?= $title; ?></title>
        <meta name="description" content="Latest updates and statistic charts">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
        <!--begin::Web font -->
        <script src="<?= base_url('assets/js/webfont.js'); ?>"></script>
        <style> 
            marquee {
                width: 100%;
                padding: 8px 0;
                font-size: 18px;
                background-color: #fff;
            }
        </style>
        <script>
            WebFont.load({
                google: {"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]},
                active: function() {
                    sessionStorage.fonts = true;
                }
            });
        </script>
        <!-- Asset Management -->
        <?= load_assets('css'); ?>
        <!--end::Base Styles -->

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

    <!-- end::Head -->

    <!-- begin::Body -->
    <body class="m-page--wide m-header--fixed m-header--fixed-mobile m-footer--push m-aside--offcanvas-default" style="background-image: url('<?= base_url('assets/images/688619-popular-software-wallpapers-1920x1200.jpg') ?>')">

        <!-- begin:: Page -->
        <div class="m-grid m-grid--hor m-grid--root m-page">

            <!-- begin::Header -->
            <header id="m_header" class="m-grid__item	m-header " m-minimize="minimize" m-minimize-offset="200"
                    m-minimize-mobile-offset="200">
                <div class="m-header__top">
                    <div class="m-container m-container--responsive m-container--xxl m-container--full-height m-page__container">
                        <div class="m-stack m-stack--ver m-stack--desktop">

                            <!-- begin::Brand -->
                            <div class="m-stack__item m-brand">
                                <div class="m-stack m-stack--ver m-stack--general m-stack--inline">
                                    <div class="m-stack__item m-stack__item--middle m-brand__logo">
                                        <a href="<?= base_url(); ?>" class="m-brand__logo-wrapper">
                                            <img alt="" height="80px;" width="165px;" src="<?= base_url('assets/demo/demo5/media/img/logo/logo.png') ?>"/>
                                        </a>
                                    </div>
                                    <div class="m-stack__item m-stack__item--middle m-brand__tools">



                                        <!-- begin::Responsive Header Menu Toggler-->
                                        <a id="m_aside_header_menu_mobile_toggle" href="javascript:;" class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
                                            <span></span>
                                        </a>

                                        <!-- end::Responsive Header Menu Toggler-->

                                        <!-- begin::Topbar Toggler-->
                                        <a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
                                            <i class="flaticon-more"></i>
                                        </a>

                                        <!--end::Topbar Toggler-->
                                        <!--end::Topbar Toggler-->
                                    </div>
                                </div>
                            </div>

                            <!-- end::Brand -->

                            <!-- begin::Topbar -->
                            <div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
                                <div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
                                    <div class="m-stack__item m-topbar__nav-wrapper">
                                        <ul class="m-topbar__nav m-nav m-nav--inline">
                                            <li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light"
                                                m-dropdown-toggle="click">
                                                <a href="#" class="m-nav__link m-dropdown__toggle">
                                                    <span class="m-topbar__welcome">Hello,&nbsp;</span>
                                                    <span class="m-topbar__username"><?= $this->session->userdata('user_name'); ?></span>
                                                    <span class="m-topbar__userpic">
                                                        <img src="<?= base_url('uploads/') . $this->session->userdata('image_path'); ?>"
                                                             class="m--img-rounded m--marginless m--img-centered"
                                                             alt=""/>
                                                    </span>
                                                </a>
                                                <div class="m-dropdown__wrapper">
                                                    <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                                    <div class="m-dropdown__inner">
                                                        <div class="m-dropdown__header m--align-center"
                                                             style="background: <?= base_url('assets/app/media/img/misc/user_profile_bg.jpg'); ?>  background-size: cover;">
                                                            <div class="m-card-user m-card-user--skin-dark">
                                                                <div class="m-card-user__pic">
                                                                    <img src="<?= base_url('uploads/') . $this->session->userdata('image_path'); ?> "
                                                                         class="m--img-rounded m--marginless" alt=""/>
                                                                </div>
                                                                <div class="m-card-user__details">
                                                                    <span class="m-card-user__name m--font-weight-500"><?= $this->session->userdata('user_name'); ?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="m-dropdown__body">
                                                            <div class="m-dropdown__content">
                                                                <ul class="m-nav m-nav--skin-light">
                                                                    <li class="m-nav__section m--hide">
                                                                        <span class="m-nav__section-text">Section</span>
                                                                    </li>
                                                                    <li class="m-nav__item">
                                                                        <a href="<?= base_url('profile/profile'); ?>" class="m-nav__link">
                                                                            <i class="m-nav__link-icon flaticon-profile-1"></i>
                                                                            <span class="m-nav__link-title">
                                                                                <span class="m-nav__link-wrap">
                                                                                    <span class="m-nav__link-text">My Profile</span>
                                                                                </span>
                                                                            </span>
                                                                        </a>
                                                                    </li>


                                                                    <li class="m-nav__separator m-nav__separator--fit">
                                                                    </li>
                                                                    <li class="m-nav__item">
                                                                        <a href="<?= base_url('auth/logout'); ?>"
                                                                           class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">Logout</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- end::Topbar -->
                        </div>
                    </div>
                </div>



