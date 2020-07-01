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

		$_SESSION['postdata']=null;
		if($k)
		{
			$_SESSION['admin']=$k;
			echo '<meta http-equiv="refresh" content="0">';
		}
		else 
		{
			$aderr="Неверный имя пользователя или пароль";
			include('./view/vvoiti.php');
		}
		
	}
	
	else  

	if(isset($_SESSION['admin']))
	{
		include('madmin.php');
	}
	else 
	{
		include('./view/vvoiti.php');
	}
	
	
	if((isset($_SESSION['admin']))&&(isset($_SESSION['getdata']['vyi']))&&(strlen($_SESSION['getdata']['vyi'])>0))
	{
		$_SESSION['admin']=null;
		echo  '<meta http-equiv="refresh" content="0">';
	}
?>