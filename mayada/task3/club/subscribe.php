<?php 
session_start();

$errors=[];
if ($_SERVER["REQUEST_METHOD"]==='POST'){
    // print_r($_POST);
  $_SESSION['memberName']=$_POST['memberName'];
  $_SESSION['membersCount']=$_POST['membersCount'];
  header('location:games.php');



}
 
?>
<!doctype html>
<html lang="en">
  <head>
    <title>subscribe</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <section class="container text-warning">
        <div class="col-12 h1 my-5 text-center ">CLUB</div>
        <div class="col-4 offset-4">
            <form method="post">
                <div class="form-group">
                  <label for="memberName">Member Name</label>
                  <input type="text" name="memberName" id="memberName" class="form-control" 
                  placeholder="enter your name" aria-describedby="helpId" required>
                     <small id="helpId" class="text-muted">club subscribtion starts with 10.000LE</small>
                </div>
                <div class="form-group">
                  <label for="membersCount">Count Of Family Member</label>
                  <input type="text" name="membersCount" id="membersCount" class="form-control"
                   placeholder="enter members number" aria-describedby="helpId" required> 
                      <small id="helpId" class="text-muted">cost of each member is 2.500</small> 
           
                </div>
              

                <button class="btn btn-warning"> subscribe </button>
           </form>
     

        
        </div>
</section>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
    


