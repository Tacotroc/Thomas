
<?php $route = $_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire';
require_once($route.'/entity/universalFunction.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title>unviersalView</title>
</head>
<body>
  <!-- affichage pagination --->
  <?php
    if (!isset($_GET['start'])){
    $next = 1;
    }
  else{
    $next = $_GET['start'];
   }
   $suivant = $next + 1;
   $precedent = $next - 1;?>
   <div id="pagination">
   <?php  if($next==1){
      echo " ";
    }
    else {
      echo'<a href="'.$url.'&start='.$precedent.'" class="previous">&laquo; Previous</a>';
    }  ?>
                  <?php $numlinks= universalFunction::pagination($url,25);?>

  <?php if ($next==$numlinks) {
      echo " ";
  }
  else {
    echo'<a href="'.$url.'&start='.$suivant.'" class="next">Next &raquo;</a>';
  }?>
  </div>



</body>
</html>
