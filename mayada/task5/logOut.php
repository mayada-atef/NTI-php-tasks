<?php
session_start();
include_once "app/http/midlewares/autherized.php";
unset($_SESSION['user']);
header('location:signIn.php');
