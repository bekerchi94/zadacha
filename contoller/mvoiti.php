<?php
require_once('classes.php');
require_once('./config.php');

$ct=new bazovyi();
$ct->conn($dbhostname,$dbport, $dbusername, $dbpassword,$dbdatabase);



if((isset($_SESSION['postdata']['adname']))&&(isset($_SESSION['postdata']['adpass']))&&
(strlen($_SESSION['postdata']['adname'])>0)&&(strlen($_SESSION['postdata']['adpass'])>0))
{
$p[0]=$_SESSION['postdata']['adname'];
$p[1]=$_SESSION['postdata']['adpass'];


$k=$ct->user_get($p);
$_SESSION['admin']=$k;
$_SESSION['postdata']=null;
if($k)
$aderr="";
else $aderr="Неверный имя пользователя или пароль";



}

if((isset($_SESSION['getdata']['vyi']))&&(strlen($_SESSION['getdata']['vyi'])>0))
{
	$_SESSION['admin']=null;
}

if(isset($_SESSION['admin'])){
$pg=1;
if(isset($_SESSION['getdata']['page']))
$pg=$_SESSION['getdata']['page'];
$p=0;	
if(isset($_SESSION['getdata']['sort'])) $p=$_SESSION['getdata']['sort'];

$spisok_c=$ct->get_count();
while($spisok_c % 3 >0)
	$spisok_c+=1;
$spisok_c=intdiv($spisok_c,3);


$spisok=array();
$spisok=$ct->zadachi($p,$pg);

if(isset($_SESSION['postdata']['setch'])){
	$k=$ct->set_ch($_SESSION['postdata']['setch']);
}


if((isset($_SESSION['postdata']['setid']))&&(isset($_SESSION['postdata']['settext']))&&
(strlen($_SESSION['postdata']['setid'])>0))
{
	$pr=array();
	$pr[]=$_SESSION['postdata']['settext'];
	$pr[]=$_SESSION['postdata']['setid'];
	$k=$ct->ed_ch($pr);	
	echo '<input type="hidden" id="res" value="ok"/>';
}



}





?>