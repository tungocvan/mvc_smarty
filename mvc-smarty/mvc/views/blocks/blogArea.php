<?php 
    $items = $data["getPostbyTimes"];
    $baiviet = show_mot_baiviet($items);
    echo show_blog($baiviet);
    function show_mot_baiviet($items) {
        $item ="";
        foreach($items as $key => $value){
            $time = $value['post_modified_time'];
            $myDateTime = date_parse_from_format("d/m/Y H:i:s", $time);            
            $gio = $myDateTime['hour'];
            $phut = $myDateTime['minute'];
            $giay = $myDateTime['second'];
            $ngay = $myDateTime['day'];
            $thang = $myDateTime['month'];
            $nam = $myDateTime['year'];
            $timestamp = mktime($gio,$phut,$giay,$thang,$ngay,$nam);
            $info = getdate($timestamp);
            $item = $item . "
            <div class='col-lg-4 col-xl-4 col-md-6 col-12'>
            <div class='blog foo'>
                <div class='blog__inner'>
                    <div class='blog__thumb'>
                        <a href='?url=blog/blogDetail/".$value['slug']."'>
                            <img src='".$value['img']."' alt='blog images' width='370px' height='347px'>
                        </a>
                        <div class='blog__post__time'>
                            <div class='post__time--inner'>
                                <span class='date'>".$info['mday']."</span>
                                <span class='month'>".$info['month']."</span>
                            </div>
                        </div>
                    </div>
                    <div class='blog__hover__info'>
                        <div class='blog__hover__action'>
                            <p class='blog__des'><a href='?url=blog/blogDetail/".$value['slug']."'>".$value['title']."</a></p>
                            <ul class='bl__meta'>
                                <li>By :<a href='#'>".$value['author']."</a></li>
                                <li>Bài viết</li>
                                <li>".$time."</li>
                            </ul>
                            <div class='blog__btn'>
                                <a class='read__more__btn' href='?url=blog/blogDetail/".$value['slug']."'>Chi tiết</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            " ;
        }        

        return $item ;
    }
    function show_blog($baiviet) {
         return "
         <section class='htc__blog__area bg__white pb--10 pt--20'>
         <div class='container'>
             <div class='row'>
                 <div class='col-12'>
                     <div class='section__title section__title--2 text-center'>
                         <h2 class='title__line'>THÔNG TIN MỚI NHẤT</h2>
                         <p>Các bài viết mới nhất về tin tức, sản phẩm vừa cập nhật</p>
                     </div>
                 </div>
             </div>
             <div class='blog__wrap clearfix mt--60 xmt-30'>
                 <div class='row'>
                     ".$baiviet."                  
                 </div>
             </div>
         </div>
         </section>
         ";
    }
?>
