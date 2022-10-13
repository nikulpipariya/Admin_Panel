<?php
session_start();
require_once('class/autoloader.php');
$settings = new Config();
$settings = $settings->settings();

if(isset($_SESSION['USERNAME'])){
    $login = true;
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
    <title>Home</title>
<?php require 'header.php' ?>
    <section class="home hero">
        <div class="container">
            <p class="title">Welcome, MYSTORE</p>
            <p class="subtitle">Wear New Style Everyday.</p>
        </div>
    </section>
    <section class="home listing">
        <div class="container">
        <p class="title">Recent Listing</p>
        <div class="product_list grid_container col_4">
            <?php
            $products = new Product();
            $allProduct = $products->get_all_products();
            foreach($allProduct as $product){
            ?>
            <div class="product_box">
               <div class="product_image">
                    <img src="<?php echo SITEURL ?>assets/images/products/<?php echo $product['image'] ?>" alt="">
               </div>
               <div class="product_details">
                    <p class="product_title"><?php echo $product['name'] ?></p>
                    <p class="product_price">
                        <span class="regular_price"><span class="currency">$</span><?php echo $product['r_price']?></span>
                        <?php
                        if($product['s_price']){
                            ?>
                            <span class="sales_price"><span class="currency">$</span><?php echo $product['s_price']?></span>
                            <?php
                        }
                        ?>
                    </p>
                    <button class="add_to_cart" id="<?php echo $product['id'] ?>"> Add To Cart</button>
               </div>
            </div>
            <?php
            }
            ?>
        </div>
        </div>
    </section>
<?php require_once('footer.php'); ?>