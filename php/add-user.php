<?php
    require 'mysql.php';
    // geting post requests
    $id = $_POST['id'];
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $prog = $_POST['prog'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = strtolower($_POST['role']);
    
    //$store = "INSERT "
?>