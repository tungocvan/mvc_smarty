<?php
require_once "medoo.php";
class DB{

    protected $servername = "localhost"; // remote sql : '50.87.144.126'
    protected $username = "root"; // 'tungocva_van'
    protected $password = ""; // 'Van@123'
    protected $dbname = "test";
    public    $database;

    function __construct(){
        $this->database = new medoo([
            'database_type' => 'mysql',
            'database_name' => $this->dbname,
            'server' => $this->servername,
            'username' => $this->username ,
            'password' => $this->password,
            'charset' => 'utf8'
        ]);
    }
    function truyvan($sql='') {
        $data=[];
        if($sql !=''){            
            $data = $this->database->query($sql)->fetchAll();        
        }
        return $data;
    }
}

?>