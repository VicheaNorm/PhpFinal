<?php
    $cn = mysqli_connect("localhost", "root", "", "db_sp9final");
    if (mysqli_connect_errno() > 0) {
        die(mysqli_connect_errno() . ": "  . mysqli_connect_error());
    }

    if (isset($_POST["button_save"])) {        
        $name = trim($_POST["text_box_student_name"]);
        $gender = trim($_POST["text_box_gender"]);
        $dob = trim($_POST["text_box_dob"]);
        $email = trim($_POST["text_box_email"]);
        $course = trim($_POST["text_box_course"]);
        $tel = trim($_POST["text_box_telephone"]);

        $sql = "INSERT INTO tbl_students(name,gender,email,dob,course,tel)
                VALUES('$name', '$gender','$email','$dob', '$course','$tel')";
        mysqli_query($cn, $sql);
        if (mysqli_connect_errno() > 0) {
            die(mysqli_connect_errno() . ":" . mysqli_connect_error());
        }

        header("location: index.php");
        exit;
    }

?>
