<?php
$RootDir = $_SERVER['DOCUMENT_ROOT']; 
require ($RootDir.'/source/class/class_core.php');
$discuz = C::app();
$discuz->init();
	global $_G;
	$queryString = $_POST['queryString']; 
	if(strlen($queryString) >0) {
	
		$sql= "SELECT * FROM " . DB::table('forum_thread') . " WHERE subject LIKE '%".$queryString."%' Order By displayorder ASC, replies DESC LIMIT 10";
		$query = mysql_query($sql);
		while ($result = mysql_fetch_array($query,MYSQL_BOTH)){
			$value=$result['subject'];
			$valuetitle = str_replace($queryString,"<b><span id='ajfont'>".$queryString."</span></b>",$value);
			echo '<li onClick="fill(\''.$value.'\');">'.$valuetitle.'</li>';
		}
	} 	

?> 