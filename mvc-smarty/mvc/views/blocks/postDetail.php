<?php
    $dataPost = $data["getPost"];
    //echo '<pre>';print_r($dataPost);echo '</pre>'; die();
    $banner_blog = show_banner_blog();
    $blog_detail_post = show_blog_detail_post($dataPost);
    $blog_detail_tag = show_blog_detail_tag();
    $blog_detail_comment = show_blog_detail_comment();
    $blog_detail_reply = show_blog_detail_reply();
    $blog_detail = show_blog_detail($blog_detail_post,$blog_detail_tag,$blog_detail_comment,$blog_detail_reply);
    $blog_cate_search = show_blog_cate_search();
    $blog_cate_category = show_blog_cate_category();
    $blog_cate_latest = show_blog_cate_latest();
    $blog_cate_tag = show_blog_cate_tag();
    $blog_cate = show_blog_cate($blog_cate_search,$blog_cate_category,$blog_cate_latest,$blog_cate_tag);
    echo show_blog($banner_blog,$blog_detail,$blog_cate);

    function show_banner_blog() {
        return "
        <div class='ht__bradcaump__area' style='background: rgba(0, 0, 0, 0) url(./public/images/bg/2.jpg) no-repeat scroll center center / cover ;'>
            <div class='ht__bradcaump__wrap'>
                <div class='container'>
                    <div class='row'>
                        <div class='col-12'>
                            <div class='bradcaump__inner text-center'>
                                <h2 class='bradcaump-title'>Blog Details</h2>
                                <nav class='bradcaump-inner'>
                                <a class='breadcrumb-item' href='index.html'>Home</a>
                                <span class='brd-separetor'>/</span>
                                <span class='breadcrumb-item active'>right sidebar</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        ";
    }
    function show_blog_detail_post($dataPost) {
        $time = $dataPost['post_modified_time'];
        $myDateTime = date_parse_from_format("d/m/Y H:i:s", $time);            
        $gio = $myDateTime['hour'];
        $phut = $myDateTime['minute'];
        $giay = $myDateTime['second'];
        $ngay = $myDateTime['day'];
        $thang = $myDateTime['month'];
        $nam = $myDateTime['year'];
        $timestamp = mktime($gio,$phut,$giay,$thang,$ngay,$nam);
        $info = getdate($timestamp);
        $img = "";
        if($dataPost['img']){
            $img = "
            <div class='blog-details-thumb-wrap'>
                <div class='blog-details-thumb'>
                <img src='".$dataPost['img']."' alt='blog images'>
                </div>
                <div class='upcoming-date'>
                ".$info['mday']."<span class='upc-mth'>".$info['month'].",".$info['year']."</span>
                </div>
            </div>
            ";
        }
        
        return "
            <!--Start Blog Thumb -->
            ".$img."
            <!--End Blog Thumb -->
            <h2>".$dataPost['title']."</h2>
            <div class='blog-admin-and-comment'>
                <p>BY : <a href='#'>".$dataPost['author']."</a></p>
                <p class='separator'>|</p>
                <p>3 COMMENTS</p>
            </div>

            <!-- Start Blog Pra -->
            <div class='blog-details-pra'>
            ".$dataPost['content']."
            </div>
            <!-- End Blog Pra -->
        ";
    }
    function show_blog_detail_tag() {
        return "
        <div class='postandshare'>
            <div class='post'>
                <p>TAGS :</p>
            </div>
            <div class='blog-social-icon'>
                <ul>
                    <li><a href='#'><i class='fa fa-rss'></i></a></li>
                    <li><a href='#'><i class='fa fa-vimeo'></i></a></li>
                    <li><a href='#'><i class='fa fa-tumblr'></i></a></li>
                    <li><a href='#'><i class='fa fa-pinterest'></i></a></li>
                    <li><a href='#'><i class='fa fa-linkedin'></i></a></li>
                </ul>
            </div>
        </div>  
        ";
    }
    function show_blog_detail_comment(){
        return "
        <div class='our-blog-comment mt--20'>
            <div class='blog-comment-inner'>
                <h2 class='section-title-2'>COMMENTS (03)</h2>
                <!-- Start Single Comment -->
                <div class='single-blog-comment'>
                    <div class='blog-comment-thumb'>
                        <img src='./public/images/comment/1.jpg' alt='comment images'>
                    </div>
                    <div class='blog-comment-details'>
                        <div class='comment-title-date'>
                            <h2><a href='#'>Martin Payet</a></h2>
                            <div class='reply'>
                                <p>14 Sep 2017 / <a href='#'>REPLY</a></p>
                            </div>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incidi ut labore et dolo magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                    </div>
                </div>
                <!-- End Single Comment -->
                <!-- Start Single Comment -->
                <div class='single-blog-comment comment-reply'>
                    <div class='blog-comment-thumb'>
                        <img src='./public/images/comment/2.jpg' alt='comment images'>
                    </div>
                    <div class='blog-comment-details'>
                        <div class='comment-title-date'>
                            <h2><a href='#'>Martin Payet</a></h2>
                            <div class='reply'>
                                <p>14 Sep 2017 / <a href='#'>REPLY</a></p>
                            </div>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incidi ut labore et dolo magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                    </div>
                </div>
                <!-- End Single Comment -->
                <!-- Start Single Comment -->
                <div class='single-blog-comment'>
                    <div class='blog-comment-thumb'>
                        <img src='./public/images/comment/3.jpg' alt='comment images'>
                    </div>
                    <div class='blog-comment-details'>
                        <div class='comment-title-date'>
                            <h2><a href='#'>Martin Payet</a></h2>
                            <div class='reply'>
                                <p>14 Sep 2017 / <a href='#'>REPLY</a></p>
                            </div>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incidi ut labore et dolo magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                    </div>
                </div>
                <!-- End Single Comment -->
            </div>
        </div>
        ";
    }
    function show_blog_detail_reply(){
        return "    
        <div class='our-reply-form-area mt--20'>
            <h2 class='section-title-2'>LEAVE A REPLY</h2>
            <div class='reply-form-inner mt--40'>
                <div class='reply-form-box'>
                    <div class='reply-form-box-inner'>
                        <div class='rfb-single-input'>
                            <input type='text' placeholder='Name*'>
                        </div>
                        <div class='rfb-single-input'>
                            <input type='email' placeholder='Email*'>
                        </div>
                    </div>
                </div>
                <div class='reply-form-box'>
                    <textarea name='message' placeholder='Message'></textarea>
                </div>
                <div class='blog__details__btn'>
                    <a class='htc__btn btn--gray' href='#'>submit</a>
                </div>
            </div>
        </div>
        ";
    }
    function show_blog_detail($blog_detail_post,$blog_detail_tag,$blog_detail_comment,$blog_detail_reply) {
        return "
        <div class='blog-details-left-sidebar'>
            <div class='blog-details-top'>
               ".$blog_detail_post."
                
                <!-- Start Blog Tags -->
                ".$blog_detail_tag."
                <!-- End Blog Tags -->

                <!-- Start Blog Comment Area -->
                ".$blog_detail_comment."
                <!-- End Blog Comment Area -->
                <!-- Start Reply Form -->
                ".$blog_detail_reply."
                <!-- End Reply Form -->
            </div>
        </div>
        ";
    }
    function show_blog_cate_search() {
        return "
        <div class='category-search-area'>
        <input placeholder='Search......' type='text'>
        <a class='srch-btn' href='#'><i class='zmdi zmdi-search'></i></a>    
        </div>
        ";
    }
    function show_blog_cate_category() {
        return "
        <div class='our-category-area mt--60'>
        <h2 class='section-title-2'>CATEGORY</h2>
        <ul class='categore-menu'>
            <li><a href='#'><i class='zmdi zmdi-caret-right'></i>BLOG <span>20</span></a></li>
            <li><a href='#'><i class='zmdi zmdi-caret-right'></i>business <span>40</span></a></li>
            <li><a href='#'><i class='zmdi zmdi-caret-right'></i>DESIGN <span>60</span></a></li>
            <li><a href='#'><i class='zmdi zmdi-caret-right'></i>BRANDING <span>70</span></a></li>
            <li><a href='#'><i class='zmdi zmdi-caret-right'></i>ANTHONY <span>80</span></a></li>
        </ul>
        </div>
        ";
    }
    function show_blog_cate_latest() {
        return "    
        <div class='our-recent-post mt--60'>
            <h2 class='section-title-2'>LATEST POST</h2>
            <div class='our-recent-post-wrap'>
                <!-- Start Single Post -->
                <div class='single-recent-post'>
                    <div class='recent-thumb'>
                        <a href='blog-details.html'><img src='./public/images/blog/sm-img/1.jpg' alt='post images'></a>
                    </div>
                    <div class='recent-details'>
                        <div class='recent-post-dtl'>
                            <h6><a href='blog-details.html'>Lorem ipsum dolor sit amet, consectetu adipisicing elit, sed do.</a></h6>
                        </div>
                        <div class='recent-post-time'>
                            <p>14 SEP 2017</p>
                            <p class='separator'>|</p>
                            <p>5 : 00 PM</p>
                        </div>
                    </div>
                </div>
                <!-- End Single Post -->
                <!-- Start Single Post -->
                <div class='single-recent-post'>
                    <div class='recent-thumb'>
                        <a href='blog-details.html'><img src='./public/images/blog/sm-img/2.jpg' alt='post images'></a>
                    </div>
                    <div class='recent-details'>
                        <div class='recent-post-dtl'>
                            <h6><a href='blog-details.html'>Lorem ipsum dolor sit amet, consectetu adipisicing elit, sed do.</a></h6>
                        </div>
                        <div class='recent-post-time'>
                            <p>14 SEP 2017</p>
                            <p class='separator'>|</p>
                            <p>5 : 00 PM</p>
                        </div>
                    </div>
                </div>
                <!-- End Single Post -->
                <!-- Start Single Post -->
                <div class='single-recent-post'>
                    <div class='recent-thumb'>
                        <a href='blog-details.html'><img src='./public/images/blog/sm-img/3.jpg' alt='post images'></a>
                    </div>
                    <div class='recent-details'>
                        <div class='recent-post-dtl'>
                            <h6><a href='blog-details.html'>Lorem ipsum dolor sit amet, consectetu adipisicing elit, sed do.</a></h6>
                        </div>
                        <div class='recent-post-time'>
                            <p>14 SEP 2017</p>
                            <p class='separator'>|</p>
                            <p>5 : 00 PM</p>
                        </div>
                    </div>
                </div>
                <!-- End Single Post -->
            </div>
        </div>
        ";
    }
    function show_blog_cate_tag() {
        return "
        <div class='our-blog-tag'>
            <h2 class='section-title-2'>TAGS</h2>
            <ul class='tag-menu mt-40'>
                <li><a href='#'>Planning</a></li>
                <li><a href='#'>Consulting</a></li>
                <li><a href='#'>Investment</a></li>
                <li><a href='#'>Investment</a></li>
                <li><a href='#'>planning</a></li>
                <li><a href='#'>Management</a></li>
            </ul>
        </div>
        ";
    }
    function show_blog_cate($blog_cate_search,$blog_cate_category,$blog_cate_latest,$blog_cate_tag) {
        return "
        <div class='blod-details-right-sidebar'>
            ".$blog_cate_search."
            <!-- Start Category Area -->
            ".$blog_cate_category."
            <!-- End Category Area -->
            <!-- Start Letaest Blog Area -->
            ".$blog_cate_latest."
            <!-- End Letaest Blog Area -->
            <!-- Start Tag -->
            ".$blog_cate_tag."
            <!-- End Tag -->
        </div>
        ";
    }
    function show_blog($banner_blog,$blog_detail,$blog_cate) {
        echo $banner_blog;
        return " 
        <section class='blog-details-wrap ptb--120 bg__white'>
            <div class='container'>
                <div class='row'>
                    <div class='col-lg-8 col-xl-8 col-md-12 col-12'>
                        ".$blog_detail."
                    </div>
                    <div class='col-lg-4 col-xl-4 col-md-12 col-12 smt-30 xmt-40'>
                        ".$blog_cate."
                    </div>
                </div>
            </div>
        </section>
        ";
    }
?>
