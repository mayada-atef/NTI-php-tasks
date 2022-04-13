<?php
 function productTable ($numberOFproducts,$products){ 
    $table=  '<table class="table table-light">
                    <thead>
                        <tr class="text-center">
                        <th scope="col">Product name</th>
                        <th scope="col">price</th>
                        <th scope="col">Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                       ';
    for ($i=1;$i<=$numberOFproducts;$i++){
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
     
        $table .=  '<button type="submit" name="button" value="recipt" class="btn btn-light form-control">Recipt</button>
                       
                    </tbody>
                </table>';
    return $table;
 }
 function calPrice ($products){ $price=0;
    for ($i=1;$i<=$products['numberOfProducts'];$i++){ 
    $price+= $products['productPrice'.$i]*$products['productQuantity'.$i];
    }
    return $price;
  }
function  reciptTable($products){
  //delivery
  if ($products['city']=='cairo') $delivery=0;
  elseif ($products['city']=='giza') $delivery=30;
  elseif ($products['city']=='alex') $delivery=50;
  else $delivery=100;
  
    //discount
    $price=calPrice ($products);
    if ($price<1000) $discount=0;
    elseif ($price>=1000&&$price<3000) $discount=0.1;
    elseif ($price>=3000&&$price<4500)  $discount=0.15;
    elseif ($price>=4500) $discount=0.2;

    // totalprice
    $totalprice=$price-$price*$discount;
    $netprice=$totalprice+$delivery;


    $recipt='<table class="table">    
                <tbody>
                  <tr>
                    <th scope="row">User Name</th>
                    <td>';
  $recipt.=$products["name"];
   $recipt.='</td>
                  </tr>
                  <tr>
                    <th scope="row">City</th>
                    <td>'; 
  $recipt.= $products["city"];
   $recipt.=  '</td>
                  </tr>
                  <tr>
                    <th scope="row">Price</th>
                        <td>';
    $recipt.=        $price;
    $recipt.=            '</td>
                  </tr>
                  <tr>
                    <th scope="row">Discount</th>
                        <td>';
      $recipt.=     $price*$discount .'<br>'; 
      $recipt.=   $discount*100; 
     $recipt.=  '%</td>
                  </tr>
                  <tr>
                    <th scope="row">Total Price</th>
                        <td>';
    $recipt.=        $totalprice;
    $recipt.=  '</td>
                  </tr>
                  <tr>
                    <th scope="row">Delivery</th>
                        <td>';
    $recipt.=        $delivery;
    $recipt.=  '</td>
                  </tr>
                  <tr>
                    <th scope="row">Net Price</th>
                        <td>';
    $recipt.=        $netprice;
     $recipt.= '</td>
                </tr>

                </tbody>
              </table>';
    return $recipt;

}
$products=[];
 
if ($_SERVER['REQUEST_METHOD']==="POST"){
   
    if (($_POST['button']=='product'))  {
        $table=productTable($_POST['numberOfProducts'],[]);
      
    }
    if ($_POST['button']=='recipt'){
      // print_r($_POST);
        $products=$_POST;
        $table=productTable($_POST['numberOfProducts'],$products);
        $recipt=reciptTable($products);
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
                    <!-- `a ? b : (c ? d : e)` -->
                      <div class="form-group">
                        <label for="city">City</label>
                        <select class="form-control" name="city" id="city">
                          <option value="cairo" 
                         <?php echo (empty($_POST['city']))?"":(($_POST['city']=='cairo')?"selected":"");?>>cairo</option>
                        <option value="giza" 
                        <?php echo (empty($_POST['city']))?"":(($_POST['city']=='giza')?"selected":"");?>>giza</option>
                        <option value="alex"
                        <?php echo (empty($_POST['city']))?"":(($_POST['city']=='alex')?"selected":"");?>>alex</option>
                        <option value="others"
                        <?php echo (empty($_POST['city']))?"":(($_POST['city']=='others')?"selected":"");?>>others</option>
                        </select>
                      </div>
                     <div class="form-group">
                      <label for="numberOfProducts">Number of Varities</label>
                      <input type="number" name="numberOfProducts" id="numberOfProducts" class="form-control" 
                      placeholder="Entr your product numbers" value="<?=$_POST['numberOfProducts']??''?>">
             
                    </div>
                    <button  name="button" value="product" class="btn btn-dark form-control">Submit</button>
                      <?= $table??''?>
                </form>
                 <?= $recipt??''?>
              

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