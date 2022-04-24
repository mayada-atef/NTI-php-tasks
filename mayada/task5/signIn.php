<?php
// rest show errors 
$title = "SIGN IN";
include_once "layouts/header.php";
include_once "layouts/navbar.php";
include_once "layouts/breadcrump.php";
// include_once "app/http/midlewares/notautherized.php";
?>



<div class="login-register-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">
                        <a class="active" data-toggle="tab" href="#lg1">
                            <h4> <?= $title ?> </h4>
                        </a>
                    </div>
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <?= displayError($_SESSION, 'something')  ?>
                                <div class="login-register-form">
                                    <form action="app/http/post/signin.php" method="post">
                                        <input name="email" placeholder="Email" type="email">
                                        <?= displayError($_SESSION, 'email')  ?>
                                        <input type="password" name="password" placeholder="Password">
                                        <?= displayError($_SESSION, 'password')  ?>
                                        <div class="login-toggle-btn">
                                            <input type="checkbox" name="remember_me" value="remember" id="remember_me">
                                            <label for="remember_me">Remember me</label>
                                            <a href="verifyEmail.php">Forgot Password?</a>
                                        </div>
                                        <div class="button-box">
                                            <button type="submit"><span><?= $title ?></span></button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once "layouts/footer.php";
include_once "layouts/footerscripts.php";
?>