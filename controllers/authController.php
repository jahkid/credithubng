<?php
session_start();
require dirname(__DIR__). './config/db.php';
require dirname(__DIR__). 'emailController.php';

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

                sendVerificationEmail($email, $token);

                // set flash message
                $_SESSION['message'] = 'You are now logged in';
                header('location: dashboard.php');
                exit();

        }else {
            $errors['db_error'] = 'Database error: failed to register';
        }


    }

}

//login validation
if (isset($_POST['login-btn'])) {
    $fullname = $_POST['full-name'];
    $email = $_POST['email'];
    // $company = $_POST['company'];
    // $phone = $_POST['phone'];
    // $product = $_POST['product'];
    // $location = $_POST['location'];

    //validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'email address is invalid';
    }
   if(count($errors)=== 0){
    $sql = 'SELECT * FROM users WHERE email=? AND fullname=? LIMIT 1';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $fullname,$email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if($email === $user['email']){
         //login the user
        
         $_SESSION['id'] = $user['id'];
         $_SESSION['fullname'] = $user['fullname'];
         $_SESSION['email'] = $user['email'];
         $_SESSION['verified'] = $user['verified'];
         // set flash message
         $_SESSION['message'] = 'You are now logged in';
         $_SESSION['alert-class'] = 'alert-success';
         header('location: dashboard.php');
         exit();
    }
   }

}

//logout user
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['id']);
    unset($_SESSION['fullname']);
    unset($_SESSION['email']);
    unset($_SESSION['verified']);
    header('location: index.php');
    exit();
}