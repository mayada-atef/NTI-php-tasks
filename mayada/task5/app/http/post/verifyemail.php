<?php

use app\database\models\user;
use app\http\requests\validation;
use app\mailer\verificationCodeMail;

include_once "../../../vendor/autoload.php";
include_once "../midlewares/postAuthontication.php";
// include_once "../midlewares/autherized.php";
session_start();
// print_r($validationObj->getErrors());
$validationObj = new validation;
$validationObj->setKey('email')->setValue($_POST['email'])->required()->max(64)
    ->regex('/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/')->exist('users', 'email');
//check errors
if (!empty($validationObj->getErrors())) {
    $_SESSION['errors'] = $validationObj->getErrors();
    $_SESSION['old'] = $_POST;
    header('location:../../../verifyEmail.php');
    die;
}
// no errors 
else {
    $verificationCode = rand(10000, 99999);
    $user = new user;
    $user->setVerification_code($verificationCode)->setEmail($_POST['email']);
    if (!$user->updateVerificationCode()) {
        $_SESSION['errors']['something']['error'] = "some thing went wrong ";
        $_SESSION['old'] = $_POST;
        header('location:../../../verifyEmail.php');
        die;
    }
    $body = "<h3>hello {$_POST['email']}</h3> <p>your verfication code is {$verificationCode}</p>";
    $verificationCode = new verificationCodeMail($_POST['email'], 'verification code', $body);

    if ($verificationCode->send()) {
        $_SESSION['verificationEmail'] = $_POST['email'];
        header('location:../../../verificationCode.php?page=verifyEmail');
        die;
    } else {
        $_SESSION['errors']['mail']['error'] = 'try again after awhile';
        header('location:../../../verifyEmail.php');
        die;
    }
}
