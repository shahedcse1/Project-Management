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
                <div class="m-portlet__body  m-portlet__body--no-padding view">
                    <br>
                    <div class="container">
                        <div class=" table-responsive">
                            <table class="display " style="width:100%" id="userData">
                                <thead>
                                <tr>
                                    <th>SI</th>
                                    <th>Task Name</th>
                                    <th>Status</th>
                                    <th>Priority</th>
                                    <th>Project</th>
                                    <th>Completion Start</th>
                                    <th>Completion End</th>
                                    <th>Task Close</th>
                                    <th>Progress</th>
                                    <th>Evaluation </th>
                                    <th>Completion Status</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $si=1;

                                if (!empty($taskList)):
                                    foreach ($taskList AS $list): ?>
                                        <tr>
                                            <td><?= $si; ?></td>
                                            <td><?= $list->task_name; ?></td>
                                            <td class="text-center">
                                                <?php if ($list->status == 1): ?>
                                                    <span class="status-width" ?>
                                       <span class="m-badge  m-badge--success m-badge--wide ">Active</span></span>
                                                <?php else: ?>
                                                    <span class="status-width" ?>
                                       <span class=" m-badge  m-badge--danger m-badge--wide ">Close</span></span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center">
                                                  <span class="status-width" ?>
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
                                            <td><?= date('d-M-Y', strtotime($list->closeDate)); ?></td>
                                            <td class="text-center"><?= !empty($list->progress) ? $list->progress : '0'; ?>
                                                %
                                            </td>
                                            <td class="text-center tabWidth" >
                                                <?php
                                                if($list->evaluation <'6'):
                                                for($i=1;$i<=($list->evaluation);$i++){
                                                    echo '<span class="ratinglist">
                                                    <input type="radio" name="rating"><span class="fa fa-star-o fa-2x"></span>';
                                                }
                                                endif;
                                               ?>
                                            </td>
                                            <td class="text-center">
                                                <span class="status-width" ?>
                                                    <span class="m-badge  m-badge--brand  m-badge--wide ">
                                                <?= $list->completion; ?>
                                                    </span>
                                                </span>
                                            </td>
                                        </tr>
                                        <?php $si++;
                                    endforeach;endif; ?>
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

<!-- end::Body -->