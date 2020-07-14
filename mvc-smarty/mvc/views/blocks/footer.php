<?php 
    $data_footer_info = $menu["thong-tin-ve-chung-toi"];
    $data_footer_cate = $menu["nganh-hang-ban-chay"];
    $data_footer_contact = $data["getBanner"];
    //echo '<pre>';print_r($data_footer_contact);echo '</pre>';die();
    function show_footer_contact($data_footer_contact) {  
        foreach($data_footer_contact as $key => $value){
            if($value['title'] == "footer contact") {
                $diachi = $value['title_one'];
                $email = $value['title_two'];
                $sdt = $value['title_url'];
                break;
            }
        }
        
         return "
         <div class='col-lg-3 col-xl-3 col-md-6 col-sm-6'>
         <div class='ft__widget'>
             <div class='ft__logo'>
                 <a href='index.html'>
                     <img src='./public/images/logo/logo.png' alt='footer logo'>
                 </a>
             </div>
             <div class='footer-address'>
                 <ul>
                     <li>
                         <div class='address-icon'>
                             <i class='zmdi zmdi-pin'></i>
                         </div>
                         <div class='address-text'>
                             <p>".$diachi."</p>
                         </div>
                     </li>
                     <li>
                         <div class='address-icon'>
                             <i class='zmdi zmdi-email'></i>
                         </div>
                         <div class='address-text'>
                             <a href='#'>".$email."</a>
                         </div>
                     </li>
                     <li>
                         <div class='address-icon'>
                             <i class='zmdi zmdi-phone-in-talk'></i>
                         </div>
                         <div class='address-text'>
                             <p>".$sdt."</p>
                         </div>
                     </li>
                 </ul>
             </div>
             <ul class='social__icon'>
                 <li><a href='#'><i class='zmdi zmdi-twitter'></i></a></li>
                 <li><a href='#'><i class='zmdi zmdi-instagram'></i></a></li>
                 <li><a href='#'><i class='zmdi zmdi-facebook'></i></a></li>
                 <li><a href='#'><i class='zmdi zmdi-google-plus'></i></a></li>
             </ul>
         </div>
     </div>
         ";  
    }
    function show_footer_cate($data_footer_cate) {   
        $item = "";
        foreach($data_footer_cate as $key => $value){
            $item = $item . "
            <li><a href='".$value['slug']."'>".$value['title']."</a></li>
            ";
        }
        return "
        <div class='col-lg-3 col-xl-3 col-md-6 col-sm-6 xmt-30 mrg-sm-none'>
        <div class='ft__widget'>
            <h2 class='ft__title'>Ngành hàng bán chạy</h2>
            <ul class='footer-categories'>
                ".$item."
            </ul>
        </div>
        </div>
        ";
    }
    function show_footer_info($data_footer_info){ 
        $item ="";
        foreach($data_footer_info as $key => $value){
            $item = $item. "
             <li><a href='?url=blog/blogDetail/".$value['slug']."'>".$value['title']."</a></li>
            ";
        }
        return "
        <div class='col-lg-3 col-xl-3 col-md-6 col-sm-6 smt-30 xmt-30'>
        <div class='ft__widget'>
            <h2 class='ft__title'>Thông Tin Về Chúng Tôi</h2>
            <ul class='footer-categories'>
                ".$item."
            </ul>
        </div>
        </div>
        "  ;
    }
    function show_footer_news() {    
        return "
        <div class='col-lg-3 col-xl-3 ml-auto mr-auto col-md-6 col-sm-6 smt-30 xmt-30'>
        <div class='ft__widget'>
            <h2 class='ft__title'>Đăng ký email</h2>
            <div class='newsletter__form'>
                <p>Đăng ký email, để nhận mã giảm giá và thông tin về khuyến mãi, sản phẩm mới của chúng tôi. </p>
                <div class='input__box'>
                    <div id='mc_embed_signup'>
                        <form action='#' method='post' id='mc-embedded-subscribe-form' name='mc-embedded-subscribe-form' class='validate' target='_blank' novalidate>
                            <div id='mc_embed_signup_scroll' class='htc__news__inner'>
                                <div class='news__input'>
                                    <input type='email' value='' name='EMAIL' class='email' id='mce-EMAIL' placeholder='Email Address' required>
                                </div>
                                <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                <div style='position: absolute; left: -5000px;' aria-hidden='true'><input type='text' name='b_6bbb9b6f5827bd842d9640c82_05d85f18ef' tabindex='-1' value=''></div>
                                <div class='clearfix subscribe__btn'><input type='submit' value='Send' name='subscribe' id='mc-embedded-subscribe' class='bst__btn btn--white__color'>
                                    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>        
            </div>
        </div>
        </div>
        ";
    }
    function show_footer_copyright() {    
        return "
        <div class='htc__copyright__area'>
        <div class='row'>
            <div class='col-lg-12 col-xl-12 col-md-12 col-12'>
                <div class='copyright__inner'>
                    <div class='copyright'>
                        <p>© 2020 <a href='#'>Từ Ngọc Vân</a>
                        All Right Reserved.</p>
                    </div>
                    <ul class='footer__menu'>
                        <li><a href='index.html'>Home</a></li>
                        <li><a href='shop.html'>Product</a></li>
                        <li><a href='contact.html'>Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
        </div>
        ";
    }
    function show_footer($data_footer_info,$data_footer_cate,$data_footer_contact) {    
        $footer_contact = show_footer_contact($data_footer_contact);
        $footer_cate = show_footer_cate($data_footer_cate);
        $footer_info = show_footer_info($data_footer_info);
        $footer_news = show_footer_news();
        $footer_copyright = show_footer_copyright();
        return "
        <footer class='htc__foooter__area gray-bg'>
            <div class='container'>
                <div class='footer__container clearfix '>
                    <div class='row'>
                        <!-- Start Single Footer Widget -->
                        ".$footer_contact."
                        <!-- End Single Footer Widget -->
                        <!-- Start Single Footer Widget -->
                        ".$footer_cate."
                        <!-- Start Single Footer Widget -->
                        ".$footer_info."
                        <!-- Start Single Footer Widget -->
                        ".$footer_news."
                        <!-- End Single Footer Widget -->
                    </div>
                </div>
                <!-- Start Copyright Area -->
                ".$footer_copyright."
                <!-- End Copyright Area -->
            </div>
        </footer>
        ";

    }
    
    echo show_footer($data_footer_info,$data_footer_cate,$data_footer_contact);
?>
