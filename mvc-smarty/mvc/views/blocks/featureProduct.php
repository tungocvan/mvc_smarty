<!-- Start Feature Product -->
<?php
    $dataBanner = $data["getBanner"] ;
    //echo '<pre>';print_r($dataBanner);echo '</pre>';die();
    $menu_feature = inMenu($menu['danh-muc-san-pham']);
    $menu_slider = slider($dataBanner);
    echo show_feature_product($menu_slider,$menu_feature);
    function inMenu($menusp){
        $title = $menusp[0]['title'];
        $id = $menusp[0]['id']; // imgMenu
        //echo '<pre>';print_r($menu);echo '</pre>';die();

        $item = "";$items = "";$items2="";
        foreach($menusp as $key => $value){
            if($value['parent'] == $id){
                $idChild = $value['id'];
                $subMenuLv1 = subMenu($idChild ,$menusp);
                if(count($subMenuLv1) > 0 ){
                    //echo '<pre>';print_r($subMenuLv1);echo '</pre>';die();
                    foreach($subMenuLv1 as $keyS => $valueS){
                        $subMenuLv2 = subMenu($valueS['id'] ,$menusp);
                        if(count($subMenuLv2) > 0){
                            //echo '<pre>';print_r($subMenuLv2);echo '</pre>';
                            foreach($subMenuLv2 as $keyS2 => $valueS2){
                                $items2 =$items2 . "
                                    <li><a href='#'>".$valueS2['title']."</a></li>
                                    ";
                            }
                            $items =$items . "
                            <div class='category-part-".$keyS." category-common mb--30'>
                            <h4 class='categories-subtitle'>".$valueS['title']."</h4>   
                            <ul>
                                ".$items2."
                            </ul>    
                            </div>  
                            "; 
                            $items2 = "";
                        }else{
                            $items =$items . "
                            <div class='category-part-".$keyS." category-common mb--30'>
                            <h4 class='categories-subtitle'>".$valueS['title']."</h4>   
                            </div>             
                            ";
                        }
                    }
                    $item = $item. "
                    <li>
                    <a href='#'><img width=15px height=15px alt='' src='./public/images/icons/thum2.png'> ".$value['title']."<i class='zmdi zmdi-chevron-right'></i></a>
                    <div class='category-menu-dropdown'>
                        
                        ".$items."
                                              
                    </div>
                    </li>";
                   
                }else{
                    $item = $item .  "
                     <li><a href='?url=product/".$value['slug']."'><img width=15px height=15px alt='' src='".$value['imgMenu']."'>".$value['title']."</a></li>
                    ";
                }
            }            
        }
      

        $dmsp ="
        <div class='categories-menu mrg-xs'>
        <div class='category-heading'>
            <h3>".$title."</h3>
        </div>
        <div class='category-menu-list'>
            <ul>
               ".$item."
            </ul>
        </div>
        </div>
        ";
        return $dmsp;        
    }

    function slider($dataBanner) {
        $slider = "";$kieubay = "right"; 

        foreach($dataBanner as $key => $value){
         if($value['banner_slider'] == 1) {
            if($key % 2 == 0) $kieubay = "left";            
            $slider = $slider . "
            <div class='slide slider__full--screen slider-height-inherit slider-text-".$kieubay."' style='background: rgba(0, 0, 0, 0) url(".$value['img'].") no-repeat scroll center center / cover ;'>
            <div class='container'>
                <div class='row'>
                    <div class='col-lg-10 col-xl-8 ml-auto col-md-12 col-xs-12'>
                        <div class='slider__inner'>
                            <h1>".$value['title_one']." <span class='text--theme'>".$value['title_two']."</span></h1>
                            <div class='slider__btn'>
                                <a class='htc__btn' href='".$value['banner_url']."'>".$value['title_url']."</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            ";
         }
            
        }
        
        return "
        <div class='slider__container slider--one'>
            <div class='slider__activation__wrap owl-carousel owl-theme'>
               ".$slider."
            </div>
        </div>    
        ";
    }  
    function getDanhMuc($type,$parent=0){
        $args = array(
            'taxonomy' => $type,
            'hide_empty' => false,
            'parent' => $parent,        
        );    
        $dmsp = array();
        $tax_terms = get_terms($args);
        if($tax_terms){
            foreach($tax_terms as $key => $value){
                $value->url = getImgUrlDanhMuc($value->term_id);
                array_push($dmsp,$value);
            } 
        }
        return $dmsp;
    }
    function getImgUrlDanhMuc($id) {
        return get_the_post_thumbnail_url($id, 'post-thumbnail'); 
    }
    function show_feature_product($menu_slider,$menu_feature) {
        $html = "
        <section class='categories-slider-area bg__white'>
        <div class='container'>
            <div class='row flex-row-reverse'>
                <!-- Start Left Feature -->
                <div class='col-lg-9 col-xl-9 col-md-8 col-xs-12'>
                    ".$menu_slider."
                </div>
                <div class='col-lg-3 col-xl-3 col-md-4 col-xs-12'>
                    ".$menu_feature."
                </div>
                <!-- End Left Feature -->
            </div>
        </div>
        </section>
        ";
        return $html ;
    }
?>

