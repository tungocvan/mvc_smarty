<?php 
    define('PATH_DIR_ROOT',$_SERVER['DOCUMENT_ROOT']);
    define('PATH_URL_ROOT',$_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME']);
    $path_url = PATH_URL_ROOT.$_SERVER['SCRIPT_NAME'];
    $path_dir = str_replace('index.php','',$_SERVER['SCRIPT_FILENAME']);        
    define('PATH_URL_CURRENT', PATH_URL_ROOT.$_SERVER['PHP_SELF']);    
    define('PATH_URL_FULL',PATH_URL_ROOT);
    define('PATH_URL', str_replace('index.php','',$path_url));
    define('PATH_DIR', $path_dir);
    define('PATH_QUERY_STRING', $_SERVER['QUERY_STRING']);
    define('PATH_REQUEST_URI', PATH_URL_ROOT.$_SERVER['REQUEST_URI']);
    define('SMARTY_TEMPLATE', PATH_DIR.'mvc/views/smarty/');
    // test đường dẫn
    // echo PATH_DIR_ROOT."<br>";
    // echo PATH_URL_CURRENT."<br>";
    // echo PATH_URL."<br>";
    // echo PATH_DIR."<br>";
    // echo SMARTY_TEMPLATE."<br>";
    // echo PATH_URL_FULL."<br>";
    // echo PATH_REQUEST_URI."<br>";
    // echo PATH_QUERY_STRING."<br>";
    // echo "<pre>"; print_r($_SERVER) ;echo "</pre>";die();

?>