<?php
require_once('autoloader.php');

class Auth extends Db
{
    public function validate_admin($username,$password)
    {
        /*
        * Select Query
        * @param tablename (string)
        * @param filter (array)
        */

        $adminDetails = Db::select('users',array('username'=>$username,'type'=>'admin'));
           
        if($adminDetails){
            if($password == $adminDetails[0]['password']){
                return $adminDetails;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
}