<?php  require dirname(__DIR__).'/credithubng/controllers/authController.php'; 
 
 if (isset($_GET['token'])) {
    $token = $_GET['token'];
    verifyUser($token);
 }
 
 if(!isset($_SESSION['id'])){
    header('location: login.php');
 }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form-div login">
            <?php if(isset($_SESSION['verified'])): ?>
  
            <div class="alert <?php echo $_SESSION['alert-class']; ?>">
                   <?php 
                   echo 'you are logged in';
                   unset($_SESSION['message']);
                   ?>
                </div>
                <?php endif;?>
                <h3>Welcome, <?php echo $_SESSION['fullname']; ?></h3>

                <a href="dashboard.php?logout=1" class="logout">Logout</a>
                <?php if(!$_SESSION['verified']): ?>
                <div>
                    thank you for registering with creditHub,
                    you shall be contacted via your provided email
                    <strong><?php echo $_SESSION['email'];?></strong>
                    shortly. 
                </div>
                <?php endif; ?>
                <?php if($_SESSION['verified']): ?>
                <button class="btn btn-block btn-lg btn-primary">I am VERIFIED</button>
                    <?php endif;?>
            </div>
        </div>
    </div>
</body>
</html>