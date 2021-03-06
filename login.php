<?php require dirname(__DIR__).'/credithubng/controllers/authController.php'; 
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="login.css" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;600&display=swap" rel="stylesheet">
    <title>CreditHub</title>
  </head>
  <body>
        <form enctype = 'multipart/form-data' action="login.php" method="post">
        <?php if (count($errors)>0):?>
        <div class="alert alert-danger">
          <?php foreach($errors as $error): ?>
          <li><?php echo $error; ?></li>
          <?php endforeach; ?>
        </div>
        <?php endif; ?>
        <div class="input">
          <label for="fullname">Email Address or Username</label>
          <input type="text" placeholder="email/username" name="fullname" required />
          <label for="password">Password </label>
          <input type="password" placeholder=" " name="password" required /> 
          </div>
          <button class="btn" name="login-btn">Sign Up</button>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
