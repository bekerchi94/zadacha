<?php
	
class bazovyi{
		
		private $con;
		
		function conn($dbhostname,$dbport, $dbusername, $dbpassword,$dbdatabase){
								try {
										$db = new PDO("mysql:host=$dbhostname;dbname=$dbdatabase;port=$dbport", $dbusername, $dbpassword);
										$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
										$db->exec("set names utf8");
										$this->$con=$db;
									}
									catch(PDOException $e) 
									{
										echo $e->getMessage();
									}		
									
							   }  
	          
		function zadachi($rid,$pg)
		 {
			 
			$klaray=array();
			if($rid==0) {
							$qy='SELECT * FROM `zadacha` ORDER by `name`';	
						};
			if($rid==1) {
							$qy='SELECT * FROM `zadacha` ORDER by `email`';	
						};
			if($rid==2) {
							$qy='SELECT * FROM `zadacha` ORDER by `status`';	
						};
			if($rid==3) {
							$qy='SELECT * FROM `zadacha` ORDER by `name` DESC';	
						};
			if($rid==4) {
							$qy='SELECT * FROM `zadacha` ORDER by `email` DESC';	
						};
			if($rid==5) {
							$qy='SELECT * FROM `zadacha` ORDER by `status` DESC';	
						};						
			if($pg==0) $pg=1;	
							$result=$this->$con->query($qy);
							if ($result) { 
											$i=0;
										  while ($row =$result->fetch(PDO::FETCH_NUM)) 
										   {
											if(((($pg*3)-1)==$i)||((($pg*3)-3)==$i)||((($pg*3)-2)==$i))
											{
											$rowaray=array();
											 $rowaray[]=$row[0];
											  $rowaray[]=$row[1];
											 $rowaray[]=$row[2];
											 $rowaray[]=$row[3];
											 $rowaray[]=$row[4];
											 $rowaray[]=$row[5];
 											 $klaray[]=$rowaray;
											}
											$i+=1;
										   }
										 }
										 
					return $klaray;
		 }
		 
		 function get_count()
		 {
			 $qy='SELECT COUNT(`name`) FROM `zadacha`';
			 $result=$this->$con->query($qy);
			if ($result) {
				$row =$result->fetch(PDO::FETCH_NUM);
			}
			return $row[0];
		 }
		 
		 
		 function dob_zadach($rid)
		 {
			$qy='INSERT INTO `zadacha`(`name`,`email`,`text`) VALUES(?,?,?)';
			$res=$this->$con->prepare($qy);
			$res->execute($rid);
			return true;
		 }


		function user_get($rid)
		{
			$qy='SELECT `name` from `user` WHERE (`name`=?)AND(`pass`=?)';
			$res=$this->$con->prepare($qy);
			$result=$res->execute($rid);
			if ($result) {
				$row =$res->fetch(PDO::FETCH_NUM);
			}
			return $row[0];	
			
		}


		 function set_ch($rid)
		 {
			 $kt=array();
			 $kt[]=$rid;
			$qy='SELECT `status` from `zadacha` WHERE `id`=?';
			$res=$this->$con->prepare($qy);
			$result=$res->execute($kt);
			if ($result) {
				$row =$res->fetch(PDO::FETCH_NUM);
			}
			$k=$row[0];
			if($k==1) $k=0;
			else $k=1;
			$qy="UPDATE `zadacha` SET  `status`=$k WHERE `id`=?";
			$res=$this->$con->prepare($qy);
			$res->execute($kt);
			return true;
		 }


		 function ed_ch($rid)
		 {
			$qy="UPDATE `zadacha` SET  `text`=?, `ch`=1 WHERE `id`=?";
			$res=$this->$con->prepare($qy);
			$res->execute($rid);
			return true;
		 }


}

	
?>			