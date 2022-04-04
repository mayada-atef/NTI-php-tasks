<?php
if ($_POST){
    // print_r($_POST);
    $num=$_POST['num'];
    $nroot=$_POST['nroot'];
    if ($num<=0) {$message="<div class='alert alert-danger'> enter positive number </div>"; }
    else {$result=($num**(1/$nroot)); $message="<div class='alert alert-primary'>root: $result </div>"; }
   
}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>specific root</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="container ">
        <div class="row text-primary mt-5">
        <div class="col-12 text-center h2 my-5">specific root</div>
        <div class="col-4 offset-4">
            <form method="post">
                <div class="row">
                <div class="form-group col-6 ">
                  <label for="num">number</label>
                  <input type="text" name="num" id="num" class="form-control"  required>
                </div>
               
                <div class="form-group col-6">
                  <label for="nroot">root number</label>
                  <input type="text" name="nroot" id="nroot" class="form-control" required >
                </div></div>
          
                <button class="btn btn-primary col-12" type="get root">cal</button>
                <?php echo $message?? ""; ?>

            </form>
        </div>
        </div>
    </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>