<?php

$route = $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire';
require_once($route.'/controller/brandController.php');
require_once($route.'/entity/wor6872_Comments.php');
require_once($route.'/entity/twp_User.php');
require_once($route.'/model/model.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../Css/myAccount.css">
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway" />


        <!--inclusion of navbar-->
    <?php require('myAccount.php')?>

 <title>Mon-compte</title>
</head>
   <body>
     <h2>Mes commentaires </h2>

<?php $articles = wor6872_Comments::getAllCommentsById(unserialize($_SESSION['User'])->getId()); foreach ($articles as $article): ?>
  <div id="myColor2">
      <article>

    <z2>

   <p><strong>Pseudo: </strong><?php echo $article->comment_author ?></p>
         <p><strong>emis le:</strong> <?php echo $article->comment_date?></p>
     <p><strong><?php echo $article->comment_content?></strong></p>  </z2> <br>


  </article>

</div>
  <?php endforeach ?>




   </body>
</html>
