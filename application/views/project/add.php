
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
        <!-- END: Subheader -->
        <div class="m-content">
            <!--Begin::Section-->
            <div class="m-portlet m-portlet--tab">
                <!--begin::Form project ADD-->
                <form class="m-form m-form--fit m-form--label-align-right" id="projectForm" enctype="multipart/form-data">
                    <div class="m-portlet__body backgroundColor ">
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label"><span class="error">*</span>Project Name</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control form-control-sm" name="project_name"
                                       id="projectName"
                                       placeholder="Project Name">
                            </div>
                            <label class="col-lg-2 col-form-label"><span class="error">*</span>Project Status</label>
                            <div class="col-lg-3">
                                <select class="form-control form-control-sm" name="status" id="status">
                                    <option value="1">Active</option>
                                    <option value="1">In Active</option>
                                </select>
                            </div>

                        </div>
                        <div class="form-group m-form__group row " >

                            <label class="col-lg-2 col-form-label"><span class="error">*</span>Priority</label>
                            <div class="col-lg-3">
                                <select name="priority" class="form-control form-control-sm" id="priority">
                                    <option value="">----Select Role----</option>
                                    <?php if (isset($priority)): ?>
                                        <?php foreach ($priority AS $p): ?>
                                            <option value="<?= $p->id; ?>"><?= $p->priority_name; ?></option>
                                        <?php endforeach;endif; ?>
                                </select>
                            </div>
                            <label class="col-lg-2 col-form-label">Upload File</label>
                            <div class="col-lg-3">
                                <input type="file" name="fileToUpload" id="file" >
                                <span id="uploadMsg"></span>
                            </div>

                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label "><span class="error">*</span>Location</label>
                            <div class="col-lg-8">
                                <textarea class="form-control" name="location" id="location" placeholder="Project Location"  cols="12" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label "><span class="error">*</span>Project Description</label>
                            <div class="col-lg-8">
                                <textarea class="form-control" name="description" placeholder="Project Description" id="description" cols="12" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="alert alert-danger alert-dismissible fade show   m-alert m-alert--air m-alert--outline m-alert--outline-2x" role="alert" id="projectAlert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="m-form__actions pull-right">
                            <a href="<?= base_url('project/view'); ?> "class="btn btn-danger">
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
            <!--end::Section-->
        </div>
    </div>
</div>

<!-- end::Body -->