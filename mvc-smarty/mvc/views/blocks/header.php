 <!-- Start Header Style -->
 <?php 
    $menu = $data["getMenu"];  
    $menuTop = $menu['menu-top'];
    echo show_header($menuTop);
   function subMenu($id,$menu) {
        $subs = array();
        foreach($menu as $key => $value){
            if($value['parent']== $id){
                array_push($subs,$value);
            }
        }
        return $subs;
   }
  
   function inSubMenu($item,$menu,$menuTop) {
    $MenuLv1 ="
    <li class='drop'><a href='".$item['slug']."'>".$item['title']."</a>
    <ul class='dropdown'>
    ";   
    $MenuLv2 ="";$SubMenuLv1 ="";    
    foreach($menu  as $key => $value){      
         $id = $value['id'];  
         $subMenuLv1 = subMenu($id,$menuTop);
         if(count($subMenuLv1) > 0) {
            $MenuLv2 ="
            <li class='drop'><a href='".$value['slug']."'>".$value['title']."</a>
            <ul class='lavel-dropdown'>
            ";  
            $SubMenuLv2 ="";
            foreach($subMenuLv1  as $keyS => $valueS){
                $SubMenuLv2 =$SubMenuLv2 . "
                <li><a href='".$valueS['slug']."'>".$valueS['title']."</a></li>
                ";
            }    
            $SubMenuLv1 =$SubMenuLv1.$MenuLv2.$SubMenuLv2."</ul></li>";
         }else{
            $SubMenuLv1 =$SubMenuLv1 .  "<li><a href='".$value['slug']."'>".$value['title']."</a></li>";
         }
    }
    
      return $MenuLv1.$SubMenuLv1."</ul></li>";
   }

   function show_nav($menuTop) {
    $MenuLv0 ="
    <nav class='mainmenu__nav d-none d-lg-block'>
       <ul class='main__menu'>
    ";
    foreach($menuTop as $key => $value){
        $title =  $value['title'];
        $parent = $value['parent'];
        $slug = $value['slug'];
        $url = $value['url'];
        $id = $value['id'];
        
        $menuStr="";
        if($parent == 0) {                       
            $subMenu = subMenu($id,$menuTop);
            if(count($subMenu) > 0){
                // call in subMenu
                $MenuLv0 = $MenuLv0. inSubMenu($value,$subMenu,$menuTop);
                
            }else{
                $MenuLv0 = $MenuLv0. "<li><a href='".$url."'>".$title."</a></li>";
            }
        }
  
    }
    return $MenuLv0 . "</ul></nav>";
   }    

   function show_header($menuTop) {
        $show_menu_top = show_nav($menuTop);
        $show_menu_mobile = show_menu_mobile($menuTop);
        $show_logo_header = show_logo_header();
        $show_menu_right = show_menu_right();
        $show_search = show_search();
        $show_offsetmenu = show_offsetmenu();
        $show_cart = show_cart();
        $header="            
            <header id='header' class='htc-header header--3 bg__white clearfix'>
            <!-- Start Mainmenu Area -->
            <div id='sticky-header-with-topbar' class='mainmenu__area sticky__header'>
                <div class='container'>
                    <div class='row'>
                        ".$show_logo_header."
                        <!-- Start MAinmenu Ares -->
                        <div class='col-md-8 col-lg-8 d-none d-lg-block'>
                            ".$show_menu_top."               
                            ".$show_menu_mobile." 
                        </div>
                        <!-- End MAinmenu Ares -->
                        <div class='col-md-6 col-lg-2 col-7'>  
                            ".$show_menu_right."
                        </div>
                    </div>
                    <div class='mobile-menu-area'></div>
                </div>
            </div>
            <!-- End Mainmenu Area -->
            </header>
            <!-- End Header Style -->

            <div class='body__overlay'></div>
            <!-- Start Offset Wrapper -->
            <div class='offset__wrapper'>        
            ".$show_search."
            ".$show_offsetmenu."
            ".$show_cart."
            </div>
        ";

         return $header;
    }
   
    function show_menu_mobile() {
        return "
        
                <div class='mobile-menu clearfix d-none'>
                <nav id='mobile_dropdown'>
                    <ul>
                        <li><a href='index.html'>Home</a>
                            <ul>
                                <li><a href='index.html'>Home 1</a></li>
                                <li><a href='index-2.html'>Home 2</a></li>
                                <li><a href='index-3.html'>Home 3</a></li>
                                <li><a href='index-4.html'>Home 4</a></li>
                                <li><a href='index-5.html'>Home 5</a></li>
                                <li><a href='index-6.html'>Home 6</a></li>
                                <li><a href='index-7.html'>Home 7</a></li>
                                <li><a href='index-8.html'>Home 8</a></li>
                                <li><a href='index-9.html'>Home 9</a></li>
                                <li><a href='index-10.html'>Home 10</a></li>
                                <li><a href='index-11.html'>Home 11</a></li>
                            </ul>
                        </li>
                        <li><a href='#'>portfolio</a>
                            <ul class='dropdown'>
                                <li><a href='#'>Boxed Style <span><i class='zmdi zmdi-chevron-right'></i></span></a>
                                    <ul class='lavel-dropdown'>
                                        <li><a href='portfolio-gutter-box-4.html'>Gutter 4 Column</a></li>
                                        <li><a href='portfolio-gutter-box-3.html'>Gutter 3 Column</a></li>
                                        <li><a href='portfolio-gutter-box-2.html'>Gutter 2 Column</a></li>
                                        <li><a href='portfolio-nospace-box-4.html'>no Gutter 4 Column</a></li>
                                        <li><a href='portfolio-nospace-box-3.html'> no Gutter 3 Column</a></li>
                                        <li><a href='portfolio-nospace-box-2.html'>no Gutter 2 Column</a></li>
                                    </ul>
                                </li>
                                <li><a href='#'>Wide Style <span><i class='zmdi zmdi-chevron-right'></i></span></a>
                                    <ul class='lavel-dropdown'>
                                        <li><a href='portfolio-gutter-full-wide-6.html'>Gutter 6 Column</a></li>
                                        <li><a href='portfolio-gutter-full-wide-4.html'>Gutter 4 Column</a></li>
                                        <li><a href='portfolio-nospace-full-wide-6.html'>no Gutter 6 Column</a></li>
                                        <li><a href='portfolio-nospace-full-wide-4.html'> no Gutter 4 Column</a></li>
                                    </ul>
                                </li>
                                <li><a href='#'>Card Style <span><i class='zmdi zmdi-chevron-right'></i></span></a>
                                    <ul class='lavel-dropdown'>
                                        <li><a href='portfolio-card-box-4.html'>Gutter 4 Column</a></li>
                                        <li><a href='portfolio-card-box-3.html'>Gutter 3 Column</a></li>
                                        <li><a href='portfolio-card-box-2.html'>Gutter 2 Column</a></li>
                                        <li><a href='portfolio-card-full-wide-6.html'> full Width 6 Column</a></li>
                                        <li><a href='portfolio-card-full-wide-4.html'> full Width 4 Column</a></li>
                                    </ul>
                                </li>
                                <li><a href='#'>Masonry Box <span><i class='zmdi zmdi-chevron-right'></i></span></a>
                                    <ul class='lavel-dropdown'>
                                        <li><a href='portfolio-masonry-4.html'>Gutter 4 Column</a></li>
                                        <li><a href='portfolio-masonry-3.html'>Gutter 3 Column</a></li>
                                        <li><a href='portfolio-masonry-2.html'>Gutter 2 Column</a></li>
                                        <li><a href='portfolio-nospace-masonry-4.html'>no Gutter 4 Column</a></li>
                                        <li><a href='portfolio-nospace-masonry-3.html'> no Gutter 3 Column</a></li>
                                        <li><a href='portfolio-nospace-masonry-2.html'>no Gutter 2 Column</a></li>
                                    </ul>
                                </li>
                                <li><a href='#'>Masonry Wide <span><i class='zmdi zmdi-chevron-right'></i></span></a>
                                    <ul class='lavel-dropdown'>
                                        <li><a href='portfolio-gutter-masonry-fullwide-4.html'>Gutter 4 Column</a></li>
                                        <li><a href='portfolio-gutter-masonry-fullwide-6.html'>Gutter 6 Column</a></li>
                                        <li><a href='portfolio-nospace-masonry-fullwide-4.html'>no Gutter 4 Column</a></li>
                                        <li><a href='portfolio-nospace-masonry-fullwide-6.html'> no Gutter 6 Column</a></li>
                                    </ul>
                                </li>
                                <li><a href='#'>carousel style <span><i class='zmdi zmdi-chevron-right'></i></span></a>
                                    <ul class='lavel-dropdown'>
                                        <li><a href='portfolio-gutter-box-3-carousel.html'>Gutter 3 Column</a></li>
                                        <li><a href='portfolio-gutter-box-3-carousel-fullwide.html'>full wide 3 Column</a></li>
                                        <li><a href='portfolio-card-box-3-carousel.html'>card 3 Column</a></li>
                                        <li><a href='portfolio-card-box-3-carousel-fullwide.html'>full wide 3 Column</a></li>
                                    </ul>
                                </li>
                                <li><a href='#'>justified style <span><i class='zmdi zmdi-chevron-right'></i></span></a>
                                    <ul class='lavel-dropdown'>
                                        <li><a href='portfolio-justified-box-3.html'>box 3 Column</a></li>
                                        <li><a href='portfolio-justified-full-wide-3.html'>full wide 3 Column</a></li>
                                        <li><a href='portfolio-justified-box-nospace-3.html'>box no space 3 Column</a></li>
                                        <li><a href='portfolio-justified-nospace-fullwide-3.html'>full wide no space 3 Col</a></li>
                                    </ul>
                                </li>
                                <li><a href='#'>Portfolio Details <span><i class='zmdi zmdi-chevron-right'></i></span></a>
                                    <ul class='lavel-dropdown'>
                                        <li><a href='single-portfolio.html'>style 1</a></li>
                                        <li><a href='single-portfolio-left-details.html'>style 2</a></li>
                                        <li><a href='single-portfolio-gallery.html'>gallery style</a></li>
                                        <li><a href='single-portfolio-slider.html'>slider style</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href='blog.html'>blog</a>
                            <ul>
                                <li><a href='blog.html'>blog 3 column</a></li>
                                <li><a href='blog-2-col.html'>blog 2 column</a></li>
                                <li><a href='blog-2-col-leftsidebar.html'>2 col left siderbar</a></li>
                                <li><a href='blog-4-col-fullwide.html'>4 column full wide</a></li>
                                <li><a href='blog-3-col-fullwide-sidebar.html'>3 col full wide sidebar</a></li>
                                <li><a href='blog-details.html'> details right sidebar</a></li>
                                <li><a href='blog-details-left-sidebar.html'> details left sidebar</a></li>
                            </ul>
                        </li>
                        <li><a href='#'>pages</a>
                            <ul>
                                <li><a href='about.html'>about</a></li>
                                <li><a href='#'>testimonials <span><i class='zmdi zmdi-chevron-down'></i></span></a>
                                    <ul class='lavel-dropdown'>
                                        <li><a href='customer-review.html'>customer review</a></li>
                                        <li><a href='customer-review-2.html'>customer review 2</a></li>
                                        <li><a href='customer-review-3.html'>customer review 3</a></li>
                                        <li><a href='customer-review-4.html'>customer review 4</a></li>
                                    </ul>
                                </li>
                                <li><a href='shop.html'>shop</a></li>
                                <li><a href='shop-sidebar.html'>shop sidebar</a></li>
                                <li><a href='product-details.html'>product details</a></li>
                                <li><a href='cart.html'>cart</a></li>
                                <li><a href='wishlist.html'>wishlist</a></li>
                                <li><a href='checkout.html'>checkout</a></li>
                                <li><a href='team.html'>team</a></li>
                                <li><a href='login-register.html'>login & register</a></li>
                            </ul>
                        </li>
                        <li><a href='contact.html'>contact</a></li>
                    </ul>
                </nav>
            </div>  
        ";
    
    }
    function show_menu_right() {
        $soluong = "";
        $class="";
        if(isset($_SESSION["soluong"])){
            $soluong = $_SESSION["soluong"];
            $class = "style='color:red!important'";
        }
        if(isset($_SESSION["login"])){
            $login = "
            
            <li><a class='dropdown-toggle' href='#' data-toggle='dropdown' role='button' aria-expanded='false'><span class='ti-user'></span></a>
                <ul id='signIn' class='dropdown-menu'>
                    <li>
                    <h6><strong>Hi! Jhon Smith</strong></h6>
                    </li>
                    <li><a href='#'>ACCOUNT INFO</a></li>
                    <li><a href='#'>WISHLIST</a></li>
                    <li><a href='?url=login/dangxuat'>LOG OUT</a></li>
                </ul>
            </li>
            ";
        }else{
            $login = "
            <li><a href='?url=login'><span class='ti-user'></span></a></li>
            ";
        }
        return "
            <ul class='menu-extra'>
            <li class='search search__open d-none d-md-block d-lg-block'><span class='ti-search'></span></li>
            ".$login."
            <li class='cart__menu'><span class='ti-shopping-cart' ". $class.">".$soluong."</span></li>
            <li class='toggle__menu d-none d-lg-block'><span class='ti-menu'></span></li>
            </ul>
        ";
    }

    function show_cart() {
        
        $item =""; $tongtien = 0;
        if(isset($_SESSION["idProduct"])){          
                foreach($_SESSION["idProduct"] as $key => $value){
                    $item .= "
                    <div class='shp__single__product'>
                    <div class='shp__pro__thumb'>
                        <a href='#'>
                            <img src='".$value['img']."' alt='product images'>
                        </a>
                    </div>
                    <div class='shp__pro__details'>
                        <h2><a href='?url=product/productDetail/".$value['slug']."'>".$value['title']."</a></h2>
                        <span class='quantity'>SL: ".$value['soluong']."</span>
                        <span class='shp__price'>VNĐ".$value['price']."</span>
                    </div>
                    <div class='remove__btn'>
                        <a href='?url=cart/xoagiohang/".$value['id']."' title='Remove this item'><i class='zmdi zmdi-close'></i></a>
                    </div>
                    </div>
                    ";
                }
                if(isset($_SESSION["tongTien"])){
                    $tongtien = $_SESSION["tongTien"];
                }
            }
           // $_SESSION["idProduct"] =[];
           // echo '<pre>';print_r($_SESSION["idProduct"]);echo '</pre>';die();
            
        
        return "
        <!-- Start Cart Panel -->
        <div class='shopping__cart'>
            <div class='shopping__cart__inner'>
                <div class='offsetmenu__close__btn'>
                    <a href='#'><i class='zmdi zmdi-close'></i></a>
                </div>
                <div class='shp__cart__wrap'>
                    ".$item."                   
                </div>
                <ul class='shoping__total'>
                    <li class='subtotal'>Subtotal:</li>
                    <li class='total__price'>VNĐ ".$tongtien."</li>
                </ul>
                <ul class='shopping__btn'>
                    <li><a href='?url=cart/giohang/'>View Cart</a></li>
                    <li class='shp__checkout'><a href='?url=cart/checkout/'>Checkout</a></li>
                </ul>
            </div>
        </div>
        <!-- End Cart Panel -->
        ";
    }

    function show_search() {
        return "
        <div class='search__area'>
        <div class='container' >
            <div class='row' >
                <div class='col-md-12' >
                    <div class='search__inner'>
                        <form action='#' method='get'>
                            <input placeholder='Search here... ' type='text'>
                            <button type='submit'></button>
                        </form>
                        <div class='search__close__btn'>
                            <span class='search__close__btn_icon'><i class='zmdi zmdi-close'></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        ";
    }

    function show_offsetmenu() {
        return "
            <!-- Start Offset MEnu -->
            <div class='offsetmenu'>
                <div class='offsetmenu__inner'>
                    <div class='offsetmenu__close__btn'>
                        <a href='#'><i class='zmdi zmdi-close'></i></a>
                    </div>
                    <div class='off__contact'>
                        <div class='logo'>
                            <a href='index.html'>
                                <img src='./public/images/logo/logo.png' alt='logo'>
                            </a>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetu adipisicing elit sed do eiusmod tempor incididunt ut labore.</p>
                    </div>
                    <ul class='sidebar__thumd'>
                        <li><a href='#'><img src='./public/images/sidebar-img/1.jpg' alt='sidebar images'></a></li>
                        <li><a href='#'><img src='./public/images/sidebar-img/2.jpg' alt='sidebar images'></a></li>
                        <li><a href='#'><img src='./public/images/sidebar-img/3.jpg' alt='sidebar images'></a></li>
                        <li><a href='#'><img src='./public/images/sidebar-img/4.jpg' alt='sidebar images'></a></li>
                        <li><a href='#'><img src='./public/images/sidebar-img/5.jpg' alt='sidebar images'></a></li>
                        <li><a href='#'><img src='./public/images/sidebar-img/6.jpg' alt='sidebar images'></a></li>
                        <li><a href='#'><img src='./public/images/sidebar-img/7.jpg' alt='sidebar images'></a></li>
                        <li><a href='#'><img src='./public/images/sidebar-img/8.jpg' alt='sidebar images'></a></li>
                    </ul>
                    <div class='offset__widget'>
                        <div class='offset__single'>
                            <h4 class='offset__title'>Language</h4>
                            <ul>
                                <li><a href='#'> Engish </a></li>
                                <li><a href='#'> French </a></li>
                                <li><a href='#'> German </a></li>
                            </ul>
                        </div>
                        <div class='offset__single'>
                            <h4 class='offset__title'>Currencies</h4>
                            <ul>
                                <li><a href='#'> USD : Dollar </a></li>
                                <li><a href='#'> EUR : Euro </a></li>
                                <li><a href='#'> POU : Pound </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class='offset__sosial__share'>
                        <h4 class='offset__title'>Follow Us On Social</h4>
                        <ul class='off__soaial__link'>
                            <li><a class='bg--twitter' href='#'  title='Twitter'><i class='zmdi zmdi-twitter'></i></a></li>
                            
                            <li><a class='bg--instagram' href='#' title='Instagram'><i class='zmdi zmdi-instagram'></i></a></li>

                            <li><a class='bg--facebook' href='#' title='Facebook'><i class='zmdi zmdi-facebook'></i></a></li>

                            <li><a class='bg--googleplus' href='#' title='Google Plus'><i class='zmdi zmdi-google-plus'></i></a></li>

                            <li><a class='bg--google' href='#' title='Google'><i class='zmdi zmdi-google'></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- End Offset MEnu -->
        ";
    }

    function show_logo_header() {
        return "    
        <div class='col-md-6 col-lg-2 col-5'>
        <div class='logo'>
            <a href='index.php'>
                <img src='./public/images/logo/logo.png' alt='logo'>
            </a>
        </div>
         </div>
        ";
    }
 ?>

            