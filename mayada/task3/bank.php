<?php
  define('less3',0.1);
  define('greater3',0.15);
//    static $id=1;
  $errors=[];
//   $users=[
//           [
            //  'id':'',
//           'name'=>'',
//           'loanYears'=>'',
//           'loanamount'=>'',
//           'intersetRate'=>'',
//           'loanAfterInterst'=>'',
//           'amountPerMonth'=>''
//          ]

//      
//       ];
  if ($_SERVER["REQUEST_METHOD"]==='POST'){
     if (empty($_POST['name'])) $errors['name-requried']="<div class='text-danger'>name is required</div>";
     if (empty($_POST['amount'])) $errors['amount-requried']="<div class='text-danger'>amount is required</div>";
     if (empty($_POST['years'])) $errors['years-requried']="<div class='text-danger'>years is required</div>";
     if (empty($errors)) {
         if ($_POST['years']<3)  $intersetRate=less3*$_POST['amount']*$_POST['years'];
         if ($_POST['years']>3)  $intersetRate=greater3*$_POST['amount']*$_POST['years'];
            // $id++;
            $loanAfterInterst=$_POST['amount']+$intersetRate;
            $amountPerMonth=$loanAfterInterst/($_POST['years']*12);
            $table=showTable($_POST['name'],$intersetRate,$loanAfterInterst,$amountPerMonth); 
     }
    }
  function showTable($name,$intersetRate,$loanAfterInterst,$amountPerMonth){
    $table="<table class='table'>
  <thead>
    <tr>
      <th scope='col'>User Name</th>
      <th scope='col'>interset Rate</th>
      <th scope='col'>Loan After Interset</th>
      <th scope='col'> Monthly</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>{$name}</td>
      <td>{$intersetRate}</td>
      <td>{$loanAfterInterst}</td>
        <td>{$amountPerMonth}</td>
    </tr>
  </tbody>
</table>";
    return $table;
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <title>bank</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      
      <section class="container text-primary">
          <div class="col-12 h1 text-center">Bank</div>
          <div class="col-4 offset-4 my-3">
               <form method="post" >
                  <div class="form-group">
                    <label for="name">User name</label>
                    <input type="text" name="name" id="name" class="form-control " 
                    placeholder="Enter your name" value="<?= $_POST['name']??'' ?>">
                    <?=$errors['name-requried']?? "" ?>
                  </div>
                  <div class="form-group">
                    <label for="amount">Loan amount</label>
                    <input type="text" name="amount" id="amount" class="form-control " 
                    placeholder="Enter loan amount" value="<?= $_POST['amount']??'' ?>">
                      <?=$errors['amount-requried']?? "" ?>
                  </div>
                  <div class="form-group">
                    <label for="years">Loan years</label>
                    <input type="text" name="years" id="years" class="form-control " 
                    placeholder="Enter loan years" value="<?= $_POST['years']??'' ?>">
                       <?=$errors['years-requried']?? "" ?>
                  
                  </div>
                  <button class="btn btn-primary">sumbit </button>
                </form>
              
          </div>
            <?= $table??""?>
         
      </section>
      
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>