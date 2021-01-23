<?php
    require 'mysql.php';

    $id = $_POST['course_id'];
    $program_id = $_POST['program_id'];
    $credit = $_POST['credit'];
    $total_co = $_POST['total-co'];
    $title = $_POST['course_title'];

    $sql = "INSERT INTO course (id, program_id, title, credit, total_co) VALUES
            ('$id', '$program_id', '$title', $credit, $total_co)";
    if($mysql->query($sql) == FALSE){
        header("Location: ../admin/add-course.php?failed=1");
    }

    for($i=1; $i<=15; $i++){
        if(isset($_POST["plo-co".$i])){
            $sql = "SELECT sl FROM plo WHERE program_id = '$program_id' AND plo_no = $i";
            $plo_id = $mysql->query($sql)->fetch_assoc()['sl'];
            $data = $_POST["plo-co".$i];
            $field = ""; $val ="";
            foreach($data as $co){
                $field .= 'co'. $co . ', ';
                $val .= '1, ';
            }
            $sql = "INSERT INTO co (course_id, plo_id, ".substr($field, 0, -2).") VALUES ('$id', $plo_id, ".substr($val, 0, -2).")";
            if($mysql->query($sql) == FALSE){
                header("Location: ../admin/add-course.php?failed=1");
            }
        }
    }

    header("Location: ../admin/add-course.php?success=1");

?>