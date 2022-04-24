<?php
// any auth person will open notauthpages will go to index 
if (!empty($_SESSION['user'])) {
    header('location:index.php');
    die;
}
