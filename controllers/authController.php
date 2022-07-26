<?php

session_start();

 require dirname(__DIR__).'./config/db.php'; 
 require dirname(__DIR__).'./controllers/emailController.php'; 

echo "ss";
exit;
$errors = array();
$fullname = '';
$email = '';

//if user clicks signup
if (isset($_POST['signup-btn'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $comoany = $_POST['company'];
    $passwordConf = $_POST['passwordConf']; 
    $product = $_POST['product'];
    $phone = $_POST['phone'];
    $location = $_POST['location'];


echo "ss";
 
//validations
if (empty($fullname)) {
    $errors['fullname'] = 'fullname required';
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
   $errors['email'] = 'invalid email';
}
if (empty($email)) {
    $errors['email'] = 'correct email required';
}
if (empty($password)) {
    $errors['password'] = 'password required';
}

if ($password !== $passwordConf) {
    $errors['password'] = 'the two passwords do not match';
}

$emailQuery = 'SELECT * FROM users WHERE email=? LIMIT 1';
$stmt = $conn->prepare($emailQuery);
$stmt->bind_param('s', $email);
$stmt->execute();
$result = $stmt->get_result();
$userCount = $result->num_rows;
$stmt->close();

if ($userCount > 0) {
    $errors['email'] = 'email already exists';
}

//save user in db

if (count($errors)===0) {
    $password = password_hash($password, PASSWORD_DEFAULT);
    $token = bin2hex(random_bytes(50));
    $verified = false;

    $sql = 'INSERT INTO users (fullname, email,password, verified, token, product, phone, location) VALUES (?,?,?,?,?,?,?,?)';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssbssis',$fullname, $email, $password, $verified, $token, $product, $phone, $location );
    
    if ($stmt->execute()) {
       //login a user
        $user_id = $conn->insert_id;
        $_SESSION['id'] = $user_id;
        $_SESSION['fullname'] = $fullname;
        $_SESSION['email'] = $email;
        $_SESSION['verified'] = $verified;

        // sendVerificationEmail($email, $token);

        //flash message
        $_SESSION['message'] = 'You are now logged in';
        $_SESSION['alert-class'] = 'alert-success';
        header('location: ./dashboard.php');
        exit();
    }else{
        $errors['db_error'] = 'registration failed';
    }
}

}

//if user logs in
if (isset($_POST['login-btn'])) {
    $fullname = $_POST['fullname'];
    // $email = $_POST['email'];
    $password = $_POST['password'];
    // $comoany = $_POST['company'];
    // $passwordConf = $_POST['passwordConf']; 
    // $product = $_POST['product'];
    // $phone = $_POST['phone'];
    // $location = $_POST['location'];


//validations
if (empty($fullname)) {
    $errors['fullname'] = 'fullname required';
}
if (empty($password)) {
    $errors['password'] = 'password required';
}
if(count($errors)===0){
    $sql = 'SELECT * FROM users WHERE email=? OR fullname=? LIMIT 1';
$stmt = $conn->prepare($sql);
$stmt->bind_param('ss', $fullname,$email);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if(password_verify($password, $user['password'])){
    //login success
     //login a user
     $_SESSION['id'] = $user['id'];
     $_SESSION['fullname'] = $user['fullname'];
     $_SESSION['email'] = $user['email'];
     $_SESSION['verified'] = $user['verified'];
     //flash message
     $_SESSION['message'] = 'You are now logged in';
     $_SESSION['alert-class'] = 'alert-success';
     header('location:./dashboard.php ');
     exit();
}else{
    $errors['login_fail'] = 'wrong credentials';
}

}


}


//logout
if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['id']);
    unset($_SESSION['fullname']);
    unset($_SESSION['email']);
    unset($_SESSION['verified']);
    header('location: index.php');
}

//verify user using token

function verifyUser($token){
    global $conn;
    $sql = "SELECT * FROM users WHERE token='$token' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result)>0) {
        $user = mysqli_fetch_assoc($result);
        $update_query = "UPDATE users SET verified=1 WHERE token='$token' ";
        if (mysqli_query($conn, $update_query)) {
            //log user in
            $_SESSION['id'] = $user['id'];
            $_SESSION['fullname'] = $user['fullname'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['verified'] = 1;
            //flash message
            $_SESSION['message'] = 'You are verified';
            $_SESSION['alert-class'] = 'alert-success';
            header('location:./dashboard.php ');
            exit();

        }else{
            echo 'user not found';
        }
    }

}
