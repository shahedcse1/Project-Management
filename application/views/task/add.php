
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
            <div class="m-portlet">
                <div class="m-portlet__body  m-portlet__body--no-padding">
                    <!--begin::Form Task ADD-->
                    <form class="m-form m-form--fit m-form--label-align-right" id="taskForm">
                        <div class="m-portlet__body backgroundColor ">
                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label"><span class="error">*</span>Task Name</label>
                                <div class="col-lg-3">
                                    <input type="text"
                                           class="form-control form-control-sm"
                                           name="taskName"
                                           id="taskName"
                                           placeholder="Task Name"
                                    >
                                </div>
                                <label class="col-lg-2 col-form-label"><span class="error">*</span>Task Status</label>
                                <div class="col-lg-3">
                                    <select class="form-control form-control-sm" name="status" id="status">
                                        <option value="1">Active</option>
                                        <option value="2">In Active</option>
                                    </select>
                                </div>

                            </div>
                            <div class="form-group m-form__group row " >
                                <label class="col-lg-2 col-form-label"><span class="error">*</span>Task Priority</label>
                                <div class="col-lg-3">
                                    <select name="priority" class="form-control form-control-sm" id="priority">
                                        <option value="">----Select Priority----</option>
                                        <?php if (isset($priority)): ?>
                                            <?php foreach ($priority AS $p): ?>
                                                <option value="<?= $p->id; ?>"><?= $p->priority_name; ?></option>
                                            <?php endforeach;endif; ?>
                                    </select>
                                </div>
                                <label class="col-lg-2 col-form-label"><span class="error">*</span>Report To</label>
                                <div class="col-lg-3">
                                    <select name="reportTo" class="form-control form-control-sm" id="reportTo">
                                        <option value="">----Select Report To----</option>
                                        <?php if (isset($reportTo)): ?>
                                            <?php foreach ($reportTo AS $reportTo): ?>
                                                <option value="<?= $reportTo->id; ?>"><?= $reportTo->name; ?></option>
                                            <?php endforeach;endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group m-form__group row ">
                                <label class="col-lg-2 col-form-label"><span class="error">*</span>Assign To</label>
                                <div class="col-lg-10 m-checkbox-inline">
                                    <?php if (sizeof($assignTo)): ?>
                                        <?php foreach ($assignTo AS $assignTo): ?>
                                            <label class=" m-checkbox m-checkbox--success">
                                                <input type="checkbox"
                                                       id="assignTo" class="assign"
                                                       name="assignTo[]"
                                                       value="<?= $assignTo->id; ?>"><?= $assignTo->name ?>
                                                <span></span>
                                            </label>
                                        <?php endforeach;endif; ?>
                                    <label class="m-checkbox m-checkbox--primary">
                                        <input type="checkbox" name="select-assign" id="check"/>Check All
                                        <span></span>
                                    </label>
                                </div>

                            </div>
                            <div class="form-group m-form__group row ">
                                <label class="col-lg-2 col-form-label"><span class="error">*</span>Follow Up</label>
                                <div class="col-lg-10 m-checkbox-inline">
                                    <?php if (sizeof($followUp)): ?>
                                        <?php foreach ($followUp as $follow): ?>
                                            <label class=" m-checkbox m-checkbox--success">
                                                <input type="checkbox"
                                                       id="followup" class="follow"
                                                       name="followup[]"
                                                       value="<?= $follow->id; ?>"><?= $follow->name ?>
                                                <span></span>
                                            </label>
                                        <?php endforeach;endif; ?>

                                    <label class="m-checkbox m-checkbox--primary">
                                        <input type="checkbox" name="select-all" id="checkAll"/>Check All
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group m-form__group row ">
                                <label class="col-lg-2 col-form-label"><span class="error">*</span>Assign By</label>
                                <div class="col-lg-8">
                                    <select name="assignBy" class="form-control form-control-sm" id="assignBy">
                                        <option value="">----Select Assign By----</option>
                                        <?php if (isset($assignBy)): ?>
                                            <?php foreach ($assignBy AS $assignBy): ?>
                                                <option value="<?= $assignBy->id; ?>"><?= $assignBy->name; ?></option>
                                            <?php endforeach;endif; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group m-form__group row ">

                                <label class="col-lg-2 col-form-label"><span class="error">*</span>Task Type</label>
                                <div class="col-lg-8">
                                    <select name="type" class="form-control form-control-sm" id="type">
                                        <option value="">----Select Type----</option>
                                        <?php if (isset($taskType)): ?>
                                            <?php foreach ($taskType AS $taskType): ?>
                                                <option value="<?= $taskType->id; ?>"><?= $taskType->type_name; ?></option>
                                            <?php endforeach;endif; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group m-form__group row" id="projectData">
                                <label class="col-lg-2 col-form-label ">Project</label>
                                <div class="col-lg-8">
                                    <select name="project" class="form-control  m-select2" id="project">
                                        <option value="">---Select Project---</option>
                                        <?php if (isset($project)): ?>
                                            <?php foreach ($project AS $project): ?>
                                                <option value="<?= $project->id; ?>"><?= $project->project_name; ?></option>
                                            <?php endforeach;endif; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group m-form__group row ">
                                <label class="col-lg-2 col-form-label">Task Completion Date:</label>
                                <div class="col-lg-8">
                                    <div class="input-daterange input-group input-group-sm " id="dateRange">
                                        <input type="text" class="form-control m-input input-sm form-control-sm gap"
                                               name="date_from" id="fromdate">
                                        <div class="input-group-append"><span class="input-group-text"><i
                                                        class="la la-ellipsis-h"></i></span>
                                        </div>
                                        <input type="text" class="form-control form-control-sm" name="date_to" id="todate">&nbsp;&nbsp;
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="alert alert-danger alert-dismissible fade show   m-alert m-alert--air m-alert--outline m-alert--outline-2x" role="alert" id="taskAlert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__foot--fit">
                            <div class="m-form__actions pull-right">
                                <a href="<?= base_url('task/view'); ?>" class="btn btn-danger">
                                    <i class="fa fa-arrow-left"> </i> Back
                                </a>
                                <button type="submit" id="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>


                    <!--end::Form-->
                </div>
            </div>
            <!--end::Section-->
        </div>
    </div>
</div>

<!-- end::Body -->