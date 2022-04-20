<?php
// finished 
use app\database\models\user;
use app\http\requests\validation;

include_once "vendor/autoload.php";
define('NOTACTIVE', 0);
// validation 
$validationObj = new validation;

$validationObj->setKey('email')->setValue($_POST['email'])->required()->max(64)->exist('users')
    ->regex('/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/');
$validationObj->setKey('password')->setValue($_POST['password'])->required()
    ->regex('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$/');

// check errors if found reload pages with errors
if (!empty($validationObj->getErrors())) {
    $_SESSION['errors'] = $validationObj->getErrors();
    $_SESSION['old'] = $_POST;
    header('location:../../../signIn.php');
    die;
}
// 1- email after findby email not exists 
//2- password not match
//3- not active block 
//4- not has email_verfied_at 
$user = new user;
$result = $user->setEmail($_POST['email'])->getUserByEmail();
if ($result->num_rows != 1) {
    $_SESSION['errors']['email']['wrong'] = "email not exist";
    $_SESSION['old'] = $_POST;
    header("location:../../../signIn.php");
    die;
}
$currentUser = $result->fetch_object(user::class);
if (!password_verify($_POST['password'], $currentUser->getPassword())) {
    $_SESSION['errors']['password']['wrong'] = "email or password wrong ";
    $_SESSION['old'] = $_POST;
    header("location:../../../signIn.php");
    die;
}
if ($currentUser->getStatus() == NOTACTIVE) {
    $_SESSION['errors']['something']['block'] = "you are blocked ";
    $_SESSION['old'] = $_POST;
    header("location:../../../signIn.php");
    die;
}
if (is_null($currentUser->getEmail_verified_at())) {
    $_SESSION['verfication_email'] = $_POST['email'];
    header("location:../../../verificationCode.php");
    die;
}
$_SESSION['user'] = $currentUser->userSaveData();
header("location:../../../index.php");
