<?php
require_once('autoloader.php');

class Product extends Db{

    public function update_product($product_Data,$product_id)
    {
        /*
        * Update Query
        * @param tablename (string)
        * @param data (array)
        * @param where (array)
        */
        
        $updateProduct = Db::update('products',$product_Data,array('id'=>$product_id));
        return $updateProduct;
    }

    public function add_product($product_Data)
    {
        if(is_array($product_Data)){

            /*
            * Insert Query
            * @param tablename (string)
            * @param data (array)
            */
            
            $addProduct = Db::insert('products',$product_Data);

            if($addProduct){
                return json_encode(array('msg'=>'success'));
            }else{
                return json_encode(array('msg'=>'Unable to insert data'));
            }
        }else{
            return json_encode(array('msg'=>'Please provide proper data!'));
        }
        
    }

    public function get_all_products()
    {    
        /*
        * Select Query
        * @param tablename (string)
        * @param filter (array)
        */
        
        $allProducts = Db::select('products');

        return $allProducts;
    }

    public function get_product_details($product_id)
    {
        /*
        * Select Query
        * @param tablename (string)
        * @param filter (array)
        */

        $product = Db::select('products',array('id'=>$product_id));
        return $product[0];
    }

    public function delete_product($product_id)
    {
        /*
        * Delete Query
        * @param tablename (string)
        * @param which (array)
        */
        
        $productDelete = Db::delete('products',array('id'=>$product_id));
        return $productDelete;
    }
    
    public function get_categories()
    {
        /*
        * Select Query
        * @param tablename (string)
        * @param filter (array)
        */

        $categories = Db::select('categories');
        return $categories;
    }
}