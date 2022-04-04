<?php


if ($_POST){ 
//    print_r($_POST);
    $num1=$_POST['num1'];
    $num2=$_POST['num2'];
    $num3=$_POST['num3'];
   
    // $max="<div class='alert alert-dark'>  max number is ";
    // $min="<div class='alert alert-dark'>  min number is ";
    // if ($num1>$num2&&$num1>$num3) $max.= $num1 ." "."</div>";
    // if($num2>$num1&&$num2>$num3) $max.=$num2 ." "."</div>"; 
    // if($num3>$num1&&$num3>$num2) $max.=$num3 ." "."</div>";
    // if($num1<$num2&&$num1<$num3) $min.=$num1 ." "."</div>";
    // if($num2<$num1&&$num2<$num3) $min.=$num2 ." "."</div>";
    // else  $min.=$num3." "."</div>";
    
    if ($num1>$num2&&$num1>$num3) $max="<div class='alert alert-dark'>  max number is $num1 </div>" ;
    elseif($num2>$num1&&$num2>$num3) $max="<div class='alert alert-dark'>  max number is $num2 </div>" ; 
    elseif ($num3>$num1&&$num3>$num2) $max="<div class='alert alert-dark'>  max number is $num3 </div>" ;
    

    if($num1<$num2&&$num1<$num3) $min="<div class='alert alert-dark'>  min number is $num1 </div>" ;
    elseif($num2<$num1&&$num2<$num3) $min="<div class='alert alert-dark'>  min number is $num2 </div>" ;
    elseif ($num3<$num1&&$num3<$num2) $min="<div class='alert alert-dark'>  min number is $num3 </div>" ;
 

}

?>
<!doctype html>
<html lang="en">
  <head>
    <title>Max Number</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <section class="container">
       <div class="row my-5">
           <div class="col-12 text-center my-5">
              <h2 >Max Number</h2> 
           </div>
           <div class="col-4 offset-4">
               <form method="post">
                   <div class="row">
                   <div class="col-4">
                       <div class="form-group">
                         <label for="num1">Num1</label>
                         <input type="text" name="num1" id="num1" class="form-control" required >
                       </div>
                   </div>
                    <div class="col-4">
                       <div class="form-group">
                         <label for="num2">Num2</label>
                         <input type="text" name="num2" id="num2" class="form-control" required >
                       </div>
                   </div>
                    <div class="col-4">
                       <div class="form-group">
                         <label for="num3">Num3</label>
                         <input type="text" name="num3" id="num3" class="form-control" required >
                       </div>
                   </div>
                 </div>
                 <button type="submit" class="btn btn-dark col-12">GET MAX & MIN</button>
                 <?php  echo $max?? ""; echo $min?? "";?>
                
               

               </form>
           </div>
       </div>
    </section>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>