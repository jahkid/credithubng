<?php

// require dirname(__DIR__).'./vendor/autoload.php'; 
// require dirname(__DIR__).'./config/constants.php'; 



// Create the Transport
// $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465,'ssl'))
//   ->setUsername(EMAIL)
//   ->setPassword(PASSWORD)
// ;

// Create the Mailer using your created Transport
// $mailer = new Swift_Mailer($transport);



// function sendVerificationEmail($userEmail, $token){
    // global $mailer;
    // $body = '<!DOCTYPE html>
    // <html lang="en">
    // <head>
    //     <meta charset="UTF-8">
    //     <meta http-equiv="X-UA-Compatible" content="IE=edge">
    //     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    //     <title>verify</title>
    // </head>
    // <body>
    //     <div class="wrapper">
    //         <p>
    //             Thank you for registering with credithub,
    //             please click on this link to verify your email.
    //         </p>
    //         <a href="http://localhost/credithubng/dashboard.php?token=' . $token . '">
    //             VERIFY
    //         </a>
    //     </div>
    // </body>
    // </html>';
    
    // Create a message
// $message = (new Swift_Message('Verify Your Email Address'))
// ->setFrom(['jahkidedeh@gmail.com' => 'CreditHub'])
// ->setTo($userEmail)
// ->setBody($body, 'text/html');
// ;

// Send the message
// $result = $mailer->send($message);

// }