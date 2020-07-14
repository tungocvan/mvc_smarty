<?php 
    
    function show_banner_checkout() {
        return "
        <!-- Start Bradcaump area -->
        <div class='ht__bradcaump__area' style='background: rgba(0, 0, 0, 0) url(./public/images/bg/2.jpg) no-repeat scroll center center / cover ;'>
            <div class='ht__bradcaump__wrap'>
                <div class='container'>
                    <div class='row'>
                        <div class='col-12'>
                            <div class='bradcaump__inner text-center'>
                                <h2 class='bradcaump-title'>Checkout</h2>
                                <nav class='bradcaump-inner'>
                                    <a class='breadcrumb-item' href='index.html'>Home</a>
                                    <span class='brd-separetor'>/</span>
                                    <span class='breadcrumb-item active'>Checkout</span>
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
    function show_info_checkout() {
        $payment_checkout = show_payment_checkout();
        return "
            <div class='ckeckout-left-sidebar'>
                <form method='post' action='?url=cart/saveOrder/'>
                <!-- Start Checkbox Area -->
                <div class='checkout-form'>
                    <h2 class='section-title-3'>THÔNG TIN QUÝ KHÁCH HÀNG</h2>
                    <div class='checkout-form-inner'>
                        <div class='single-checkout-box'>
                            <input name='hoten' type='text' placeholder='Họ và tên khách hàng'>
                            <input name='diachi' type='text' placeholder='Địa chỉ nhận hàng'>
                        </div>
                        <div class='single-checkout-box'>
                            <input name='email' type='email' placeholder='Email'>
                            <input name='dienthoai' type='text' placeholder='Điện thoại'>
                        </div>
                        <div class='single-checkout-box'>
                            <textarea name='message' placeholder='Ghi chú đơn hàng'></textarea>
                        </div>
                        <div class='single-checkout-box select-option mt--40'>
                            <select name='hinhthuc'>
                                <option value='0'>Hình thức thanh toán</option>
                                <option value='Thanh toán sau khi nhận hàng'>Thanh toán sau khi nhận hàng</option>
                                <option value='Chuyển khoản'>Chuyển khoản</option>                     
                            </select>
                            
                        </div>
            
                        <div class='single-checkout-box checkbox pt--20'>
                            <input name='account' id='remind-me' type='checkbox'>
                            <label for='remind-me'><span></span>Tôi muốn tạo tài khoản ?</label>
                        </div>
                    </div>
                </div>
                <!-- End Checkbox Area -->
                <div class='checkout-btn'>
                        <button name='save' value='1' class='ts-btn btn-light btn-large hover-theme' type='submit'>XÁC NHẬN ĐƠN HÀNG</button>
                </div>
                </form> 
            </div>  
        ";
    }
    function show_note_checkout() {
        return "
            <div class='checkout-right-sidebar'>
            <div class='our-important-note'>
                <h2 class='section-title-3'>LƯU Ý :</h2>
                <p class='note-desc'>Sau khi Quý Khách hàng điền đầy đủ thông tin:</p>
                <ul class='important-note'>
                    <li><a href='#'><i class='zmdi zmdi-caret-right-circle'></i>Chúng tôi sẻ liên hệ với Quý khách hàng trong vòng 1 giờ.</a></li>
                    <li><a href='#'><i class='zmdi zmdi-caret-right-circle'></i>Chúng tôi sẻ thông báo Quý khách về tình trạng hàng hóa.</a></li>
                    <li><a href='#'><i class='zmdi zmdi-caret-right-circle'></i>Chúng tôi sẻ thông báo phí vận chuyển (nếu có)</a></li>
                    <li><a href='#'><i class='zmdi zmdi-caret-right-circle'></i>Chúng tôi sẻ giải đáp thắc mắc về sản phẩm, chính sách,..</a></li>
                    <li><a href='#'><i class='zmdi zmdi-caret-right-circle'></i>Chúng tôi sẻ thông báo thời gian dự kiến Quý khách nhận hàng.</a></li>
                </ul>
            </div>
            <div class='puick-contact-area mt--60'>
                <h2 class='section-title-3'>LIÊN HỆ NHANH</h2>
                <a href='phone:+8801722889963'>0903.971.949 </a>
            </div>
            </div>
        ";
    }
    function show_payment_checkout() {
        return "
            <!-- Start Payment Box -->
            <div class='payment-form'>
                <h2 class='section-title-3'>payment details</h2>
                <p>Lorem ipsum dolor sit amet, consectetur kgjhyt</p>
                <div class='payment-form-inner'>
                    <div class='single-checkout-box'>
                        <input type='text' placeholder='Name on Card*'>
                        <input type='text' placeholder='Card Number*'>
                    </div>
                    <div class='single-checkout-box select-option'>
                        <select>
                            <option>Date*</option>
                            <option>Date</option>
                            <option>Date</option>
                            <option>Date</option>
                            <option>Date</option>
                        </select>
                        <input type='text' placeholder='Security Code*'>
                    </div>
                </div>
            </div>
            <!-- End Payment Box -->
            <!-- Start Payment Way -->
            <div class='our-payment-sestem'>
                <h2 class='section-title-3'>We  Accept :</h2>
                <ul class='payment-menu'>
                    <li><a href='#'><img src='./public/images/payment/1.jpg' alt='payment-img'></a></li>
                    <li><a href='#'><img src='./public/images/payment/2.jpg' alt='payment-img'></a></li>
                    <li><a href='#'><img src='./public/images/payment/3.jpg' alt='payment-img'></a></li>
                    <li><a href='#'><img src='./public/images/payment/4.jpg' alt='payment-img'></a></li>
                    <li><a href='#'><img src='./public/images/payment/5.jpg' alt='payment-img'></a></li>
                </ul>
                <div class='checkout-btn'>
                    <a class='ts-btn btn-light btn-large hover-theme' href='#'>CONFIRM & BUY NOW</a>
                </div>    
            </div>
            <!-- End Payment Way -->
        ";
    }
    function show_checkout() {
        $banner_checkout = show_banner_checkout();
        $info_checkout = show_info_checkout();
        $note_checkout = show_note_checkout();
        return "
            <!-- Start Checkout Area -->
            ".$banner_checkout."
            <section class='our-checkout-area ptb--120 bg__white'>
                <div class='container'>
                    <div class='row'>
                        <div class='col-lg-8 col-xl-8'>
                            ".$info_checkout."
                        </div>
                        <div class='col-lg-4 col-xl-4'>
                            ".$note_checkout."
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Checkout Area -->
        ";
    }
    echo show_checkout();
?>


