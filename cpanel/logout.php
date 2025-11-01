<?php  session_start();
unset($_SESSION['token']);
unset($_SESSION['username']);
unset($_SESSION['typess']);
?>
<script>window.location="login.php";</script>