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
    <p class="title">Product categories</p>
    <div id="col_left">
    <p class="subtitle">Add new category</p>
    <form id="add_user" class="flex_container" action="" method="post">
                <div class="flex_100">
                    <p class="label">Name</p>
                    <input type="text" name="name" id="name" placeholder="e.g Bags" />
                    <span class="tooltip"></span>
                </div>
                <div class="flex_100">
                    <p class="label">Parent Category</p>
                    <select name="user_type">
                        <option value="" selected>None</option>
                        <option value="admin">Admin</option>
                        <option value="customer">Customer</option>
                        <option value="editor">Editor</option>
                    </select>
                    <span class="tooltip"></span>
                </div>
                <div class="flex_100">
                    <p class="label">Description</p>
                    <textarea name="decription" id="decription" placeholder="e.g. Lorem Ipsum..."></textarea>
                    <span class="tooltip"></span>
                </div>
                <div class="flex_100">
                    <p class="label">Thumbnail</p>
                    <input type="file" name="thumb" id="thumb" accept="image/*">
                </div>
                <div class="flex_100">
                    <button type="submit" class="submit">Add New Category</button>
                </div>
            </form>
    </div>
    <div id="col_right">
    <p class="subtitle">Categories</p>
    <table class="product_list datatable">
            <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Description</th>
            </tr>
            </thead>
            <tbody>
            <?php
                $allProducts =  $product->get_categories();
                if($allProducts){
                    $products = '';
                    foreach($allProducts as $product){
                        $imgurl = SITEURL.'assets/images/products/'.$product['thumb'];
                        $products .= '<tr class="table_row">';
                        $products .= "<td class='col_thumb'><img src='$imgurl' width='40px' height='40px'></td>";
                        $products .= "<td class='col_name'>{$product['name']}
                        <div class='row_action'>
                            <span class='edit'><a href='#'>Edit</a></span> | 
                            <span class='delete'><a href='#'>Delete</a></span>
                        </div>
                        </td>";
                        $products .= "<td>{$product['description']}</td>";
                        $products .= '</tr>';
                    }
                }
                echo $products;
            ?>
            </tbody>
        </table>
    </div>
<?php require('footer.php') ?>