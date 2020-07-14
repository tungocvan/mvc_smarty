<?php

// http://localhost/php-mvc-master/?url=new

class News extends Controller{

    // Must have SayHi()
    function index(){
        echo "News";
    }
    function Product(){
        $Product = $this->model("ProductModel");
        $cateSLug = $Product->getCateSlugProduct();
       // echo "<pre>"; print_r($cateSLug) ;echo "</pre>";
         // Call Views
         $this->view("layout", [
            "Page"=>"news",
            "getProduct" => $Product->getProductAll()
        ]);
  
    }

    function Show($a, $b){        
        // Call Models
        $teo = $this->model("SinhVienModel");
        $tong = $teo->Tong($a, $b); // 3

        // Call Views
        $this->view("aodep", [
            "Page"=>"news",
            "Number"=>$tong,
            "Mau"=>"red",
            "SoThich"=>["A", "B", "C"],
            "SV" => $teo->SinhVien()
        ]);
    }
}
?>