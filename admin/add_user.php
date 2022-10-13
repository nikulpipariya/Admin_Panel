<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome, Admin</title>
<?php require_once('header.php') ?>
            <form id="add_user" class="flex_container" action="" method="post">
                <div class="flex_100">
                    <p class="label">Username</p>
                    <input type="text" name="username" id="username" placeholder="e.g nikulpipa" />
                    <span class="tooltip"></span>
                </div>
                <div class="flex_container flex_100">
                    <div class="flex_50">
                        <p class="label">Password</p>
                        <input type="password" name="password" id="password" placeholder="e.g. 1Gg34@4vrrr" />
                        <span class="tooltip"></span>
                    </div>
                    <div class="flex_50">
                        <p class="label">Password Confirm</p>
                        <input type="password" name="cpassword" id="cpassword" placeholder="e.g. 1Gg34@4vrrr" />
                        <span class="tooltip"></span>
                    </div>
                </div>
                <div class="flex_100">
                    <p class="label">Email</p>
                    <input type="text" name="email" id="email" placeholder="e.g. nikul@gmail.com"/>
                    <span class="tooltip"></span>
                </div>
                <div class="flex_100">
                    <p class="label">Type Of User</p>
                    <select name="user_type">
                        <option value="admin">Admin</option>
                        <option value="customer" selected>Customer</option>
                        <option value="editor">Editor</option>
                    </select>
                    <span class="tooltip"></span>
                </div>
                <div class="flex_100">
                    <p class="label">Profile Picture</p>
                    <input type="file" name="userimage" id="userimage" accept="image/*">
                </div>
                <div class="flex_100">
                    <button type="submit" class="submit">Add User</button>
                </div>
            </form>
<?php require_once('footer.php') ?>