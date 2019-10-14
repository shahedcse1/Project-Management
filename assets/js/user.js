$(document).ready(function () {
    $('#user-alert').hide();
    $(".modal").on("hidden.bs.modal", function () {
        $("#new").val('');
        $("#reset").val('')
    });
});

$(".number").on("keypress keyup blur", function (event) {
    //this.value = this.value.replace(/[^0-9\.]/g,'');
    $(this).val($(this).val().replace(/[^0-9\.]/g, ''));
    if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
        event.preventDefault();
    }
});
$("#userForm").on('submit', function (e) {
    e.preventDefault();

    var userName = $('#userName').val(),
        userPin = $('#userPin').val(),
        status = $('#status').val(),
        userRole = $('#userRole').val(),
        password = $('#password').val(),
        rePass = $('#rePass').val(),
        mobile = $('#mobile').val(),
        email = $('#email').val();

    if (userName == '') {
        $('#user-alert').html('User Name is required.').show();
        return false;
    }
    if (userPin == '') {
        $('#user-alert').html('User Pin is required.').show();
        return false;
    }
    if (status == '') {
        $('#user-alert').html('Status is required.').show();
        return false;
    }
    if (userRole == '' || userRole == null) {
        $('#user-alert').html('User Role is required.').show();
        return false;
    }
    if (password == '') {
        $('#user-alert').html('Password is required.').show();
        return false;
    }
    if (rePass == '') {
        $('#user-alert').html('Retype Password is required.').show();
        return false;
    }
    if (password != rePass) {
        $('#user-alert').html('Password is not match with ReType Password.').show();
        return false;
    }
    if (mobile == '') {
        $('#user-alert').html('Mobile is required.').show();
        return false;
    }
    if (email == '') {
        $('#user-alert').html('Email is required.').show();
        return false;
    }
    if(IsEmail(email)==false){
        $('#user-alert').html('Email is Invalid.').show();
        return false;
    }
    else {

        $.ajax({
            type: 'POST',
            url: base_url + 'admin/add',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {
                $('#submit').attr("disabled", "disabled");
            },
            success: function (data) {
                window.location = base_url + 'admin/view';
            }

        });

    }
});
function IsEmail(email) {
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if(!regex.test(email)) {
        return false;
    }else{
        return true;
    }
}
$("#file").change(function () {
    var file = this.files[0];
    var imagefile = file.type;
    var match = ["image/jpeg", "image/png", "image/jpg"];
    if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2]))) {
        $('#submit').attr("disabled", true);
        $("#imageMsg")
            .text("Please select a valid image file (JPEG/JPG/PNG).")
            .css('color', 'red');
        $("#file").val('');
        return false;

    }
    else {
        $('#submit').removeAttr("disabled");
    }
});
$("#userPin").change(function () {
    var userPin = $("#userPin").val();

    $.ajax({
        type: "POST",
        url: base_url + 'admin/checkpin',
        data: {
            userPin: userPin

        },
        success: function (data) {
            if (data) {

                $('#submit').removeAttr("disabled");
                $("#userPinMsg")
                    .text("Valid user Pin")
                    .css('color', 'green');
            } else {
                $('#submit').attr("disabled", true);
                $("#userPinMsg")
                    .text("This User Pin number already exist !!")
                    .css('color', 'red');

            }
        }
    });
});
$("#editPin").change(function () {
    var userPin = $("#editPin").val();
    var userId = $("#userid").val();

    $.ajax({
        type: "POST",
        url: base_url + 'admin/checkpinedit',
        data: {
            userPin: userPin,
            userId: userId

        },
        success: function (data) {
            if (data) {

                $('#submit').removeAttr("disabled");
                $("#userPinMsg")
                    .text("Valid user Pin")
                    .css('color', 'green');
            } else {
                $('#submit').attr("disabled", true);
                $("#userPinMsg")
                    .text("This User Pin number already exist !!")
                    .css('color', 'red');

            }
        }
    });
});

function edituser(userid) {

    $('#userid').val(userid);

    $.ajax({
        type: 'POST',
        url: base_url + "admin/edit",
        dataType: 'json',
        data: {
            id: userid
        },
        cache: false,
        success: function (response) {

            $('#userName').val(response.name);
            $('#editPin').val(response.user_pin);
            $('#mobile').val(response.phone);
            $('#email').val(response.email);
            $('#status').val(response.status).change();

            var image = response.image_path;
            if (image == '') {
                $('#upload_image').html('<img src="' + base_url + 'uploads/' + 'login.png' + '" style="width: 200px;"/>');

            } else {
                $('#upload_image').html('<img src="' + base_url + 'uploads/' + response.image_path + '" style="width: 200px;"/>');
            }

            var userrole = response.role_id;
            var dropdown = $('#userRole');
            dropdown.empty();

            var sel = document.getElementById('userRole');

            for (var i = 0; i < response.userrole.length; i++) {

                select = document.getElementById('userRole');
                var opt = document.createElement('option');
                if (userrole == response.userrole[i].id) {
                    opt.selected = true;
                } else {
                    opt.selected = false;
                }
                opt.value = response.userrole[i].id;
                opt.innerHTML = response.userrole[i].role_name;
                sel.appendChild(opt);
            }
        }
        });
    $('#editmodal').modal('show');

}

function passresetmodal(userid) {
    $('#id').val(userid);
    $('#changePassword').modal('show');
}

function updatePassword() {

    var newPassword = $("#new").val();
    var resetPassword = $("#reset").val();


    if (newPassword == '') {
        $("#current-password").text("");
        $("#new-password").css('color', 'red');
        $("#new-password").text("New Password required !!!");
        return false;
    }
    else if (resetPassword == '') {
        $("#new-password").text("");
        $("#reset-password").css('color', 'red');
        $("#reset-password").text("Repeat Password required !!!");
        return false;
    }
    else if (newPassword != resetPassword) {
        $("#reset-password").text("");
        $("#reset-password").css('color', 'red');
        $("#reset-password").text("Password not match !!!");
        return false;
    }
    else {
        return true;
    }
}



$(".itemDelete").click(function (e) {
    var id = $(this).val();
    swal({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        type: "warning",
        showCancelButton: !0,
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!",
        reverseButtons: !0
    }).then(function (e) {
        if(e.value) {

            $.ajax({
                url : base_url + "/admin/delete",
                type: "POST",
                data: {
                    id: id,
                },
                success: function () {
                    swal("Done!", "It was succesfully deleted!", "success");
                    window.location.reload();
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    swal("Error deleting!", "Please try again", "error");
                }
            });
        }

    })
})