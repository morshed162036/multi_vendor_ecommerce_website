$(document).ready(function () {
    //$(".nav-item").removeClass("active");
    //$(".nav-link").removeClass("active");
    $("#section_table").DataTable();

    //check admin password is correct or not
    $("#current_password").keyup(function () {
        var current_password = $("#current_password").val();
        //alert(current_password);
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "post",
            url: "/admin/check-current-password",
            data: { current_password: current_password },
            success: function (resp) {
                //alert(resp);
                if (resp == "false") {
                    $("#check_password").html(
                        "<font color = 'red'> Current Password is Incorrect!</font>"
                    );
                } else if (resp == "true") {
                    $("#check_password").html(
                        "<font color = 'green'> Current Password is Correct!</font>"
                    );
                }
            },
            error: function () {
                alert("Error");
            },
        });
    });

    //Update Admin Status
    $(document).on("click", ".updateAdminStatus", function () {
        var status = $(this).children("label").attr("status");
        var admin_id = $(this).attr("admin_id");

        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "post",
            url: "/admin/update-admin-status",
            data: { status: status, admin_id: admin_id },
            success: function (resp) {
                //alert(resp);
                if (resp["status"] == 0) {
                    $("#admin-" + admin_id).html(
                        "<label class='badge badge-danger' status='Inactive'>Inactive</label>"
                    );
                } else if (resp["status"] == 1) {
                    $("#admin-" + admin_id).html(
                        "<label class='badge badge-success' status='Active'>Active</label>"
                    );
                }
            },
            error: function () {
                alert("Error");
            },
        });
    });

    //Update Section Status
    $(document).on("click", ".updateSectionStatus", function () {
        var status = $(this).children("label").attr("status");
        var section_id = $(this).attr("section_id");

        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "post",
            url: "/admin/update-section-status",
            data: { status: status, section_id: section_id },
            success: function (resp) {
                //alert(resp);
                if (resp["status"] == 0) {
                    $("#section-" + section_id).html(
                        "<label class='badge badge-danger' status='Inactive'>Inactive</label>"
                    );
                } else if (resp["status"] == 1) {
                    $("#section-" + section_id).html(
                        "<label class='badge badge-success' status='Active'>Active</label>"
                    );
                }
            },
            error: function () {
                alert("Error");
            },
        });
    });

    //Delete Section Status
    $(document).on("click", ".confirmDelete", function () {
        var module = $(this).attr("module");
        var module_id = $(this).attr("module_id");

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success",
                cancelButton: "btn btn-danger",
            },
            buttonsStyling: false,
        });

        swalWithBootstrapButtons
            .fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: true,
            })
            .then((result) => {
                if (result.isConfirmed) {
                    swalWithBootstrapButtons.fire(
                        "Deleted!",
                        "Your file has been deleted.",
                        "success"
                    );
                    window.location = module + "-delete/" + module_id;
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        "Cancelled",
                        "Your file is safe :)",
                        "error"
                    );
                }
            });
    });
});
