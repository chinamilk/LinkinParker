<?php


if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
$field = C::t('#xdep_boardbackground#bg_setting')->fetch_all_field();
$table = DB::table('bg_setting');
$sql='';
if (!$field['xrepeat']) {
	$sql .= "ALTER TABLE  ".$table." ADD `xrepeat` smallint(1) NOT NULL DEFAULT '0';\n";
}
if (!$field['yrepeat']) {
	$sql .= "ALTER TABLE  ".$table." ADD `yrepeat` smallint(1) NOT NULL DEFAULT '0';\n";
}
if (!$field['xcenter']) {
	$sql .= "ALTER TABLE  ".$table." ADD `xcenter` smallint(1) NOT NULL DEFAULT '0';\n";
}
if (!$field['posts']) {
	$sql .= "ALTER TABLE  ".$table." ADD `posts` smallint(1) NOT NULL DEFAULT '0';\n";
}
if (!$field['fixed']) {
	$sql .= "ALTER TABLE  ".$table." ADD `fixed` smallint(1) NOT NULL DEFAULT '0';\n";
}
if ($sql) {
	DB::query($sql);
}
$sql = <<<EOF
CREATE TABLE IF Not Exists `cdb_gbg_setting`(
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `fid` int(6) NOT NULL,
  `imgurl` varchar(255) DEFAULT NULL,
  `color` varchar(7) DEFAULT NULL,
  `xrepeat` smallint(1) NOT NULL DEFAULT '0',
  `yrepeat` smallint(1) NOT NULL DEFAULT '0',
  `xcenter` smallint(1) NOT NULL DEFAULT '0',
  `posts` smallint(1) NOT NULL DEFAULT '0',
  `fixed` smallint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;

EOF;
if ($sql) {
	runquery($sql);
}
$field = C::t('#xdep_boardbackground#gbg_setting')->fetch_all_field();
$table = DB::table('gbg_setting');
$sql='';
if (!$field['xrepeat']) {
	$sql .= "ALTER TABLE  ".$table." ADD `xrepeat` smallint(1) NOT NULL DEFAULT '0';\n";
}
if (!$field['yrepeat']) {
	$sql .= "ALTER TABLE  ".$table." ADD `yrepeat` smallint(1) NOT NULL DEFAULT '0';\n";
}
if (!$field['xcenter']) {
	$sql .= "ALTER TABLE  ".$table." ADD `xcenter` smallint(1) NOT NULL DEFAULT '0';\n";
}
if (!$field['posts']) {
	$sql .= "ALTER TABLE  ".$table." ADD `posts` smallint(1) NOT NULL DEFAULT '0';\n";
}
if (!$field['fixed']) {
	$sql .= "ALTER TABLE  ".$table." ADD `fixed` smallint(1) NOT NULL DEFAULT '0';\n";
}
if ($sql) {
	//runquery($sql);
	DB::query($sql);
}
updatecache('setting');
$finish = TRUE;
?>