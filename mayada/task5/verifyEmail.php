<?php
$title = "verify email";
include_once "layouts/header.php";
// include_once "app/http/midlewares/autherized.php";
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
                                <?= displayError($_SESSION, 'something') ?>
                                <div class="login-register-form">
                                    <form action="app/http/post/verifyemail.php" method="post">
                                        <input type="text" name="email" placeholder="Enter email">
                                        <?= displayError($_SESSION, 'email') ?>
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

include_once "layouts/footerscripts.php";
?>