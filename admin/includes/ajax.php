<?php
require('../../class/autoloader.php');
$product = new Product();
$user = new User();
$auth = new Auth();
$config = new Config();
// var_dump($_POST);

/*
* Admin Panel Login & Logout
*/

// Login

if($_POST['action'] == 'login')
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = $auth->validate_admin($username,$password);
    if($user){
        session_start();
        $_SESSION['ADMIN_LOGIN'] = 'yes';
        $_SESSION['USERNAME'] = $username;
        $_SESSION['USER_PIC'] = $user[0]['image'];
        echo json_encode(array('msg'=>'success'));
    }else{
        echo json_encode(array('msg'=>'Please Enter Valid Login Details'));
    }
}


// Logout

if($_POST['action'] == 'logout')
{
    session_start();
    session_unset();
    echo json_encode(array('msg'=>'success'));
}


/*
* Product Table Ajax Request
*/


// Get All Product

if($_POST['action'] == 'get_all_product')
{
    $allProducts = $product->get_all_products();
    if($allProducts){
        $products = '';
        foreach($allProducts as $product){
            $products .= "<tr><td>{$product['name']}</td>";
            $products .= "<td>{$product['r_price']}</td>";
            $products .= "<td>{$product['s_price']}</td>";
            $products .= "<td>{$product['description']}</td>";
            $products .= "<td>{$product['category']}</td>";
            $imgurl = $config->get_site_url().'assets/images/products/'.$product['image'];
            $products .= "<td width='60px'><img src='$imgurl' width='50px'></td>";
            $products .= "<td class='flex_container no_wrap'><button onclick=editForm(this,'product') class='edit_product action' id='{$product['id']}'>Edit</button>
            <button onclick=deleteData(this,'product') class='delete_product action' id='{$product['id']}'>Delete</button></td></tr>";
        }
    }else{
        $products = '';
    }
    echo json_encode(array('data'=>$products));
}


// Add New Product

if($_POST['action'] == 'add_product')
{

    if($_FILES['productimage']['name'] != ''){
        $filename = $_FILES['productimage']['name'];
        $filename = rand(000000,999999).'-'.$filename;
        $filetemp = $_FILES['productimage']['tmp_name'];
        $fileDestination = '../../assets/images/products/'.$filename;
        move_uploaded_file($filetemp,$fileDestination);
    }else{
        $filename = '';
    }
    $description = addslashes($_POST['description']);

    $product_Data = array(
        'name'=>"{$_POST['name']}",
        'r_price'=>"{$_POST['r_price']}",
        's_price'=>"{$_POST['s_price']}",
        'description'=>"$description",
        'category'=>"{$_POST['category']}",
        'image'=>$filename);

    $insert = $product->add_product($product_Data);
    echo $insert;
}


// Single Product Details

if($_POST['action'] == 'get_prodcut_details')
{
    $productID = $_POST['product_id'];
    $prodcutDetails = $product->get_product_details($productID);
    echo json_encode($prodcutDetails);
}


// Update Single Product

if($_POST['action'] == 'update_product')
{
    $description = addslashes($_POST['description']);

    if($_FILES['productimage']['name'] != ''){
        $filename = $_FILES['productimage']['name'];
        $filename = rand(000000,999999).'-'.$filename;
        $filetemp = $_FILES['productimage']['tmp_name'];
        $fileDestination = '../../assets/images/products/'.$filename;
        move_uploaded_file($filetemp,$fileDestination);

        $product_Data = array(
            'name'=>"{$_POST['name']}",
            'r_price'=>"{$_POST['r_price']}",
            's_price'=>"{$_POST['s_price']}",
            'description'=>"$description",
            'category'=>"{$_POST['category']}",
            'image'=>$filename);
    }else{
         $product_Data = array(
        'name'=>"{$_POST['name']}",
        'r_price'=>"{$_POST['r_price']}",
        's_price'=>"{$_POST['s_price']}",
        'description'=>"$description",
        'category'=>"{$_POST['category']}");
    }

    $updateRecord = $product->update_product($product_Data,$_POST['product_id']);
    if($updateRecord){
        echo json_encode(array('msg'=>$updateRecord));
    }else{
        echo json_encode(array('msg'=>'error'));
    }
}


// Delete Single Product

if($_POST['action'] == 'delete_prodcut'){
    $productDelete = $product->delete_product($_POST['product_id']);
    echo json_encode(array('msg'=>$productDelete));
}


/* 
* USER TABLE AJAX REQUEST
*/


// Get All Users

if($_POST['action'] == 'get_all_users')
{
    $allusers = $user->get_all_users();
    if($allusers){
        $users = '';
        foreach($allusers as $user){
            $users .= "<tr><td>{$user['username']}</td>";
            $users .= "<td>{$user['email']}</td>";
            $users .= "<td>{$user['type']}</td>";
            $imgurl = $config->get_site_url().'assets/images/users/'.$user['image'];
            $users .= "<td width='60px'><img src='$imgurl' width='30px'></td>";
            $users .= "<td class='flex_container no_wrap'>
            <button onclick=editForm(this,'user') class='edit_user action' id='{$user['id']}'>Edit</button>
            <button onclick=deleteData(this,'user') class='delete_user action' id='{$user['id']}'>Delete</button>
            </td></tr>";
        }
    }else{
        $users = '';
    }
    echo json_encode(array('data'=>$users));
}


// Add New User

if($_POST['action'] == 'add_user')
{

    if($_FILES['userimage']['name'] != ''){
        $filename = $_FILES['userimage']['name'];
        $filename = rand(000000,999999).'-'.$filename;
        $filetemp = $_FILES['userimage']['tmp_name'];
        $fileDestination = '../../assets/images/users/'.$filename;
        move_uploaded_file($filetemp,$fileDestination);

    }else{
        $filename = 'default_avtar.png';
    }

    $user_data = array(
        "username"=>"{$_POST['username']}",
        "password"=>"{$_POST['password']}",
        "email"=>"{$_POST['email']}",
        "type"=>"{$_POST['user_type']}",
        "image"=>"$filename",
    );
    
    $user = $user->add_user($user_data);
    echo json_encode(array('msg'=>$user));
}

// Single User Details

if($_POST['action'] == 'get_user_details')
{
    $userID = $_POST['user_id'];
    $userDetails = $user->get_user_details($userID);
    echo json_encode($userDetails);
}

// Update Single User

if($_POST['action'] == 'update_user')
{

    if($_FILES['userimage']['name'] != ''){
        $filename = $_FILES['userimage']['name'];
        $filename = rand(000000,999999).'-'.$filename;
        $filetemp = $_FILES['userimage']['tmp_name'];
        $fileDestination = '../../assets/images/users/'.$filename;
        move_uploaded_file($filetemp,$fileDestination);

        $user_Data = array(
            "username"=>"{$_POST['username']}",
            "password"=>"{$_POST['password']}",
            "email"=>"{$_POST['email']}",
            "type"=>"{$_POST['user_type']}",
            "image"=>"$filename",
        );

    }else{
        $user_Data = array(
            "username"=>"{$_POST['username']}",
            "password"=>"{$_POST['password']}",
            "email"=>"{$_POST['email']}",
            "type"=>"{$_POST['user_type']}",);
    }

    $updateRecord = $user->update_user($user_Data,$_POST['user_id']);
    if($updateRecord){
        echo json_encode(array('msg'=>$updateRecord));
    }else{
        echo json_encode(array('msg'=>'error'));
    }
}


// Delete Single User

if($_POST['action'] == 'delete_user'){
    $userDelete = $user->delete_user($_POST['user_id']);
    echo json_encode(array('msg'=>$userDelete));
}

//Get Settings

if($_POST['action'] == 'settings'){
    $settings = $config->get_settings();
    echo json_encode($settings);
}

if($_POST['action'] == 'update_settings'){
   unset($_POST['action']);
   foreach($_POST as $name=>$value){
      $updateSetting = $config->set_settings($value,$name);
      if(!$updateSetting){
        $updateSetting = 'error';
        exit;
      }else{
        $updateSetting = 'success';
      }
   }
   echo json_encode(array('msg'=>$updateSetting));
}
?>