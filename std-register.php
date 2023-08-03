<?php
include("header.php");
$_SESSION['homeNavbr'] = "StdRegistration";
include("nav-bar.php");
?>

<style>
    .input-style {
        /* margin-top:15px; */
        border: 1px solid #e26228;
        border-left: 3px solid #e26228;
        border-right: 3px solid #e26228;
    }
</style>

<div class="container mt-5">
    <div class="row">
        <div class="col-12 col-xl-10 col-lg-10 m-auto">
            <div class="card p-2 border-radius10 animate__animated animate__zoomInDown">
                <div class="card-header fs-4 text-center text-bhagwa">
                    Student Registration
                </div>
                <div class="card-body">
                    <form id="stdRegisterForm">

                        <div class="row">
                            <div class="mb-3 col-12 col-xl-6 col-lg-6 col-md-6">
                                <label for="std_name" class="form-label">Full Name <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control input-style" id="std_name"
                                    placeholder="Enter Student Full Name">

                                <div class="mt-1 text-danger font11 ms-2" id="name_error"></div>
                            </div>

                            <div class="mb-3 col-12 col-xl-6 col-lg-6 col-md-6">
                                <label for="std_email" class="form-label">Email Id <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control input-style" id="std_email"
                                    placeholder="Enter Student Email Id">
                                <div class="mt-1 text-danger font11 ms-2" id="email_error"></div>

                            </div>

                            <!--  -->

                            <div class="mb-3 col-12 col-xl-6 col-lg-6 col-md-6">
                                <label for="std_setPassword" class="form-label">Set Password <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control input-style" id="std_setPassword"
                                    placeholder="Enter Your Password">
                                <div class="mt-1 text-danger font11 ms-2" id="password_error"></div>

                            </div>

                            <div class="mb-3 col-12 col-xl-6 col-lg-6 col-md-6">
                                <label for="std_confirmPassword" class="form-label">Confirm Password <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control input-style" id="std_confirmPassword"
                                    placeholder="Confirm Your Password">
                                <div class="mt-1 text-danger font11 ms-2" id="confPassword_error"></div>

                            </div>

                            <!--  -->

                            <div class="mb-3 col-12 col-xl-6 col-lg-6 col-md-6">
                                <label for="std_fatherName" class="form-label">Father's Name <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control input-style" id="std_fatherName"
                                    placeholder="Enter Your Father's Name">
                                <div class="mt-1 text-danger font11 ms-2" id="father_error"></div>

                            </div>

                            <div class="mb-3 col-12 col-xl-6 col-lg-6 col-md-6">
                                <label for="std_mobile" class="form-label">Mobile Number <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control input-style" id="std_mobile"
                                    placeholder="Enter Your Mobile Number">
                                <div class="mt-1 text-danger font11 ms-2" id="mobile_error"></div>

                            </div>

                            <!--  -->


                            <div class="mb-3 col-12 col-xl-6 col-lg-6 col-md-6">
                                <label for="std_branch" class="form-label">Branch <span
                                        class="text-danger">*</span></label>
                                <select name="branch" id="std_branch" class="form-control input-md input-style">
                                    <option selected="true" value="">SELECT BRANCH</option>
                                    <!-- <option value="AMIE">AMIE</option> -->
                                    <option value="B.Tech(CSE)">B.Tech(CSE)</option>
                                    <option value="B.Tech(ECE)">B.Tech(ECE)</option>
                                    <option value="B.Tech(IT)">B.Tech(IT)</option>
                                    <!-- <option value="BA">BA</option> -->
                                    <option value="BCA">BCA</option>
                                    <option value="BSC">BSC</option>
                                    <option value="DIPLOMA(CSE)">DIPLOMA(CSE)</option>
                                    <option value="DIPLOMA(ECE)">DIPLOMA(ECE)</option>
                                    <option value="DIPLOMA(ELECTRICAL)">DIPLOMA(ELECTRICAL)</option>
                                    <option value="DIPLOMA(IT)">DIPLOMA(IT)</option>
                                    <option value="MCA">MCA</option>
                                    <option value="MTECH">MTECH</option>
                                    <option value="OTHER">OTHER</option>
                                    <option value="PGDCA">PGDCA</option>
                                </select>

                                <div class="mt-1 text-danger font11 ms-2" id="branch_error"></div>

                            </div>

                            <div class="mb-3 col-12 col-xl-6 col-lg-6 col-md-6">
                                <label for="std_year" class="form-label">Pursuing Year <span
                                        class="text-danger">*</span></label>
                                <select name="std_year" id="std_year" class="form-control input-md input-style">
                                    <option selected="true" value="">SELECT PURSUING YEAR</option>
                                    <option value="1st">1st</option>
                                    <option value="2nd">2nd</option>
                                    <option value="3rd">3rd</option>
                                    <option value="FINAL">FINAL</option>
                                    <option value="PassOut">PassOut</option>
                                </select>
                                <div class="mt-1 text-danger font11 ms-2" id="year_error"></div>

                            </div>

                            <!--  -->


                            <div class="my-3 text-center">
                                <button type="submit" class="btn btn-bhagwa" id="std_btn">Sumbit</button>
                            </div>


                            <div id="respo-status">

                            </div>



                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>




<?php
include("footer.php");
?>


<script>
    $(document).ready(function () {

        $("#stdRegisterForm").submit(function (e) {
            e.preventDefault();

            let std_name = $("#std_name").val();
            let std_email = $("#std_email").val();
            let std_setPassword = $("#std_setPassword").val();
            let std_confirmPassword = $("#std_confirmPassword").val();
            let std_fatherName = $("#std_fatherName").val();
            let std_mobile = $("#std_mobile").val();
            let std_branch = $("#std_branch").val();
            let std_year = $("#std_year").val();


            if (std_name.length == 0 || std_name == "" || std_name == null || std_name == undefined) {

                $("#std_name").addClass("is-invalid");
                $("#std_name").focus();
                $("#name_error").html("Student Name is required");
                return;

            } else {

                $("#name_error").html("");
                $("#std_name").removeClass("is-invalid");
                // $("#std_name").addClass("is-valid");


            }


            if (std_email.length == 0 || std_email == ("" || null || undefined)) {

                $("#std_email").addClass("is-invalid");
                $("#std_email").focus();
                $("#email_error").html("Student Email is required");

                return;

            } else {

                $("#email_error").html("");
                $("#std_email").removeClass("is-invalid");
                // $("#std_email").addClass("is-valid");


            }


            if (std_setPassword.length == 0 || std_setPassword == ("" || null || undefined)) {

                $("#std_setPassword").addClass("is-invalid");
                $("#std_setPassword").focus();
                $("#password_error").html("Student Password is required");

                return;

            } else {

                $("#password_error").html("");
                $("#std_setPassword").removeClass("is-invalid");
                // $("#std_setPassword").addClass("is-valid");


            }

            if (std_confirmPassword.length == 0 || std_confirmPassword == ("" || null || undefined)) {

                $("#std_confirmPassword").addClass("is-invalid");
                $("#std_confirmPassword").focus();
                $("#confPassword_error").html("Confirm Password is required");

                return;

            } else {

                if (std_confirmPassword != std_setPassword) {

                    $("#std_confirmPassword").addClass("is-invalid");
                    $("#std_confirmPassword").focus();
                    $("#confPassword_error").html("Password does not match");

                    return;

                } else {

                    $("#confPassword_error").html("");
                    $("#std_confirmPassword").removeClass("is-invalid");
                    // $("#std_confirmPassword").addClass("is-valid");

                }




            }


            if (std_fatherName.length == 0 || std_fatherName == ("" || null || undefined)) {

                $("#std_fatherName").addClass("is-invalid");
                $("#std_fatherName").focus();
                $("#father_error").html("Father's name is required");

                return;

            } else {

                $("#father_error").html("");
                $("#std_fatherName").removeClass("is-invalid");
                // $("#std_fatherName").addClass("is-valid");


            }



            if (std_mobile.length == 0 || std_mobile == ("" || null || undefined)) {

                $("#std_mobile").addClass("is-invalid");
                $("#std_mobile").focus();
                $("#mobile_error").html("Mobile number is required");

                return;

            } else {

                $("#mobile_error").html("");
                $("#std_mobile").removeClass("is-invalid");
                // $("#std_mobile").addClass("is-valid");


            }


            if (std_branch.length == 0 || std_branch == ("" || null || undefined)) {

                $("#std_branch").addClass("is-invalid");
                $("#std_branch").focus();
                $("#branch_error").html("Please select your branch");

                return;

            } else {

                $("#branch_error").html("");
                $("#std_branch").removeClass("is-invalid");
                // $("#std_branch").addClass("is-valid");


            }

            
            if (std_year.length == 0 || std_year == ("" || null || undefined)) {

                $("#std_year").addClass("is-invalid");
                $("#std_year").focus();
                $("#year_error").html("Please select branch year");

                return;

            } else {

                $("#year_error").html("");
                $("#std_year").removeClass("is-invalid");
                // $("#std_year").addClass("is-valid");


            }


            $.ajax({
                type: "POST",
                url: "main-action.php",
                data: { 
                    "action": "StudentRegister",
                     "std_name": std_name, 
                     "std_email": std_email,
                     "std_setPassword": std_setPassword,
                     "std_fatherName": std_fatherName,
                     "std_mobile": std_mobile,
                     "std_branch": std_branch,
                     "std_year": std_year,
                     },
                beforeSend: function () {
                    $("#std_btn").html("Please wait..").attr("disabled", true);

                },
                success: function (respo) {
                    let mainRespo = JSON.parse(respo);
                    $("#std_btn").html("Login").attr("disabled", false);

                    if (mainRespo.status) {
                        $("#respo-status").html(mainRespo.msg).css("color","green");

                       
                    }else{
                        $("#respo-status").html(mainRespo.msg).css("color","red");

                    }



                    console.log(mainRespo);
                },
                error: function (err) {
                    console.error("Ajax error", err);
                    $("#std_btn").html("Login").attr("disabled", false);
                    $("#respo-status").html(err);

                }
            })








        });
    });
</script>