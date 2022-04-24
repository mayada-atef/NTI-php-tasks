<?php
//  اي كلاس هعمل منه اوبجكت هنا هعمله use 
// use namespace + classname;
// need auto loader here because header file((contain autoloader) doesn't exist here 
include_once "../../../vendor/autoload.php";
// need include authentication
include_once "../midlewares/postAuthontication.php";
// include_once "../midlewares/autherized.php";

use app\database\models\user;
use app\http\requests\validation;
use app\mailer\verificationCodeMail;


session_start();
// print_r($_POST);
// die;
// for validation make class valadation and use it 
$validationObj = new validation;
// first validation over input form 


$validationObj->setKey('first_name')->setValue($_POST['first_name'])->required()->max(32);
$validationObj->setKey('last_name')->setValue($_POST['last_name'])->required()->max(32);
$validationObj->setKey('email')->setValue($_POST['email'])->required()->max(64)->unique('users')
    ->regex('/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/');

$validationObj->setKey('password')->setValue($_POST['password'])->required()
    ->regex(
        '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$/',
        "Minimum eight and maximum 20 characters, at least one uppercase letter, one lowercase letter, one number and one special character"
    )->confirmed($_POST['confirmation_password']);
$validationObj->setKey('confirmation_password')->setValue($_POST['confirmation_password'])->required();
$validationObj->setKey('phone')->setValue($_POST['phone'])->required()->regex('/^01[0125][0-9]{8}$/')->unique('users');
$validationObj->setKey('gender')->setValue($_POST['gender'])->required()->in(['f', 'm']);

if (!empty($validationObj->getErrors())) {
    $_SESSION['errors'] = $validationObj->getErrors();
    $_SESSION['old'] = $_POST;
    header('location:../../../signUp.php');
    die;
}
// no errors -> generate verficationcode
$verificationCode = rand(10000, 99999);
$user = new user;
$user->setFirst_name($_POST['first_name'])->setLast_name($_POST['last_name'])->setEmail($_POST['email'])
    ->setPassword(password_hash($_POST['password'], PASSWORD_BCRYPT))->setPhone($_POST['phone'])
    ->setGender($_POST['gender'])->setVerification_code($verificationCode);

// check create no errors -> verification code page and send email 
// error header to signup page with error something went wrong 
if ($user->create()) {
    $body = "<h3>hello {$_POST['first_name']}</h3> <p>your verfication code is {$verificationCode}</p>";
    $verificationCode = new verificationCodeMail($_POST['email'], 'verification code', $body);
    // check email send  if arrived go to verfication page and save email to session 

    if ($verificationCode->send()) {
        $_SESSION['verificationEmail'] = $_POST['email'];
        header('location:../../../verificationCode.php?page=signUp');
        die;
    } else {
        $_SESSION['errors']['mail']['error'] = 'try again after awhile';
        header('location:../../../signUp.php');
        die;
    }
    //if error return to signup with try again error
} else {
    $_SESSION['errors']['something']['error'] = 'some thing went wrong';
    header('location:../../../signUp.php');
    die;
}
