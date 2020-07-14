<?php
require_once 'libs/Smarty.class.php';
class Controller{
    public $smarty;
    public function __construct(){
        $this->smarty = new Smarty;
        //$smarty->force_compile = true;
        $this->smarty->debugging = true;
        //$this->smarty->caching = true;
        $this->smarty->cache_lifetime = 120;
        

    }

    public function model($model){
        require_once "./mvc/models/".$model.".php";
        return new $model;
    }

    public function view($view, $data=[]){
        require_once "./mvc/views/".$view.".php";
    }
    
    public function display($view, $data=[]){
        $this->smarty->display("./mvc/views/smarty/".$view.".tpl");
    }



}
?>