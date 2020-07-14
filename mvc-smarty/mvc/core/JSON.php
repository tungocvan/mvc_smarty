<?php

class JSON{
    private $dataProduct=[];
    private $dataPost=[];
    private $dataMenu=[];
    private $dataCateSlugProduct=[];
    protected $stringProduct= 'http://mvc.tungocvan.com/mvc/JSON/productJson.json';
    protected $stringPost = 'http://mvc.tungocvan.com/mvc/JSON/postJson.json';
    protected $stringMenu = 'http://mvc.tungocvan.com/mvc/JSON/menuJson.json';
    protected $stringBanner = 'http://mvc.tungocvan.com/mvc/JSON/bannerJson.json';

    function __construct(){
        $string = file_get_contents($this->stringProduct);
        $this->dataProduct = json_decode($string, true);
        $string = file_get_contents($this->stringPost);
        $this->dataPost = json_decode($string, true);
        $string = file_get_contents($this->stringMenu);
        $this->dataMenu = json_decode($string, true);
        $string = file_get_contents($this->stringBanner);
        $this->dataBanner = json_decode($string, true);
          
    }
    function getProductAll() {
        return $this->dataProduct;
    }
    function getPostAll() {
        return $this->dataPost;
    }
    function getMenuAll() {
        return $this->dataMenu;
    }
    function getBanner() {
        return $this->dataBanner;
    }
    function getCateSlugProduct() {
        foreach($this->dataProduct as $key => $value) {
            if($value['cateSlug'][0] !='uncategorized'){
                foreach($value['cateSlug'] as $key1 => $value1){
                     array_push($this->dataCateSlugProduct,$value1);
                }
                       
            }
         }        
        return array_unique($this->dataCateSlugProduct) ;
    }
    function getProductById($id) {
        $data = $this->dataProduct;
        foreach($data as $key => $value){
            if((int)$id == $value['id']) {
                return $value;
            }  
        }
        return [];
    }
    function getProductBySlug($slug) {
        $data = $this->dataProduct;
        $dataProductSlug = array();
        foreach($data as $key => $value){
            if($slug == $value['slug']) {
                return $value;
            }  
        }
        return [];
    }
    function getProductByCateSlug($slug) {
        $data = $this->dataProduct;
        $dataProductSlug = array();
        foreach($data as $key => $value){
            if(in_array($slug,$value['cateSlug'])){
                array_push($dataProductSlug,$value);
            }
        }
        return $dataProductSlug;
    }
    
    function getPostById() {}
    function getPostBySlug($slug) {
        $data = $this->dataPost;
        foreach($data as $key => $value){
            if($slug == $value['slug']) {
                return $value;
            }          
            
        }
        return [];
    }
    function getPostByCateSlug() {}
    function getPostbyTimes($slug) {
        $data = $this->dataPost;
        $dataPostNew = array();
        foreach($data as $key => $value){
            if(in_array($slug,$value['cateSlug'])) {
                array_push($dataPostNew,$value);
            }
            
            
        }
        return $dataPostNew;
    }

}

?>