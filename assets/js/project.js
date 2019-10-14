$(document).ready(function() {
    $('#projectAlert').hide();

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
                url: base_url + "/project/delete",
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

$("#projectForm").on('submit', function(e) {
    e.preventDefault();

    var projectName = $('#projectName').val(),
            status = $('#status').val(),
            priority = $('#priority').val(),
            location = $('#location').val(),
            description = $('#description').val();

    if (projectName == '') {
        $('#projectAlert').html('Project Name is required.').show();
        return false;
    }
    if (status == '') {
        $('#projectAlert').html('Status is required.').show();
        return false;
    }

    if (priority == '' || priority == null) {
        $('#projectAlert').html('Priority is required.').show();
        return false;
    }
    if (location == '') {
        $('#projectAlert').html('Location is required.').show();
        return false;
    }
    if (description == '') {
        $('#projectAlert').html('Description  is required.').show();
        return false;
    }


    else {

        $.ajax({
            type: 'POST',
            url: base_url + 'project/add',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $('#submit').attr("disabled", "disabled");
            },
            success: function(data) {
                window.location = base_url + 'project/view';
            }

        });

    }
});


$("#file").change(function() {
    var validFileExtensions = [".jpg", ".jpeg", ".pdf", ".xls", ".xlsx", ".JPG", ".JPEG", ".PDF", ".zip", ".rar", ".png", ".PNG"];

    if (this.type == "file") {
        var sFileName = this.value;
        if (sFileName.length > 0) {
            var blnValid = false;
            for (var j = 0; j < validFileExtensions.length; j++) {
                var sCurExtension = validFileExtensions[j];
                if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                    blnValid = true;
                    break;
                }
            }

            if (!blnValid) {
                $("#uploadMsg")
                        .text("Please select a valid  file " + validFileExtensions.join("/"))
                        .css('color', 'red');
                this.value = "";
                $('#submit').attr("disabled", true);
                return false;
            }
        }
    }
    $("#uploadMsg").text("");
    $('#submit').removeAttr("disabled");
    return true;

});
function editProject(projectid) {

    $('#projectid').val(projectid);

    $.ajax({
        type: 'POST',
        url: base_url + "project/edit",
        dataType: 'json',
        data: {
            id: projectid
        },
        cache: false,
        success: function(response) {

            $('#projectName').val(response.project_name);
            $('#status').val(response.status).change();
            $('#location').val(response.location);
            $('#description').val(response.description);

            var fileName = response.file_name;
            var extension = fileName.substr((fileName.lastIndexOf('.') + 1));
            if (extension == "jpg" || extension == "JPG" || extension == "jpeg" || extension == "JPEG" || extension == "png" || extension == "PNG") {
                $('#upload_image').html('<img src="' + base_url + 'files/' + response.file_name + '" style="width: 200px;"/>');
            } else {
                $('#upload_image').html('<a href="' + base_url + 'files/' + response.file_name + '" >' + response.file_name + '</a>');
            }

            var priority = response.priority;
            var dropdown = $('#priority');
            dropdown.empty();
            $('#priority').append('<option value="">--Select--</option>')
            var sel = document.getElementById('priority');


            for (var i = 0; i < response.prioritylist.length; i++) {
                select = document.getElementById('priority');
                var opt = document.createElement('option');

                priority == response.prioritylist[i].id ? opt.selected = true : opt.selected = false;

                opt.value = response.prioritylist[i].id;
                opt.innerHTML = response.prioritylist[i].priority_name;
                sel.appendChild(opt);
            }
        }

    });
    $('#editmodal').modal('show');
}


