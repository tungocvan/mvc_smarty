<?php

// http://localhost/live/Home/Show/1/2

class Home extends Controller{

    // Must have SayHi()
    function index(){
   
        $Product = $this->model("ProductModel");
         // Call Views
         $this->view("layout", [
            "Page"=>"trang-chu",
            "getMenu" => $Product->getMenuAll(),
            "getProduct" => $Product->getProductByCateSlug("san-pham-noi-bat"),
            "getBanner" => $Product->getBanner(),
            "getPostbyTimes" => $Product->getPostbyTimes("bai-viet-hay-nhat"),            

        ]);

    }

    function productArea($slug) {
        $Product = $this->model("ProductModel");
        // Call Views
        $this->view("layout", [
           "Page"=>"trang-chu",
           "getMenu" => $Product->getMenuAll(),
           "getProduct" => $Product->getProductByCateSlug($slug),
           "getBanner" => $Product->getBanner(), 
           "getPostbyTimes" => $Product->getPostbyTimes("bai-viet-hay-nhat")
       ]);  
    }
    
    function productApiArea($slug) {
        $Product = $this->model("ProductModel");   
            
        if(isset($_POST["data"])){    
            $menu = $Product->getMenuAll();
            $menu_sales = $menu['menu-sales'];                 
            $productSlug = $Product->getProductByCateSlug($_POST["data"]);
            $product_area_right = $Product->show_product_area_right($menu_sales,$productSlug);
            echo json_encode($product_area_right);
        }
        
    }    
    
}
?>