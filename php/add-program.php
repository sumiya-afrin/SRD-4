<?php
    require 'mysql.php';

    $id = $_POST['program_id'];
    $program_name = $_POST['program_name'];
    $school = $_POST['school'];
    $sql = "INSERT INTO program(id, program_name, school) VALUES ('$id', '$program_name', '$school')";
    //echo $sql;
    if($mysql->query($sql) == FALSE){
        header("Location: ../admin/add-program.php?failed=1");
    }
    
    $i = 1;

    while(isset($_POST['title'.$i])){
        $name = $_POST['title'.$i];       
        $sql = "INSERT INTO plo(program_id, plo_no, plo_name) VALUES
            ('$id', $i, '$name')";
        if($mysql->query($sql) == FALSE){
            header("Location: ../admin/add-program.php?failed=1");
        }
        $i++;
    }

    header("Location: ../admin/add-program.php?success=1");

?>