<?php
$title = "SIGN UP";
include_once "layouts/header.php";
include_once "layouts/navbar.php";
include_once "layouts/breadcrump.php";
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
                                <div class="login-register-form">
                                    <?= displayError($_SESSION, 'something')  ?>
                                    <?= displayError($_SESSION, 'mail')  ?>
                                    <form action="app/http/post/signup.php" method="post">
                                        <div class="form-group">
                                            <label for="first_name">First Name</label>
                                            <input type="text" name="first_name" id="first_name" class="form-control" placeholder="Enter your first name" value="<?= getOldValues('first_name') ?>">
                                            <?= displayError($_SESSION, 'first_name')  ?>

                                        </div>
                                        <div class="form-group">
                                            <label for="last_name">Last Name</label>
                                            <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Enter your last name" value="<?= getOldValues('last_name') ?>">
                                            <?= displayError($_SESSION, 'last_name')  ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" value="<?= getOldValues('email') ?>">
                                            <?= displayError($_SESSION, 'email')  ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" name="password" id="password" class="form-control" placeholder="Enter password">
                                            <?= displayError($_SESSION, 'password') ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="confirmation_password">Confirmation password</label>
                                            <input type="password" name="confirmation_password" id="confirmation_password" class="form-control" placeholder="Confirm your password">
                                            <?= displayError($_SESSION, 'confirmation_password') ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input type="number" name="phone" id="phone" class="form-control" placeholder="Enter your phone" value="<?= getOldValues('phone') ?>">
                                            <?= displayError($_SESSION, 'phone') ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="gender">gender</label>
                                            <select name="gender" id="gender">
                                                <option value="m" <?= (getOldValues('gender') == 'm') ? 'selected' : '' ?>>male</option>
                                                <option value="f" <?= (getOldValues('gender') == 'f') ? 'selected' : '' ?>>female</option>
                                            </select>
                                            <?= displayError($_SESSION, 'gender') ?>
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