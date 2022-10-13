<?php
class Db{
    private $dbname = 'project';
    private $host = 'localhost';
    private $user = 'root';
    private $pwd = '';

    private function connect()
    {
        $db = "mysql:host=$this->host;dbname=$this->dbname;";
        $pdo = new pdo($db,$this->user,$this->pwd);
        $pdo->setAttribute(pdo::ATTR_DEFAULT_FETCH_MODE,pdo::FETCH_ASSOC);
        return $pdo;
    }

    /*
    * Select Query
    * @param tablename (string)
    * @param filter (array)
    */

    public function select($table,$condition = '')
    {
        $query = "SELECT * FROM `$table`";
        if(is_array($condition)){
            $query .= " WHERE ";
            $count = 0;
            foreach($condition as $key=>$value){
                if($count >= 1){
                    $query .= ' AND ';
                }
                $query .= "`$key` = '$value'";
                $count++;
            }
        }
        $data = $this->connect()->query($query);
        $data = $data->fetchAll();
        return $data;
    }

    /*
    * Insert Query
    * @param tablename (string)
    * @param data (array)
    */

    public function insert($table,$data = '')
    {
        $query = "INSERT INTO `$table` ";
        $column = array();
        $values = array();

        if(is_array($data)){
            foreach($data as $key=>$value){
                array_push($column,$key);
                array_push($values,"'$value'");
            }
            $query .= '('.implode(',',$column).') VALUES ('.implode(',',$values).')';
        }
        $data = $this->connect()->prepare($query);
        $data = $data->execute();
        return $data;
    }

    /*
    * Update Query
    * @param tablename (string)
    * @param data (array)
    * @param where (array)
    */

    public function update($table,$data = '',$condition)
    {
        $query = "UPDATE `$table` SET ";
        $count = 1;
        if(is_array($data)){
            foreach($data as $key=>$value)
            {
                $query .= "`$key` = '$value'";
                if($count != sizeof($data)){
                    $query .= ',';
                }
                $count++;
            }
        }
        $count = 1;
        $query .= " WHERE ";
        foreach($condition as $key=>$value)
        {
            $query .= "`$key` = '$value'";
            if($count != sizeof($condition)){
                $query .= " AND ";
            }
            $count++;
        }
        $data = $this->connect()->prepare($query);
        $data = $data->execute();
        return $data;
    }

    /*
    * Delete Query
    * @param tablename (string)
    * @param which (array)
    */

    public function delete($table,$id)
    {
        $query = "DELETE FROM $table WHERE";
        if($id){
            foreach($id as $key=>$value){
                $query .= "`$key` = '$value'";
            }
        }
        $delete = $this->connect()->prepare($query);
        $delete = $delete->execute();
        return $delete;
    }
}