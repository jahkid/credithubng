<?php require dirname(__DIR__).'./controllers/authController.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
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
        
        <form enctype = 'multipart/form-data' action="getstarted.php" method="post">
        <?php if (count($errors)>0):?>
        <div class="alert alert-danger">
          <?php foreach($errors as $error): ?>
          <li><?php echo $error; ?></li>
          <?php endforeach; ?>
        </div>
        <?php endif; ?>
        <div class="input">
          <label for="full-name">Full Name </label>
          <input type="text" placeholder="Enter your name" name = 'fullname'required />
          <label for="company">Company Name </label>
          <input type="text" placeholder="Enter your company's name" name="company" required />
          <label for="email">Email Address </label>
          <input type="email" placeholder="youremail@email.com" name="email" required />
          <label for="password">Password </label>
          <input type="password" placeholder=" " name="password" required />
          <label for="passwordConf">Confirm Password </label>
          <input type="password" placeholder=" " name="passwordConf" required />
          <label for="phone">Phone Number</label>
          <input type="number" placeholder="e.g 08012345678" name="phone" required />
          <label for="location">Location</label>
          <input type="text" name="location" />
          <label for="product">Product or Service Name</label>
          <input type="text" name="product" required />
          <label for="text"
            >Brief Product Description</label
          >
          <input
            name = 'product'
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
                name="file"
                type="file" placeholder= "Select files here" 
                value="Supported file types: JPEG, PNG, PDF Max File size: 2mb"
                required
                />
              </div>
          </div>
          <button class="btn" name="signup-btn">Sign Up</button>
          </form>
        </div>
      </div>
    </div>
    <script src="getstarted.js"></script>
  </body>
</html>
