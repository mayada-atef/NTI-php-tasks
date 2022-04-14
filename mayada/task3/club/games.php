<?php
session_start();
$_SESSION['games'] = [
  'football' => '300',
  'swimming' => '250',
  'vollyball' => '150',
  'others' => '100'
];

function gamestable()
{
  $games = '
    <h2 >' . $_SESSION['memberName'] . '</h2>';
  for ($i = 1; $i <= $_SESSION['membersCount']; $i++) {
    $games .= '
       <div class="form-group" >
            <label for="subscriberName" class="text-warning h4 mt-4">';
    $games .= 'Member' . $i;
    $games .= '</label>
            <input type="text" name="members[member' . $i . '][subscriberName]" value="" id="subscriberName" class="form-control"
            placeholder="enter subscriber Name">
       </div>';
    foreach ($_SESSION['games'] as $key => $value) {
      $games .= '<div class="form-check">
            <input class="form-check-input" type="checkbox" id="checkbox"
            name="members[member' . $i . '][subscriberGames][' . $key . ']" value="' . $value . '">
            <label class="form-check-label" for="checkbox">' .
        '&nbsp;&nbsp;' . $key . '&nbsp;&nbsp;' . $value . 'LE     
            </label>
        </div>';
    }
  }

  return $games;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $_SESSION['members'] = $_POST['members'];

  // print_r($_SESSION);
  header('location:result.php');
}
?>
<!doctype html>
<html lang="en">

<head>
  <title>games</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<section class="container ">
  <div class="col-12 h1 my-5 text-center text-warning">family subscribtion</div>
  <div class="col-8 offset-2">
    <form method="post">

      <?= gamestable() ?>

      <button class="btn btn-warning form-control mt-3"> Check Price </button>
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