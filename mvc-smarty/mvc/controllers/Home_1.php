<?php

// http://localhost/live/Home/Show/1/2

class Home_1 extends Controller{

    // Must have SayHi()
    function index(){   
        $Product = $this->model("ProductModel");
        $this->smarty->assign("Name", "Fred Irving Johnathan Bradley Peppergill", true);
        $this->smarty->assign("FirstName", array("John", "Mary", "James", "Henry"));
        $this->smarty->assign("LastName", array("Doe", "Smith", "Johnson", "Case"));
        $this->smarty->assign("option_values", array("NY", "NE", "KS", "IA", "OK", "TX"));
        $this->smarty->assign("option_output", array("New York", "Nebraska", "Kansas", "Iowa", "Oklahoma", "Texas"));
        $this->smarty->assign("option_selected", "NE");
        $this->display("index");
         // Call Views
        //  $this->view("layout", [
        //     "Page"=>"trang-chu-1",
        //     "getMenu" => $Product->getMenuAll(),
        //     "getProduct" => $Product->getProductByCateSlug("san-pham-noi-bat"),
        //     "getBanner" => $Product->getBanner(),
        //     "getPostbyTimes" => $Product->getPostbyTimes("bai-viet-hay-nhat"),            

        // ]);
        // echo "<pre>" ;
        // print_r($_SERVER);

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