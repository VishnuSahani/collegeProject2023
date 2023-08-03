<?php

if(isset($_POST['action']) && !empty($_POST['action'])){
    include("./connection/db.php");
    date_default_timezone_set('Asia/Kolkata');
    $action = $_POST['action'];
    $respo = array(); 

    if($action == "StudentRegister"){

        if(!isset($_POST['std_name']) || empty($_POST['std_name']) || !isset($_POST['std_email']) || empty($_POST['std_email']) || !isset($_POST['std_setPassword']) || empty($_POST['std_setPassword']) || !isset($_POST['std_fatherName']) || empty($_POST['std_fatherName'])  || !isset($_POST['std_mobile']) || empty($_POST['std_mobile']) || !isset($_POST['std_branch']) || empty($_POST['std_branch']) || !isset($_POST['std_year']) || empty($_POST['std_year']) ){

       
            $respo['status'] = false;
            $respo['msg'] = "All field are required..";
    
            echo json_encode($respo);
            die();
        }


        $std_name = trim($_POST['std_name']);
        $std_email = trim($_POST['std_email']);

        $std_setPassword = trim($_POST['std_setPassword']);
        $std_fatherName = trim($_POST['std_fatherName']);
        $std_mobile = trim($_POST['std_mobile']);
        $std_branch = trim($_POST['std_branch']);
        $std_year = trim($_POST['std_year']);

        
    // id check

    $queryId = mysqli_query($con,"SELECT id FROM studentinfo WHERE LOWER(email_id)=LOWER('".$std_email."')");
    if(mysqli_num_rows($queryId) > 0){

        $respo['status'] = false;
        $respo['msg'] = "This email id already registered !";

        echo json_encode($respo);
        die();

    }


    // password check


    $querymobile = mysqli_query($con,"SELECT id FROM studentinfo WHERE mobile='".$std_mobile."'");
    if(mysqli_num_rows($querymobile) > 0){

        $respo['status'] = false;
        $respo['msg'] = "This mobile number already registered";

        echo json_encode($respo);
        die();

    }

    $createdDateTime = date("Y-m-d h:i:sa");


    $queryInsert = mysqli_query($con,"INSERT INTO studentinfo (fullName,email_id,stdPassword,fatherName,mobile,branch,branchYear,photo,createdDate,updatedDate) VALUES ('".$std_name."','".$std_email."','".$std_setPassword."','".$std_fatherName."','".$std_mobile."','".$std_branch."','".$std_year."','photo','".$createdDateTime."','".$createdDateTime."')");

    if($queryInsert){

        $respo['status'] = true;
        $respo['msg'] = "You are successfully registered....!";
       
    }else{

        $respo['status'] = false;
        $respo['msg'] =mysqli_error($con);

    }
        
        

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