<?php 
include_once "layouts/header.php";
$title="Result";

// if ($_SERVER["REQUEST_METHOD"]==='POST'){
// foreach($_SESSION[] AS $key => $rate){
//    $_SESSION['qAnswers'][$key]=$rate;
// }
// }
?>
 <form action="" method="post">
<section class="container ">
        <div class="col-12 text-warning text-center my-5 h2"><?= $title?></div>
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
                <?php }?>
                <?Php foreach($_POST AS $q=> $rate ){?>  
                <td><?=$rate?></td> 
                 <?php }?>
                 </tr> 
                
           
  </tbody>
</table>
</form>   
         
    
        </div>
</section>
<?php include_once "layouts/footer.php";?>
