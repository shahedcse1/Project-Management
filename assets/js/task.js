$(document).ready(function() {
    $('#taskAlert').hide();
    $('#projectData').hide();
    $('#closeTask').hide();

    var typelist = $('#typelist').val();
    var completion = $('#completion').val();
    if (typelist == '2') {
        $('#projectData').show();
        $(".m-select2").select2();
    } else {
        $('#projectData').hide();
    }
    if (completion == '3') {
        $('#closeTask').show();
    } else {
        $('#closeTask').hide();
    }

});

$("#completion").change(function() {
    var completion = $('#completion').val();
    if (completion == '3') {
        $('#closeTask').show();
    } else {
        $('#closeTask').hide();
    }
});

$("#type").change(function() {

    type = $('#type').val();
    if (type == '2') {
        $('#projectData').show();
        $(".m-select2").select2();
    } else {
        $('#projectData').hide();
    }
});
$("#check").change(function() {
    $(".assign").prop('checked', $(this).prop("checked"));
});

$("#checkAll").change(function() {
    $(".follow").prop('checked', $(this).prop("checked"));
});

$("#type").change(function() {

    type = $('#type').val();
    if (type == '2') {
        $('#projectData').show();
        $(".m-select2").select2();
    } else {
        $('#projectData').hide();
    }
});


$("#taskForm").on('submit', function(e) {
    e.preventDefault();
    var taskName = $('#taskName').val(),
            status = $('#status').val(),
            priority = $('#priority').val(),
            reportTo = $('#reportTo').val(),
            assignTo = $('#assignTo').val(),
            assignBy = $('#assignBy').val(),
            type = $('#type').val(),
            project = $('#project').val(),
            fromDate = $('#fromdate').val(),
            toDate = $('#todate').val(),
            count_follow = $("[name='followup[]']:checked").length,
            count_assignto = $("[name='assignTo[]']:checked").length;

    if (taskName == '') {
        $('#taskAlert').html('Task Name is required.').show();
        return false;
    }
    if (status == '') {
        $('#taskAlert').html('Status is required.').show();
        return false;
    }
    if (priority == '' || priority == null) {
        $('#taskAlert').html('Priority is required.').show();
        return false;
    }
    if (reportTo == '' || reportTo == null) {
        $('#taskAlert').html('Report To is required.').show();
        return false;
    }
    if (assignTo == '' || assignTo == null) {
        $('#taskAlert').html('Assign To is required.').show();
        return false;
    }
    if (assignBy == '' || assignBy == null) {
        $('#taskAlert').html('Assign By is required.').show();
        return false;
    }
    if (!(count_follow > 0)) {
        $('#taskAlert').html('Please fill at least one checkbox of followup.').show();
        return false;
    }
    if (!(count_assignto > 0)) {
        $('#taskAlert').html('Please fill at least one checkbox of assignto.').show();
        return false;
    }
    if (type == '' || type == null) {
        $('#taskAlert').html('Task Type is required.').show();
        return false;
    }
    if (type == '2' && project == '') {
        $('#taskAlert').html('Project  is required.').show();
        return false;
    }

    if (fromDate == '') {
        $('#taskAlert').html('Completion Start Date  is required.').show();
        return false;
    }
    if (toDate == '') {
        $('#taskAlert').html('Completion Complete Date  is required.').show();
        return false;
    }

    else {
        $.ajax({
            type: 'POST',
            url: base_url + 'task/add',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $('#submit').attr("disabled", "disabled");
            },
            success: function(data) {

                window.location = base_url + 'task/view';
            }

        });

    }
});
$(".itemDelete").click(function(e) {
    var id = $(this).val();
    swal({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        type: "warning",
        showCancelButton: !0,
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!",
        reverseButtons: !0
    }).then(function(e) {
        if (e.value) {

            $.ajax({
                url: base_url + "/task/delete",
                type: "POST",
                data: {
                    id: id,
                },
                success: function() {
                    swal("Done!", "It was succesfully deleted!", "success");
                    window.location.reload();
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    swal("Error deleting!", "Please try again", "error");
                }
            });
        }

    });
});

$("#editForm").on('submit', function(e) {
    e.preventDefault();

    var taskName = $('#taskName').val(),
            status = $('#status').val(),
            priority = $('#priority').val(),
            reportTo = $('#reportTo').val(),
            assignTo = $('#assignTo').val(),
            assignBy = $('#assignBy').val(),
            type = $('#type').val(),
            project = $('#project').val(),
            fromDate = $('#fromdate').val(),
            toDate = $('#todate').val(),
            count_follow = $("[name='followup[]']:checked").length,
            count_assignto = $("[name='assignTo[]']:checked").length;

    completion = $('#completion').val(),
            closeDate = $('#closeDate').val(),
            comments = $('#comments').val(),
            rating = $("input[name='rating']:checked").length,
            progresslist = $("#progressVal").val();

    if (taskName == '') {
        $('#taskAlert').html('Task Name is required.').show();
        return false;
    }
    if (status == '') {
        $('#taskAlert').html('Status is required.').show();
        return false;
    }
    if (priority == '' || priority == null) {
        $('#taskAlert').html('Priority is required.').show();
        return false;
    }
    if (reportTo == '' || reportTo == null) {
        $('#taskAlert').html('Report To is required.').show();
        return false;
    }
    if (assignTo == '' || assignTo == null) {
        $('#taskAlert').html('Assign To is required.').show();
        return false;
    }
    if (assignBy == '' || assignBy == null) {
        $('#taskAlert').html('Assign By is required.').show();
        return false;
    }
    if (!(count_follow > 0)) {
        $('#taskAlert').html('Please fill at least one checkbox of followup.').show();
        return false;
    }
    if (!(count_assignto > 0)) {
        $('#taskAlert').html('Please fill at least one checkbox of assignto.').show();
        return false;
    }
    if (type == '' || type == null) {
        $('#taskAlert').html('Task Type is required.').show();
        return false;
    }
    if (type == '2' && project == '') {
        $('#taskAlert').html('Project  is required.').show();
        return false;
    }
    if (completion == '') {
        $('#taskAlert').html('Completion  is required.').show();
        return false;
    }
    if (completion == '3' && closeDate == '') {
        $('#taskAlert').html('Close Date is required.').show();
        return false;
    }
    if (completion == '3' && comments == '') {
        $('#taskAlert').html('Remark is required').show();
        return false;
    }
    if (completion == '3' && !(rating > 0)) {
        $('#taskAlert').html('Please fill at least one Evaluation.').show();
        return false;
    }

    else {
        $.ajax({
            type: 'POST',
            url: base_url + 'task/update',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $('#submit').attr("disabled", "disabled");
            },
            success: function(data) {
                window.location = base_url + 'task/view';
            }

        });

    }
});

