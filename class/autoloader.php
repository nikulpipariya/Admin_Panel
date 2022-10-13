<?php
spl_autoload_register('registerClass');

function registerClass($className)
{
    $extension = '.class.php';
    require($className.$extension);
}