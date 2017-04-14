<?php
$db = include('data/sql.php');
$session = include('data/session.php');
 ?>
<html>
<head>
  <noscript><meta http-equiv="refresh" content="0; url=noscript.html" /></noscript>
  <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
  <?php if ($_SERVER['REQUEST_METHOD'] != 'POST')
{
   echo "<img src=\"/doge405.png\" width=\"753.18\" height=\"500\" title=\"ERROR HTTP 405\" alt=\"405 Method Not Allowed\" />";
   http_response_code(405);
}
else {
  // Create connection
  $conn = new mysqli($db["server_host"], $db["username"], $db["password"], $db["database"]);

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  $stmt = $conn->stmt_init();
  if(!$stmt->prepare("SELECT * FROM ".$db["user_table"]." WHERE username = ?")) {
    die("ERROR : ".$stmt->error);
  }
  $stmt->bind_param("s",$_POST["user"]);
  $stmt->execute();
  $stmt->bind_result($id,$user,$hash,$point,$level);
  if($stmt->fetch() != NULL) {
    if(password_verify($_POST["pass"], $hash)) {
      $_SESSION['user_name'] = $_POST["user"];
      $_SESSION['user_id'] = $id;
      $_SESSION['user_level'] = $level;
      $stmt->close();
      echo "<script>window.location.replace('index.php');</script>";
      }
  }
  echo "<h1>Invalid username and/or password</h1>";
  echo "<script>window.setTimeout(function(){
    window.location.href = 'index.php';
  },3000)</script>";
  $stmt->close();
}?>

</body>
</html>
