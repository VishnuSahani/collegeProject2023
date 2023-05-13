<?php
include("header.php");
?>


<section class="vh-100" style="background-color: #508bfc;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-body p-5">

                        <form id="adminForm">

                            <h3 class="mb-5">Admin Sign in</h3>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="typeEmailX-2">Admin Id <span
                                        class="text-danger">*</span></label>
                                <input type="text" id="typeEmailX-2" class="form-control form-control-lg" />
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="typePasswordX-2">Password <span
                                        class="text-danger">*</span></label>
                                <input type="password" id="typePasswordX-2" class="form-control form-control-lg" />
                            </div>

                            <!-- Checkbox -->
                            <div class="form-check d-flex justify-content-start mb-4">
                                <input class="form-check-input" type="checkbox" value="yes" id="rememberPassword" />
                                <label class="form-check-label mx-2" for="rememberPassword"> Remember password </label>
                            </div>

                            <div class="my-1 d-grid">
                            <button class="btn btn-primary btn btn-block" id="loginBtn" type="submit">Login</button>

                            </div>

                        </form>

                        <hr class="my-4">

                        <!-- <button class="btn btn-lg btn-block btn-primary" style="background-color: #dd4b39;"
              type="submit"><i class="fab fa-google me-2"></i> Sign in with google</button>
            <button class="btn btn-lg btn-block btn-primary mb-2" style="background-color: #3b5998;"
              type="submit"><i class="fab fa-facebook-f me-2"></i>Sign in with facebook</button> -->

                    <div id="respo-status" class="text-danger"></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php

include("footer.php");
?>

<script>
    $(document).ready(function () {

        $("#adminForm").submit(function (e) {
            e.preventDefault();

            let aId = "hum" //$("#typeEmailX-2").val();
            let aPassword = "tum" // $("#typePasswordX-2").val();
            let rememberPassword = $("#rememberPassword").prop('checked') //$("#rememberPassword").prop("checked");
            console.log(rememberPassword);

            if (aId.length == 0 || aId == "" || aId == null || aId == undefined) {

                $("#typeEmailX-2").addClass("is-invalid");
                return;

            } else {

                $("#typeEmailX-2").removeClass("is-invalid");
                $("#typeEmailX-2").addClass("is-valid");


            }


            if (aPassword.length == 0 || aPassword == ( "" || null || undefined)) {

                $("#typePasswordX-2").addClass("is-invalid");
                return;

            } else {

                $("#typePasswordX-2").removeClass("is-invalid");
                $("#typePasswordX-2").addClass("is-valid");


            }


            $.ajax({
                type:"POST",
                url:"action.php",
                data:{"action":"superAdminLogin","id":aId,"password":aPassword},
                beforeSend:function(){
                    $("#loginBtn").html("Please wait..").attr("disabled",true);

                },
                success:function(respo){
                    let mainRespo = JSON.parse(respo);
                    $("#loginBtn").html("Login").attr("disabled",false);

                    $("#respo-status").html(mainRespo.msg);


                    if(mainRespo.status){

                        if(rememberPassword){
                            let localstorage = {"un":aId,"ps":aPassword};
                            localStorage.setItem("adminInfo", JSON.stringify(localstorage));
                        }

                    window.open('./cb-superAdmin/index','_self');

                    }



                    console.log(mainRespo);
                },
                error:function(err){
                    console.error("Ajax error",err);
                    $("#loginBtn").html("Login").attr("disabled",false);
                    $("#respo-status").html(err);

                }
            })








        });
    });
</script>