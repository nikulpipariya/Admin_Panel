</head>
<body>
<div class="container">
    <div class="header">
        <a href="index.php" class="logo">MYSTORE</a>
        <div class="navigation">
            <ul class="li"><a href="#">Home</a></ul>
            <ul class="li"><a href="#">Exchange</a></ul>
            <ul class="li"><a href="#">About us</a></ul>
            <ul class="li"><a href="#">Contact us</a></ul>
        </div>
        <div class="quick_navigation">
            <ul class="user_menu">
                <li class="has_submenu">
                    My Account&nbsp&nbsp
                    <ul class="submenu">
                        <?php
                            if($login){
                                echo '<li><a href="#" id="logout">Logout</a></li>';
                            }else{
                                echo '<li><a href="'.SITEURL.'login.php" id="login">Login</a></li>';
                                echo '<li><a href="#" id="register">Register</a></li>';
                            }
                        ?>
                    </ul>
                </li>
                <li><span class="cart-menu"><i class="bi bi-cart2"></i><span class="item-count">0</span></span></li>
            </ul>
        </div>
    </div>