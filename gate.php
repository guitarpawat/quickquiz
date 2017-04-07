<html>
<head>
  <noscript><meta http-equiv="refresh" content="0; url=noscript.html" /></noscript>
  <link rel="stylesheet" type="text/css" href="main.css">
</head>
<?php
if(session_id() == '' || !isset($_SESSION)) {
    session_start();
}
 ?>
<body>
  <?php if ($_SERVER['REQUEST_METHOD'] != 'POST')
{
   echo "<img src=\"/doge405.png\" width=\"753.18\" height=\"500\" title=\"ERROR HTTP 405\" alt=\"405 Method Not Allowed\" />";
   http_response_code(405);
}
else {
echo $_POST["user"];
echo "<br />";
echo $_POST["pass"];
echo "<br />";
echo session_id();
$servername = "localhost";
$username = "guitarpa_qq";
$password = "ryos,njogs96z]";
echo "<br />";
$db = include('data/sql.php');
// Create connection
$conn = new mysqli($db["server_host"], $db["username"], $db["password"]);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
}?>

</body>
</html>
