<?php
session_start();

if($_SESSION['USERNAME'] == ''){
    header('location:login.php');
}else{
    header('location:dashboard.php');
}