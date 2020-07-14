<?php
class UserModel extends DB{
    private $table = "wp_options";
    public function getDB(){
       $data = parent::truyvan('SELECT * FROM '.$this->table);       
       return $data ;
    }
   
}   
?>