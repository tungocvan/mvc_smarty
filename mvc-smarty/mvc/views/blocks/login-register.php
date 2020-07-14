<?php 
    function login() {
        return "
            <!-- Start Single Content -->
            <div id='login' role='tabpanel' class='single__tabs__panel tab-pane fade show active'>
                <div class='login'>
                    <input type='text' placeholder='User Name*' id='username'>
                    <input type='password' placeholder='Password*' id='password'>
                </div>
                <div class='tabs__checkbox'>
                    <input type='checkbox' id='remember'>
                    <span> Remember me</span>
                    <span class='forget'><a href='#'>Forget Pasword?</a></span>
                </div>
                <div class='htc__login__btn mt--30'>
                    <a  id='dangnhap'>Login</a>
                </div>
                <div class='htc__social__connect'>
                    <h2>Or Login With</h2>
                    <ul class='htc__soaial__list'>
                        <li><a class='bg--twitter' href='#'><i class='zmdi zmdi-twitter'></i></a></li>

                        <li><a class='bg--instagram' href='#'><i class='zmdi zmdi-instagram'></i></a></li>

                        <li><a class='bg--facebook' href='#'><i class='zmdi zmdi-facebook'></i></a></li>

                        <li><a class='bg--googleplus' href='#'><i class='zmdi zmdi-google-plus'></i></a></li>
                    </ul>
                </div>
            </div>
            <!-- End Single Content -->
        ";
    }
    function register() {
        return "
            <!-- Start Single Content -->
            <div id='register' role='tabpanel' class='single__tabs__panel tab-pane fade'>
                <div class='login'>
                    <input type='text' placeholder='Name*' id='reg-username'>
                    <input type='email' placeholder='Email*' id='reg-email'>
                    <input type='password' placeholder='Password*' id='reg-password'>
                </div>
                <div class='tabs__checkbox'>
                    <input type='checkbox' id='reg-remember'>
                    <span> Remember me</span>
                </div>
                <div class='htc__login__btn'>
                    <a  id='dangky'>register</a>
                </div>
                <div class='htc__social__connect'>
                    <h2>Or Login With</h2>
                    <ul class='htc__soaial__list'>
                        <li><a class='bg--twitter' href='#'><i class='zmdi zmdi-twitter'></i></a></li>
                        <li><a class='bg--instagram' href='#'><i class='zmdi zmdi-instagram'></i></a></li>
                        <li><a class='bg--facebook' href='#'><i class='zmdi zmdi-facebook'></i></a></li>
                        <li><a class='bg--googleplus' href='#'><i class='zmdi zmdi-google-plus'></i></a></li>
                    </ul>
                </div>
            </div>
            <!-- End Single Content -->
        ";
    }
    function show_login_register() {
        $login = login() ;
        $register =register();
        return "
            <!-- Start Login Register Area -->
            <div class='htc__login__register bg__white ptb--130' style='background: rgba(0, 0, 0, 0) url(./public/images/bg/5.jpg) no-repeat scroll center center / cover ;'>
                <div class='container'>
                    <div class='row'>
                        <div class='col-md-6 ml-auto mr-auto'>
                            <ul class='login__register__menu nav' role='tablist'>
                                <li role='presentation' class='login '><a class='active' href='#login' role='tab' data-toggle='tab'>Login</a></li>
                                <li role='presentation' class='register'><a href='#register' role='tab' data-toggle='tab'>Register</a></li>
                            </ul>
                        </div> 
                    </div>
                    <!-- Start Login Register Content -->
                    <div class='row'>
                        <div class='col-md-6 ml-auto mr-auto'>
                            <div class='htc__login__register__wrap'>
                                ".$login."
                                ".$register."
                            </div>
                        </div>
                    </div>
                    <!-- End Login Register Content -->
                </div>
            </div>
            <!-- End Login Register Area -->
        ";
    }
    echo show_login_register();
?>
