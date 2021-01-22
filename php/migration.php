<?php
    require 'mysql.php';
    
    // sql for program table
    $program = "CREATE TABLE program(
        sl INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        id VARCHAR(100) NOT NULL UNIQUE,
        program_name VARCHAR(200) NOT NULL,
        school VARCHAR(200) NOT NULL
    )";
    if($mysql->query($program) == FALSE){
        echo $mysql->error.'<br>';
    }

    // sql for PLO table
    $plo = "CREATE TABLE plo(
        sl INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        program_id VARCHAR(100) NOT NULL,
        plo_no INT NOT NULL,        
        plo_name VARCHAR(200) NOT NULL,
        FOREIGN KEY (program_id) REFERENCES program(id)
    )";
    if($mysql->query($plo) == FALSE){
        echo $mysql->error.'<br>';
    }

    // sql for user table
    $user = "CREATE TABLE user(
        sl INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        id VARCHAR(100) NOT NULL UNIQUE,
        first_name VARCHAR(100) NOT NULL,
        last_name VARCHAR(100) NOT NULL,
        program_id VARCHAR(20) NULL,
        email VARCHAR(250) NOT NULL UNIQUE,
        password VARCHAR(50) NOT NULL,
        role VARCHAR(10) NOT NULL
    )";
    if($mysql->query($user) == FALSE){
        echo $mysql->error.'<br>';
    }

    // sql for course table
    $course = "CREATE TABLE course(
        sl INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        id VARCHAR(100) NOT NULL UNIQUE,
        title VARCHAR(250) NOT NULL UNIQUE,
        program_id VARCHAR(100) NOT NULL,
        credit DOUBLE NOT NULL,
        total_co INT NOT NULL,
        FOREIGN KEY (program_id) REFERENCES program(id)
    )";
    if($mysql->query($course) == FALSE){
        echo $mysql->error.'<br>';
    }

    // sql for co table
    $co = "CREATE TABLE co(
        sl INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        course_id VARCHAR(100) NOT NULL,
        plo_id INT NOT NULL,
        co1 BOOLEAN DEFAULT 0 NOT NULL,
        co2 BOOLEAN DEFAULT 0 NOT NULL,
        co3 BOOLEAN DEFAULT 0 NOT NULL,
        co4 BOOLEAN DEFAULT 0 NOT NULL,
        co5 BOOLEAN DEFAULT 0 NOT NULL,
        co6 BOOLEAN DEFAULT 0 NOT NULL,
        co7 BOOLEAN DEFAULT 0 NOT NULL,
        co8 BOOLEAN DEFAULT 0 NOT NULL,
        co9 BOOLEAN DEFAULT 0 NOT NULL,
        co10 BOOLEAN DEFAULT 0 NOT NULL,
        FOREIGN  KEY (course_id) REFERENCES course(id),
        FOREIGN  KEY (plo_id) REFERENCES plo(sl)
    )";
    if($mysql->query($co) == FALSE){
        echo $mysql->error.'<br>';
    }

    $marks = "CREATE TABLE marks(
        sl INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        student_id VARCHAR(100) NOT NULL,
        course_id VARCHAR(100) NOT NULL,
        exam_name VARCHAR(200) NOT NULL,
        semester VARCHAR(200) NOT NULL,
        section VARCHAR(5) NOT NULL,
        q1_mark INT NULL, 
        q1_co INT NULL,
        q1_max INT NULL,
        q2_mark INT NULL, 
        q2_co INT NULL,
        q2_max INT NULL,
        q3_mark INT NULL, 
        q3_co INT NULL,
        q3_max INT NULL,
        q4_mark INT NULL, 
        q4_co INT NULL,
        q4_max INT NULL,
        q5_mark INT NULL, 
        q5_co INT NULL,
        q5_max INT NULL,
        q6_mark INT NULL, 
        q6_co INT NULL,
        q6_max INT NULL,
        q7_mark INT NULL, 
        q7_co INT NULL,
        q7_max INT NULL,
        q8_mark INT NULL, 
        q8_co INT NULL,
        q8_max INT NULL,
        q9_mark INT NULL, 
        q9_co INT NULL,
        q9_max INT NULL,
        q10_mark INT NULL, 
        q10_co INT NULL,
        q10_max INT NULL,
        FOREIGN KEY (student_id) REFERENCES user(id),
        FOREIGN KEY (course_id) REFERENCES course(id)
    )";
    if($mysql->query($marks) == FALSE){
        echo $mysql->error.'<br>';
    }
    
?>