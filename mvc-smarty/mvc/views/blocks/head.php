<?php 

$meta = [];
if(isset($_GET['url'])){
    $url =  $_GET['url'];
    $array = explode('/', $url);
    if(count($array) == 3 ){
        $Product = $this->model("ProductModel");    
        $meta = $Product->getMeta($array);  
        
    }      
}
if($meta == []){
    $meta = array("tag_list"=>"AZSHOPWEB", 
                  "title" => "AZSHOPWEB", 
                  "img" => "http://localhost/php-mvc-master/public/images/logo/logo.png",
                  "link" => "http://localhost/php-mvc-master/", 
                  "content" => "AZSHOPWEB"
                );
}
//echo '<pre>';print_r($meta);echo '</pre>';    
 if(isset($meta)){
     $metaStr = "
     <meta property='og:url'                content='".$meta['link']."' />
     <meta property='og:type'               content='article' />
     <meta property='og:title'              content='".$meta['title']."' />
     <meta property='og:description'        content='".$meta['content']."' />
     <meta property='og:image'              content='".$meta['img']."' />
     ";
 }else{
    $metaStr = "";
 }
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>AZSHOPWEB TEMPLATE - TỪ NGỌC VÂN</title>
    <?php echo $metaStr;  ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="./public/images/favicon.ico">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    

    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="./public/css/bootstrap.min.css">
    <!-- Owl Carousel main css -->
    <link rel="stylesheet" href="./public/css/owl.carousel.min.css">
    <link rel="stylesheet" href="./public/css/owl.theme.default.min.css">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="./public/css/core.css">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="./public/css/shortcode/shortcodes.css">
    <!-- Theme main style -->
    <link rel="stylesheet" href="./public/style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="./public/css/responsive.css">
    <!-- User style -->
    <link rel="stylesheet" href="./public/css/custom.css">


    <!-- Modernizr JS -->
    <script src="./public/js/vendor/modernizr-2.8.3.min.js"></script>
</head>