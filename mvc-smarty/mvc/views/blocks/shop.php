<?php
    $dataProduct = $data["getProduct"];
    //echo '<pre>';print_r($dataProduct);echo '</pre>';
    function show_banner_product() {
        return "
        <!-- Start Bradcaump area -->
        <div class='ht__bradcaump__area' style='background: rgba(0, 0, 0, 0) url(./public/images/bg/2.jpg) no-repeat scroll center center / cover ;'>
            <div class='ht__bradcaump__wrap'>
                <div class='container'>
                    <div class='row'>
                        <div class='col-12'>
                            <div class='bradcaump__inner text-center'>
                                <h2 class='bradcaump-title'>Shop Page</h2>
                                <nav class='bradcaump-inner'>
                                    <a class='breadcrumb-item' href='index.html'>Home</a>
                                    <span class='brd-separetor'>/</span>
                                    <span class='breadcrumb-item active'>Shop Page</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->  
        ";
    }
    function show_menu_product() {
        return "
        <!-- Start Product MEnu -->
            <div class='row'>
                <div class='col-md-12'>
                    <div class='filter__menu__container'>
                        <div class='product__menu'>
                            <button data-filter='*'  class='is-checked'>All</button>
                            <button data-filter='.cat--1'>Furnitures</button>
                            <button data-filter='.cat--2'>Bags</button>
                            <button data-filter='.cat--3'>Decoration</button>
                            <button data-filter='.cat--4'>Accessories</button>
                        </div>
                        <div class='filter__box'>
                            <a class='filter__menu' href='#'>filter</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Start Filter Menu -->
            <div class='filter__wrap'>
                <div class='filter__cart'>
                    <div class='filter__cart__inner'>
                        <div class='filter__menu__close__btn'>
                            <a href='?url=product/productDetail'><i class='zmdi zmdi-close'></i></a>
                        </div>
                        <div class='filter__content'>
                            <!-- Start Single Content -->
                            <div class='fiter__content__inner'>
                                <div class='single__filter'>
                                    <h2>Sort By</h2>
                                    <ul class='filter__list'>
                                        <li><a href='#default'>Default</a></li>
                                        <li><a href='#accessories'>Accessories</a></li>
                                        <li><a href='#bags'>Bags</a></li>
                                        <li><a href='#chair'>Chair</a></li>
                                        <li><a href='#decoration'>Decoration</a></li>
                                        <li><a href='#fashion'>Fashion</a></li>
                                    </ul>
                                </div>
                                <div class='single__filter'>
                                    <h2>Size</h2>
                                    <ul class='filter__list'>
                                        <li><a href='#xxl'>XXL</a></li>
                                        <li><a href='#xl'>XL</a></li>
                                        <li><a href='#x'>X</a></li>
                                        <li><a href='#l'>L</a></li>
                                        <li><a href='#m'>M</a></li>
                                        <li><a href='#s'>S</a></li>
                                    </ul>
                                </div>
                                <div class='single__filter'>
                                    <h2>Tags</h2>
                                    <ul class='filter__list'>
                                        <li><a href='#'>All</a></li>
                                        <li><a href='#'>Accessories</a></li>
                                        <li><a href='#'>Bags</a></li>
                                        <li><a href='#'>Chair</a></li>
                                        <li><a href='#'>Decoration</a></li>
                                        <li><a href='#'>Fashion</a></li>
                                    </ul>
                                </div>
                                <div class='single__filter'>
                                    <h2>Price</h2>
                                    <ul class='filter__list'>
                                        <li><a href='#'>$0.00 - $50.00</a></li>
                                        <li><a href='#'>$50.00 - $100.00</a></li>
                                        <li><a href='#'>$100.00 - $150.00</a></li>
                                        <li><a href='#'>$150.00 - $200.00</a></li>
                                        <li><a href='#'>$300.00 - $500.00</a></li>
                                        <li><a href='#'>$500.00 - $700.00</a></li>
                                    </ul>
                                </div>
                                <div class='single__filter'>
                                    <h2>Color</h2>
                                    <ul class='filter__list sidebar__list'>
                                        <li class='black'><a href='#'><i class='zmdi zmdi-circle'></i>Black</a></li>
                                        <li class='blue'><a href='#'><i class='zmdi zmdi-circle'></i>Blue</a></li>
                                        <li class='brown'><a href='#'><i class='zmdi zmdi-circle'></i>Brown</a></li>
                                        <li class='red'><a href='#'><i class='zmdi zmdi-circle'></i>Red</a></li>
                                        <li class='orange'><a href='#'><i class='zmdi zmdi-circle'></i>Orange</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- End Single Content -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Filter Menu -->
        <!-- End Product MEnu -->
        ";
    }
    function show_detail_product($dataProduct) {
        $item = "";
        foreach($dataProduct as $key => $value){
            $qv = quickview($key,$value);
            $item .= "
            <div class='col-lg-3 single__pro col-xl-3 cat--1 col-md-4 col-12 col-sm-6'>
                <div class='product foo'>
                    <div class='product__inner'>
                        <div class='pro__thumb'>
                            <a href='?url=product/productDetail/".$value['slug']."'>
                                <img  src='".$value['img']."' alt='product images' width='260px' height='300px'>
                            </a>
                        </div>
                        <div class='product__hover__info'>
                            <ul class='product__action'>
                                <li><a data-toggle='modal' data-target='#productModal".$key."'  title='Quick View' class='quick-view modal-view detail-link' href='?slug=".$value['slug']."'><span class='ti-plus'></span></a></li>
                                <li><a title='Add TO Cart' href='?url=cart/giohang/".$value['id']."'><span class='ti-shopping-cart'></span></a></li>
                                <li><a title='Wishlist' href='wishlist.html'><span class='ti-heart'></span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class='product__details'>
                        <h2><a href='?url=product/productDetail/".$value['slug']."'>".$value['title']."</a></h2>
                        <ul class='product__price'>
                            <li class='old__price'>".$value['regular_price']."</li>
                            <li class='new__price'>".$value['price']."</li>
                        </ul>
                    </div>
                </div>
            </div>
            ".$qv."
            ";
        }
        return "
        <div class='product__list another-product-style'>
            <div class='row'>
                <!-- Start Single Product -->
                ".$item."
                <!-- End Single Product -->
               
            </div>
        </div>
        ";
    }
    function show_loadMore_product() {
        return "
        <!-- Start Load More BTn -->
            <div class='row mt--60'>
                <div class='col-md-12'>
                    <div class='htc__loadmore__btn'>
                        <a href='#'>load more</a>
                    </div>
                </div>
            </div>
        <!-- End Load More BTn -->
        ";
    }
    function show_product($dataProduct) {
        $banner_product = show_banner_product();
        $menu_product = show_menu_product();
        $detail_product = show_detail_product($dataProduct);
        $loadMore_product = show_loadMore_product();        
        return "
        <!-- Start Our Product Area -->
            <section class='htc__product__area shop__page bg__white'>
                <div class='container'>
                    <div class='htc__product__container'>
                        ".$banner_product."
                        ".$menu_product."
                        ".$detail_product."
                        ".$loadMore_product."
                    </div>
                </div>
            </section>    
        <!-- End Our Product Area -->
        ";
    }
    function quickview($key,$value) {
        return "
        <div id='quickview-wrapper'>
            <!-- Modal -->
            <div class='modal fade' id='productModal".$key."' tabindex='-1' role='dialog'>
                <div class='modal-dialog modal__container' role='document'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                        </div>
                        <div class='modal-body'>
                            <div class='modal-product'>
                                <!-- Start product images -->
                                <div class='product-images'>
                                    <div class='main-image images'>
                                        <img alt='big images' src='".$value['img']."'>
                                    </div>
                                </div>
                                <!-- end product images -->
                                <div class='product-info'>
                                    <h1>".$value['title']."</h1>
                                    <div class='rating__and__review'>
                                        <ul class='rating'>
                                            <li><span class='ti-star'></span></li>
                                            <li><span class='ti-star'></span></li>
                                            <li><span class='ti-star'></span></li>
                                            <li><span class='ti-star'></span></li>
                                            <li><span class='ti-star'></span></li>
                                        </ul>
                                        <div class='review'>
                                            <a href='#'>4 customer reviews</a>
                                        </div>
                                    </div>
                                    <div class='price-box-3'>
                                        <div class='s-price-box'>
                                            <span class='new-price'>".$value['price']."</span>
                                            <span class='old-price'>".$value['regular_price']."</span>
                                        </div>
                                    </div>
                                    <div class='quick-desc'>
                                    ".$value['short_description']."
                                    </div>
                                    <div class='select__color'>
                                        <h2>Select color</h2>
                                        <ul class='color__list'>
                                            <li class='red'><a title='Red' href='#'>Red</a></li>
                                            <li class='gold'><a title='Gold' href='#'>Gold</a></li>
                                            <li class='orange'><a title='Orange' href='#'>Orange</a></li>
                                            <li class='orange'><a title='Orange' href='#'>Orange</a></li>
                                        </ul>
                                    </div>
                                    <div class='select__size'>
                                        <h2>Select size</h2>
                                        <ul class='color__list'>
                                            <li class='l__size'><a title='L' href='#'>L</a></li>
                                            <li class='m__size'><a title='M' href='#'>M</a></li>
                                            <li class='s__size'><a title='S' href='#'>S</a></li>
                                            <li class='xl__size'><a title='XL' href='#'>XL</a></li>
                                            <li class='xxl__size'><a title='XXL' href='#'>XXL</a></li>
                                        </ul>
                                    </div>
                                    <div class='social-sharing'>
                                        <div class='widget widget_socialsharing_widget'>
                                            <h3 class='widget-title-modal'>Share this product</h3>
                                            <ul class='social-icons'>
                                                <li><a target='_blank' title='rss' href='#' class='rss social-icon'><i class='zmdi zmdi-rss'></i></a></li>
                                                <li><a target='_blank' title='Linkedin' href='#' class='linkedin social-icon'><i class='zmdi zmdi-linkedin'></i></a></li>
                                                <li><a target='_blank' title='Pinterest' href='#' class='pinterest social-icon'><i class='zmdi zmdi-pinterest'></i></a></li>
                                                <li><a target='_blank' title='Tumblr' href='#' class='tumblr social-icon'><i class='zmdi zmdi-tumblr'></i></a></li>
                                                <li><a target='_blank' title='Pinterest' href='#' class='pinterest social-icon'><i class='zmdi zmdi-pinterest'></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class='addtocart-btn'>
                                        <a href='#'>Add to cart</a>
                                    </div>
                                </div><!-- .product-info -->
                            </div><!-- .modal-product -->
                        </div><!-- .modal-body -->
                    </div><!-- .modal-content -->
                </div><!-- .modal-dialog -->
            </div>
            <!-- END Modal -->
        </div>
        ";
    }
    echo show_product($dataProduct);
?>

