<?php

use app\database\models\user;
use app\http\requests\validation;

include_once "../../../vendor/autoload.php";
include_once "../midlewares/postAuthontication.php";
// include_once "../midlewares/autherized.php";
session_start();
// print_r($validationObj->getErrors());
$validationObj = new validation;
$validationObj->setKey('verification_code')->setValue($_POST['verification_code'])->required()->integer()
    ->digits(5)->exist('users', 'verification_code');
//check errors
if (!empty($validationObj->getErrors())) {
    $_SESSION['errors'] = $validationObj->getErrors();
    $_SESSION['old'] = $_POST;
    header('location:../../../verificationCode.php');
    die;
}
// no errors 
else {
    $user = new user;
    $user->setVerification_code($_POST['verification_code'])->setEmail($_SESSION['verificationEmail']);
    //if code not identical to database 
    if ($user->checkVerificationCode()->num_rows != 1) {
        // if code exist but not belong to user's email
        $_SESSION['errors']['verification_code']['error'] = "wrong code ";
        $_SESSION['old'] = $_POST;
        header('location:../../../verificationCode.php'. $_GET['page']);
        die;
    }
    // correct code 
    if ($_GET['page'] ='signUp') {
        $user->setEmail_verified_at(date("y-m-d h:i:s"));
        if ($user->makeUserVerified()) {
            unset($_SESSION['verificationEmail']);
            header('location:../../../signIn.php');
            die;
        } else {
            $_SESSION['errors']['something']['error'] = "some thing went wrong ";
            $_SESSION['old'] = $_POST;
            header('location:../../../verificationCode.php'. $_GET['page']);
            die;
        }
    } elseif ($_GET['page'] ='verifyEmail') {
        header('location:../../../resetPassword.php');
        die;
    }
}
