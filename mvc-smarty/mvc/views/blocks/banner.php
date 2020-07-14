<?php 
    $data_banner = $data["getBanner"];
    echo show_banner($data_banner);
    function show_banner($data_banner) {
        foreach($data_banner as $key => $value){
            if($value['title'] == "Banner Product") {
                $url = $value['banner_url'];
                $img = $value['img'];    
                break;
            }
        }
        return "
            <div class='only-banner ptb--100 bg__white'>
            <div class='container'>
                <div class='only-banner-img'>
                    <a href='".$url."'><img src='".$img."' alt='new product'></a>
                </div>
            </div>
            </div>
        ";
    
    }
?>
