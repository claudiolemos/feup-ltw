<?php
  include_once(__DIR__."/../includes/init.php");
  include_once(__DIR__."/../database/comments.php");
  include_once(__DIR__."/../database/users.php");

  $username = $_SESSION['username'];
  $comment_id = $_POST['comment_id'];

  if(isset($username)){
    deleteComment($comment_id);
  }
?>
