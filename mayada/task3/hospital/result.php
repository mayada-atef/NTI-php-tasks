<?php 
include_once "layouts/header.php";
$title="Result";
$total=0;
foreach($_SESSION['qAnswers'] AS $q =>$rate){
    if ($rate=='bad') $total+=0;
    if ($rate=='good') $total+=5;
    if ($rate=='very Good') $total+=7;
    if ($rate=='excellent') $total+=10;  }
if ($total>25) $result="<div class='bg-success text-light text-center h5 py-3'>thank you </div>";
else  $result="<div class='bg-danger text-light text-center h5 py-3'>we will call you later on phone number:{$_SESSION['phone']} </div>";
?>
 <form action="" method="post">
<section class="container ">
        <div class="col-12 text-warning text-center my-3 h2"><?= $title?></div>
        <div class="col-8 offset-2">
        <table class="table">
    <thead>
     <tr>
      <th>Question?</th>
       <th>review </th>
    </tr>
  </thead>
  <tbody>  
               <?Php foreach($_SESSION['Question?'] AS $index=> $question ){?>
                <tr>
                <td class="h6"><?=$question?></td> 
                <td><?=$_SESSION['qAnswers']["q$index"]?></td>
                </tr> 
                <?php }?>  

  </tbody>
</table>
</form> 
<?=$result??""?>  
 </div>
 
</section>
<?php include_once "layouts/footer.php";?>
