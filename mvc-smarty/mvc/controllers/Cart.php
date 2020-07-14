<?php

// http://localhost/live/Home/Show/1/2

class Cart extends Controller{

    // Must have SayHi() 
    function index(){
         $Product = $this->model("ProductModel");
         // Call Views
         $this->view("layout", [
            "Page"=>"gio-hang",
            "getMenu" => $Product->getMenuAll(),
            "getBanner" => $Product->getBanner(),    
        ]);
    }
    function giohang($id=0){
         $Product = $this->model("ProductModel");
         $status = true;
         if($id == 0) $status = false;
         // Call Views
         $this->view("layout", [
            "Page"=>"gio-hang",
            "getMenu" => $Product->getMenuAll(),
            "getBanner" => $Product->getBanner(),
            "idProduct" => $Product->getProductById($id),
            "status" => $status
        ]);
    }
    function xoagiohang($id=0){
         $Product = $this->model("ProductModel");
         //if($id !=0) $xoa = $Product->xoagiohang($id);         
         // Call Views
         $this->view("layout", [
            "Page"=>"gio-hang",
            "getMenu" => $Product->getMenuAll(),
            "getBanner" => $Product->getBanner(),
            "status" => false,
            "xoa" => $Product->xoagiohang($id)
        ]);
    }
    function Checkout(){
         $Product = $this->model("ProductModel");
         // Call Views
         $this->view("layout", [
            "Page"=>"check-out",
            "getMenu" => $Product->getMenuAll(),
            "getBanner" => $Product->getBanner(),
        ]);
    }

    function updateCard(){
        if(isset($_POST['data'])){
            if(isset($_SESSION["idProduct"])){
                $index  = $_POST['data']['index'];
                $sl = $_POST['data']['soluong'];
                $_SESSION["idProduct"][$index]['soluong'] = $sl;
                $tongtien = 0; $sltong = 0;
                foreach($_SESSION["idProduct"] as $key => $value){
                    $sltong = $sltong + $value['soluong'];
                    $tongtien = $tongtien + $value['soluong'] * $value['price'];
                }
                $_POST['data']['tongtien'] = $tongtien;
                $_POST['data']['sltong'] = $sltong;
                $_SESSION["soluong"] = $sltong;
                echo json_encode($_POST['data']);
            }
            
        }
    }
 
    function saveOrder(){
        $Product = $this->model("ProductModel");
        if(isset($_POST['save'])){
            if(isset($_SESSION["idProduct"])){                
                $donhang = $_SESSION["idProduct"]; 
                $_POST['donhang'] = $donhang;
                $action = "POST";
                //$info =  array("id" => "1", 'name' => 'TNV');
                $url = "http://localhost/wp532/savedonhang/" ;
                //$data = serialize($info);
                //$data = stripslashes(json_encode($info));
                $data = json_encode($_POST,JSON_UNESCAPED_UNICODE);
                $parameters = array("data" => $data);
                $result = $Product->perform_http_request($action, $url, $parameters);
               // echo '<pre>';print_r($result);echo '</pre>';
                if($result){
                    unset($_SESSION["idProduct"]);
                    unset($_SESSION["soluong"]);
                    echo "
                    <script>
                        alert('Cảm ơn Quý khách đã ũng hộ chúng tôi');
                        window.location.href='http://localhost/php-mvc-master/index.php';
                    </script>
                    ";   
                }
            }
        }
    }
    
    
}
?>