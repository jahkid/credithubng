<?php
require ('functions.php');
$errors = array();
//on submit run this code to check for errors in the form
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $errors = signup($_POST);

  if (count($errors)==0) {
    // header('Locations: ./SIGN-IN/signin.php');
    // die;
  }
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="getstarted.css" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;600&display=swap" rel="stylesheet">
    <title>CreditHub</title>
  </head>
  <body>
    <div class="container">
      <!-- this is the first section logo, hamburger  -->
      <div class="topbar">
        <span
          ><img src="images/Logos.png" alt="logo" />
        </span>
        <button class="menu-btn" id="menu-btn" onclick="openModal()"> 
          <img src="images/Menu.png" alt="" />
        </button>
      </div>
      <!-- modal menu  -->
      <div id="menuContainer" class="menu-container">
        <div class="menu-header">
            <span class="logo-img"><img src="images/Logos.png" alt="logo" /></span>
            <button class="logo-close" id="close-btn" onclick="closeModal()"> 
                <img src="images/Close_round.png" alt="">
            </button>
        </div>
        <div class="menu" id="menu">
            <ul>
               <span class="content">
                   <li>For Business</li>
                   <li>For Affiliates</li>
                   <li>Contact Us</li>
                   <li>FAQ</li>
            </ul>
           
        </div>
        <div class="btoon">
          <span class="get-btn">
            <input type="submit" placeholder="Get Started" value="Get Started">
          </span>
          <span class="log-button">
            <input type="submit" name="Login" value="Login">
          </span>
      </div>
      </div>
      
      

      <!-- this is the content l6part -->
      <div class="form-container">
        <div class="content">
          <h1>Get your company started on CreditHub</h1>
        </div>
        <!-- this section entails the input  -->
        <div>
          <!-- display the errors here -->
          <?php if(count($errors)>0):?>
            <?php foreach ($errors as $error ): ?>
              <?= $error ?> <br>
            <?php endforeach;?>
          <?php endif;?>
        </div>
        <form action="getstarted.php" method="post">
        <div class="input">
          <label for="full-name">Full Name </label>
          <input type="text" placeholder="Enter your name" name = 'full-name'required />
          <label for="company">Company Name </label>
          <input type="text" placeholder="Enter your company's name" name="company" required />
          <label for="email">Email Address </label>
          <input type="email" placeholder="youremail@email.com" name="email" required />
          <label for="phone-number">Phone Number</label>
          <input type="number" placeholder="e.g 08012345678" name="phone-number" required />
          <label for="location">Location</label>
          <input type="text" name="location" />
          <label for="text">Product or Service Name</label>
          <input type="text" required />
          <label for="text"
            >Brief Product Description</label
          >
          <input
            type="text"
            class="brief"
            placeholder="Tell us about the product or service"
            required>
          
          
              <span
                ></span>
              <div class="upload-container">
                <label for="file">Upload Document (kindly upload document to help us understand
                  your business better)</label>
                <input
                type="file" placeholder= "Select files here" 
                value="Supported file types: JPEG, PNG, PDF Max File size: 2mb"
                required
                />
              </div>
          </div>
          <button class="btn">Sign Up</button>
          </form>
        </div>
      </div>
    </div>
    <script src="getstarted.js"></script>
  </body>
</html>
