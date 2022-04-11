<?php
 function productTable ($nproduct,$products){ 
    $table=  '<table class="table table-light">
                    <thead>
                        <tr class="text-center">
                        <th scope="col">Product name</th>
                        <th scope="col">price</th>
                        <th scope="col">Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <form action="" method="post">';
       echo $nproduct.'nproducts'.'<br>';
       print_r($products);
    for ($i=1;$i<=$nproduct;$i++){
        $table .= '<tr><td>';
        (empty($products['productName'.$i]))? 
         $table .= "<input type='text' class='form-control' name='productName$i'>":  $table .= $products['productName'.$i];
        $table .=            '</td><td>';
        (empty($products['productPrice'.$i]))? 
         $table .= "<input type='text' class='form-control' name='productPrice$i'>": $table .= $products['productPrice'.$i];
    
        $table .=            '</td><td>' ;
        (empty($products['productQuantity'.$i]))? 
         $table .= "<input type='text' class='form-control' name='productQuantity$i'>": $table .=$products['productQuantity'.$i];
    
         $table .= '</td></tr>';
        }
        // name="button" value="recipt"
        $table .=  '<button type="submit"  class="btn btn-light form-control">Recipt</button>
                        </form>
                    </tbody>
                </table>';
    return $table;
 }
//  function numberOfProducts($nproduct){
//      static  $nproducts;
//      $nproducts=$nproduct;
//      return $nproducts; 
//  }

$products=[];
if ($_SERVER['REQUEST_METHOD']==="POST"){
   
    if (!empty($_POST['button']))  {
        $nproduct=$_POST['nproduct'];
        $table=productTable($nproduct,[]);
    }
    // if ($_POST['button']=='recipt'){}
    else{
        
        $products=$_POST;
        // $nproduct=numberOfProducts(null);
        $table=productTable(1,$products);
    }
    
   
    
   

}


?>


<!doctype html>
<html lang="en">
  <head>
    <title>super market</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <section class="container text-danger">
        <div class="row">
            <div class="col-12 text-center h2 my-4">Super Market</div>
            <div class="col-8 offset-2">
                <form method="post">
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" name="name" id="name" class="form-control" 
                      placeholder="Enter your name" value="<?=$_POST['name']??''?>" >
                    </div>
                    <div class="form-group">
                      <label for="city">City</label>
                      <input type="text" name="city" id="city" class="form-control" 
                      placeholder="Entr your City" value="<?=$_POST['city']??''?>">
                    </div>
                     <div class="form-group">
                      <label for="nproduct">Number of Varities</label>
                      <input type="number" name="nproduct" id="nproduct" class="form-control" 
                      placeholder="Entr your product numbers" value="<?=$_POST['nproduct']??''?>">
             
                    </div>
                    <button  name="button" value="product" class="btn btn-dark form-control">Submit</button>
                </form>
                <?= $table??''?>

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