<!-- if($_SERVER["REQUEST_METHOD"]=="POST"){
    
     echo count($_SESSION['games']);
     for($i=1;$i<=$_SESSION['membersCount'];$i++){
      array_push($_SESSION['members'],
        ['member'.$i => 
        [
           'memberName'=>$_POST[('subscriberName'.$i)]??"",
           'membergames'=>[]
        ]
        ]);}
      for ($j=1;$j<count($_SESSION['games']);$j++){ 
     array_push($_SESSION['members']['member'.$i]['membergames'],$_POST[('game'.$j.'_member'.$i)]??"");
         print_r($_SESSION);
}} -->
<?php
if ($_POST) print_r($_POST); ?>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <form method="post">
        <input type="checkbox" name="food[dinner][]" value="apple" />
        <input type="checkbox" name="food[dinner][]" value="pear" />
        <button>sumbit</button>
    </form>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>