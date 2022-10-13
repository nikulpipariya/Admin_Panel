<?php 
session_start();
if(isset($_SESSION['ADMIN_LOGIN'])){
    if($_SESSION['ADMIN_LOGIN'] != ''){
        header('location:dashboard.php');
    }
}
require_once('../class/autoloader.php');
$config = new Config();
$setting = $config->settings();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo SITEURL ?>admin/assets/css/admin.css" rel="stylesheet">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <div class="login_form">
            <form action="" type="POST" id="login">
                <p class="title">Welcome, Please Login</p>
                <div class="input_group">
                    <div class="form_input">
                        <label>Username</label>
                        <input type="text" name="username" id="username" placeholder="e.g. admin">
                        <span class="tooltip"></span>
                    </div>
                    <div class="form_input">
                        <label>Password</label>
                        <input type="text" name="password" id="password" placeholder="**********">
                        <span class="tooltip"></span>
                    </div>
                    <button class="submit" type="submit">Login</button>
                    <span id="login_error"></span>
                </div>
            </form>
        </div>
    </div>


<?php require('footer.php') ?>