<?php

if($_GET['name']==='vadim')
{
	session_start();
}
	echo session_id()?session_id():"netyti";
if (!isset($_SESSION['time'])) {
    $_SESSION['time'] = date("H:i:s");
}
echo "<br>";
echo $_SESSION['time'];
echo "675675";
echo "<pre>";
print_r($_SERVER);
echo "</pre>";