<?php 
session_start();
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
    <form id="update_settings" class="flex_container" action="" method="post">
                <div class="flex_100">
                    <p class="label">Site URL</p>
                    <input type="text" name="siteurl" id="siteurl" placeholder="e.g https://example.com/" value=""/>
                    <span class="tooltip"></span>
                </div>
                <div class="flex_100">
                    <p class="label">Deafult Currency</p>
                    <select name="currency" id="currency">
                        <option value="$">USD</option>
                        <option value="€">EURO</option>
                        <option value="₹" selected>INR</option>
                    </select>
                    <span class="tooltip"></span>
                </div>
                <div class="flex_100">
                    <button type="submit" class="submit">SAVE</button>
                </div>
            </form>
    </div>
<?php require_once('footer.php') ?>