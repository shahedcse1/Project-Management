<!-- begin::Body -->
<div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver-desktop m-grid--desktop m-container m-container--responsive m-container--xxl m-page__container m-body">
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
            <?php endif; ?>

        </div>
        <!-- END: Subheader -->
        <div class="m-content">
            <!--Begin::Section-->
            <div class="m-portlet">
                <div class="m-portlet__body  m-portlet__body--no-padding view">
                    <br>
                    <?php if ($user != '3') : ?>
                        <div class="container">
                            <div class="m-portlet__head-tools pull-right">
                                <a href="<?= base_url('task/create'); ?>"
                                   class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air">
                                    <span>
                                        <i class="la la-plus"></i>
                                        <span>Add Task</span>
                                    </span></a>

                            </div>
                        <?php endif; ?>
                        <br><br>
                        <div class="table-responsive">
                            <table class="display " style="width:100%" id="userData">
                                <thead>
                                    <tr>
                                        <th>SI</th>
                                        <th>Task</th>
                                        <th>Status</th>
                                        <th>Priority</th>
                                        <th>Project</th>
                                        <th>Completion Start</th>
                                        <th>Completion End</th>
                                        <th>Progress</th>
                                        <th>Completion Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $si = 1;
                                    if (!empty($taskList)):
                                        foreach ($taskList AS $list):
                                            ?>
                                            <tr>
                                                <td><?= $si; ?></td>
                                                <td><?= $list->task_name; ?></td>
                                                <td class="text-center">
                                                    <?php if ($list->status == 1): ?>
                                                        <span class="status-width">
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
                                                            <td><?= $list->projectName; ?></td>
                                                            <td><?= date('d-M-Y', strtotime($list->completion_startDate)); ?></td>
                                                            <td><?= date('d-M-Y', strtotime($list->completion_endDate)); ?></td>
                                                            <td class="text-center"><?= !empty($list->progress) ? $list->progress : '0'; ?>
                                                                %
                                                            <td class="text-center">
                                                                <span class="status-width">
                                                                    <?php if ($list->comId == '1'): ?>
                                                                        <span class="m-badge  m-badge--warning  m-badge--wide ">
                                                                        <?php elseif ($list->comId == '2'): ?>
                                                                            <span class="m-badge  m-badge--focus  m-badge--wide ">
                                                                            <?php endif; ?>
                                                                            <?= $list->completion; ?>
                                                                        </span>
                                                                    </span>
                                                                </span>
                                                            </td>

                                                            </td>
                                                            <td class="text-center">
                                                                <a href="<?= base_url('task/edit/' . $list->id); ?>"
                                                                   class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill"
                                                                   title="Edit Task">
                                                                    <i class="la la-edit"></i>
                                                                </a>

                                                                <button type="button" value="<?= $list->id; ?>"
                                                                        class="itemDelete m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill "
                                                                        title="Delete Task">
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
                                                    </div>
                                                    <br>
                                                    </div>
                                                    </div>
                                                    <!--end::Section-->
                                                    </div>
                                                    </div>
                                                    </div>
