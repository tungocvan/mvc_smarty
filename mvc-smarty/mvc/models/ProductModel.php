<?php
class ProductModel extends JSON{

    public function xoagiohang($id){
        if(isset($_SESSION["idProduct"])){
            foreach($_SESSION["idProduct"] as $key => $value){
                if($id == $value['id']){
                    unset($_SESSION["idProduct"][$key]);
                    return 1;
                }
            }
        }
        return 0;

    }
    function show_product_tabs($dataProduct,$slug) {
        $item = "";
        foreach($dataProduct as $key => $value){
            if(in_array($slug,$value['cateSlug'])){
                if( $value['regular_price'] == $value['price']) {
                    $price = "
                    <li class='new__price'>".$value['price']."</li>
                    ";
                }else{
                    $price = "
                        <li class='old__price'>".$value['regular_price']."</li>
                        <li class='new__price'>".$value['price']."</li>
                    ";
                }
                $item = $item. "
                <div class='product'>
                    <div class='product__inner'>
                        <div class='pro__thumb'>
                            <a href='?url=product/productDetail/".$value['slug']."'>
                                <img src='".$value['img']."' alt='product images' width='270px' height='310px'>
                            </a>
                        </div>
                        <div class='product__hover__info'>
                            <ul class='product__action'>
                                <li><a data-toggle='modal' data-target='#productModal' title='Quick View' class='quick-view modal-view detail-link' href='#'><span class='ti-plus'></span></a></li>
                                <li><a title='Add TO Cart' href='?url=cart/giohang/".$value['id']."'><span class='ti-shopping-cart'></span></a></li>
                                <li><a title='Wishlist' href='wishlist.html'><span class='ti-heart'></span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class='product__details'>
                        <h2><a href='?url=product/productDetail/".$value['slug']."'>".$value['title']."</a></h2>
                        <ul class='product__price'>
                            ".$price."
                        </ul>
                    </div>
                </div>
                ";
            }
            
        }
        return $item;
    }

    function show_product_area_right($menu_sales,$dataProduct) {
        $item ="";$itemTabs="";
        foreach($menu_sales as $key => $value){
            if($key == 0 ) {
                $class="class='active'" ;
                $classTabs="class='tab-pane active'" ;
            }else{
                $class="";
                $classTabs="class='tab-pane'" ;
            }
            $item =$item . "
            <li>
            <a  ".$class."  href='".$value['url']."'  data-toggle='tab'>
                <div class='tab-menu-text'>
                    <h4>".$value['title']."</h4>
                </div>
            </a>
            </li>
            ";
            // lấy được slug: $value['slug'] và $value['url']
            $itemProduct = $this->show_product_tabs($dataProduct,$value['slug']);
            $id = str_replace('#','',$value['url']);
            $itemTabs = $itemTabs ."            
            <div ".$classTabs."  id='".$id."'>
                <div class='product-slider-active owl-carousel'>               
                    ".$itemProduct ."       
                </div>
            </div>
            ";
            $itemProduct="";
        }
        return "
        <div class='product-style-tab'>
            <div class='product-tab-list'>
                <!-- Nav tabs -->
                <ul class='tab-style nav' role='tablist'>
                    ".$item."
                </ul>
            </div>
            <div class='tab-content another-product-style jump'>
                ".$itemTabs."
            </div>
        </div>
        ";
    }
    function getMeta($array) {
        $meta = [];
        $slug = $array[2];
        if($array[1] == "blogDetail"){
            $p = $this->getPostBySlug($slug);
            //echo '<pre>';print_r($p);echo '</pre>';
            $tag_list =  $p['post_tags_list'];
            $title =  $p['title'];
            $img =  $p['img'];
            $short_description =  $p['short_content'];
            $link = '?url=blog/blogDetail/'.$p['slug'];
            $meta = array("tag_list"=>$tag_list, "title" => $title, "img" => $img,"link" => $link, "content" => $short_description);
        }
        if($array[1] == "productDetail"){        
            $p = $this->getProductBySlug($slug);
            //echo '<pre>';print_r($p);echo '</pre>';
            $tag_list =  $p['tag_list'];
            $title =  $p['title'];
            $img =  $p['img'];
            $short_description =  $p['short_description'];
            $link = '?url=product/productDetail/'.$p['slug'];
            $meta = array("tag_list"=>$tag_list, "title" => $title, "img" => $img,"link" => $link, "content" => $short_description);
        }
        return $meta;
    }

    public function perform_http_request($method, $url, $data = false)
        {
            $curl = curl_init();

            switch ($method)
            {
                case "POST":
                    curl_setopt($curl, CURLOPT_POST, 1);

                    if ($data)
                        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                    break;
                case "PUT":
                    curl_setopt($curl, CURLOPT_PUT, 1);
                    break;
                default:
                    if ($data)
                        $url = sprintf("%s?%s", $url, http_build_query($data));
            }

            // Optional Authentication:
            //curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
            //curl_setopt($curl, CURLOPT_USERPWD, "username:password");

            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

            $result = curl_exec($curl);

            curl_close($curl);

            return $result;
        }
}   
?>