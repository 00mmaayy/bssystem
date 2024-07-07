<?php
include('../conn/conn.php');
session_start();
if (!isset($_SESSION['username']))
{ $loc = 'Location: index.php?msg=requires_login ' . $_SESSION['username'];
  header($loc); }
$username=$_SESSION['username'];

?>