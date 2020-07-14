<?php
//start_session();
// http://localhost/live/Home/Show/1/2

class Product extends Controller{
 
    // Must have SayHi()
    function index(){
        $Product = $this->model("ProductModel");
        // Call Views
         $this->view("layout", [
            "Page"=>"san-pham",
            "getMenu" => $Product->getMenuAll(),
            "getBanner" => $Product->getBanner(),
            "getProduct" => $Product->getProductByCateSlug("san-pham-noi-bat"),
        ]);

    }
    // Must have SayHi()
    function Shop($slug){
        $Product = $this->model("ProductModel");
        // Call Views
         $this->view("layout", [
            "Page"=>"san-pham",
            "getMenu" => $Product->getMenuAll(),
            "getBanner" => $Product->getBanner(),
            "getProduct" => $Product->getProductByCateSlug($slug),
        ]);
    }
    function productDetail($slug="classic-puma-black"){
        $Product = $this->model("ProductModel");    
       // echo "<pre>"; print_r($cateSLug) ;echo "</pre>";
         // Call Views
         $this->view("layout", [
            "Page"=>"ct-sanpham",
            "getMenu" => $Product->getMenuAll(),
            "getBanner" => $Product->getBanner(),
            "getProductSlug" => $Product->getProductBySlug($slug)
        ]); 
    }
   
}
?>