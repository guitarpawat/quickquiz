<!DOCTYPE HTML>
<?php $config = include('data/config.php');
$session = include('data/session.php');
?>
<html>
<head>
  <?php if($session['userid'] != NULL) {
    header('Location: index.php'); exit();
  }
  ?>
  <?php if(! $config['regis_open']) {
    header('Location: noregis.html'); exit();
  }
; ?>
  <noscript><meta http-equiv="refresh" content="0; url=noscript.html" /></noscript>
  <title><?php echo "Register :: ".$config['project_name'];?></title>
  <link rel="stylesheet" type="text/css" href="main.css">
  <style>
  #regis {
    background-color: rgba(28, 180, 221, 0.9);
    margin: auto;
    width: 210px;
    border: 3px solid rgba(28, 180, 221, 1);
    padding: 7px;
    text-align: center;
    font-family: sans-serif;
    font-weight: bold;
  }
  #regis p {
    color: white;
    font-size: 17.5px;
  }
  </style>
  <script>
    function chkpassword() {
      pass = document.getElementsByClassName('field');
      var show = document.getElementsByClassName('warning');
      if(pass[1].value !== pass[2].value){
        show[0].innerHTML = "Password Missmatch!";
        return false;
      }
      else if(pass[1].value === ""){
        show[0].innerHTML = "Please enter password!";
        return false;
      }
      else if(pass[0].value === ""){
        show[0].innerHTML = "Please enter username!";
        return false;
      }
      else return true;
    };
  </script>
</head>
<?php
if(session_id() == '' || !isset($_SESSION)) {
    session_start();
}
 ?>
<body>
  <h1>Register</h1>
  <div id="regis">
    <form onsubmit="return chkpassword();" action="registask.php" method="post">
      <p>Username</p>
      <input class="field" type="text" name="user" /><br />
      <p>Password</p>
      <input class="field" type="password" name="pass" /><br />
      <p>Retype</p>
      <input class="field" type="password" name="retype" /><br />
      <p class="warning">
      </p>
      <input class="button" type="submit" value="Register">
    </form>
    <br />
  </div>
  <p id="credit">
    Written by @GuitarPawat<br />
    Recommend to use on lastest version of Google Chrome or Microsoft Edge.
  </p>
</body>
</html>
