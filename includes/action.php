<?php
require dirname(__DIR__) . "/includes/db.php";
// include "mail_config.php";

// ? Logs errors into an array 
$errors = [];

// ? REGISTER USER
if (isset($_POST['register_user'])) {
  // ? receive all input values from the form
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];




  // ? form validation: ensure that the form is correctly filled ...
  // ? by adding (array_push()) corresponding error unto $errors array
//   if (empty($username)) {
//     array_push($errors, "username is required");
//   }
//   if (empty($email)) {
//     array_push($errors, "email is required");
//   }
//   if (empty($password)) {
//     array_push($errors, "Password is required");
//   }
  if ($password != $confirm_password) {
    array_push($errors, "The two passwords do not match");
  }

  // ? Check that the passwords entered are minimum of 5 characters
  if (strlen($password) < 5 || strlen($confirm_password) < 5) {
    array_push($errors, "Passwords must be a minimum of 6 characters");
  }

  // ? Capital letter, small letter, special character
//   if (passwordCheck($password) == false) {
//     array_push($errors, "Password must contain a mix of capital letters, small letters, special characters and numbers");
//   }


  // ? first check the database to make sure 
  // ? a user does not already exist with the same username and/or email
  $result = $pdo->prepare("SELECT * FROM users WHERE email= ? LIMIT 1");

  $result->execute([$email]);

  $user = $result->fetch(PDO::FETCH_ASSOC);

  if ($user) { // ? if user exists
    
    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // ? Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $password = md5($password); // ? encrypt the password before saving in the database

    $token = bin2hex(random_bytes(10));
    $verify_token = $token  . "_" . bin2hex($email);

    // ? inserting the user information into the datatbase 
    $stp = $pdo->prepare('INSERT INTO `users` (`first_name`, `last_name`, `email`, `password`) VALUES (?, ?, ?, ?)');

    header('location: index.php');

    $stp->execute([$first_name, $last_name, $email, $password]);

    // $verification_link = "localhost/middlemanbettest/verified.php?token=$verify_token";

    // $verification_link = "https://middlemanbet.com/verified.php?token=$verify_token";

    // * Email Template
    // include dirname(__DIR__) . "/verify/signup-email.php";

    // $mail_template = $header . $footer;

    // // ? send mail
    // sendMail($email, $mail_template, "Registration Successful");

    // $reg_successful = true;
  }
}


// ? LOGIN USER
if (isset($_POST['login_user'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

//   if (empty($email)) {
//     array_push($errors, "email is required");
//   }
//   if (empty($password)) {
//     array_push($errors, "Password is required");
//   }

  if (count($errors) == 0) {
    $password = md5($password);

    $result = $pdo->prepare("SELECT * FROM `users` WHERE `email`= ? AND `password` = ?");

    $result->execute([$email, $password]);

    $user = $result->fetch(PDO::FETCH_ASSOC);
    if ($user) {
      print_r($user);
      if ($user['email_verify_status'] == 1) {
        $_SESSION['email'] = $email;
        $_SESSION['success'] = "You are now logged in";
        header('location: index.php');
      } else {
        array_push($errors, "You have to verify your account before logging in");
      }
    } else {
      array_push($errors, "Email or password is incorrect");
    }
  } else {
    array_push($errors, "Wrong username/password combination");
  }
}



// function passwordCheck($password)
// {
//   // ? Validate password strength
//   $uppercase = preg_match('@[A-Z]@', $password);
//   $lowercase = preg_match('@[a-z]@', $password);
//   $number    = preg_match('@[0-9]@', $password);
//   $specialChars = preg_match('@[^\w]@', $password);

//   if (!$uppercase || !$lowercase || !$number || !$specialChars) {
//     return false;
//   }
//   return true;
// }
