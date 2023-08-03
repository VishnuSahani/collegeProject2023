<?php
session_start();

// print_r($_SESSION);
if (!($_SESSION['superAdminId'])) {
 header('location:../index');
}

?>