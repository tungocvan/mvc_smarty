<?php




class Home extends Controller{

    // http://tungocvan.xyz 
    // hoặc
    // http://tungocvan.xyz/index.php
    function index(){
        $this->display("pages/home/home");
    }
    // http://tungocvan.xyz/index.php?url=home/show/200
    function show($slug) {
        $this->smarty->assign("slug",$slug);
        $this->display("pages/home/home-show-slug");
    }
    
    
    
}
?>