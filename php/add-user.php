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
    
    $store = "INSERT INTO user (id, first_name, last_name, program_id, email, password, role) VALUES
                ('$id', '$fName', '$lName', '$prog', '$email', '$password' , '$role')";

    if($mysql->query($store)){
        header("Location: ../admnin/add-user.php");
    }else{
        header("Location: ../admnin/add-user.php");
    }

    
?>