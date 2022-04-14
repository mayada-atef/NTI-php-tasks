<?php
session_start();
function clubTable()
{

   // print_r($_SESSION);
   $table = " <table class='table'><thead class='table-dark'>
         <tr>
            <th >Subscriber</th>
            <th>" . $_SESSION['memberName'] . "</th>
         </tr>
      </thead>
      <tbody>";
   $totalgames = 0;
   $culbGames = ['football' => 0, 'swimming' => 0, 'vollyball' => 0, 'others' => 0];
   for ($i = 1; $i <= $_SESSION['membersCount']; $i++) {
      $totalPriceOfMemberGames = 0;
      $table .= "<tr>
            <th>" . $_SESSION['members']['member' . $i]['subscriberName'] . "</th>";
      if (!empty($_SESSION['members']['member' . $i]['subscriberGames'])) {
         foreach ($_SESSION['members']['member' . $i]['subscriberGames'] ?? "" as $key => $value) {
            if ($key == 'football') $culbGames[$key]++;
            elseif ($key == 'swimming') $culbGames[$key]++;
            elseif ($key == 'vollyball') $culbGames[$key]++;
            elseif ($key == 'others') $culbGames[$key]++;
            $totalPriceOfMemberGames += $value;
            $table .=  "<td>" . $key ?? "" . "</td>";
         }
      }
      $table .= "<td>" . $totalPriceOfMemberGames . "&nbsp; EGP</td>
            </tr>";
      $totalgames += $totalPriceOfMemberGames;
   }
   $table .= "<tfoot class='table-dark'><tr>
               <th colspan='5'>Total</th>
               <td>" . $totalgames . "&nbsp; EGP</td>
         
               
            </tr></tfoot>

      </tbody>";
   $table .= " 
   <table class='table table-striped table-dark'>
   <tr> <h2 class='text-center '>S&nbsp;&nbsp;P&nbsp;&nbsp;O&nbsp;&nbsp;R&nbsp;&nbsp;T&nbsp;&nbsp;S</h2></tr>";
   foreach ($_SESSION['games'] as $key => $value) {
      $table .= " 
               <tr>
                  <th colspan='5'>" . $key . "</th>
                   <td>" . $value * $culbGames[$key] . '&nbsp;EGP' . "</td>
               </tr>";
   }
   $subscribtion = 10000 + $_SESSION['membersCount'] * 2500;
   $table .= "<tr><th colspan='5'>subscribtion</th> <td>" . $subscribtion . "</td> 
   </tr> <tr><th colspan='5'>totalPrice</th><td>" . $subscribtion + $totalgames . "</td> </tr> 
   </table>";

   return $table;
} ?>







<!doctype html>
<html lang="en">

<head>
   <title>result</title>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
   <section class="container my-3">

      <?= clubTable() ?? "" ?>


   </section>


   <!-- Optional JavaScript -->
   <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>