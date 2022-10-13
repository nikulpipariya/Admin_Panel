<?php
require_once('autoloader.php');

class User extends Db
{
    public function update_user($user_Data,$user_id)
    {
        /*
        * Update Query
        * @param tablename (string)
        * @param data (array)
        * @param where (array)
        */

        $updateUser = Db::update('users',$user_Data,array('id'=>$user_id));
        return $updateUser;
    }

    public function add_user($user_Data)
    {
        if(is_array($user_Data)){
            
            /*
            * Insert Query
            * @param tablename (string)
            * @param data (array)
            */
            
            $checkUser = Db::select('users',array('username'=>$user_Data['username']));
            
            if($checkUser){
                return 'Username Alreay Exist';
            }else{
                $addUser = Db::insert('users',$user_Data);
                if($addUser){
                    return 'success';
                }else{
                    return 'Unable to insert data';
                }
            }
        }else{
            return 'Please provide proper data!';
        }
        
    }

    public function get_all_users()
    {
        /*
        * Select Query
        * @param tablename (string)
        * @param filter (array)
        */

        $allusers = Db::select('users');
        
        return $allusers;
    }

    public function get_user_details($id)
    {
        /*
        * Select Query
        * @param tablename (string)
        * @param filter (array)
        */

        $user = Db::select('users',array('id'=>$id));
        return $user[0];
    }

    public function delete_user($user_id)
    {
        /*
        * Delete Query
        * @param tablename (string)
        * @param which (array)
        */

        $userDelete = Db::delete('users',array('id'=>$user_id));
        return $userDelete;
    }
}