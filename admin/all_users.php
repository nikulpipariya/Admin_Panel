<?php 
session_start();
require_once('../class/autoloader.php');
$user = new User();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<?php require_once('header.php') ?>
    <div class="widget">
        <table class="users_list datatable">
            <thead>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Type</th>
                <th>Avatar</th>
            </tr>
            </thead>
            <tbody>
            <?php
                $allusers = $user->get_all_users();
                if($allusers){
                    $users = '';
                    foreach($allusers as $user){
                        $users .= "<tr><td>{$user['username']}</td>";
                        $users .= "<td>{$user['email']}</td>";
                        $users .= "<td>{$user['type']}</td>";
                        $imgurl = SITEURL.'assets/images/users/'.$user['image'];
                        $users .= "<td width='60px'><img src='$imgurl' width='30px'></td>";
                        $users .= "<td class='flex_container no_wrap'>
                        <button onclick=editForm(this,'user') class='edit_user action' id='{$user['id']}'>Edit</button>
                        <button onclick=deleteData(this,'user') class='delete_user action' id='{$user['id']}'>Delete</button>
                        </td></tr>";
                    }
                    echo $users;
                }
            ?>
            </tbody>
        </table>
        <div class="modal" id="update_model">
        <form id="update_user" class="flex_container popup_form" action="" method="post">
            <span class="model_close" id="model_close"><i class="fa-thin fa-circle-xmark"></i></span>
            <input type="hidden" name="user_id" id="user_id" value="">
                <div class="flex_100">
                    <p class="label">Username</p>
                    <input type="text" name="username" id="username" placeholder="e.g nikulpipa" readonly/>
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
                    <button type="submit" class="submit">Update User</button>
                </div>
            </form>
        </div>
    </div>
<?php require('footer.php') ?>