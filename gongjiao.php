<?php

/**
 *  Author: Feng 
 *	Web:bbs.weixiaoduo.com
 *  QQ:529048212
 */

require './source/class/class_core.php';//����ϵͳ�����ļ�

$discuz = & discuz_core::instance();//���´���Ϊ��������ʼ������

$discuz->cachelist = $cachelist;

$discuz->init();

$navtitle = "����վ��·�߲�ѯ"; 
$metakeywords = "����վ��·�߲�ѯ";


include template('app/gongjiao');//���õ�ҳģ���ļ�


?>