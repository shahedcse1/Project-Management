<!-- begin::Body -->
<div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver-desktop m-grid--desktop 	m-container m-container--responsive m-container--xxl m-page__container m-body">
    <div class="m-grid__item m-grid__item--fluid m-wrapper">

        <!-- BEGIN: Subheader -->
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title "><?= $title ?></h3>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <?php if ($this->session->userdata('add')): ?>

                <div class=" m-alert m-alert--outline alert alert-success alert-dismissible fade show"
                     role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                    <strong>
                        <?php echo $this->session->userdata('add'); ?>
                    </strong>
                    <?php $this->session->unset_userdata('add'); ?>
                </div>

            <?php elseif ($this->session->userdata('edit')): ?>
                <div class="container">
                    <div class="m-alert m-alert--outline alert alert-success alert-dismissible fade show"
                         role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                        <strong>
                            <?php echo $this->session->userdata('edit'); ?>
                        </strong>
                        <?php $this->session->unset_userdata('edit'); ?>
                    </div>
                </div>
            <?php elseif ($this->session->userdata('updatePassword')): ?>
                <div class="container">
                    <div class="m-alert m-alert--outline alert alert-success alert-dismissible fade show"
                         role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                        <strong>
                            <?php echo $this->session->userdata('updatePassword'); ?>
                        </strong>
                        <?php $this->session->unset_userdata('updatePassword'); ?>
                    </div>
                </div>
            <?php else: ?>
            <?php endif; ?>

        </div>
        <!-- END: Subheader -->
        <div class="m-content">
            <!--Begin::Section-->
            <div class="m-portlet">
                <div class="m-portlet__body  m-portlet__body--no-padding view">
                    <br>
                    <div class="container">
                        <div class="m-portlet__head-tools pull-right">
                            <a href="<?= base_url('project/create'); ?>" class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air">
                                <span>
                                    <i class="la la-plus"></i>
                                    <span>Add Project</span>
                                </span></a>

                        </div>
                        <br><br>
                        <div class="table-responsive">
                            <table class="display " style="width:100%" id="userData">
                                <thead>
                                    <tr>
                                        <th>SI</th>
                                        <th>Project</th>
                                        <th>Status</th>
                                        <th>Priority</th>
                                        <th>File</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (sizeof($projectList)):
                                        $i = 0;
                                        foreach ($projectList AS $list):
                                            $i++;
                                            ?>
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td>
                                                    <a href="#" onclick="editProject(<?= $list->id; ?>);"
                                                       class="m-portlet__nav-link"
                                                       data-toggle="modal"
                                                       data-target="#projectedit"
                                                       title="Edit Project">

                                                        <?= $list->project_name; ?>
                                                    </a>
                                                </td>
                                                <td class="text-center">
                                                    <?php if ($list->status == 1): ?>
                                                        <span class="status-width" >
                                                            <span class="m-badge  m-badge--success m-badge--wide ">Active</span></span>
                                                    <?php else: ?>
                                                        <span class="status-width">
                                                            <span class=" m-badge  m-badge--danger m-badge--wide ">In Active</span></span>
                                                    <?php endif; ?>
                                                </td>
                                                <td class="text-center">
                                                    <span class="status-width">
                                                        <?php if ($list->priorityId == '3'): ?>
                                                            <span class="m-badge  m-badge--info  m-badge--wide ">
                                                            <?php elseif ($list->priorityId == '2'): ?>
                                                                <span class="m-badge  m-badge--primary m-badge--wide ">
                                                                <?php else: ?>
                                                                    <span class=" m-badge  m-badge--danger m-badge--wide ">
                                                                    <?php endif; ?>
                                                                    <?= $list->priorityName; ?>
                                                                </span>
                                                            </span>
                                                            </td>
                                                            <td ><a href="<?php echo base_url('files/') . $list->file_name; ?>" target="_blank">
                                                                    <img  height="30px;" width="30px;"src="<?php echo base_url('files/') . $list->file_name; ?>">
                                                                </a> </td>

                                                            <td class="text-center">
                                                                <a href="#" onclick="editProject(<?= $list->id; ?>);"
                                                                   class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill"
                                                                   data-toggle="modal"
                                                                   data-target="#projectedit"
                                                                   title="Edit Project">
                                                                    <i class="la la-edit"></i>
                                                                </a>

                                                                <button type="button" value="<?= $list->id; ?>"
                                                                        class="itemDelete m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill "
                                                                        title="Delete Project">
                                                                    <i class="la la-trash"></i>
                                                                </button>
                                                            </td>
                                                            </tr>
                                                            <?php
                                                        endforeach;
                                                    endif;
                                                    ?>
                                                    </tbody>
                                                    </table>
                                                    </div>
                                                    <!--begin:: Edit Project Modal-->
                                                    <div class="modal fade" id="projectedit" tabindex="-1" role="dialog"
                                                         aria-labelledby="exampleModalLabel"
                                                         aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        Edit User
                                                                    </h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form class="m-form m-form--fit m-form--label-align-right" method="post"
                                                                      enctype="multipart/form-data" action="<?= base_url('project/update'); ?>">
                                                                    <div class="modal-body ">

                                                                        <div class="form-group m-form__group row">
                                                                            <label class="col-lg-3 col-form-label"><span class="error">*</span>Project Name</label>
                                                                            <div class="col-lg-3">
                                                                                <input type="hidden" class="form-control form-control-sm" name="projectid"
                                                                                       id="projectid">

                                                                                <input type="text" class="form-control form-control-sm" name="project_name"
                                                                                       id="projectName"
                                                                                       placeholder="Project Name" required>
                                                                            </div>
                                                                            <label class="col-lg-3 col-form-label"><span class="error">*</span>Project Status</label>
                                                                            <div class="col-lg-2">
                                                                                <select class="form-control form-control-sm" name="status" id="status" required>
                                                                                    <option value="1">Active</option>
                                                                                    <option value="2">In Active</option>
                                                                                </select>
                                                                            </div>

                                                                        </div>
                                                                        <div class="form-group m-form__group row " >

                                                                            <label class="col-lg-3 col-form-label"><span class="error">*</span>Priority</label>
                                                                            <div class="col-lg-8">
                                                                                <select name="priority" class="form-control form-control-sm" id="priority" required>
                                                                                    <option value="">----Select Priority----</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group m-form__group row">
                                                                            <label class="col-lg-3 col-form-label "><span class="error">*</span>Location</label>
                                                                            <div class="col-lg-8">
                                                                                <textarea class="form-control" name="location" id="location" placeholder="Project Location"  cols="12" rows="3" required></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group m-form__group row">
                                                                            <label class="col-lg-3 col-form-label "><span class="error">*</span>Project Description</label>
                                                                            <div class="col-lg-8">
                                                                                <textarea class="form-control" name="description" placeholder="Project Description" id="description" cols="12" rows="3" required></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group m-form__group row " >
                                                                            <label class="col-lg-3 col-form-label">Upload File</label>
                                                                            <div class="col-lg-3">
                                                                                <input type="file" name="fileToUpload" id="file" >
                                                                                <span id="uploadMsg"></span>
                                                                            </div>

                                                                        </div>
                                                                        <div class="form-group col-md-1" id="upload_image"></div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="close" class="btn btn-secondary" data-dismiss="modal">
                                                                            Close
                                                                        </button>
                                                                        <button type="submit" id="submit" class="btn btn-primary" >
                                                                            Update
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <!--end:: Edit Project Modal-->

                                                    </div>
                                                    <br>
                                                    </div>
                                                    </div>
                                                    <!--end::Section-->
                                                    </div>
                                                    </div>
                                                    </div>

                                                    <!-- end::Body -->