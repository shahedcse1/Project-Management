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
                <div class="m-portlet__body  m-portlet__body--no-padding ">

                    <form class="m-form m-form--fit m-form--label-align-right" method="post"
                          action="<?= base_url('report'); ?>">
                        <div class="form-group m-form__group row">

                            <div class="col-lg-2">
                                <label class="col-form-label"><b>Project</b></label>
                                <div class="input-group">
                                    <select name="project" class="form-control form-control-sm" id="project">
                                        <option value="">---Select Project---</option>
                                        <?php if (isset($project)): ?>
                                            <?php foreach ($project AS $project): ?>
                                                <option value="<?= $project->id; ?>"<?= $project->id == $projectId ? 'selected' : '' ?>><?= $project->project_name; ?></option>
                                                <?php
                                            endforeach;
                                        endif;
                                        ?>
                                        <option value="all" <?= $projectId == 'all' ? 'selected' : '' ?>>All</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <label class="col-form-label"><b>Priority</b> </label>
                                <div class="input-group">
                                    <select name="priority" class="form-control form-control-sm" id="priority">
                                        <option value="">----Select Priority----</option>
                                        <?php if (isset($priority)): ?>
                                            <?php foreach ($priority AS $p): ?>
                                                <option value="<?= $p->id; ?>"<?= $p->id == $priorityId ? 'selected' : '' ?>><?= $p->priority_name; ?></option>
                                                <?php
                                            endforeach;
                                        endif;
                                        ?>
                                        <option value="all" <?= $priorityId == 'all' ? 'selected' : '' ?>>All</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <label class="col-form-label"><b> Completion Status</b> </label>
                                <div class="input-group">
                                    <select name="completion" class="form-control form-control-sm" id="completion">
                                        <option value="">----Select Priority----</option>
                                        <?php if (isset($completions)): ?>
                                            <?php foreach ($completions AS $c): ?>
                                                <option value="<?= $c->id; ?>"<?= $c->id == $completion ? 'selected' : '' ?>><?= $c->completion_status; ?></option>
                                                <?php
                                            endforeach;
                                        endif;
                                        ?>
                                        <option value="all"<?= $completion == 'all' ? 'selected' : '' ?>>All</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <label class="col-form-label"><b>Assign By </b></label>
                                <div class="input-group">
                                    <select name="assignBy" class="form-control form-control-sm" id="assignBy">
                                        <option value="">----Select Assign By----</option>
                                        <?php if (isset($assignBy)): ?>
                                            <?php foreach ($assignBy AS $assignBy): ?>
                                                <option value="<?= $assignBy->id; ?>"<?= $assignBy->id == $assign_by ? 'selected' : '' ?>><?= $assignBy->name; ?></option>
                                                <?php
                                            endforeach;
                                        endif;
                                        ?>
                                        <option value="all"<?= $assign_by == 'all' ? 'selected' : '' ?>>All</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label class="col-form-label"><b>Report To </b></label>
                                <div class=" input-group">
                                    <select name="reportTo" class="form-control form-control-sm" id="reportTo">
                                        <option value="">----Select Report To----</option>
                                        <?php if (isset($reportTo)): ?>
                                            <?php foreach ($reportTo AS $reportTo): ?>
                                                <option value="<?= $reportTo->id; ?>"<?= $reportTo->id == $report_to ? 'selected' : '' ?>><?= $reportTo->name; ?></option>
                                                <?php
                                            endforeach;
                                        endif;
                                        ?>
                                        <option value="all"<?= $report_to == 'all' ? 'selected' : '' ?>>All</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label class="col-form-label"><b>Task Close Date </b></label>
                                <div class="input-daterange input-group" id="dateRange">
                                    <input type="text" class="form-control m-input form-control-sm" name="date-form"
                                           id="fromDate"
                                           value="<?= (!empty($dateForm)) ? $dateForm : '' ?>">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="la la-ellipsis-h"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control form-control-sm" name="date-to" id="toDate"
                                           value="<?= (!empty($dateTo)) ? $dateTo : '' ?>">
                                </div>
                            </div>

                            <div class="col-lg-1">
                                <div class="input-group">
                                    <button type="submit" class="btn btn-success btn-sm top-margin">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <br>
                    <div class="table-responsive col-md-12 view">
                        <!--begin: Datatable --> <br>
                        <table id="report" class="display nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>SI</th>
                                    <th>Project</th>
                                    <th>Task</th>
                                    <th>Assign To</th>

                                    <th>Completion Status</th>
                                    <th>Completion Start</th>
                                    <th>Completion End</th>
                                    <th>Task Close</th>

                                    <th>Progress</th>
                                    <th>Ratings</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                if (!empty($report)):
                                    $si = 1;
                                    foreach ($report AS $list):
                                        ?>
                                        <tr>
                                            <td><?= $si; ?></td>
                                            <td><?= $list->projectName; ?></td>
                                            <td><?= $list->task_name; ?></td>

                                            <td>
                                                <?=
                                                $assignto = $this->db
                                                        ->select('GROUP_CONCAT(users.name) as name')
                                                        ->from('assigndata')
                                                        ->join('task', 'task.id= assigndata.task_id')
                                                        ->join('users', 'users.id= assigndata.assign_id')
                                                        ->where('assigndata.task_id', $list->id)
                                                        ->get()
                                                        ->row()->name;
                                                ?>
                                            </td>



                                            <td class="text-center">
                                                <span class="status-width" >
                                                    <?php if ($list->comId == '1'): ?>
                                                        <span class="m-badge  m-badge--warning  m-badge--wide ">
                                                        <?php elseif ($list->comId == '2'): ?>
                                                            <span class="m-badge  m-badge--focus  m-badge--wide ">
                                                            <?php elseif ($list->comId == '3'): ?>
                                                                <span class="m-badge  m-badge--brand m-badge--wide ">
                                                                <?php endif; ?>
                                                                <?= $list->completion; ?>
                                                            </span>
                                                        </span>
                                                        </td>


                                                        <td><?= date('d-M-Y', strtotime($list->completion_startDate)); ?></td>
                                                        <td><?= date('d-M-Y', strtotime($list->completion_endDate)); ?></td>
                                                        <td><?= ($list->closeDate) != '0000-00-00' ? date('d-M-Y', strtotime($list->closeDate)) : ''; ?></td>


                                                        <td class="text-center"><?= !empty($list->progress) ? $list->progress : '0'; ?>
                                                            %
                                                        </td>
                                                        <td class="text-center tabWidth"><?= $list->evaluation ?></td>
                                                        </tr>
                                                        <?php
                                                        $si++;
                                                    endforeach;
                                                endif;
                                                ?>
                                                </tbody>
                                                </table>
                                                </div>
                                                </div>
                                                </div>
                                                <!--end::Section-->
                                                </div>
                                                </div>
                                                </div>

                                                <!-- end::Body -->