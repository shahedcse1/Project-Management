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
                            <a href="<?= base_url('admin/create'); ?>" class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air">
                                <span>
                                    <i class="la la-plus"></i>
                                    <span>Add User</span>
                                </span></a>

                        </div>
                        <br><br>
                        <div class="table-responsive">
                            <table class="display view" style="width:100%" id="userData">
                                <thead>
                                    <tr>
                                        <th>SI</th>
                                        <th>Name</th>

                                        <th>Role</th>
                                        <th>Email</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Option</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (sizeof($userList)):
                                        $si = 1;
                                        foreach ($userList AS $list):
                                            ?>
                                            <tr>
                                                <td><?= $si; ?></td>
                                                <td>
                                                    <a href="#" onclick="edituser(<?= $list->id; ?>);"
                                                       class="m-portlet__nav-link"
                                                       data-toggle="modal"
                                                       data-target="#useredit"
                                                       title="Edit User">

                                                        <?= $list->name; ?>
                                                    </a>

                                                </td>

                                                <td><?= $list->roleName; ?></td>
                                                <td><?= $list->email; ?></td>
                                                <td class="text-center">
                                                    <a href="<?php echo base_url('uploads/') . $list->image_path; ?>" target="_blank">
                                                        <img  height="30px;" width="30px;" src="<?php echo base_url('uploads/') . $list->image_path; ?>"> </td>
                                                    </a>
                                                <td class="text-center">
                                                    <?php if ($list->status == 1): ?>
                                                        <span class="status-width" >
                                                            <span class="m-badge  m-badge--success m-badge--wide ">Active</span></span>
                                                    <?php else: ?>
                                                        <span class="status-width" >
                                                            <span class=" m-badge  m-badge--danger m-badge--wide">Inactive</span></span>
                                                    <?php endif; ?>
                                                </td>
                                                <td class="text-center">
                                                    <button class=" btn btn-primary btn-sm "
                                                            onclick="passresetmodal(<?= $list->id; ?>);">Change Password
                                                    </button>
                                                </td>
                                                <td class="text-center">
                                                    <a href="#" onclick="edituser(<?= $list->id; ?>);"
                                                       class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill "
                                                       data-toggle="modal"
                                                       data-target="#useredit"
                                                       title="Edit User">
                                                        <i class="la la-edit"></i>
                                                    </a>
                                                    <button type="button" value="<?= $list->id; ?>"
                                                            class="itemDelete m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill "
                                                            title="Delete User">
                                                        <i class="la la-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <?php
                                            $si++;
                                        endforeach;
                                    endif;
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!--begin:: Edit User Modal-->
                        <div class="modal fade" id="useredit" tabindex="-1" role="dialog"
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
                                          enctype="multipart/form-data"
                                          action="<?= base_url('admin/update'); ?>">
                                        <div class="modal-body ">
                                            <div class="form-group m-form__group row">
                                                <label class="col-lg-2 col-form-label"><span class="error">*</span>User
                                                    Name</label>
                                                <div class="col-lg-3">
                                                    <input type="hidden" class="form-control form-control-sm" name="id"
                                                           id="userid"
                                                           placeholder="User Name">
                                                    <input type="text" class="form-control form-control-sm"
                                                           name="userName"
                                                           id="userName" required>
                                                </div>
                                                <label class="col-lg-2 col-form-label"><span class="error">*</span>User
                                                    Pin</label>
                                                <div class="col-lg-3">
                                                    <input type="text" class="form-control form-control-sm number"
                                                           name="userPin" id="editPin" required>
                                                    <span id="userPinMsg"></span>
                                                </div>

                                            </div>
                                            <div class="form-group m-form__group row ">
                                                <label class="col-lg-2 col-form-label"><span class="error">*</span>Status</label>
                                                <div class="col-lg-3">
                                                    <select class="form-control form-control-sm" name="status"
                                                            id="status" required>
                                                        <option value="1">Active</option>
                                                        <option value="0">Inactive</option>
                                                    </select>
                                                </div>
                                                <label class="col-lg-2 col-form-label"><span class="error">*</span>User
                                                    Role</label>
                                                <div class="col-lg-3">
                                                    <select name="userRole" class="form-control form-control-sm"
                                                            id="userRole" required>
                                                        <option value="">----Select Role----</option>
                                                        <?php if (isset($userrole)): ?>
                                                            <?php foreach ($userrole AS $role): ?>
                                                                <option value="<?= $role->id; ?>"><?= $role->role_name; ?></option>
                                                                <?php
                                                            endforeach;
                                                        endif;
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row ">
                                                <label class="col-lg-2 col-form-label"><span class="error">*</span>Mobile
                                                    No</label>
                                                <div class="col-lg-3">
                                                    <input type="text" class="form-control form-control-sm number"
                                                           name="mobile"
                                                           id="mobile" maxlength="11"
                                                           placeholder="Mobile No" required>
                                                </div>
                                                <label class="col-lg-2 col-form-label "><span class="error">*</span>Email</label>
                                                <div class="col-lg-4">
                                                    <input type="text" class="form-control form-control-sm "
                                                           name="email" id="email" required>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row ">
                                                <label class="col-lg-2 col-form-label">Image</label>
                                                <div class="col-lg-3">
                                                    <input type="file" name="fileToUpload" id="file">
                                                    <span id="imageMsg"></span>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-1" id="upload_image"></div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="alert alert-danger alert-dismissible fade show   m-alert m-alert--air m-alert--outline m-alert--outline-2x"
                                                 role="alert" id="user-alert">
                                                <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                </button>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="close" class="btn btn-secondary" data-dismiss="modal">
                                                Close
                                            </button>
                                            <button type="submit" id="submit" class="btn btn-primary">
                                                Update
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <!--end:: Edit User Modal-->
                        <!--begin:: passsword Modal-->
                        <div class="modal fade" id="changePassword" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title " id="exampleModalLabel">
                                            Change Password
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form class="m-form m-form--fit m-form--label-align-right" method="post"
                                          action="<?= base_url('admin/passwordchange'); ?>">
                                        <div class="modal-body ">

                                            <div class="form-group m-form__group row">
                                                <label class="col-lg-6 col-form-label">New Password :</label>
                                                <div class="col-lg-6">
                                                    <input class=" form-control" id="id" name="id" value=""
                                                           type="hidden"/>
                                                    <span id="current-password"></span>
                                                    <input type="text" class="form-control form-control-sm" id="new"
                                                           name="password">
                                                    <span id="new-password"></span>
                                                </div>
                                                <label class="col-lg-6 col-form-label">Verify New Password:</label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control form-control-sm" id="reset"
                                                           name="rpassword">
                                                    <span id="reset-password"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="close" class="btn btn-secondary" data-dismiss="modal">
                                                Close
                                            </button>
                                            <button type="submit" class="btn btn-primary "
                                                    onclick="return updatePassword()">
                                                Update
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <!--end:: passsword Modal-->
                    </div>
                    <br>
                </div>
            </div>
            <!--end::Section-->
        </div>
    </div>
</div>

<!-- end::Body -->