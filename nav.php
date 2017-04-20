<?php
$session = include('data/session.php');
if($session['userid'] == NULL) {
  echo "<h1>You have no permission to access this page.</h1>";
  exit();
}
if($session['level'] >= 0) {
  echo "<div id='nav'>";
  echo "<ul>";
  if($session['level'] >= 1) {
    echo "<li>
    Quizzes
    <ul>
    <li>Open Quiz</li>
    <li>Your History</li>
    </ul>
    </li>";
  }
  if($session['level'] >= 3) {
    echo "<li>";
    echo "Manage Quiz
    <ul>
    <li>New Quiz</li>
    <li>Your Quizzes</li>";
    if($session['level'] >= 5) {
      echo "<li>All Quizzes</li>";
    }
    echo "</ul>";
    echo "</li>";
  }
  if($session['level'] >= 7) {
    echo "<li>";
    echo "Admin
    <ul>
    <li>Users</li>";
    if($session['level'] >= 9) {
      echo "<li>System</li>";
    }
    echo "</ul>";
    echo "</li>";
  }
  echo "<li id='right'>";
  echo $session['username'];
  echo "<ul>
  <li>Profile</li>
  <li>Logout</li>
  </ul>";
  echo "</li>";
  echo "</ul>";
  echo "</div>";
}
 ?>
