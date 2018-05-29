<?php
    $message = $_POST['message'];
    $email   = $_POST['email'];

    $msgReg = '/.{10,50}/';
    $status = 200;
    $errors = [];

    if(!preg_match($msgReg, $message)) {
        $errors['message'] = "Must be between 10 and 50 characters"; 
        $status = 400;
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Must be in valid format";
        $status = 400;
    }

    http_response_code($status);
    
    if($status == 400) {
        echo json_encode($errors);
    }