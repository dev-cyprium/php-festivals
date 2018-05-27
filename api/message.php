<?php
    $message = $_POST['message'];
    $email   = $_POST['email'];

    $msgReg = '/.{10,50}/';
    
    echo json_encode([
        "success" => true
    ]);
