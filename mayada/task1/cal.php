<?php
if ($_POST){
    // print_r($_POST);
    $op=$_POST['operator'];
    $num1=$_POST['num1'];
    $num2=$_POST['num2'];
    if ($op=='+') {$result=$num1+$num2 ; $message="<div class='alert alert-primary'>sum: result= $result </div>"; }
    elseif($op=='-') {$result=$num1-$num2 ; $message="<div class='alert alert-primary'>sub: result = $result </div>"; }
    elseif($op=='/') {$result=$num1/$num2 ; $message="<div class='alert alert-primary'> div: result= $result </div>"; }
    elseif($op=='*') {$result=$num1*$num2 ; $message="<div class='alert alert-primary'> mult:  result = $result </div>"; }
    elseif($op=='**') {$result=$num1**$num2 ; $message="<div class='alert alert-primary'> power: result = $result </div>"; }
    
}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>calculator</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div class="row text-primary mt-5">
        <div class="col-12 text-center text-primary h2 mb-4">Calculator</div>
        <div class="col-4 offset-4">
            <form method="post">
                <div class="row">
                <div class="form-group col-6 ">
                  <label for="num1">number1</label>
                  <input type="text" name="num1" id="num1" class="form-control"  required>
                </div>
               
                <div class="form-group col-6">
                  <label for="num2">number2</label>
                  <input type="text" name="num2" id="num2" class="form-control" required >
                </div></div>
                <div class="row mb-2 text-center">
                 <button value="+" name="operator" class="btn btn-primary col-md-2  mx-2 text-center">+</button>
                <button value="-" name="operator"class="btn btn-outline-primary mx-1 col-md-2">-</button>
                <button value="/" name="operator" class="btn btn-outline-primary mx-1 col-md-2"> /</button>
            
                <button value="*" name="operator" class="btn btn-outline-primary mx-1 col-md-2">*</button>
                <button value="**" name="operator" class="btn btn-outline-primary mx-1 col-md-2">**</button></div>
                 
                <!-- <button class="btn btn-primary col-12" type="submit">cal</button> -->
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