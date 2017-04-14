<?php
$session = include('../data/session.php');
 ?>
 <!DOCTYPE HTML>
 <html>
 <head>
   <?php
   if($session['userid'] == NULL) {
     header('Location: ../index.php'); exit();
   }
   ?>
   <link rel="stylesheet" type="text/css" href="../main.css">
 </head>
 <body>
<?php
echo $session['id']."<br />";
echo $session['username']."<br />";
echo $session['userid']."<br />";
echo $session['level']."<br />";
 ?>
 <form action="../logout.php" method="get">
   <input class="button" type="submit" value="Logout">
 </form>
 </body>
 </html>
