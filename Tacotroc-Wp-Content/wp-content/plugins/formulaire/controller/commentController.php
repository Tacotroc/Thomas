<?php
error_reporting(-1);
ini_set('display_errors', 'On');

//require_once($_SERVER['DOCUMENT_ROOT'].'/wp-content/plugins/formulaire/entity/wor6872_Comments.php');

class commentController {

  public static function readComments(){

    return wor6872_Comments::getAllComments();

}

public static function readComments(){

  return wor6872_Comments::getAllCommentsById();

}

}
