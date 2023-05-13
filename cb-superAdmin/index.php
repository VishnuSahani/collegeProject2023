<?php
include("admin-header.php")
    ?>

<div class="container my-4">
    <div class="row">
        <div class="col-xl-4 col-lg-4 col-md-4 col-12 my-1">
            <div class="card container-hover p-3  rounded-pill animate__animated  animate__bounceIn">
                <div class="d-flex justify-content-start">
                    <div class="p-1">
                        <img src="../images/member.png" class="img-fluid rounded-circle dashboardIcon">

                    </div>
                    <div class="flex-fill d-flex justify-content-center align-items-center ">
                        <div class="fs-5">
                            Member (05)
                        </div>

                    </div>

                </div>
            </div>

        </div>

        <div class="col-xl-4 col-lg-4 col-md-4 col-12 my-1">

            <div class="card container-hover p-3 rounded-pill animate__animated  animate__bounceIn">
                <div class="d-flex justify-content-evenly">
                    <div class="p-1">
                        <img src="../images/student.png" class="img-fluid rounded-circle dashboardIcon">

                    </div>
                    <div class="flex-fill d-flex justify-content-center align-items-center">
                        <div class="fs-5">
                            Student (100)
                        </div>

                    </div>

                </div>
            </div>

        </div>

        <div class="col-xl-4 col-lg-4 col-md-4 col-12 my-1">

            <div class="card container-hover p-3  rounded-pill animate__animated  animate__bounceIn">
                <div class="d-flex justify-content-start">
                    <div class="p-1">
                        <img src="../images/doc.png" class="img-fluid rounded-circle dashboardIcon">

                    </div>
                    <div class="flex-fill d-flex justify-content-center align-items-center ">
                        <div class="fs-5">
                            Documents (110)
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>

</div>


<div class="container-fluid">
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-6 col-12">

            <div class="position-relative">
                <div id="sub_global_loader_member" class="sub_global_loader d-none">
                    <div class="spinner-grow spinner-grow-sm text-danger" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <div class="spinner-grow spinner-grow-sm text-success" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <div class="spinner-grow spinner-grow-sm text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    


                </div>
                <div class="alert alert-info">
                    Member Details
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-light">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="membertableData">

                        </tbody>
                    </table>


                </div>
            </div>

        </div>

        <div class="col-xl-6 col-lg-6 col-md-6 col-12">

            <div class="alert alert-info">
                Student Details
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-light">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Create</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="studenttableData">

                    </tbody>
                </table>


            </div>

        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="addAdminModel" tabindex="-1" aria-labelledby="addAdminModelLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAdminModelLabel">Add Member</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addAMemberForm">
                <div class="modal-body">
                    <div class="mb-2">
                        <label for="memberName" class="form-label">Member name <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="memberName">

                    </div>
                    <!--  -->
                    <div class="mb-2">
                        <label for="memberEmail" class="form-label">Email Id <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="memberEmail">

                    </div>
                    <!--  -->
                    <div class="mb-2">
                        <label for="memberSetPassword" class="form-label">Set Password <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="memberSetPassword">

                    </div>

                    <div id="respo-status"></div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" id="addMemberBtn">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>




<!-- + -->

<div class="plus_div" data-bs-toggle="modal" data-bs-target="#addAdminModel" onclick='focusTextBox()'>
    <span class="plus_icon">+</span>
</div>

<?php
include("admin-footer.php")
    ?>

<script>

    var _memberData = [];
    var _studentData = [];


    function focusTextBox() {
        setTimeout(() => {
            $("#memberName").focus();

        }, 500);
    }

    // $(document).onload


    function changeStatue(emailId, status) {
        if (emailId != "" && emailId != null && emailId != undefined && status != "" && status != null && status != undefined) {
            status = status == 'true' ? "false" : "true";
            $.ajax({
                type: "POST",
                url: "superAdminAction.php",
                data: { "action": "updateApproveStatus", "emailId": emailId, "status": status },
                beforeSend: function () {
                    $("#sub_global_loader_member").removeClass("d-none");
                },
                success: function (respo) {
                    $("#sub_global_loader_member").addClass("d-none");

                    let mainRespo = JSON.parse(respo);

                    if (mainRespo.status) {
                        getMemberData();

                    } else {
                        alert("try again")
                    }

                    console.log(mainRespo);
                },

            });
        }
    }


    function createPayeeTableData(dataList) {
        let htmlContent = "";

        if (dataList.length == 0) {

            htmlContent += `
               <tr>
               <td class="text-danger" colspan="5">Currently no member added..!</td>
               </tr>
          `;

        } else {

            dataList.forEach((value, index) => {

                htmlContent += `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${value['memberName']}</td>
                        <td>${value['memberEmail']}</td>
                        <td><a role="button" onclick=changeStatue("${value['memberEmail']}","${value['memberApproved']}")>${value['memberApproved'] == 'true' ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-danger">In-Active</span>'}</a></td>
                        <td><span class="hoverGreen cursor-pointer"><i class="fas fa-edit"></i></span></td>
                       
                    </tr>

                 `;
            });
        }



        $("#membertableData").html(htmlContent);
        // $("#studenttableData").html(htmlContent);
    }// draw table

    function getMemberData() {
        $.ajax({
            type: "POST",
            url: "superAdminAction.php",
            data: { "action": "getMemberDetails" },
            beforeSend: function () {
                $("#sub_global_loader_member").removeClass("d-none");

            },
            success: function (respo) {
                $("#sub_global_loader_member").addClass("d-none");

                let mainData = JSON.parse(respo);
                _memberData = mainData['data'];
                console.log(_memberData);
                createPayeeTableData(_memberData);

            }
        })
    }

    $(document).ready(function () {
        getMemberData();

        $("#addAMemberForm").submit(function (e) {
            e.preventDefault();
            let memberName = $("#memberName").val().trim();
            let memberEmail = $("#memberEmail").val().trim();
            let memberSetPassword = $("#memberSetPassword").val().trim();

            if (memberName.length == 0 || memberName == ("" || null || undefined)) {

                $("#memberName").addClass("is-invalid");
                $("#memberName").focus();
                return;

            } else {

                $("#memberName").removeClass("is-invalid");
                $("#memberName").addClass("is-valid");
            }
            // 
            if (memberEmail.length == 0 || memberEmail == ("" || null || undefined)) {

                $("#memberEmail").addClass("is-invalid");
                $("#memberEmail").focus();
                return;

            } else {

                $("#memberEmail").removeClass("is-invalid");
                $("#memberEmail").addClass("is-valid");
            }
            // 
            if (memberSetPassword.length == 0 || memberSetPassword == ("" || null || undefined)) {

                $("#memberSetPassword").addClass("is-invalid");
                $("#memberSetPassword").focus();
                return;

            } else {

                $("#memberSetPassword").removeClass("is-invalid");
                $("#memberSetPassword").addClass("is-valid");
            }


            $.ajax({
                type: "POST",
                url: "superAdminAction.php",
                data: { "action": "addMember", "memberName": memberName, "memberEmail": memberEmail, "memberSetPassword": memberSetPassword },
                beforeSend: function () {
                    $("#global_loader").removeClass("d-none");

                    $("#addMemberBtn").html("Please wait..").attr("disabled", true);

                },
                success: function (respo) {
                    $("#global_loader").addClass("d-none");
                    $("#addMemberBtn").html("addMemberBtn").attr("disabled", false);

                    let mainRespo = JSON.parse(respo);



                    if (mainRespo.status) {
                        $("#respo-status").html(mainRespo.msg).css("color", "green");
                        $(".form-control").removeClass("is-valid");
                        $("#addAMemberForm")[0].reset();

                    } else {
                        $("#respo-status").html(mainRespo.msg).css("color", "red");

                    }



                    console.log(mainRespo);
                },
                error: function (err) {
                    console.error("Ajax error", err);
                    $("#global_loader").addClass("d-none");
                    $("#addMemberBtn").html("addMemberBtn").attr("disabled", false);
                    $("#respo-status").html("Semthing went wrong...").css("color", "red");

                }, complete: function (xhr, status) {

                    setTimeout(() => {
                        $("#respo-status").html("");

                    }, 5000);
                }
            });



        });
    });
</script>