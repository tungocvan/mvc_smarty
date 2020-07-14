<?php

// http://localhost/live/Home/Show/1/2

class Contact extends Controller{

    // Must have SayHi()
    function index(){
        //$Product = $this->model("ProductModel");
        // $cateSLug = $Product->getCateSlugProduct();
       // echo "<pre>"; print_r($cateSLug) ;echo "</pre>";
         // Call Views
         $this->view("layout", [
            "Page"=>"lien-he",
            "getPost" => ""
        ]);

    }
 
  

    
    
}
?>