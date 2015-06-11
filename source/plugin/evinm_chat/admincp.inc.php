<?php
/**
 *		作者：evin - 康盛产品工程师
 *		专注于Discuz产品，为站长提供优质的专业服务
 *
 *		版权所有：好团队 & evin
 *		QQ:414285898
 *		网站：http://www.wuzhuo.net
 *		申明：此插件非开源软件，您不得对插件源代码进行任何形式任何目的的再发布。
 *		====================================================================================
 *			  承接discuz插件、模板仿制定制业务，价格便宜交期快QQ414285898 || 电话13632811904/18688786880
 *		====================================================================================
 **/

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}


$url = 'http://wuzhuo.net/plugindev/index.php?charset='.CHARSET.'&identifier='.$plugin['identifier'];
$cont =  dfsockopen($url);
header("content-Type: text/html; charset=".CHARSET);
echo iconv ("GBK",CHARSET,$cont);


?>