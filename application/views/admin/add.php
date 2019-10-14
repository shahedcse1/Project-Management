
<!-- begin::Body -->
<div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver-desktop m-grid--desktop 	m-container m-container--responsive m-container--xxl m-page__container m-body">
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <!-- BEGIN: Subheader -->
        <div class="col-md-2">
            <br>
            <h4 class="m-subheader__title"><?= $title ?></h4>
        </div>
        <!-- END: Subheader -->
            <!--Begin::Section-->
        <div class="m-portlet__body  m-portlet__body--no-padding">
                    <div class="m-content">
                        <div class="m-portlet m-portlet--tab">
                            <!--begin::Form user ADD-->
                            <form class="m-form m-form--fit m-form--label-align-right" id="userForm" enctype="multipart/form-data">
                                <div class="m-portlet__body backgroundColor ">
                                    <div class="form-group m-form__group row">
                                        <label class="col-lg-2 col-form-label"><span class="error">*</span>User Name</label>
                                        <div class="col-lg-3">
                                            <input type="text" class="form-control form-control-sm" name="userName"
                                                   id="userName"
                                                   placeholder="User Name">
                                        </div>
                                        <label class="col-lg-2  col-form-label"><span class="error">*</span>User Pin</label>
                                        <div class="col-lg-3">
                                            <input type="text" class="form-control form-control-sm number" name="userPin"
                                                   id="userPin"
                                                   placeholder="User Pin">
                                            <span id="userPinMsg"></span>
                                        </div>

                                    </div>
                                    <div class="form-group m-form__group row " >
                                        <label class="col-lg-2 col-form-label"><span class="error">*</span>Status</label>
                                        <div class="col-lg-3">
                                            <select class="form-control form-control-sm" name="status" id="status">
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                        </div>
                                        <label class="col-lg-2 col-form-label"><span class="error">*</span>User Role</label>
                                        <div class="col-lg-3">
                                            <select name="userRole" class="form-control form-control-sm" id="userRole">
                                                <option value="">----Select Role----</option>
                                                <?php if (isset($userrole)): ?>
                                                    <?php foreach ($userrole AS $role): ?>
                                                        <option value="<?= $role->id; ?>"><?= $role->role_name; ?></option>
                                                    <?php endforeach;endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label class="col-lg-2 col-form-label "><span class="error">*</span>Password</label>
                                        <div class="col-lg-3">
                                            <input type="text" class="form-control form-control-sm"name="password" id="password"
                                                   placeholder="Password">
                                        </div>
                                        <label class="col-lg-2 col-form-label"><span class="error">*</span>Retype Password</label>
                                        <div class="col-lg-3">
                                            <input type="text" class="form-control form-control-sm"name="repassword" id="rePass"
                                                   placeholder="Retype Password">
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row " >

                                        <label class="col-lg-2 col-form-label"><span class="error">*</span>Mobile No</label>
                                        <div class="col-lg-3">
                                            <input type="text" class="form-control form-control-sm number" name="mobile"
                                                   id="mobile" maxlength="11"
                                                   placeholder="Mobile No">
                                        </div>
                                        <label class="col-lg-2 col-form-label"><span class="error">*</span>Email</label>
                                        <div class="col-lg-3">
                                            <input type="text" class="form-control form-control-sm " name="email"
                                                   id="email"
                                                   placeholder="Email">
                                        </div>

                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label class="col-lg-2 col-form-label">Image</label>
                                        <div class="col-lg-8">
                                            <input type="file" name="fileToUpload" id="file" >
                                            <span id="imageMsg"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="alert alert-danger alert-dismissible fade show   m-alert m-alert--air m-alert--outline m-alert--outline-2x" role="alert" id="user-alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-portlet__foot m-portlet__foot--fit">
                                    <div class="m-form__actions pull-right">
                                        <a href="<?= base_url('admin/view'); ?> "class="btn btn-danger">
                                         <i class="fa fa-arrow-left"> </i> Back
                                        </a>
                                        <button type="submit"  id="submit" class="btn btn-primary">
                                            Save
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Portlet-->
                    </div>

                </div>

            <!--end::Section-->

    </div>
</div>

<!-- end::Body -->