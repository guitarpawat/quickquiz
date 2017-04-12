<!DOCTYPE HTML>
<?php $config = include('data/config.php'); ?>
<html>
<head>
  <noscript><meta http-equiv="refresh" content="0; url=noscript.html" /></noscript>
  <title><?php echo "Login :: ".$config['project_name'];?></title>
  <link rel="stylesheet" type="text/css" href="main.css">
  <style>
  #login {
    background-color: rgba(28, 180, 221, 0.9);
    margin: auto;
    width: 210px;
    border: 3px solid rgba(28, 180, 221, 1);
    padding: 7px;
    text-align: center;
    font-family: sans-serif;
    font-weight: bold;
  }
  #login p {
    color: white;
    font-size: 17.5px;
  }
  </style>
</head>
<?php
if(session_id() == '' || !isset($_SESSION)) {
    session_start();
}
 ?>
<body>
  <h1><?php echo "Welcome to ".$config['project_name'];?></h1>
  <div id="login">
    <form action="gate.php" method="post">
      <p>Username</p>
      <input class="field" type="text" name="user" /><br />
      <p>Password</p>
      <input class="field" type="password" name="pass" /><br />
      <br />
      <input class="button" type="submit" value="Login">
    </form>
    <br />
    <form action="regis.php">
      <input class="button" type="submit" value="Register">
    </form>
  </div>
  <p id="credit">
    Written by @GuitarPawat<br />
    Recommend to use on lastest version of Google Chrome or Microsoft Edge.
  </p>
</body>
</html>
