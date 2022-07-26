<?php require '../controllers/authController.php'; ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
  <base href="http://credithub.herokuapp.com/getStarted/">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon" />
    <!-- <link rel="stylesheet" href="style.css" /> -->
    <link rel="stylesheet" href="getstarted.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;600&display=swap" rel="stylesheet">
    <title>CreditHub</title>
  </head>
  <body>
    <div class="container-wrapper">
      <header class="app-bar">
        <img class="image" src="images/Logos.png" alt="logo" />
        <button onclick="openMenu()" id="menu-icon">
          <img src="images/Menu.png" alt="menu" />
        </button>
        <div id="menu" class="menu">
          <button onclick="cancel()" id="cancel">&times;</button>
          <ul>
            <a href="#"><li>For Business</li></a>
            <a href="#"><li>Affliates</li></a>
            <a href="#"><li>Contact Us</li></a>
            <a href="#"><li>FAQ</li></a>
            <a id="getstarted" href="#">GetStarted</a>
            <a id="login" href="#">Login</a>
          </ul>
        </div>
        <div id="menus" class="menus">
            <button onclick="cancel()" id="cancel">&times;</button>
            <ul>
              <a href="#"><li>For Business</li></a>
              <a href="#"><li>Affliates</li></a>
              <a href="#"><li>Contact Us</li></a>
              <a href="#"><li>FAQ</li></a>
              <a id="getstarted" href="#">GetStarted</a>
              <a id="login" href="#">Login</a>
            </ul>
          </div>
      </header>
      <main>
          <div class="form-title">
              <h1>Get your company started on CreditHub</h1>
          </div>
        <div class="input-form">
            <div class="col-1">
                <div class="input-field">
                    <label for="fullname">Full Name</label>
                    <input type="text" name="fullname" placeholder="Enter your name" id="fullname" required>
                </div>
                <div class="input-field">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" placeholder="youremail@email.com" id="email" required>
                </div>
                <div class="input-field">
                    <label for="location">Location</label>
                    <input type="text" name="location" id="location" required>
                </div>
            </div>
            <div class="col-2">
                <div class="input-field">
                    <label for="company">Company Name</label>
                    <input type="text" name="company" placeholder="Enter your comapny name" id="company" required>
                </div>
                <div class="input-field">
                    <label for="phone">Phone Number</label>
                    <input type="text" name="phone" id="phone" placeholder="e.g 08012345678" required>
                </div>
                <div class="input-field">
                    <label for="product">Product or Service Name</label>
                    <input type="text" name="product" id="product" required>
                </div>
            </div>
        </div>
        <div class="field">
            <label for="desc">Brief Product description</label>
            <textarea name="desc" id="desc" cols="30" rows="10" style="height: 210px;"></textarea>
        </div>
        <div class="submit">
            <input type="submit" value="Submit">
        </div>
      </main>
    </div>
    <script>
      const openMenu = () => {
        document.getElementById("menus").style.display = "block";
      };

      const cancel = () => {
        document.getElementById("menus").style.display = "none";
      }
    </script>
  </body>
</html>
