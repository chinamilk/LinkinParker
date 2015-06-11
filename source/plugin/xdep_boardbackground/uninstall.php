<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$sql = <<<EOF

DROP TABLE IF EXISTS `cdb_bg_setting`;
DROP TABLE IF EXISTS `cdb_gbg_setting`;
EOF;

runquery($sql);

$finish = TRUE;

?>