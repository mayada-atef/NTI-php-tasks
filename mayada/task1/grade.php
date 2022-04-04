<?php
if ($_POST){
    // print_r($_POST);
    $ph=$_POST['phy'];
    $com=$_POST['comp'];
    $bio=$_POST['bio'];
    $ch=$_POST['chm'];
    $math=$_POST['math'];

    if (($ph>=0 && $ph<=50) && ($ch>=0 && $ch<=50) && ($com>=0 && $com<=50) 
            && ($bio>=0 && $bio<=50)&& ($math>=0 && $math<=50) ){ 
        $totalDegree=$ph+$ch+$bio+$math+$com;
        $prcentageDegree=$totalDegree/250 *100;
        switch($prcentageDegree){
        case ($prcentageDegree>=90):
            $grade='A';
            break;
        case ($prcentageDegree<90 &&$prcentageDegree>=80 ):
            $grade='B';
            break;
        case ($prcentageDegree<80 &&$prcentageDegree>=70 ):
            $grade='C';
            break;
        case ($prcentageDegree<70 &&$prcentageDegree>=60 ):
            $grade='D';
            break;
        case ($prcentageDegree<60 &&$prcentageDegree>=40 ):
            $grade='E';
            break;
        default:
             $grade='F';
             break;
    }
     $message="<div class='alert alert-primary'> total degree : $totalDegree <br>
      percentage:  $prcentageDegree  <br> grade: $grade </div>";
    }
    else {
        $message="<div class='alert alert-danger'> grade must be between 0 and 50 </div>";
    }
    

}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>grade</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div class="row text-primary my-5">
        <div class="col-12 text-center  h2">GRADE</div>
        <div class="col-4 offset-4">
            <form method="post">
                <div class="form-group">
                  <label for="phy">physics</label>
                  <input type="text" name="phy" id="phy" class="form-control" 
                  placeholder="physics grade" required>
                </div>
                <div class="form-group">
                  <label for="chm">Chemistry</label>
                  <input type="text" name="chm" id="chm" class="form-control" 
                  placeholder="Chemistry grade"required >
                </div>
                <div class="form-group">
                  <label for="bio">Biology</label>
                  <input type="text" name="bio" id="bio" class="form-control" 
                  placeholder="Biology grade"required >
                </div>
                <div class="form-group">
                  <label for="math">Mathematics </label>
                  <input type="text" name="math" id="math" class="form-control" 
                  placeholder="Mathematics grade"required >
                </div>
                <div class="form-group">
                  <label for="comp">Computer</label>
                  <input type="text" name="comp" id="comp" class="form-control" 
                  placeholder="Computer grade" required>
                </div>
                <button class="btn btn-primary col-12" type="submit">sumbit</button>
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