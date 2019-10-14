<div class="m-header__bottom">
    <div class="m-container m-container--responsive m-container--xxl m-container--full-height m-page__container">
        <div class="m-stack m-stack--ver m-stack--desktop">

            <!-- begin::Horizontal Menu -->
            <div class="m-stack__item m-stack__item--middle m-stack__item--fluid">
                <button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-light " id="m_aside_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
                <div id="m_header_menu" class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas  m-header-menu--skin-dark m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-light m-aside-header-menu-mobile--submenu-skin-light ">

                    <ul class="m-menu__nav  m-menu__nav--submenu-arrow ">
                        <?php if(in_array($this->session->userdata('user_role'), [1,2])): ?>
                        <li class="m-menu__item <?= $menu == 'dashboard' ? 'm-menu__item--active' : ''; ?>" aria-haspopup="true">
                            <a href="<?= base_url() ?>" class="m-menu__link ">
                                <span class="m-menu__item-here"></span>
                                <span class="m-menu__link-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="m-menu__item  <?= $menu == 'project'  ? 'm-menu__item--active' : ''; ?> m-menu__item--submenu m-menu__item--rel" m-menu-submenu-toggle="click" aria-haspopup="true">
                            <a href="javascript:;" class="m-menu__link m-menu__toggle" title="">
                                <span class="m-menu__item-here"></span>
                                <span class="m-menu__link-text">Project</span>
                                <i class="m-menu__hor-arrow la la-angle-down"></i>
                                <i class="m-menu__ver-arrow la la-angle-right"></i>
                            </a>
                            <div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left"><span class="m-menu__arrow m-menu__arrow--adjust"></span>
                                <ul class="m-menu__subnav">
                                    <li class="m-menu__item <?= $menu == 'project' && $submenu == 'viewProject' ? 'm-menu__item--active' : ''; ?>" aria-haspopup="true">
                                        <a href="<?= base_url("project/view") ?>" class="m-menu__link ">
                                            <i class="m-menu__link-icon "></i>
                                            <span class="m-menu__link-title">
                                                <span class="m-menu__link-wrap">
                                                    <span class="m-menu__link-text">View Project</span>
                                                    <span class="m-menu__link-icon flaticon-business"></span>
                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <?php endif; ?>
                        <li class="m-menu__item <?= $menu == 'Task' ? 'm-menu__item--active' : ''; ?> m-menu__item--submenu m-menu__item--rel" m-menu-submenu-toggle="click" aria-haspopup="true">
                            <a href="javascript:;" class="m-menu__link m-menu__toggle" title="">
                                <span class="m-menu__item-here"></span>
                                <span class="m-menu__link-text">Task</span>
                                <i class="m-menu__hor-arrow la la-angle-down"></i>
                                <i class="m-menu__ver-arrow la la-angle-right"></i>
                            </a>
                            <div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left"><span class="m-menu__arrow m-menu__arrow--adjust"></span>
                                <ul class="m-menu__subnav">
                                    <li class="m-menu__item <?= $menu == 'Task' && $submenu == 'viewTask' ? 'm-menu__item--active' : ''; ?>" aria-haspopup="true">
                                        <a href="<?= base_url("task/view") ?>" class="m-menu__link ">
                                            <i class="m-menu__link-icon "></i>
                                            <span class="m-menu__link-title">
                                                <span class="m-menu__link-wrap">
                                                    <span class="m-menu__link-text">View Task</span>
                                                    <span class="m-menu__link-icon flaticon-business"></span>
                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="m-menu__item <?= $menu == 'Task' && $submenu == 'closeTask' ? 'm-menu__item--active' : ''; ?>" aria-haspopup="true">
                                        <a href="<?= base_url("task/close") ?>" class="m-menu__link ">
                                            <i class="m-menu__link-icon "></i>
                                            <span class="m-menu__link-title">
                                                <span class="m-menu__link-wrap">
                                                    <span class="m-menu__link-text">Close Task</span>
                                                    <span class="m-menu__link-icon flaticon-business"></span>
                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <?php if(in_array($this->session->userdata('user_role'), [1,2])): ?>
                        <li class="m-menu__item <?= $menu == 'admin' ? 'm-menu__item--active' : ''; ?> m-menu__item--submenu m-menu__item--rel" m-menu-submenu-toggle="click" aria-haspopup="true">
                            <a href="javascript:;" class="m-menu__link m-menu__toggle" title="">
                                <span class="m-menu__item-here"></span>
                                <span class="m-menu__link-text">Admin</span>
                                <i class="m-menu__hor-arrow la la-angle-down"></i>
                                <i class="m-menu__ver-arrow la la-angle-right"></i>
                            </a>
                            <div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left"><span class="m-menu__arrow m-menu__arrow--adjust"></span>
                                <ul class="m-menu__subnav">
                                    <li class="m-menu__item <?= $menu == 'admin' && $submenu == 'userView' ? 'm-menu__item--active' : ''; ?>" aria-haspopup="true">
                                        <a href="<?= base_url("admin/view") ?>" class="m-menu__link ">
                                            <i class="m-menu__link-icon "></i>
                                            <span class="m-menu__link-title">
                                                <span class="m-menu__link-wrap">
                                                    <span class="m-menu__link-text">User View</span>
                                                    <span class="m-menu__link-icon flaticon-business"></span>
                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="m-menu__item <?= $menu == 'report' ? 'm-menu__item--active' : ''; ?>" aria-haspopup="true">
                            <a href="<?= base_url("report") ?>" class="m-menu__link ">
                                <span class="m-menu__item-here"></span>
                                <span class="m-menu__link-text">Report</span>
                            </a>
                        </li>
                        <?php endif; ?>
                   </ul>
                </div>
            </div>

            <!-- end::Horizontal Menu -->
        </div>
    </div>
</div>
</header>