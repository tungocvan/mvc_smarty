<?php 
    
    function show_banner_cart() {
        return "
        <div class='ht__bradcaump__area ptb' style='background: rgba(0, 0, 0, 0) url(./public/images/bg/2.jpg) no-repeat scroll center center / cover ;'>
            <div class='ht__bradcaump__wrap'>
                <div class='container'>
                    <div class='row'>
                        <div class='col-12'>
                            <div class='bradcaump__inner text-center'>
                                <h2 class='bradcaump-title'>Cart</h2>
                                <nav class='bradcaump-inner'>
                                    <a class='breadcrumb-item' href='index.html'>Home</a>
                                    <span class='brd-separetor'>/</span>
                                    <span class='breadcrumb-item active'>Cart</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        ";
    }
    function show_giohang_cart() {
        if(isset($_SESSION["idProduct"])){
            $giohang = $_SESSION["idProduct"];
            $item =""; $tongTien = 0; $thanhtien=0; $sl=0;
            foreach($giohang as $key => $value){
                $thanhtien = $value['soluong'] * $value['price'];
                $tongTien = $tongTien + $thanhtien ;
                $sl = $sl + $value['soluong'];
                //echo $value['title']." - sl:".$value['soluong']."<br>";
                $item .="
                <tr>
                <td class='product-thumbnail'><a href='#'><img src='".$value['img']."' alt='product img' /></a></td>
                <td class='product-name'><a href='#'>".$value['title']."</a></td>
                <td class='product-price'><span class='amount' id='gia".$value['id']."'>".$value['price']."</span></td>
                <td class='product-quantity'><input data-key='".$key."' name='sl".$value['id']."'  id='sl".$value['id']."'  type='number' min=1 value='".$value['soluong']."' /></td>
                <td class='product-subtotal' id='tt".$value['id']."'>".$thanhtien."</td>
                <td class='product-remove'><a href='?url=cart/xoagiohang/".$value['id']."'>X</a></td>
                </tr>
                ";
            }
            $_SESSION["soluong"] = $sl;
            $_SESSION["tongTien"] = $tongTien;
            return "
                <div class='cart-main-area ptb--120 bg__white'>
                    <div class='container'>
                        <div class='row'>
                            <div class='col-lg-12 col-md-12 col-12'>
                                <form action='#'>               
                                    <div class='table-content table-responsive'>
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th class='product-thumbnail'>Hình ảnh</th>
                                                    <th class='product-name'>Tên sản phẩm</th>
                                                    <th class='product-price'>Giá</th>
                                                    <th class='product-quantity'>Số lượng</th>
                                                    <th class='product-subtotal'>Thành tiền</th>
                                                    <th class='product-remove'>Xóa</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                ".$item."
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class='row'>
                                        <div class='col-md-8 col-sm-7 col-xs-12'>
                                            <div class='buttons-cart'>
                                                <input type='button' id='updateCart' value='Update Cart' />
                                                <a href='?url=product'>Continue Shopping</a>
                                            </div>
                                            <div class='coupon'>
                                                <h3>Coupon</h3>
                                                <p>Enter your coupon code if you have one.</p>
                                                <input type='text' placeholder='Coupon code' />
                                                <input type='submit' value='Apply Coupon' />
                                            </div>
                                        </div>
                                        <div class='col-md-4 col-sm-5 col-xs-12'>
                                            <div class='cart_totals'>
                                                <h2>HÓA ĐƠN</h2>
                                                <table>
                                                    <tbody>
                                                        <tr class='cart-subtotal'>
                                                            <th>Tổng tiền</th>
                                                            <td><span id='tongtien' class='amount'>VNĐ ".$tongTien."</span></td>
                                                        </tr>
                                                        <tr class='cart-subtotal'>
                                                            <th>Số lượng SP</th>
                                                            <td><span id='soluong' class='amount'>SP ".$_SESSION["soluong"]."</span></td>
                                                        </tr>
                                                        <tr class='shipping'>
                                                            <th>Vận chuyển</th>
                                                            <td>
                                                                <ul id='shipping_method'>
                                                                    <li>
                                                                        <input type='radio' /> 
                                                                        <label>
                                                                            Phí vận chuyển: <span class='amount'>£7.00</span>
                                                                        </label>
                                                                    </li>
                                                                    <li>
                                                                        <input type='radio' /> 
                                                                        <label>
                                                                            Miễn phí Vận chuyển
                                                                        </label>
                                                                    </li>
                                                                    <li></li>
                                                                </ul>
                                                                <p><a class='shipping-calculator-button' href='#'>Thành tiền đã bao gồm vận chuyển</a></p>
                                                            </td>
                                                        </tr>
                                                        <tr class='order-total'>
                                                            <th>Tổng Tiền</th>
                                                            <td>
                                                                <strong><span id='thanhtien' class='amount'>VNĐ ".$tongTien."</span></strong>
                                                            </td>
                                                        </tr>                                           
                                                    </tbody>
                                                </table>
                                                <div class='wc-proceed-to-checkout'>
                                                    <a href='?url=cart/checkout/'>Proceed to Checkout</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form> 
                            </div>
                        </div>
                    </div>
                </div>
            ";   
            
        }
        return "";
    }
    function initGioHang($status,$idProduct){
        
        //echo '<pre>';print_r($idProduct);echo '</pre>';die();
        if(!isset($_SESSION["idProduct"])){
            if(count($idProduct) > 0) {
                $_SESSION["idProduct"] = array();
                array_push($_SESSION["idProduct"],$idProduct);
                $_SESSION["soluong"] = 0 ;
                $_SESSION["thanhtien"] = 0 ;
                $_SESSION["tongtien"] = 0 ;
            }
        }else{
            $find = ""; $flag = false;
            $data = $_SESSION["idProduct"];
            foreach($data as $key => $value){
                if($value['id'] == $idProduct['id']){                   
                    //echo $_SESSION["idProduct"][$key]['soluong'];
                    // $find = $key;
                    $sl_cu = $_SESSION["idProduct"][$key]['soluong'];
                    $_SESSION["idProduct"][$key]['soluong'] = (int)$sl_cu + 1;
                    $flag = true;
                    break;
                }
            }            
            if($flag == false){
                
                array_push($_SESSION["idProduct"],$idProduct);
            }
            
        }
    }
            
    
    //$_SESSION["idProduct"] =[]; die();
    $status = $data["status"];
    if($status == true){
        // thêm vào giỏ hàng
        $idProduct = $data["idProduct"];
        $idProduct["soluong"] = 1; 
        initGioHang($status,$idProduct);
    }else{
        // nếu ko còn product
        if($_SESSION["idProduct"] ==[]){
            unset($_SESSION["idProduct"]);
            unset($_SESSION["soluong"]); 
            echo "
                <script>
                    window.location.href='http://localhost/php-mvc-master/index.php';
                </script>
            ";        
        }
    }       
    echo show_giohang_cart();
    
    
?>


