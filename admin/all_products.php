<?php 
session_start();
require_once('../class/autoloader.php');
$product = new product();
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
        <table class="product_list datatable">
            <thead>
            <tr>
                <th>Name</th>
                <th>Regular Price</th>
                <th>Sales Price</th>
                <th>Category</th>
                <th>Image</th>
            </tr>
            </thead>
            <tbody>
            <?php
                $allProducts =  $product->get_all_products();
                if($allProducts){
                    $products = '';
                    foreach($allProducts as $product){
                        $products .= "<tr><td>{$product['name']}</td>";
                        $products .= "<td>{$product['r_price']}</td>";
                        $products .= "<td>{$product['s_price']}</td>";
                        $products .= "<td>{$product['category']}</td>";
                        $imgurl = SITEURL.'assets/images/products/'.$product['image'];
                        $products .= "<td width='60px'><img src='$imgurl' width='50px'></td>";
                        $products .= "<td class='flex_container no_wrap'><button onclick=editForm(this,'product') class='edit_product action' id='{$product['id']}'>Edit</button>
                        <button onclick=deleteData(this,'product') class='delete_product action' id='{$product['id']}'>Delete</button></td></tr>";
                    }
                }
                echo $products;
            ?>
            </tbody>
        </table>
        <div class="modal" id="update_model">
            <form id="update_product" class="flex_container popup_form" action="" method="post">
            <span class="model_close" id="model_close"><i class="fa-thin fa-circle-xmark"></i></span>
                <input type="hidden" name="product_id" id="product_id" value=""/>
                <div class="flex_100">
                    <p class="label">Product Name</p>
                    <input type="text" name="name" id="name" placeholder="e.g Item 1" />
                    <span class="tooltip"></span>
                </div>
                <div class="flex_container flex_100">
                    <div class="flex_33">
                        <p class="label">Product Category</p>
                        <input type="text" name="category" id="category" placeholder="e.g. bags" />
                        <span class="tooltip"></span>
                    </div>
                    <div class="flex_33">
                        <p class="label">Regular Price</p>
                        <input type="text" name="r_price" id="r_price" placeholder="e.g. 300" />
                        <span class="tooltip"></span>
                    </div>
                    <div class="flex_33">
                        <p class="label">Sales Price</p>
                        <input type="text" name="s_price" id="s_price" placeholder="e.g. 300" />
                        <span class="tooltip"></span>
                    </div>
                </div>
                <div class="flex_100">
                    <p class="label">Product Description</p>
                    <textarea name="description" id="description" rows="10" placeholder="e.g summary of product"></textarea>
                    <span class="tooltip"></span>
                </div>
                <div class="flex_100">
                    <p class="label">Product Image</p>
                    <input type="file" name="productimage" id="productimage" accept="image/*,.pdf">
                </div>
                <div class="flex_100">
                    <button type="submit" class="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
<?php require('footer.php') ?>