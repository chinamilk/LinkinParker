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

$navtitle = "�ṷ���ֵ�̨"; 
$metakeywords = "�ṷ���ֵ�̨";


include template('app/kuguofm');//���õ�ҳģ���ļ�


?>