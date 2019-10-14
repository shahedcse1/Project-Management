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
            <?php if ($this->session->userdata('personal')): ?>

                <div class=" m-alert m-alert--outline alert alert-success alert-dismissible fade show"
                     role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                    <strong>
                        <?php echo $this->session->userdata('personal'); ?>
                    </strong>
                    <?php $this->session->unset_userdata('personal'); ?>
                </div>

            <?php elseif ($this->session->userdata('imageChange')): ?>
                <div class="container">
                    <div class="m-alert m-alert--outline alert alert-success alert-dismissible fade show"
                         role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                        <strong>
                            <?php echo $this->session->userdata('imageChange'); ?>
                        </strong>
                        <?php $this->session->unset_userdata('imageChange'); ?>
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
            <!--Begin::Section-->
            <div class="m-portlet">
                <div class="m-portlet__body  m-portlet__body--no-padding">
                    <div class="m-content profileContent">
                        <div class="row col-md-12">
                            <div class="col-xl-3 col-lg-4">
                                <div class=" m-portlet m-portlet--full-height ">
                                    <div class="m-portlet__body ">
                                        <div class="m-card-profile profile">
                                            <div class="m-card-profile__title m--hide">
                                                Your Profile
                                            </div>
                                            <div class="m-card-profile__pic">
                                                <div class="m-card-profile__pic-wrapper">
                                                    <img src="<?= base_url('uploads/') . $this->session->userdata('image_path'); ?>">
                                                </div>
                                            </div>
                                            <div class="m-card-profile__details">
                                                <span class="m-card-profile__name"><?= $this->session->userdata('user_name'); ?></span>
                                                <a href="<?= base_url('auth/logout'); ?>"
                                                   class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">Logout</a>
                                            </div>
                                            <br><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-9 col-lg-8 ">
                                <div class="m-portlet m-portlet--full-height m-portlet--tabs">
                                    <div class="m-portlet__head">
                                        <div class="m-portlet__head-tools">
                                            <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary"
                                                role="tablist">
                                                <li class="nav-item m-tabs__item">
                                                    <a class="nav-link m-tabs__link active" data-toggle="tab"
                                                       href="#m_user_profile_tab_1" role="tab">
                                                        <i class="flaticon-share m--hide"></i>
                                                        Update Profile
                                                    </a>
                                                </li>

                                                <li class="nav-item m-tabs__item">
                                                    <a class="nav-link m-tabs__link" data-toggle="tab"
                                                       href="#m_user_profile_tab_2" role="tab">
                                                        Change Password
                                                    </a>
                                                </li>
                                                <li class="nav-item m-tabs__item">
                                                    <a class="nav-link m-tabs__link" data-toggle="tab"
                                                       href="#m_user_profile_tab_3" role="tab">
                                                        Change Image
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="m_user_profile_tab_1">
                                            <form class="m-form m-form--fit m-form--label-align-right" action="<?= base_url('profile/personalInfo'); ?>" method="post">
                                                <div class="m-portlet__body profile">
                                                    <div class="form-group m-form__group row">
                                                        <div class="col-10 ml-auto">
                                                            <h3 class="m-form__section">Personal Details</h3>
                                                        </div>
                                                    </div>
                                                    <div class="form-group m-form__group row">
                                                        <label class="col-lg-2 col-form-label"><span
                                                                    class="error">*</span>User Name</label>
                                                        <div class="col-lg-3">
                                                            <input type="hidden" class="form-control form-control-sm" id="userid"
                                                                   name="userid" value="<?= $profile->id ? $profile->id :''; ?>">
                                                            <input type="text" class="form-control form-control-sm"
                                                                   name="userName"
                                                                   id="userName" value="<?=  $profile->name ? $profile->name :''; ?>">
                                                        </div>
                                                        <label class="col-lg-2 col-form-label"><span
                                                                    class="error">*</span>User Pin</label>
                                                        <div class="col-lg-3">
                                                            <input type="text"
                                                                   class="form-control form-control-sm number"
                                                                   name="userPin"
                                                                   id="editPin"
                                                                   value="<?= $profile->user_pin; ?>">
                                                            <span id="userPinMsg"></span>
                                                        </div>

                                                    </div>
                                                    <div class="form-group m-form__group row ">
                                                        <label class="col-lg-2 col-form-label"><span
                                                                    class="error">*</span>Status</label>
                                                        <div class="col-lg-3">
                                                            <select class="form-control form-control-sm" name="status"
                                                                    id="status">
                                                                <option value="1"  <?= !empty($profile->status) == 1 ? 'selected' : ''; ?>>
                                                                    Active
                                                                </option>
                                                                <option value="0"<?= !empty($profile->status) == 0 ? 'selected' : ''; ?>>
                                                                    Inactive
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <label class="col-lg-2 col-form-label"><span
                                                                    class="error">*</span>Mobile No</label>
                                                        <div class="col-lg-3">
                                                            <input type="text"
                                                                   class="form-control form-control-sm number"
                                                                   name="mobile"
                                                                   id="mobile" maxlength="11"
                                                                   value="<?=  $profile->phone ?  $profile->phone:''; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group m-form__group row">
                                                        <label class="col-lg-2 col-form-label "><span
                                                                    class="error">*</span>Email</label>
                                                        <div class="col-lg-8">
                                                            <input type="text"
                                                                   class="form-control form-control-sm "
                                                                   name="email"
                                                                   id="email"
                                                                   value="<?=  $profile->email ?  $profile->email:''; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="m-portlet__foot m-portlet__foot--fit profile">
                                                    <div class="m-form__actions">
                                                        <div class="row pull-right">
                                                            <div class="col-12">&nbsp;
                                                                <a href="<?= base_url('dashboard'); ?> "class="btn btn-danger">
                                                                    <i class="fa fa-arrow-left"> </i> Back
                                                                </a>
                                                                <button type="submit"
                                                                        class="btn btn-accent m-btn m-btn--air m-btn--custom">
                                                                    Save
                                                                </button>&nbsp;
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane " id="m_user_profile_tab_2">
                                            <form class="m-form m-form--fit m-form--label-align-right" action="<?= base_url('profile/personalPassword'); ?>" method="post">
                                                <div class="m-portlet__body profile">
                                                    <div class="form-group m-form__group row">
                                                        <input type="hidden" class="form-control form-control-sm" id="userid"
                                                               name="userid" value="<?= $profile->id; ?>">
                                                        <label class="col-lg-3 col-form-label">New Password :</label>
                                                        <div class="col-lg-9">
                                                            <input class=" form-control" id="userid" name="poid"
                                                                   value="" type="hidden"/>
                                                            <span id="current-password"></span>
                                                            <input type="text" class="form-control form-control-sm"
                                                                   id="new"
                                                                   name="new-password">
                                                            <span id="new-password"></span>
                                                        </div>
                                                        <label class="col-lg-3 col-form-label">Verify New
                                                            Password:</label>
                                                        <div class="col-lg-9">
                                                            <input type="text" class="form-control form-control-sm"
                                                                   id="reset"
                                                                   name="rpassword">
                                                            <span id="reset-password"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="m-portlet__foot m-portlet__foot--fit profile">
                                                    <div class="m-form__actions ">
                                                        <div class="row pull-right">
                                                            <div class="col-12 ">
                                                                <a href="<?= base_url('dashboard'); ?> "class="btn btn-danger">
                                                                    <i class="fa fa-arrow-left"> </i> Back
                                                                </a>
                                                                <button type="submit" onclick="return updatePassword()"
                                                                        class="btn btn-accent m-btn m-btn--air m-btn--custom">
                                                                    Save
                                                                </button>&nbsp;&nbsp;

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane " id="m_user_profile_tab_3">
                                            <form class="m-form m-form--fit m-form--label-align-right" enctype="multipart/form-data" action="<?= base_url('profile/imageChange'); ?>"  method="post">
                                                <div class="m-portlet__body profile">
                                                    <input type="hidden" class="form-control form-control-sm" id="userid"
                                                           name="userid" value="<?= $profile->id; ?>">
                                                    <label class="col-lg-2 col-form-label">Image:</label>
                                                    <div class="col-lg-3">
                                                        <input type="file" name="fileToUpload" id="file">
                                                        <span id="imageMsg"></span>
                                                    </div>
                                                    <br>
                                                    <div class="col-lg-3">
                                                        <img src="<?= base_url('uploads/') . $this->session->userdata('image_path'); ?> "
                                                             height="100px" width="200px" alt=""/>
                                                    </div>
                                                </div>
                                                <div class="m-portlet__foot m-portlet__foot--fit profile">
                                                    <div class="m-form__actions">
                                                        <div class="row pull-right">
                                                            <div class="col-12">
                                                                <a href="<?= base_url('dashboard'); ?> "class="btn btn-danger">
                                                                    <i class="fa fa-arrow-left"> </i> Back
                                                                </a>
                                                                <button type="submit"
                                                                        class="btn btn-accent m-btn m-btn--air m-btn--custom">
                                                                    Save
                                                                </button>&nbsp;&nbsp;

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Section-->
        </div>
    </div>
</div>

<!-- end::Body -->