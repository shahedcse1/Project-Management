
<!-- begin::Body -->
<div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver-desktop m-grid--desktop 	m-container m-container--responsive m-container--xxl m-page__container m-body">
    <div class="m-grid__item m-grid__item--fluid m-wrapper">

        <!-- BEGIN: Subheader -->
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
               <marquee direction="scroll">Welcome <?= $this->session->userdata('user_name');   ?> To merits Project Management system.Our Current No. Of Active Project is - <?= $activeProject ?> AND Total No. of task is <?= $total; ?>. </marquee>
            </div>
        </div>

        <!-- END: Subheader -->
        <div class="m-content">

            <!--Begin::Section-->
            <div class="m-portlet">
                <div class="m-portlet__body  m-portlet__body--no-padding">
                    <div class="row m-row--no-padding m-row--col-separator-xl">
                        <div class="col-xl-12">
                            <!--begin::Portlet-->
                            <div class="m-portlet m-portlet--tab">
                                <div class="m-portlet__head headview">
                                    <div class="m-portlet__head-caption">
                                        <div class="m-portlet__head-title">
                                            <span class="m-portlet__head-icon m--hide">
                                                <i class="la la-gear"></i>
                                            </span>
                                            <h3 class="m-portlet__head-text">
                                                Project Result
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-portlet__body ">
                                    <div class="row">
                                        <div class="col-xl-5 ">
                                            <div class="m-widget1">
                                                <div class="m-widget1__item">
                                                    <div class="row m-row--no-padding align-items-center">
                                                        <div class="col">
                                                            <h3 class="m-widget1__title">Total Project</h3>
                                                            <span class="m-widget1__desc"></span>
                                                        </div>
                                                        <div class="col m--align-right">
                                                            <span class="m-widget1__number m--font-focus"><?= $project->total; ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="m-widget1__item">
                                                    <div class="row m-row--no-padding align-items-center">
                                                        <div class="col">
                                                            <h3 class="m-widget1__title">Total Active</h3>
                                                            <span class="m-widget1__desc"></span>
                                                        </div>
                                                        <div class="col m--align-right">
                                                            <span class="m-widget1__number m--font-accent"><?= $activeProject ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="m-widget1__item">
                                                    <div class="row m-row--no-padding align-items-center">
                                                        <div class="col">
                                                            <h3 class="m-widget1__title">Total Inactive</h3>
                                                            <span class="m-widget1__desc"></span>
                                                        </div>
                                                        <div class="col m--align-right">
                                                            <span class="m-widget1__number m--font-info"><?= $inactiveProject; ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-7">
                                            <div class="m-widget14">
                                                <div class="m-widget14__header">
                                                    <h3 class="m-widget14__title">
                                                        Project Status
                                                    </h3>
                                                </div>
                                                <div class="row  align-items-center">
                                                    <div class="col">
                                                        <div id="projectData" class="m-widget14__chart" style="height: 200px">
                                                            <div class="m-widget14__stat"><?= $project->total ?></div>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="m-widget14__legends">
                                                            <div class="m-widget14__legend">
                                                                <span class="m-widget14__legend-bullet m--bg-primary"></span>
                                                                <span class="m-widget14__legend-text"><?= $activeProject ?> Active</span>
                                                            </div>
                                                            <div class="m-widget14__legend">
                                                                <span class="m-widget14__legend-bullet m--bg-danger"></span>
                                                                <span class="m-widget14__legend-text"><?= $inactiveProject ?> InActive</span>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Portlet-->
                        </div>

                        <div class="col-xl-12">
                            <!--begin::Portlet-->
                            <div class="m-portlet m-portlet--tab">
                                <div class="m-portlet__head headview">
                                    <div class="m-portlet__head-caption">
                                        <div class="m-portlet__head-title">
                                            <span class="m-portlet__head-icon m--hide">
                                                <i class="la la-gear"></i>
                                            </span>
                                            <h3 class="m-portlet__head-text ">
                                                Task Result
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-portlet__body">
                                    <div class="row">
                                        <div class="col-xl-5 ">
                                            <div class="m-widget1">
                                                <div class="m-widget1__item">
                                                    <div class="row m-row--no-padding align-items-center">
                                                        <div class="col">
                                                            <h3 class="m-widget1__title">Total Task</h3>
                                                            <span class="m-widget1__desc"></span>
                                                        </div>
                                                        <div class="col m--align-right">
                                                            <span class="m-widget1__number m--font-focus"><?= $total; ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="m-widget1__item">
                                                    <div class="row m-row--no-padding align-items-center">
                                                        <div class="col">
                                                            <h3 class="m-widget1__title">Total Active</h3>
                                                            <span class="m-widget1__desc"></span>
                                                        </div>
                                                        <div class="col m--align-right">
                                                            <span class="m-widget1__number m--font-accent"><?= $activeTask ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="m-widget1__item">
                                                    <div class="row m-row--no-padding align-items-center">
                                                        <div class="col">
                                                            <h3 class="m-widget1__title">Total InActive</h3>
                                                            <span class="m-widget1__desc"></span>
                                                        </div>
                                                        <div class="col m--align-right">
                                                            <span class="m-widget1__number m--font-info"><?= $inactiveTask; ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-7">
                                            <div class="m-widget14">
                                                <div class="m-widget14__header">
                                                    <h3 class="m-widget14__title">
                                                        Task Status
                                                    </h3>
                                                </div>
                                                <div class="row  align-items-center">
                                                    <div class="col">
                                                        <div id="taskData" class="m-widget14__chart" style="height: 200px">
                                                            <div class="m-widget14__stat"><?= $total ?></div>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="m-widget14__legends">

                                                            <div class="m-widget14__legend">
                                                                <span class="m-widget14__legend-bullet m--bg-primary"></span>
                                                                <span class="m-widget14__legend-text"><?= $activeTask ?> Active</span>
                                                            </div>
                                                            <div class="m-widget14__legend">
                                                                <span class="m-widget14__legend-bullet m--bg-danger"></span>
                                                                <span class="m-widget14__legend-text"><?= $inactiveTask ?> InActive</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Portlet-->
                        </div>
                        <div class="col-xl-12">
                            <!--begin::Portlet-->
                            <div class="m-portlet m-portlet--tab">
                                <div class="m-portlet__head headview">
                                    <div class="m-portlet__head-caption">
                                        <div class="m-portlet__head-title">
                                            <span class="m-portlet__head-icon m--hide">
                                                <i class="la la-gear"></i>
                                            </span>
                                            <h3 class="m-portlet__head-text ">
                                                Task Status
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-portlet__body">
                                    <div class="row">
                                        <div id="graph1" class="gauge"></div>
                                        <div id="graph2" class="gauge"></div>
                                        <div id="graph3" class="gauge"></div>
                                        <div id="graph4" class="gauge"></div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Portlet-->
                        </div>
                    </div>
                </div>
            </div>
            <!--End::Section-->
        </div>
    </div>

</div>

<!-- end::Body -->