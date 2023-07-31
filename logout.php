<?php
session_start();

unset($_SESSION['username']);
unset($_SESSION['pass']);

session_destroy();

?>

<script>
window.location = "landing.html";
</script>