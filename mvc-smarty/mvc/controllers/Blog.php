<?php

// http://localhost/live/Home/Show/1/2

class Blog extends Controller{

    // Must have SayHi()
    function index(){
        $Product = $this->model("ProductModel");
        // $cateSLug = $Product->getCateSlugProduct();
       // echo "<pre>"; print_r($cateSLug) ;echo "</pre>";
         // Call Views
         $this->view("layout", [
            "Page"=>"bai-viet",
            "getMenu" => $Product->getMenuAll(),
            "getBanner" => $Product->getBanner(),
            "getPost" => ""
        ]);

    }
 
    function blogDetail($slug="google-wants-your-seo-questions-for-a-series-of-qa-videos"){
        $Product = $this->model("ProductModel");
        $this->view("layout", [
            "Page"=>"ct-bai-viet",
            "getMenu" => $Product->getMenuAll(),
            "getBanner" => $Product->getBanner(),
            "getPost" => $Product->getPostBySlug($slug)
        ]);

    }

    
    
}
?>