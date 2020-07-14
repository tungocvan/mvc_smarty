<?php

// http://localhost/php-mvc-master/index.php?url=User

class User extends Controller{

    // Must have SayHi()
    function index(){
   
        $user = $this->model("UserModel");
        $data = $user->getDB();
        echo '<pre>';print_r($data);echo '</pre>';
        echo  "USER";
         // Call Views
        //  $this->view("layout", [
        //     "Page"=>"trang-chu",
        //     "getMenu" => $Product->getMenuAll(),
        //     "getProduct" => $Product->getProductByCateSlug("san-pham-noi-bat"),
        //     "getBanner" => $Product->getBanner(),
        //     "getPostbyTimes" => $Product->getPostbyTimes("bai-viet-hay-nhat"),            

        // ]);

    }

 
    
}
?>