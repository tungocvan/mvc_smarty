<!doctype html>
<html class="no-js" lang="en">
<?php require_once "./mvc/views/blocks/head.php" ?>
<body>
<!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->  
<?php require_once "./mvc/views/blocks/header.php" ?>
<?php require_once "./mvc/views/pages/".$data["Page"].".php" ?> 
<?php require_once "./mvc/views/blocks/footer.php" ?>
<?php require_once "./mvc/views/blocks/jsfooter.php" ?>
</body>
</html>