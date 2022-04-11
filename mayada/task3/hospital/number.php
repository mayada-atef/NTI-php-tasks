<?php 
include_once "layouts/header.php";
$title="welcome";
$errors=[];
if ($_SERVER["REQUEST_METHOD"]==='POST'){
    print_r($_POST);
    if (empty($_POST['phone'])) $errors['phone-requried']="<div class='text-danger'>phone is required</div>";
     if (empty($errors)) {
         $_SESSION['phone']=$_POST['phone'];
         header('location:review.php');
     }


}
 
?>
    
<section class="container text-warning">
        <div class="col-12 h1 my-5 text-center "><?= $title?></div>
        <div class="col-4 offset-4">
            <form method="post">
                <div class="form-group">
                  <label for="phone">Phone</label>
                  <input type="text" name="phone" id="phone" class="form-control" placeholder="enter your phone">  
                 <?=$errors['phone-requried']?? "" ?>
                </div>

                <button class="btn btn-warning"> sumbit </button>
           </form>
     

        
        </div>
</section>
<?php 
include_once "layouts/footer.php";
?>
