<?php
/** 防止非法引用 */
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$sql = <<<EOF
CREATE TABLE IF NOT EXISTS `pre_iwenwen_backflow` (
`tid` INT NOT NULL ,
`pid` INT NOT NULL ,
`status` TINYINT( 1 ) NOT NULL ,
`qid` INT UNSIGNED NOT NULL ,
`answerid` INT UNSIGNED NOT NULL ,
`sync_time` INT NOT NULL,
PRIMARY KEY ( `tid` , `pid` ) ,
INDEX ( `qid` , `answerid` )
) ENGINE = MYISAM ;
CREATE TABLE IF NOT EXISTS `pre_iwenwen_answers` (
`date` CHAR( 8 ) NOT NULL ,
`post_num` INT( 11 ) NOT NULL default 0,
PRIMARY KEY (  `date` )
) ENGINE = MYISAM ;	
EOF;
$tablepre = $_G['config']['db'][1]['tablepre'];
$i = 5; //建表语句若不成功，重试5次，
do{
	runquery($sql);
	$i--;		
	$hastable = DB::fetch_first("show tables like '".$tablepre."iwenwen_backflow'");
	if($hastable){
		$hastable = DB::fetch_first("show tables like '".$tablepre."iwenwen_answers'");
	}
}while(empty($hastable) && $i>0);

$finish = TRUE;