  <?php
  $session = include('data/session.php');
  if($session['userid'] == NULL) {
    header('Location: login.php'); exit();
  }
  else {
    header('Location: /user/index.php'); exit();
  }
  ?>
