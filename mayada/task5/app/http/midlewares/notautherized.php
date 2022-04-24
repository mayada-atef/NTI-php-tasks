<?php
if (empty($_SESSION['user'])) {
    header('location:signIn.php');
    die;
}
