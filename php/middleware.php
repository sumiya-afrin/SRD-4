<?php
    $cPage = basename($_SERVER["SCRIPT_FILENAME"], '.php');

    session_start();

    if(isset($_SESSION['role']) && $cPage != 'login'){
        if($_SESSION['role'] == 'admin'){
            if(!($cPage == 'add-course' || $cPage == 'add-program' || $cPage == 'add-user' || $cPage == 'course-single' ||
            $cPage == 'program-single' || $cPage == 'programs' || $cPage == 'users')){
                header("Location: login.php");
            }
        }else if($_SESSION['role'] == 'faculty'){
            if(!($cPage = 'entry-marks-mass' || $cPage = 'entry-marks')){
                header("Location: login.php");
            }
        }else if(!($_SESSION['role'] == 'student')){
            if($cPage != 'result'){
                header("Location: login.php");
            }
        }else{
            if(!($cPage != 'index')){
                header("Location: login.php");
            }
        }
    }else{
        if($cPage == "login" && isset($_SESSION['role'])){
            if($_SESSION['role'] == 'admin'){
                header("Location: admin/users.php");
            }else if($_SESSION['role'] == 'faculty'){
                header("Location: faculty/entry-marks.php");
            }else if($_SESSION['role'] == 'student'){
                header("Location: student/result.php");
            }else{
                header("Location: index.php");
            }
        }else{
            // header("Location: login.php");
        }        
    }

?>