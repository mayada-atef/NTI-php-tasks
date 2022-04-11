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
$errors=[];
if ($_SERVER["REQUEST_METHOD"]==='POST'){
    //   print_r($_POST);
    if (!$_POST || count($_POST)<5)  $error= "<div class='bg-danger text-center'>review  required</div>";
    else { 
        foreach($_POST AS $key => $rate){
            // if (empty($_POST[$key])) $errors[$key]="<div class='bg-danger text-center'>review of $key required</div>";
            $_SESSION['qAnswers'][$key]=$rate;
            header('location:result.php');
        }
    }
    
}
    
   
?>

<section class="container ">
    <div class="col-12 text-warning text-center my-5 h2"><?= $title?></div>
    <div class="col-8 offset-2">
        <form action="" method="post">
            <table class="table">
                <thead>
                    <tr>
                    <th>Question?</th>
                        <?php foreach($_SESSION['rate'] As $rate){ ?>
                                <td><?= $rate?></td>
                        <?php }?> 
                    </tr>
                </thead>
                <tbody>
                    <?Php foreach($_SESSION['Question?'] AS $index=> $question ){?>
                        <tr>
                            <td class="h6"><?=$question?></td>   
                            <?php foreach($_SESSION['rate'] As $rate){ ?>
                            <td> 
                            <input type="radio" class="form-check-input " 
                            name="<?="q$index"?>" value="<?=$rate??""?>">
                            
                            </td>
                            <?= (!empty($errors["q$index"]))?$error["q$index"]:"" ?>
                            <?php }?>  
                        </tr>
                    <?php }?>
                </tbody>
            </table>
            <?= $error??"" ?>
            <button class="btn btn-warning form-control" type="submit"> Result</button>
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