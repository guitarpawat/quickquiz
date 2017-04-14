<?php
session_start();
if($_SESSION['user_id'] == NULL) {
    $_SESSION['user_id'] = NULL;
    $_SESSION['user_name'] = NULL;
    $_SESSION['user_level'] = 0;
}
return array(
  'id' => session_id(),
  'username' => $_SESSION['user_name'],
  'userid' => $_SESSION['user_id'],
  'level' => $_SESSION['user_level']
);
 ?>
