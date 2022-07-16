<?php require dirname(__DIR__).'./controllers/authController.php';
if(!isset($_SESSION['id'])){
    header('location: signin.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <title>Dashboard</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form-div login">

            <?php if(isset($_SESSION['message'])) ?>
            <div class="alert <?php echo $_SESSION['alert-class'];?>">
            <?php 
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            unset($_SESSION['alert-class']);
            ?>
        </div>
        
                <div class="alert alert-success">
                    You are now logged in!
                </div>
                <h3>Welcome, <?php echo $_SESSION['fullname'] ?></h3>

                <a href="dashboard.php?logout=1" class="logout" name = 'logout'>Logout</a>

                <?php if(!$_SESSION['verified']); ?>
                <div class="alert alert-warning">
                   You need to verify your account,
                   click on the link we just emailed you at
                   <strong><?php echo $_SESSION['email']; ?></strong> to verify

                </div>
                
                <?php if($_SESSION['verified']); ?>
                <button class="btn btn-block btn-lg btn-primary">VERIFIED</button>
            </div>
        </div>
    </div>
</body>
</html>