<?php
	require_once('classes.php');
	require_once('./config.php');

	$ct=new bazovyi();
	$ct->conn($dbhostname,$dbport, $dbusername, $dbpassword,$dbdatabase);

	$pg=1;
	if(isset($_SESSION['getdata']['page']))
	{
		$pg=$_SESSION['getdata']['page'];
	}
	
	$p=0;	
	if(isset($_SESSION['getdata']['sort']))
	{
		$p=$_SESSION['getdata']['sort'];
	}
	
	$spisok_c=$ct->get_count();
	
	while($spisok_c % 3 >0)
	{
		$spisok_c+=1;
	}
	
	$spisok_c=intdiv($spisok_c,3);


	$spisok=array();
	$spisok=$ct->zadachi($p,$pg);

	include('./view/vspisok_zadach.php')

?>	