<?php

// http://localhost/live/Home/Show/1/2

class Login extends Controller{

    // Must have SayHi() 
    function index(){
         $Product = $this->model("ProductModel");
         // Call Views
         $this->view("layout", [
            "Page"=>"dang-nhap",
            "getMenu" => $Product->getMenuAll(),
            "getBanner" => $Product->getBanner(),
        ]);

    }
    function DangNhap(){
        if(isset($_POST['data'])){
            $Product = $this->model("ProductModel");
            $username = $_POST['data']['username'];
            $password = $_POST['data']['password'];
            $remember = $_POST['data']['remember'];
            $action = "POST";
            $url = "http://localhost/wp532/getLogin/" ;
            $info =  array("username" => $username, 'password' => $password);
            $data = json_encode($info,JSON_UNESCAPED_UNICODE);
            $parameters = array("data" => $data);
            $result = $Product->perform_http_request($action, $url, $parameters);
            
            if($result){
                $_SESSION["login"] = $result;        
                echo json_encode($result,JSON_UNESCAPED_UNICODE);
            }else{
                echo false;
            }            
            
        }else{
            echo false;
        }
        
    }

    function DangXuat(){
       unset($_SESSION["login"]);
       echo "
                    <script>
                           window.location.href='http://localhost/php-mvc-master/index.php';
                    </script>
                    ";        
    }
 
    function DangKy(){
        if(isset($_POST['data'])){
            $username = $_POST['data']['username'];
            $email = $_POST['data']['email'];
            $password = $_POST['data']['password'];
            $remember = $_POST['data']['remember'];
                    
            echo json_encode($username);
            
        }else{
            echo 'Thất bại';
        }
        
    }
   
}
?>