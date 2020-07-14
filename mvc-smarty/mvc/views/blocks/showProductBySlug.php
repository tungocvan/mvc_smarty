<?php
    $menu_spnb = $menu['san-pham-noi-bat'];
    $menu_sales = $menu['menu-sales'];
    $dataProduct = $data["getProduct"];    
    //echo '<pre>';print_r($dataProduct);echo '</pre>';die();
    //$itemProduct = show_product_tabs($slug);
    $product_area_left = show_product_area_left($menu_spnb);
    $product_area_right = show_product_area_right($menu_sales,$dataProduct);
    
    //echo show_product_area($product_area_left,$product_area_right);
    echo show_product_by_slug($product_area_right);

    function show_product_area_left($menu_spnb) {
        $item ="";
        foreach($menu_spnb as $key => $value){
            $item = $item . "
            <li><a id='".$value['slug']."' class='spnb'  href='".$value['slug']."'>".$value['title']."</a></li>
            ";
        }
        return "
        <div class='product-categories-all'>
            <div class='product-categories-title'>
                <h3>SẢN PHẨM NỔI BẬT</h3>
            </div>
            <div class='product-categories-menu'>
                <ul>
                    ".$item."
                </ul>
            </div>
        </div>
        ";
    
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
            $itemProduct = show_product_tabs($dataProduct,$value['slug']);
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
            <div id='homeTabs' class='tab-content another-product-style jump'>
                ".$itemTabs."
            </div>
        </div>
        ";
    }

    
    function show_product_area($product_area_left,$product_area_right) {
        return "
        <section class='htc__product__area bg__white'>
        <div class='container'>
            <div class='row'>
                <div class='col-lg-3'>
                    ".$product_area_left."
                </div>
                <div id='product_area_right' class='col-lg-9'>
                    ".$product_area_right."
                </div>
            </div>
        </div>
        </section>
        ";
    }
    function show_product_by_slug($product_area_right) {
        return "
        <section class='htc__product__area bg__white'>
        <div class='container'>
            <div class='row'>           
                <div id='product_area_right' class='col-12'>
                    ".$product_area_right."
                </div>
            </div>
        </div>
        </section>
        ";
    }
?>



