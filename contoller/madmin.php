<?php
	require_once('classes.php');
	require_once('./config.php');


	$ct=new bazovyi();
	$ct->conn($dbhostname,$dbport, $dbusername, $dbpassword,$dbdatabase);


	if(isset($_SESSION['admin']))
	{
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

		if(isset($_SESSION['postdata']['setch']))
		{
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

	include('./view/vadmin.php')

?>