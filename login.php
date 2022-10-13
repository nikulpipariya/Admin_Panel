<?php
session_start();
require_once('class/autoloader.php');
require_once('includes/config.php');

if(isset($_SESSION['USERNAME'])){
    $login = true;
    header('location:index.php');
}else{
    $login = false;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
<?php require 'header.php' ?>
    <section class="hero login_featured grid_container col-2">
        <div class="flex_container columns center">
            <span class="login_title">Customer Login</span>
            <form action="" class="flex_container columns">
                <div>
                    <label>Username</label>
                    <input type="text" name="username" id="username" />
                    <span class="tooltip"></span>
                </div>
                <div>
                    <label>Password</label>
                    <input type="password" name="password" id="password" />
                    <span class="tooltip"></span>
                </div>
                <button type="submit" id="login" class="button"><span>Login</span></button>
            </form>
        </div>
        <div class="flex_container columns center theme_back">
            <span class="login_title">New customers</span>
            <p class="login_subtitle">Creating an account has many advantages: process faster, order tracking and more.</p>
            <button id="register" class="button"><span>Create an Account</span></button>
        </div>
    </section>
<?php require_once('footer.php'); ?>