<?php 
include_once "layouts/header.php";
$title="Review";
unset($_SESSION['qAnswers']);
$_SESSION['Question?']=[
    'Are you satisfied with the level of cleanliness?',
     'Are you satisfied with the service prices?',
      'Are you satisfied with the nursing service',
       'Are you satisfied with the level of the doctor?',
        'Are you satisfied with the calmness in the hospital?',
];
$_SESSION['rate']=['bad','good','very Good','excellent'];
if ($_SERVER["REQUEST_METHOD"]==='POST'){
foreach($_POST AS $key => $rate){
   $_SESSION['qAnswers'][$key]=$rate;
}
header('location:result.php');
}
?>
 <form action="" method="post">
<section class="container ">
        <div class="col-12 text-warning text-center my-5 h2"><?= $title?></div>
        <div class="col-8 offset-2">
        <table class="table">
    <thead>
     <tr>
      <th>Question?</th>
         <?php foreach($_SESSION['rate'] As $rate){ ?>
                <td > 
                 <?= $rate?>
                </td>
        <?php }?> 
    </tr>
  </thead>
  <tbody>
         <?Php foreach($_SESSION['Question?'] AS $index=> $question ){?>
            <tr>
                <td class="h6"><?=$question?></td>   
                <?php foreach($_SESSION['rate'] As $rate){ ?>
                <td > 
                <input type="radio" class="form-check-input "  name="<?="q".$index??""?>" value="<?=$rate??""?>">
                </td>
                 <?php }?>  
             </tr>
      
             
        <?php }?>
  </tbody>
</table>
<button class="btn btn-warning form-control"> Result</button>
</form>   
         
    
        </div>
</section>
<?php include_once "layouts/footer.php";?>
<!-- // $_SESSION['Question?']=[
//     'Are you satisfied with the level of cleanliness?'=>'',
//      'Are you satisfied with the service prices?'=>'',
//       'Are you satisfied with the nursing service'=>'',
//        'Are you satisfied with the level of the doctor?'=>'',
//         'Are you satisfied with the calmness in the hospital?'=>'',
// ]; -->