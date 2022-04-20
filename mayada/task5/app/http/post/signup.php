<?php
//  اي كلاس هعمل منه اوبجكت هنا هعمله use 
// use namespace + classname;
use app\http\requests\validation;
// need auto loader here because header file((contain autoloader) doesn't exist here 
include_once "../../../vendor/autoload.php";
// need include authentication
include_once "../../midlewares/postAuthontication.php";
session_start();

// for validation make class valadation and use it 
$validationObj = new validation;
// first validation over input form 

$validationObj->setKey('first_name')->setValue($_POST['first_name'])->required()->max(32);
$validationObj->setKey('last_name')->setValue($_POST['last_name'])->required()->max(32);
$validationObj->setKey('email')->setValue($_POST['email'])->required()->max(64)->unique('users')
    ->regex('/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/');
$validationObj->setKey('password')->setValue($_POST['password'])->required()
    ->regex('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$/')
    ->confirmed($_POST['confirmation_password']);
$validationObj->setKey('confirmation_password')->setValue($_POST['confirmation_password'])->required();
$validationObj->setKey('phone')->setValue($_POST['phone'])->required()->regex('/^01[0125][0-9]{8}$/')->unique('users');
$validationObj->setKey('gender')->setValue($_POST['gender'])->required()->in(['f', 'm']);

if (!empty($validationObj->getErrors())) {
    $_SESSION['errors'] = $validationObj->getErrors();
    $_SESSION['old'] = $_POST;
    header('location:../../../signUp.php');
    die;
}
