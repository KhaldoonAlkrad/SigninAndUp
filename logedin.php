<?php
session_start();

echo 'login is succeeded!<br> Your are in your profile <br>';

$_SESSION["favcolor"]="green";


echo "Your color is: ".$_SESSION["favcolor"]." using session";
?>
