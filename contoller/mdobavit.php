<?php
require_once('classes.php');
require_once('./config.php');

$ct=new bazovyi();
$ct->conn($dbhostname,$dbport, $dbusername, $dbpassword,$dbdatabase);

if((isset($_SESSION['postdata']['name']))&&(isset($_SESSION['postdata']['email']))&&
(strlen($_SESSION['postdata']['name'])>0)&&(strlen($_SESSION['postdata']['email'])>0))
{
$p[0]=$_SESSION['postdata']['name'];
$p[1]=$_SESSION['postdata']['email'];
$p[2]=htmlspecialchars ($_SESSION['postdata']['text']);
$k=$ct->dob_zadach($p);

$_SESSION['postdata']=null;
if($k==true) $resul="Задача успешно добавлено!"; else $resul="Что то пошло не так";

}


?>	