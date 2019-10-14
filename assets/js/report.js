$(document).ready(function () {
    $('#report').DataTable({
        responsive: true,
        "aaSorting": [[0, "desc"]],
        "bInfo": false,
        dom: 'Bfrtip',
        buttons: [
            'copy', 'excel', 'pdf'
        ]
    });

    $('.dateRange').datepicker({
        todayHighlight: !0,
        format: 'dd/mm/yyyy',
        orientation: "bottom",
        templates: {leftArrow: '<i class="la la-angle-left"></i>', rightArrow: '<i class="la la-angle-right"></i>'}
    });
    $('.complete').datepicker({
        todayHighlight: !0,
        format: 'dd/mm/yyyy',
        orientation: "bottom",
        templates: {leftArrow: '<i class="la la-angle-left"></i>', rightArrow: '<i class="la la-angle-right"></i>'}
    });

    $( "#project" ).change(function() {

        $( "#priority" ).val('');
        $( "#completion" ).val('');
        $( "#assignTo" ).val('');
        $( "#assignBy" ).val('');
        $( "#reportTo" ).val('');
        $( "#fromDate" ).val('');
        $( "#toDate" ).val('');

    });
    $( "#priority" ).change(function() {

        $( "#project" ).val('');
        $( "#completion" ).val('');
        $( "#assignTo" ).val('');
        $( "#assignBy" ).val('');
        $( "#reportTo" ).val('');
        $( "#fromDate" ).val('');
        $( "#toDate" ).val('');

    });

    $( "#completion" ).change(function() {

        $( "#project" ).val('');
        $( "#priority" ).val('');
        $( "#assignTo" ).val('');
        $( "#assignBy" ).val('');
        $( "#reportTo" ).val('');
        $( "#fromDate" ).val('');
        $( "#toDate" ).val('');

    });
    $( "#assignTo" ).change(function() {

        $( "#project" ).val('');
        $( "#priority" ).val('');
        $( "#completion" ).val('');
        $( "#assignBy" ).val('');
        $( "#reportTo" ).val('');
        $( "#fromDate" ).val('');
        $( "#toDate" ).val('');

    });
    $( "#assignBy" ).change(function() {

        $( "#project" ).val('');
        $( "#priority" ).val('');
        $( "#completion" ).val('');
        $( "#assignTo" ).val('');
        $( "#reportTo" ).val('');
        $( "#fromDate" ).val('');
        $( "#toDate" ).val('');

    });
    $( "#reportTo" ).change(function() {

        $( "#project" ).val('');
        $( "#priority" ).val('');
        $( "#completion" ).val('');
        $( "#assignTo" ).val('');
        $( "#assignBy" ).val('');
        $( "#fromDate" ).val('');
        $( "#toDate" ).val('');

    });
    $( "#fromDate" ).change(function() {

        $( "#project" ).val('');
        $( "#priority" ).val('');
        $( "#completion" ).val('');
        $( "#assignTo" ).val('');
        $( "#assignBy" ).val('');
        $( "#reportTo" ).val('');
    });
    $( "#toDate" ).change(function() {

        $( "#project" ).val('');
        $( "#priority" ).val('');
        $( "#completion" ).val('');
        $( "#assignTo" ).val('');
        $( "#assignBy" ).val('');
        $( "#reportTo" ).val('');
    });




});