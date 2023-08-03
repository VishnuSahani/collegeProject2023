<?php

if (isset($_POST['action']) && !empty($_POST['action'])) {
    include("../connection/db.php");
    $action = $_POST['action'];
    $respo = array();
    $status = true;
    $msg = "";
    date_default_timezone_set('Asia/Kolkata');

    if ($action == "addMember") {

        if (!isset($_POST['memberName']) || empty($_POST['memberName']) || !isset($_POST['memberEmail']) || empty($_POST['memberEmail']) || !isset($_POST['memberSetPassword']) || empty($_POST['memberSetPassword'])) {


            $status = false;
            $msg = "All field are required..!";
    
            $respo['status'] = $status;
            $respo['msg'] = $msg;
    
            echo json_encode($respo);
            die();
        }
    
    
        $memberName = trim($_POST['memberName']);
        $memberEmail = trim($_POST['memberEmail']);
        $memberSetPassword = trim($_POST['memberSetPassword']);
        $createdDateTime = date("Y-m-d h:i:sa");


        // id check

        $queryId = mysqli_query($con, "SELECT memberEmail FROM memberinfo WHERE memberEmail='" . $memberEmail . "'");
        if (mysqli_num_rows($queryId) > 0) {

            $status = false;
            $msg = "This email Id already exist !";

            $respo['status'] = $status;
            $respo['msg'] = $msg;
            echo json_encode($respo);
            die();

        }


        $insertQuery = mysqli_query($con,"INSERT INTO memberinfo (memberName,memberEmail,memberPassword,createdDate,updatedDate) VALUES ('".$memberName."','".$memberEmail."','".$memberSetPassword."','".$createdDateTime."','".$createdDateTime."')");
        if($insertQuery){
            $status = true;
            $msg = "Member successfully added...!";
        }else{
            $status = false;
            $msg = mysqli_error($con);
        }



            $respo['status'] = $status;
            $respo['msg'] = $msg;
        echo json_encode($respo);
        die();


    }

    if ($action == "getMemberDetails") {

        $q = "SELECT * FROM memberinfo WHERE memberStatus ='true'";

        if (isset($_POST['memberEmail']) && !empty(trim($_POST['memberEmail']))) {
            $id = trim($_POST['memberEmail']);
            $q = "SELECT * FROM memberinfo WHERE memberEmail ='" . $id . "' && memberStatus ='true'";

        }

        $query = mysqli_query($con, $q);

        if (mysqli_num_rows($query) <= 0) {
            echo json_encode(array("status" => true, "msg" => "Currently no member added..!","data"=>[]));
            die();
        }

        $data = array();

        while ($run = mysqli_fetch_array($query)) {
            $obj = new stdClass();
            $obj->id = $run['id'];
            $obj->memberName = $run['memberName'];
            $obj->memberEmail = $run['memberEmail'];
            $obj->memberPassword = $run['memberPassword'];
            $obj->createdDate = $run['createdDate'];
            $obj->updatedDate = $run['updatedDate'];
            $obj->memberApproved = $run['memberApproved'];

            $data[] = $obj;
        }

        echo json_encode(array("status" => true, "msg" => "Member data found", "data" => $data));

    }

    if ($action == "updateApproveStatus") {
        if (!isset($_POST['emailId']) || empty(trim($_POST['emailId']))) {
            echo json_encode(array("status" => false, "msg" => "Member Id not set, Refresh page and try again"));
            die();
        }

        if (!isset($_POST['status']) || empty(trim($_POST['status']))) {
            echo json_encode(array("status" => false, "msg" => "Member Id not set, Refresh page and try again"));
            die();
        }

        $memberEmail = trim($_POST['emailId']);
        $status = trim($_POST['status']);
        $updateDateTime = date("Y-m-d h:i:sa");

        $query = mysqli_query($con, "SELECT memberEmail FROM memberinfo WHERE memberEmail='" . $memberEmail . "'");
        if (mysqli_num_rows($query) <= 0) {
            echo json_encode(array("status" => false, "msg" => "No Member data available on this id"));
            die();
        }
        //member_status

        $changeStatus = mysqli_query($con, "UPDATE memberinfo SET memberApproved='".$status."', updatedDate='" . $updateDateTime . "' WHERE memberEmail='" . $memberEmail . "'");

        if ($changeStatus) {
            $respo['status'] = true;
            $respo['msg'] = "Status successfully update...!";
        } else {
            $respo['status'] = false;
            $respo['msg'] = mysqli_error($con); //"Something went wrong with server, Please try again.";
        }
        echo json_encode($respo);
        die();

    }

    // 

    if ($action == "getStudentDetails") {

        $q = "SELECT * FROM studentinfo WHERE studentStatus ='true'";

        if (isset($_POST['std_email']) && !empty(trim($_POST['std_email']))) {
            $id = trim($_POST['std_email']);
            $q = "SELECT * FROM studentinfo WHERE std_email ='" . $id . "' && studentStatus ='true'";

        }

        $query = mysqli_query($con, $q);

        if (mysqli_num_rows($query) <= 0) {
            echo json_encode(array("status" => true, "msg" => "Currently no student registered..!","data"=>[]));
            die();
        }

        $data = array();

        while ($run = mysqli_fetch_array($query)) {
            $obj = new stdClass();
            $obj->id = $run['id'];
            $obj->fullName = $run['fullName'];
            $obj->email = $run['email_id'];
            $obj->password = $run['stdPassword'];

            $obj->mobile = $run['mobile'];
            $obj->fatherName = $run['fatherName'];
            $obj->branch = $run['branch'];
            $obj->branchYear = $run['branchYear'];

            $obj->photo = $run['photo'];
            $obj->verified = $run['verified'];

            $obj->createdDate = $run['createdDate'];
            $obj->updatedDate = $run['updatedDate'];

            $data[] = $obj;
        }

        echo json_encode(array("status" => true, "msg" => "Student data found", "data" => $data));

    }
}

?>