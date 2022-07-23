<?php
require_once '../includes/config.php';
$errors =[];


if (isset($_POST)) {

    $firstName = trim($_POST['fname']);
    $lastName = trim($_POST['lname']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirmPassword = trim($_POST['cpassword']);

    // validations

    if (empty($firstName)) {
        $errors[] ="First Name can't be blank ";
    }

    if (empty($lastName)) {
        $errors[] ="Last Name can't be blank ";
    }

    if (empty($email)) {
        $errors[] ="Email can't be blank ";
    }

    if (!empty($email)&& !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] ="Invalid email address";
    }
    if (empty($password)) {
        $errors[] ="Password can't be blank ";
    }
    if (empty($confirmPassword)) {
        $errors[] ="Confirm Password can't be blank ";
    }

    if (!empty($password)&& !empty($confirmPassword) && $password!=$confirmPassword){

        $errors[]="Confirm password doesn't match.";
    }
    
    if (!empty($errors)){
        $_SESSION['errors'] =$errors;
        header('location:'. 'SITEURL.Signup.php');
    }
}

?>