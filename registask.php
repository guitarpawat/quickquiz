<?php
$config = include('data/config.php');
$db = include('data/sql.php');
$session = include('data/session.php');
 ?>
<html>
<head>
  <noscript><meta http-equiv="refresh" content="0; url=noscript.html" /></noscript>
  <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
  <?php if ($_SERVER['REQUEST_METHOD'] != 'POST' || !$config['regis_open'])
{
   echo "<img src=\"/doge405.png\" width=\"753.18\" height=\"500\" title=\"ERROR HTTP 405\" alt=\"405 Method Not Allowed\" />";
   http_response_code(405);
}
else {
  if($_POST["pass"] !== $_POST["retype"] || $_POST["pass"] === "" || $_POST["user"] === "") {
    die("ERROR : Input Data Invalid.");
  }
  else {
    // Create connection
    $conn = new mysqli($db["server_host"], $db["username"], $db["password"], $db["database"]);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $stmt = $conn->stmt_init();
    if(!$stmt->prepare("SELECT COUNT(*) FROM ".$db["user_table"]." WHERE username = ?")) {
      die("ERROR : ".$stmt->error);
    }
    $stmt->bind_param("s",$_POST["user"]);
    $stmt->execute();
    $userdata == NULL;
    $stmt->bind_result($userdata);
    $stmt->fetch();
    $stmt->close();
    if($userdata > 0) {
      echo "<h1>Username already exist.</h1>";
      echo "<script>window.setTimeout(function(){
        window.location.href = 'regis.php';
      },3000)</script>";
    }
    else {
      $hash = password_hash($_POST['pass'], PASSWORD_DEFAULT);
      $stmt = $conn->stmt_init();
      if(!$stmt->prepare("INSERT INTO ".$db["user_table"]." (`username`, `hash`) VALUES (?, ?)")) {
        die("ERROR : ".$stmt->error);
      }
      $stmt->bind_param("ss",$_POST["user"],$hash);
      $stmt->execute();
      $stmt->close();
      $stmt = $conn->stmt_init();
      if(!$stmt->prepare("SELECT id, status FROM ".$db["user_table"]." WHERE username = ?")) {
        die("ERROR : ".$stmt->error);
      }
      $stmt->bind_param("s",$_POST["user"]);
      $stmt->execute();
      $stmt->bind_result($user,$level);
      $stmt->fetch();
      $_SESSION['user_name'] = $_POST["user"];
      $_SESSION['user_id'] = $user;
      $_SESSION['user_level'] = $level;
      $stmt->close();
      echo "<h1>Registered Successful</h1>";
      echo "<script>window.setTimeout(function(){
        window.location.href = 'index.php';
      },3000)</script>";
    }
}}?>

</body>
</html>
