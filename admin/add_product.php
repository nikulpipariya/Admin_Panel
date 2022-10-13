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
            <form id="add_product" class="flex_container" action="" method="post">
                <div class="flex_100">
                    <p class="label">Product Name <span class="required">*</span></p>
                    <input type="text" name="name" id="name" placeholder="e.g Item 1" />
                    <span class="tooltip"></span>
                </div>
                <div class="flex_container flex_100">
                    <div class="flex_50">
                        <p class="label">Product Category <span class="required">*</span></p>
                        <input type="text" name="category" id="category" placeholder="e.g. bags" />
                        <span class="tooltip"></span>
                    </div>
                    <div class="flex_50">
                        <p class="label">Regular Price <span class="required">*</span></p>
                        <input type="text" name="r_price" id="r_price" placeholder="e.g. 300" />
                        <span class="tooltip"></span>
                    </div>
                    <div class="flex_50">
                        <p class="label">Sales Price <span class="required">*</span></p>
                        <input type="text" name="s_price" id="s_price" placeholder="e.g. 300" />
                        <span class="tooltip"></span>
                    </div>
                    <div class="flex_50">
                        <p class="label">Stock <span class="required">*</span></p>
                        <input type="text" name="stock" id="stock" placeholder="e.g. 300" />
                        <span class="tooltip"></span>
                    </div>
                </div>
                <div class="flex_100">
                    <p class="label">Product Description <span class="required">*</span></p>
                    <textarea name="description" id="description" rows="10" placeholder="e.g summary of product"></textarea>
                    <span class="tooltip"></span>
                </div>
                <div class="flex_100">
                    <p class="label">Product Image</p>
                    <input type="file" name="productimage" id="productimage" accept="image/*">
                </div>
                <div class="flex_100">
                    <button type="submit" class="submit">Add Product</button>
                </div>
            </form>
<?php require_once('footer.php') ?>