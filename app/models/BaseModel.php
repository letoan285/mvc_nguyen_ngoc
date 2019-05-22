<?php 
namespace App\Model;
use PDO;

class BaseModel {
    protected $conn;
    private $host = 'localhost';
    private $pass = '';
    private $user = 'root';
    private $dbName = 'db_vu_ngoc';
    private $charset = 'utf8';

    public function __construct(){
        try {
            $this->conn = new PDO("mysql:host=$this->host; dbname=$this->dbName; charset=$this->charset", $this->user, $this->pass);
            return true;
        } catch(PDOException $e){
            var_dump($e->getMessages());die;
        }
    }

    public function save()
    {
        $this->sql = "INSERT INTO $this->table (";
        foreach($this->columns as $col){
            if($this->{$col} != null){
                $this->sql .= "$col, ";
            } 
        }
        $this->sql = rtrim($this->sql, ", ");
        $this->sql .= ") values ( ";
        foreach($this->columns as $col){
            if($this->{$col} != null){
                $this->sql .= "'" . $this->{$col} . "', ";
            } 
        }
        $this->sql = rtrim($this->sql, ", ");
        $this->sql .= ")";
        $stmt = $this->conn->prepare($this->sql);
        try {
            $stmt->execute();
            return true;
        } catch(PDOException $e) {
            echo "Them moi that bai";die;
        }
    }

    public static function all()
    {
        $model = new static();

        $model->sql = "SELECT * FROM $model->table";
        $stmt=$model->conn->prepare($model->sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS, get_class($model));
        return $result;
    }
    public static function find($id){
        $model = new static();
        $model->sql = "SELECT * FROM $model->table WHERE id = $id";
        $stmt = $model->conn->prepare($model->sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS, get_class($model));
        if(count($result) > 0) {
            return $result[0];
        } else {
            return null;
        }
    }
    public static function where($arr)
    {
        $model = new static();
        $model->sql = "SELECT * FROM $model->table WHERE ";
        if(count($arr) == 2){
            $model->sql .= "$arr[0] = '$arr[1]'";
        }
        if(count($arr) == 3){
            $model->sql .= "$arr[0] $arr[1] '$arr[2]'";
        }
       return $model;
    }
    public function andWhere($arr)
    {
        $this->sql .= " and ";
        if(count($arr) == 2){
            $this->sql .= "$arr[0] = '$arr[1]'";
        }
        if(count($arr) == 3){
            $this->sql .= "$arr[0] $arr[1] '$arr[2]'";
        }
       return $this;
    }
    public function orWhere($arr)
    {
        $this->sql .= " or ";
        if(count($arr) == 2){
            $this->sql .= "$arr[0] = '$arr[1]'";
        }
        if(count($arr) == 3){
            $this->sql .= "$arr[0] $arr[1] '$arr[2]'";
        }
       return $this;
    }
    public function get()
    {
        $stmt = $this->conn->prepare($this->sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS, get_class($this));

        return $result;
    }
    public function first()
    {
       $list = $this->get();
       if(count($list) > 0) {
           return $list[0];
       } else {
           return null;
       }
    }
    public function delete()
    {
        $this->sql = "DELETE FROM $this->table WHERE id = $this->id";
        $stmt = $this->conn->prepare($this->sql);
        try {
            $stmt->execute();
            return true;
        } catch(PDOException $e){
            var_dump($e->getMessage());die;
        }
    }
    public function update()
    {
        $this->sql = "UPDATE $this->table set ";
        
        foreach($this->columns as $col){
            if($this->{$col} != null){
                $this->sql .= " $col = '". $this->{$col}."', ";
            } 
        }
        $this->sql = rtrim($this->sql, ", ");

        $this->sql .= " WHERE id = $this->id";

        $stmt = $this->conn->prepare($this->sql);
        try {
            $stmt->execute();
            return true;
        } catch(PDOException $e){
            var_dump($e->getMessage());die;
        }
    }
    // req.body 
}