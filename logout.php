<?php
session_start();
unset($_SESSION['name']);
if (!isset($_SESSION['name'])) 
{
	header("Location: index.php");
}
else
{
	echo "Seeion don't destroy";
}

?>