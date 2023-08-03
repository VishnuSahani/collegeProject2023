<?php

if(isset($_POST['action']) && !empty($_POST['action'])){
    include("./connection/db.php");
    $action = $_POST['action'];
    $respo = array();

    if(!isset($_POST['id']) || empty($_POST['id']) || !isset($_POST['password']) || empty($_POST['password'])){

       
        $respo['status'] = false;
        $respo['msg'] = "Please insert Id and Password";

        echo json_encode($respo);
        die();
    }


    $id = trim($_POST['id']);
    $password = trim($_POST['password']);


    if($action == "superAdminLogin"){

        
    // id check

    $queryId = mysqli_query($con,"SELECT superAdminId FROM superadmin WHERE LOWER(superAdminId)=LOWER('".$id."')");
    if(mysqli_num_rows($queryId) <= 0){

        $respo['status'] = false;
        $respo['msg'] = "User Id does not exist !";

        echo json_encode($respo);
        die();

    }


    // password check


    $queryPassword = mysqli_query($con,"SELECT superAdminPassword FROM superadmin WHERE superAdminPassword='".$password."'");
    if(mysqli_num_rows($queryPassword) <= 0){

        $respo['status'] = false;
        $respo['msg'] = "Invalid Password !";

        echo json_encode($respo);
        die();

    }


        $respo['status'] = true;
        $respo['msg'] = "Successfully Login....!";
        session_start();
        $_SESSION['superAdminId'] = $id;
        

        echo json_encode($respo);
        die();


    }else{

        $respo['status'] = false;
        $respo['msg'] = "Invalid Request";      

        echo json_encode($respo);
        die();

    }
}

?>