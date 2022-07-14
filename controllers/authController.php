<?php
session_start();
require dirname(__DIR__). './config/db.php';
$errors = array();
//if clicks signup
if (isset($_POST['signup-btn'])) {
    $fullname = $_POST['full-name'];
    $email = $_POST['email'];
    $company = $_POST['company'];
    $phone = $_POST['phone'];
    $product = $_POST['product'];
    $location = $_POST['location'];

    //validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'email address is invalid';
    }
    $emailQuery = 'SELECT * FROM users WHERE email=? LIMIT 1';
    $stmt = $conn->prepare($emailQuery);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $userCount = $result->num_rows;

    if ($userCount > 0 ){
        $errors['email'] = 'A user for this email already exists';
    }

    if (count($errors) === 0) {
        $token = bin2hex(random_bytes(50));
        $verified = false;
        $sql = 'INSERT INTO users (fullname, email, verified, phone, location, product, company, token) VALUES (?, ?, ?, ?, ?, ?, ?,?)';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssbsssss', $fullname,$email,$verified,$phone,$location,$product,$company,$token);

        if ($stmt->execute()) {
                //login the user
                $user_id = $conn->insert_id;
                $_SESSION['id'] = $user_id;
                $_SESSION['fullname'] = $fullname;
                $_SESSION['email'] = $email;
                $_SESSION['verified'] = $verified;
                // set flash message
                $_SESSION['message'] = 'You are now logged in';
                header('location: dashboard.php');
                exit();

        }else {
            $errors['db_error'] = 'Database error: failed to register';
        }


    }

}