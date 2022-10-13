<?php
if($_SESSION['ADMIN_LOGIN'] == ''){
    header('location:login.php');
}

require_once('../class/autoloader.php');
$config = new Config();
$config->settings();
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="<?php echo SITEURL ?>admin/assets/css/admin.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="sidebar active" id="left_sidebar">
        <div class="logo_base">
            <a href="<?php echo SITEURL ?>" class="logo">XSTORE</a>
        </div>
        <ul class="sidebar_items">
            <li><a href="<?php echo SITEURL  ?>admin/dashboard.php">Dashboard</a></li>
            <li class="has_submenu"><a href="#">Products</a>
                <ul class="submenu right">
                    <li><a href="<?php echo SITEURL  ?>admin/add_product.php">New Products</a></li>
                    <li><a href="<?php echo SITEURL  ?>admin/all_products.php">All Products</a></li>
                    <li><a href="<?php echo SITEURL  ?>admin/categories.php">Categories</a></li>
                </ul>
            </li>
            <li class="has_submenu"><a href="#">Users</a>
                <ul class="submenu right">
                    <li><a href="<?php echo SITEURL  ?>admin/add_user.php">Add User</a></li>
                    <li><a href="<?php echo SITEURL  ?>admin/all_users.php">All Users</a></li>
                </ul>
            </li>
            <li><a href="<?php echo SITEURL  ?>admin/orders.php">Orders</a></li>
            <li><a href="<?php echo SITEURL  ?>admin/settings.php">Settings</a></li>
        </ul>
    </div>
<div id="content">
    <div class="header">
        <div class="usermenu">
            <span id="toggle_sidebar"><i class="fa-light fa-bars"></i></span>
            <ul class="dropdown">
                <li><p class="user_greet">Welcome, <?php echo $_SESSION['USERNAME'] ?></p></li>
                <li class="has_submenu">
                    <img class="user_thumb" src="<?php echo SITEURL.'assets/images/users/'.$_SESSION['USER_PIC']?>"/>
                    <span class="submenu_arrow"><i class="fa-light fa-caret-down"></i></span>
                    <div class="submenu">
                        <ul>
                            <li><button class="logout button" id="logout">Logout</button></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
<div class="main_content">