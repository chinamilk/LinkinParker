<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('discuz');
0
|| checktplrefresh('data/diy/./template/tqun//forum/discuz.htm', './template/tqun/common/header.htm', 1380680010, 'diy', './data/template/13_diy_forum_discuz.tpl.php', 'data/diy/./template/tqun/', 'forum/discuz')
|| checktplrefresh('data/diy/./template/tqun//forum/discuz.htm', './template/tqun/common/footer.htm', 1380680010, 'diy', './data/template/13_diy_forum_discuz.tpl.php', 'data/diy/./template/tqun/', 'forum/discuz')
|| checktplrefresh('data/diy/./template/tqun//forum/discuz.htm', './template/tqun/common/header_common.htm', 1380680010, 'diy', './data/template/13_diy_forum_discuz.tpl.php', 'data/diy/./template/tqun/', 'forum/discuz')
|| checktplrefresh('data/diy/./template/tqun//forum/discuz.htm', './template/tqun/common/pubsearchform.htm', 1380680010, 'diy', './data/template/13_diy_forum_discuz.tpl.php', 'data/diy/./template/tqun/', 'forum/discuz')
;
block_get('680,681,682,849,850,678,679,956');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
        <script src="template/tqun/js/jquery-1.7.2.js" type="text/javascript"></script>
        <script src="template/tqun/js/jquery.bxSlider.min.js" type="text/javascript"></script>
        <script src="template/tqun/js/tqun.js" type="text/javascript"></script>
        <script>window.onerror=function(){return true;};</script>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET;?>" />
<?php if($_G['config']['output']['iecompatible']) { ?><meta http-equiv="X-UA-Compatible" content="IE=EmulateIE<?php echo $_G['config']['output']['iecompatible'];?>" /><?php } ?>
<title><?php if(!empty($navtitle)) { ?><?php echo $navtitle;?> - <?php } if(empty($nobbname)) { ?> <?php echo $_G['setting']['bbname'];?> - <?php } ?> 世界上最大的LP中文社区!</title>
<?php echo $_G['setting']['seohead'];?>

<meta name="keywords" content="<?php if(!empty($metakeywords)) { echo dhtmlspecialchars($metakeywords); } ?>" />
<meta name="description" content="<?php if(!empty($metadescription)) { echo dhtmlspecialchars($metadescription); ?> <?php } if(empty($nobbname)) { ?>,<?php echo $_G['setting']['bbname'];?><?php } ?>" />
<meta name="generator" content="Discuz! <?php echo $_G['setting']['version'];?>" />
<meta name="author" content="Discuz! Team and Comsenz UI Team" />
<meta name="copyright" content="2001-2012 Comsenz Inc." />
<meta name="MSSmartTagsPreventParsing" content="True" />
<meta http-equiv="MSThemeCompatible" content="Yes" />
<base href="<?php echo $_G['siteurl'];?>" /><link rel="stylesheet" type="text/css" href="data/cache/style_<?php echo STYLEID;?>_common.css?<?php echo VERHASH;?>" /><link rel="stylesheet" type="text/css" href="data/cache/style_<?php echo STYLEID;?>_forum_index.css?<?php echo VERHASH;?>" /><?php if($_G['uid'] && isset($_G['cookie']['extstyle']) && strpos($_G['cookie']['extstyle'], TPLDIR) !== false) { ?><link rel="stylesheet" id="css_extstyle" type="text/css" href="<?php echo $_G['cookie']['extstyle'];?>/style.css" /><?php } elseif($_G['style']['defaultextstyle']) { ?><link rel="stylesheet" id="css_extstyle" type="text/css" href="<?php echo $_G['style']['defaultextstyle'];?>/style.css" /><?php } ?><script type="text/javascript">var STYLEID = '<?php echo STYLEID;?>', STATICURL = '<?php echo STATICURL;?>', IMGDIR = '<?php echo IMGDIR;?>', VERHASH = '<?php echo VERHASH;?>', charset = '<?php echo CHARSET;?>', discuz_uid = '<?php echo $_G['uid'];?>', cookiepre = '<?php echo $_G['config']['cookie']['cookiepre'];?>', cookiedomain = '<?php echo $_G['config']['cookie']['cookiedomain'];?>', cookiepath = '<?php echo $_G['config']['cookie']['cookiepath'];?>', showusercard = '<?php echo $_G['setting']['showusercard'];?>', attackevasive = '<?php echo $_G['config']['security']['attackevasive'];?>', disallowfloat = '<?php echo $_G['setting']['disallowfloat'];?>', creditnotice = '<?php if($_G['setting']['creditnotice']) { ?><?php echo $_G['setting']['creditnames'];?><?php } ?>', defaultstyle = '<?php echo $_G['style']['defaultextstyle'];?>', REPORTURL = '<?php echo $_G['currenturl_encode'];?>', SITEURL = '<?php echo $_G['siteurl'];?>', JSPATH = '<?php echo $_G['setting']['jspath'];?>';</script>
<script src="<?php echo $_G['setting']['jspath'];?>common.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<?php if(empty($_GET['diy'])) { ?><?php $_GET['diy'] = '';?><?php } if(!isset($topic)) { ?><?php $topic = array();?><?php } ?>
        <link rel="stylesheet" type="text/css" href="template/tqun/image/jd_common.css" />
        <!--[if lt IE 7]>
        <script src="template/tqun/js/ie6png.js" type="text/javascript"></script>         
        <![endif]-->
        <!--[if IE 6]>
         <script src="template/tqun/js/png_belated.js" type="text/javascript"></script>
         <script type="text/javascript"> DD_belatedPNG.fix('.bx-prev,.bx-next,.logo img');</script>
        <![endif]-->


        

<meta name="application-name" content="<?php echo $_G['setting']['bbname'];?>" />

<meta name="msapplication-tooltip" content="<?php echo $_G['setting']['bbname'];?>" />

<?php if($_G['setting']['portalstatus']) { ?><meta name="msapplication-task" content="name=<?php echo $_G['setting']['navs']['1']['navname'];?>;action-uri=<?php echo !empty($_G['setting']['domain']['app']['portal']) ? 'http://'.$_G['setting']['domain']['app']['portal'] : $_G['siteurl'].'portal.php'; ?>;icon-uri=<?php echo $_G['siteurl'];?><?php echo IMGDIR;?>/portal.ico" /><?php } ?>

<meta name="msapplication-task" content="name=<?php echo $_G['setting']['navs']['2']['navname'];?>;action-uri=<?php echo !empty($_G['setting']['domain']['app']['forum']) ? 'http://'.$_G['setting']['domain']['app']['forum'] : $_G['siteurl'].'forum.php'; ?>;icon-uri=<?php echo $_G['siteurl'];?><?php echo IMGDIR;?>/bbs.ico" />

<?php if($_G['setting']['groupstatus']) { ?><meta name="msapplication-task" content="name=<?php echo $_G['setting']['navs']['3']['navname'];?>;action-uri=<?php echo !empty($_G['setting']['domain']['app']['group']) ? 'http://'.$_G['setting']['domain']['app']['group'] : $_G['siteurl'].'group.php'; ?>;icon-uri=<?php echo $_G['siteurl'];?><?php echo IMGDIR;?>/group.ico" /><?php } if(helper_access::check_module('feed')) { ?><meta name="msapplication-task" content="name=<?php echo $_G['setting']['navs']['4']['navname'];?>;action-uri=<?php echo !empty($_G['setting']['domain']['app']['home']) ? 'http://'.$_G['setting']['domain']['app']['home'] : $_G['siteurl'].'home.php'; ?>;icon-uri=<?php echo $_G['siteurl'];?><?php echo IMGDIR;?>/home.ico" /><?php } if($_G['basescript'] == 'forum' && $_G['setting']['archiver']) { ?>

<link rel="archives" title="<?php echo $_G['setting']['bbname'];?>" href="<?php echo $_G['siteurl'];?>archiver/" />

<?php } if(!empty($rsshead)) { ?><?php echo $rsshead;?><?php } if($_G['basescript'] == 'forum' || $_G['basescript'] == 'group') { ?>

<script src="<?php echo $_G['setting']['jspath'];?>forum.js?<?php echo VERHASH;?>" type="text/javascript"></script>

<?php } elseif($_G['basescript'] == 'home' || $_G['basescript'] == 'userapp') { ?>

<script src="<?php echo $_G['setting']['jspath'];?>home.js?<?php echo VERHASH;?>" type="text/javascript"></script>

<?php } elseif($_G['basescript'] == 'portal') { ?>

<script src="<?php echo $_G['setting']['jspath'];?>portal.js?<?php echo VERHASH;?>" type="text/javascript"></script>

<?php } if($_G['basescript'] != 'portal' && $_GET['diy'] == 'yes' && check_diy_perm($topic)) { ?>

<script src="<?php echo $_G['setting']['jspath'];?>portal.js?<?php echo VERHASH;?>" type="text/javascript"></script>

<?php } if($_GET['diy'] == 'yes' && check_diy_perm($topic)) { ?>

<link rel="stylesheet" type="text/css" id="diy_common" href="data/cache/style_<?php echo STYLEID;?>_css_diy.css?<?php echo VERHASH;?>" />

<?php } ?>



<!--[if lt IE 7]>

       <script src="<?php echo STATICURL;?>../js/ie6png.js" type="text/javascript"></script>         

<![endif]-->



</head>



<body id="nv_<?php echo $_G['basescript'];?>" class="pg_<?php echo CURMODULE;?><?php if($_G['basescript'] === 'portal' && CURMODULE === 'list' && !empty($cat)) { ?> <?php echo $cat['bodycss'];?><?php } ?>" onkeydown="if(event.keyCode==27) return false;">

    <div id="append_parent"></div><div id="ajaxwaitid"></div>

    <?php if($_GET['diy'] == 'yes' && check_diy_perm($topic)) { ?>

    <?php include template('common/header_diy'); ?>    <?php } ?>

    <?php if(check_diy_perm($topic)) { ?>

    <?php
$__STATICURL = STATICURL;$diynav = <<<EOF


    <a id="diy-tg" href="javascript:openDiy();" title="打开 DIY 面板" class="xi1 xw1" onMouseMove="showMenu(this.id)"><img src="{$__STATICURL}image/diy/panel-toggle.png" alt="DIY" /></a>

    <div id="diy-tg_menu" style="display: none;">

        <ul>

            <li><a href="javascript:saveUserdata('diy_advance_mode', '');openDiy();" class="xi2">简洁模式</a></li>

            <li><a href="javascript:saveUserdata('diy_advance_mode', '1');openDiy();" class="xi2">高级模式</a></li>

        </ul>

    </div>

    
EOF;
?>

    <?php } ?>

    <?php if(CURMODULE == 'topic' && $topic && empty($topic['useheader']) && check_diy_perm($topic)) { ?>

    <?php echo $diynav;?>

    <?php } ?>

    <?php if(empty($topic) || $topic['useheader']) { ?>

    <?php if($_G['setting']['mobile']['allowmobile'] && (!$_G['setting']['cacheindexlife'] && !$_G['setting']['cachethreadon'] || $_G['uid']) && ($_GET['diy'] != 'yes' || !$_GET['inajax']) && ($_G['mobile'] != '' && $_G['cookie']['mobile'] == '' && $_GET['mobile'] != 'no')) { ?>

    <div class="xi1 bm bm_c">

        请选择 <a href="<?php echo $_G['siteurl'];?>forum.php?mobile=yes">进入手机版</a> <span class="xg1">|</span> <a href="<?php echo $_G['setting']['mobile']['nomobileurl'];?>">继续访问电脑版</a>

    </div>

    <?php } ?>



    <div id="toptb"><?php if(!empty($_G['setting']['pluginhooks']['global_cpnav_top'])) echo $_G['setting']['pluginhooks']['global_cpnav_top'];?><?php if(!empty($_G['setting']['pluginhooks']['global_cpnav_extra1'])) echo $_G['setting']['pluginhooks']['global_cpnav_extra1'];?><?php if(!empty($_G['setting']['pluginhooks']['global_cpnav_extra2'])) echo $_G['setting']['pluginhooks']['global_cpnav_extra2'];?></div>



    <?php echo adshow("headerbanner/wp a_h");?>    <div id="hd">

        <div class="wp">


            <div id="nv">

                <ul>

                    <?php if(is_array($_G['setting']['navs'])) foreach($_G['setting']['navs'] as $nav) { ?>                    <?php if($nav['available'] && (!$nav['level'] || ($nav['level'] == 1 && $_G['uid']) || ($nav['level'] == 2 && $_G['adminid'] > 0) || ($nav['level'] == 3 && $_G['adminid'] == 1))) { ?><li <?php if($mnid == $nav['navid']) { ?>class="a" <?php } ?><?php echo $nav['nav'];?>></li><?php } ?>

                    <?php } ?>

                </ul>

                <?php if(!empty($_G['setting']['pluginhooks']['global_nav_extra'])) echo $_G['setting']['pluginhooks']['global_nav_extra'];?>

            </div>

            <?php if(!empty($_G['setting']['plugins']['jsmenu'])) { ?>

            <ul class="p_pop h_pop" id="plugin_menu" style="display: none">

                <?php if(is_array($_G['setting']['plugins']['jsmenu'])) foreach($_G['setting']['plugins']['jsmenu'] as $module) { ?>                <?php if(!$module['adminid'] || ($module['adminid'] && $_G['adminid'] > 0 && $module['adminid'] >= $_G['adminid'])) { ?>

                <li><?php echo $module['url'];?></li>

                <?php } ?>

                <?php } ?>

            </ul>

            <?php } ?>

            <?php echo $_G['setting']['menunavs'];?>

            <?php if($_G['uid']) { ?>

            <div id="um">

                <div class="diynav">

                    <div style="display: inline;">

                        <?php if($_G['uid'] && !empty($_G['style']['extstyle'])) { ?><a id="sslct" href="javascript:;" onMouseOver="delayShow(this, function() {showMenu({'ctrlid':'sslct','pos':'34!'})});">切换风格</a><?php } ?>

                        <?php if(check_diy_perm($topic)) { ?>

                        <?php echo $diynav;?>

                        <?php } ?>

                        <?php if(!empty($_G['setting']['pluginhooks']['global_usernav_extra1'])) echo $_G['setting']['pluginhooks']['global_usernav_extra1'];?>

                        <?php $upgradecredit = $_G['uid'] && $_G['group']['grouptype'] == 'member' && $_G['group']['groupcreditslower'] != 999999999 ? $_G['group']['groupcreditslower'] - $_G['member']['credits'] : false;?>                        <a href="home.php?mod=spacecp&amp;ac=credit&amp;showcredit=1" id="extcreditmenu">积分: <?php echo $_G['member']['credits'];?></a>

                    </div>

                    <p>

                        <?php if(!empty($_G['setting']['pluginhooks']['global_usernav_extra2'])) echo $_G['setting']['pluginhooks']['global_usernav_extra2'];?>

                        <a href="home.php?mod=space&amp;do=pm" id="pm_ntc"<?php if($_G['member']['newpm']) { ?> class="new"<?php } ?>>消息</a>

                        <span class="pipe">|</span><a href="home.php?mod=space&amp;do=notice" id="myprompt"<?php if($_G['member']['newprompt']) { ?> class="new"<?php } ?>>提醒<?php if($_G['member']['newprompt']) { ?>(<?php echo $_G['member']['newprompt'];?>)<?php } ?></a><span id="myprompt_check"></span>

                        <?php if($_G['setting']['taskon'] && !empty($_G['cookie']['taskdoing_'.$_G['uid']])) { ?><span class="pipe">|</span><a href="home.php?mod=task&amp;item=doing" id="task_ntc" class="new">进行中的任务</a>

                        <?php } ?>

                        <span class="pipe">|</span><a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>" target="_blank" title="访问我的空间" id="umnav" class="showmenu" onMouseOver="showMenu({'ctrlid':this.id,'ctrlclass':'a'})"><?php echo $_G['member']['username'];?></a>

                    <ul id="umnav_menu" class="p_pop nav_pop" style="display: none;">

                        <?php if(is_array($_G['setting']['mynavs'])) foreach($_G['setting']['mynavs'] as $nav) { ?>                        <?php if($nav['available'] && (!$nav['level'] || ($nav['level'] == 1 && $_G['uid']) || ($nav['level'] == 2 && $_G['adminid'] > 0) || ($nav['level'] == 3 && $_G['adminid'] == 1))) { ?>

                        <?php $nav[code] = str_replace('style="', '_style="', $nav[code]);?>                        <li><?php echo $nav['code'];?></li>

                        <?php } ?>

                        <?php } ?>

                        <?php if(!empty($_G['setting']['pluginhooks']['global_usernav_extra3'])) echo $_G['setting']['pluginhooks']['global_usernav_extra3'];?>

                        <li><a href="home.php?mod=spacecp">设置</a></li>

                        <?php if(($_G['group']['allowmanagearticle'] || $_G['group']['allowpostarticle'] || $_G['group']['allowdiy'] || getstatus($_G['member']['allowadmincp'], 4) || getstatus($_G['member']['allowadmincp'], 6) || getstatus($_G['member']['allowadmincp'], 2) || getstatus($_G['member']['allowadmincp'], 3))) { ?>

                        <li><a href="portal.php?mod=portalcp"><?php if($_G['setting']['portalstatus'] ) { ?>门户管理<?php } else { ?>模块管理<?php } ?></a></li>

                        <?php } ?>

                        <?php if($_G['uid'] && $_G['group']['radminid'] > 1) { ?>

                        <li><a href="forum.php?mod=modcp&amp;fid=<?php echo $_G['fid'];?>" target="_blank"><?php echo $_G['setting']['navs']['2']['navname'];?>管理</a></li>

                        <?php } ?>

                        <?php if($_G['uid'] && $_G['adminid'] == 1 && $_G['setting']['cloud_status']) { ?>

                        <li><a href="admin.php?frames=yes&amp;action=cloud&amp;operation=applist" target="_blank">云平台</a></li>

                        <?php } ?>

                        <?php if($_G['uid'] && getstatus($_G['member']['allowadmincp'], 1)) { ?>

                        <li><a href="admin.php" target="_blank">管理中心</a></li>

                        <?php } ?>

                        <?php if(!empty($_G['setting']['pluginhooks']['global_usernav_extra4'])) echo $_G['setting']['pluginhooks']['global_usernav_extra4'];?>

                        <li><a href="member.php?mod=logging&amp;action=logout&amp;formhash=<?php echo FORMHASH;?>">退出</a></li>

                    </ul>

                    </p>

                </div>



            </div>

            <?php } elseif(!empty($_G['cookie']['loginuser'])) { ?>

            <p>

                <strong><a id="loginuser" class="noborder"><?php echo dhtmlspecialchars($_G['cookie']['loginuser']); ?></a></strong>

                <span class="pipe">|</span><a href="member.php?mod=logging&amp;action=login" onClick="showWindow('login', this.href)">激活</a>

                <span class="pipe">|</span><a href="member.php?mod=logging&amp;action=logout&amp;formhash=<?php echo FORMHASH;?>">退出</a>

            </p>

            <?php } elseif(!$_G['connectguest']) { ?>

            <?php include template('member/login_simple'); ?>            <?php } else { ?>

            <div id="um">

                <p>

                    <strong class="vwmy qq"><?php echo $_G['member']['username'];?></strong>

                    <?php if(!empty($_G['setting']['pluginhooks']['global_usernav_extra1'])) echo $_G['setting']['pluginhooks']['global_usernav_extra1'];?>

                    <span class="pipe">|</span><a href="member.php?mod=logging&amp;action=logout&amp;formhash=<?php echo FORMHASH;?>">退出</a>

                </p>

                <p>

                    <a href="home.php?mod=spacecp&amp;ac=credit&amp;showcredit=1">积分: 0</a>

                    <span class="pipe">|</span>用户组: <?php echo $_G['group']['grouptitle'];?>

                </p>

            </div>

            <?php } ?>
        </div>
        </div>
        
        <div>
            <div class="logo_ad cl wp"> 

                <div class="logo"><?php if(!isset($_G['setting']['navlogos'][$mnid])) { ?><a href="./" title="<?php echo $_G['setting']['bbname'];?>"><?php echo $_G['style']['boardlogo'];?></a><?php } else { ?><?php echo $_G['setting']['navlogos'][$mnid];?><?php } ?></div>

                <div class="header_ad"> 

                    <?php echo adshow("custom_5");?>                </div>

            </div>

            <?php if(!empty($_G['setting']['plugins']['jsmenu'])) { ?>

            <ul class="p_pop h_pop" id="plugin_menu" style="display: none">

                <?php if(is_array($_G['setting']['plugins']['jsmenu'])) foreach($_G['setting']['plugins']['jsmenu'] as $module) { ?>                <?php if(!$module['adminid'] || ($module['adminid'] && $_G['adminid'] > 0 && $module['adminid'] >= $_G['adminid'])) { ?>

                <li><?php echo $module['url'];?></li>

                <?php } ?>

                <?php } ?>

            </ul>

            <?php } ?>



            <?php echo adshow("subnavbanner/a_mu");?>            <div class="wp">
            <?php if($_G['setting']['search']) { ?><?php $slist = array();?><?php if($_G['fid'] && $_G['forum']['status'] != 3 && $mod != 'group') { ?><?php
$slist[forumfid] = <<<EOF
<li><a href="javascript:;" rel="curforum" fid="{$_G['fid']}">本版</a></li>
EOF;
?><?php } if($_G['setting']['portalstatus'] && $_G['setting']['search']['portal']['status'] && ($_G['group']['allowsearch'] & 1 || $_G['adminid'] == 1)) { ?><?php
$slist[portal] = <<<EOF
<li><a href="javascript:;" rel="article">文章</a></li>
EOF;
?><?php } if($_G['setting']['search']['forum']['status'] && ($_G['group']['allowsearch'] & 2 || $_G['adminid'] == 1)) { ?><?php
$slist[forum] = <<<EOF
<li><a href="javascript:;" rel="forum" class="curtype">帖子</a></li>
EOF;
?><?php } if(helper_access::check_module('blog') && $_G['setting']['search']['blog']['status'] && ($_G['group']['allowsearch'] & 4 || $_G['adminid'] == 1)) { ?><?php
$slist[blog] = <<<EOF
<li><a href="javascript:;" rel="blog">日志</a></li>
EOF;
?><?php } if(helper_access::check_module('album') && $_G['setting']['search']['album']['status'] && ($_G['group']['allowsearch'] & 8 || $_G['adminid'] == 1)) { ?><?php
$slist[album] = <<<EOF
<li><a href="javascript:;" rel="album">相册</a></li>
EOF;
?><?php } if($_G['setting']['groupstatus'] && $_G['setting']['search']['group']['status'] && ($_G['group']['allowsearch'] & 16 || $_G['adminid'] == 1)) { ?><?php
$slist[group] = <<<EOF
<li><a href="javascript:;" rel="group">{$_G['setting']['navs']['3']['navname']}</a></li>
EOF;
?><?php } ?><?php
$slist[user] = <<<EOF
<li><a href="javascript:;" rel="user">用户</a></li>
EOF;
?>
<?php } if($_G['setting']['search'] && $slist) { ?>
<div id="scbar" class="<?php if($_G['setting']['srchhotkeywords'] && count($_G['setting']['srchhotkeywords']) > 5) { ?>scbar_narrow <?php } ?>cl">
<form id="scbar_form" method="<?php if($_G['fid'] && !empty($searchparams['url'])) { ?>get<?php } else { ?>post<?php } ?>" autocomplete="off" onsubmit="searchFocus($('scbar_txt'))" action="<?php if($_G['fid'] && !empty($searchparams['url'])) { ?><?php echo $searchparams['url'];?><?php } else { ?>search.php?searchsubmit=yes<?php } ?>" target="_blank">
<input type="hidden" name="mod" id="scbar_mod" value="search" />
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<input type="hidden" name="srchtype" value="title" />
<input type="hidden" name="srhfid" value="<?php echo $_G['fid'];?>" />
<input type="hidden" name="srhlocality" value="<?php echo $_G['basescript'];?>::<?php echo CURMODULE;?>" />
<?php if(!empty($searchparams['params'])) { if(is_array($searchparams['params'])) foreach($searchparams['params'] as $key => $value) { ?><?php $srchotquery .= '&' . $key . '=' . rawurlencode($value);?><input type="hidden" name="<?php echo $key;?>" value="<?php echo $value;?>" />
<?php } ?>
<input type="hidden" name="source" value="discuz" />
<input type="hidden" name="fId" id="srchFId" value="<?php echo $_G['fid'];?>" />
<input type="hidden" name="q" id="cloudsearchquery" value="" />
<?php } ?>
<table cellspacing="0" cellpadding="0">
                    <tr>  
                                <td class="scbar_hot_td">
<div id="scbar_hot">
<?php if($_G['setting']['srchhotkeywords']) { ?>
<strong class="xw1">热搜: </strong><?php if(is_array($_G['setting']['srchhotkeywords'])) foreach($_G['setting']['srchhotkeywords'] as $val) { if($val=trim($val)) { ?><?php $valenc=rawurlencode($val);?><?php
$__FORMHASH = FORMHASH;$srchhotkeywords[] = <<<EOF


EOF;
 if(!empty($searchparams['url'])) { 
$srchhotkeywords[] .= <<<EOF

<a href="{$searchparams['url']}?q={$valenc}&source=hotsearch{$srchotquery}" target="_blank" class="xi2">{$val}</a>

EOF;
 } else { 
$srchhotkeywords[] .= <<<EOF

<a href="search.php?mod=forum&amp;srchtxt={$valenc}&amp;formhash={$__FORMHASH}&amp;searchsubmit=true&amp;source=hotsearch" target="_blank" class="xi2">{$val}</a>

EOF;
 } 
$srchhotkeywords[] .= <<<EOF


EOF;
?>
<?php } } echo implode('', $srchhotkeywords);; } ?>
</div>
</td>
<td class="scbar_icon_td"></td>
<td class="scbar_type_td"><a href="javascript:;" id="scbar_type" class="showmenu xg1" onclick="showMenu(this.id)" hidefocus="true">搜索</a></td>
<td class="scbar_txt_td"><input type="text" name="srchtxt" id="scbar_txt" value="请输入搜索内容" autocomplete="off" x-webkit-speech speech /></td>
<td class="scbar_btn_td"><button type="submit" name="searchsubmit" id="scbar_btn" class="pn pnc" value="true"><span></span></button></td>
                                 
</tr>
</table>
</form>
</div>
<ul id="scbar_type_menu" class="p_pop" style="display: none;"><?php echo implode('', $slist);; ?></ul>
<script type="text/javascript">
initSearchmenu('scbar', '<?php echo $searchparams['url'];?>');
</script>
<?php } ?>            </div>
    </div>


    <?php if(!empty($_G['setting']['pluginhooks']['global_header'])) echo $_G['setting']['pluginhooks']['global_header'];?>

    <?php } ?>

    <div id="wp" class="wp"><?php if(empty($gid)) { ?><?php echo adshow("text/wp a_t");?><?php } ?>

<style id="diy_style" type="text/css">#framewB9aj9 {  border-top:transparent 7px solid !important;border-bottom:#CCCCCC 7px solid !important;margin:0px !important;}#frameVJ93QQ {  border-top:#666666 7px solid !important;background-image:none !important;margin:0px !important;background-color:transparent !important;}#framecuqZSx {  border-top:transparent 7px solid !important;border-bottom:#cccccc 7px solid !important;margin:0px !important;}#portal_block_678 {  margin:0px !important;}#portal_block_678 .dxb_bc {  margin:0px !important;}#portal_block_679 {  margin:0px !important;}#portal_block_679 .dxb_bc {  margin:0px !important;}#portal_block_680 {  margin:0px !important;}#portal_block_680 .dxb_bc {  margin:0px !important;}#portal_block_850 {  border-bottom-width:7px !important;border-bottom-color:#339933 !important;}#framebfMq4f {  border-top:transparent 0px solid !important;border-right:transparent 1px solid !important;background-image:none !important;border-left:#ffcc00 1px solid !important;background-color:transparent !important;}#portal_block_681 {  border-top:#cc6600 6px solid !important;border-right:#339933 0px solid !important;background-image:none !important;background-color:transparent !important;}#portal_block_849 {  background-color:transparent !important;background-image:none !important;}</style>

<?php if(empty($gid)) { ?>
<div class="wp">
    <!--[diy=diy1]--><div id="diy1" class="area"></div><!--[/diy]-->
</div>
<?php } ?>

<div id="ct" class="wp cl">
    <?php if(empty($gid)) { ?>
    <div id="chart" class="bm bw0 cl">
        <p class="chart z">今日: <em><?php echo $todayposts;?></em><span class="pipe">|</span>昨日: <em><?php echo $postdata['0'];?></em><span class="pipe">|</span>帖子: <em><?php echo $posts;?></em><span class="pipe">|</span>会员: <em><?php echo $_G['cache']['userstats']['totalmembers'];?></em><?php if($_G['cache']['userstats']['newsetuser']) { ?><span class="pipe">|</span>欢迎新会员: <em><a href="home.php?mod=space&amp;username=<?php echo rawurlencode($_G['cache']['userstats']['newsetuser']); ?>" target="_blank" class="xi2"><?php echo $_G['cache']['userstats']['newsetuser'];?></a></em><?php } ?></p>
        <div class="y">
            <?php if(!empty($_G['setting']['pluginhooks']['index_nav_extra'])) echo $_G['setting']['pluginhooks']['index_nav_extra'];?>
            <?php if($_G['uid']) { ?><a href="forum.php?mod=guide&amp;view=my" title="我的帖子" class="xi2">我的帖子</a><?php } if(!empty($_G['setting']['search']['forum']['status'])) { if($_G['uid']) { ?><span class="pipe">|</span><?php } ?><a href="forum.php?mod=guide&amp;view=new" title="查看新帖" class="xi2">查看新帖</a><?php } ?>
        </div>
    </div>
    <?php } ?>

    <div class="mn">
        <div id="forum_r">
            <!--广告-->
            <!--[diy=diy7]--><div id="diy7" class="area"></div><!--[/diy]-->
            <!--焦点图-->
            <!--[diy=diy8]--><div id="diy8" class="area"><div id="frameVJ93QQ" class=" frame move-span cl frame-1"><div class="frame-title title" style='background-image:none;background-repeat:repeat;background-color:rgb(204, 204, 204);'><span class="titletext">社区推荐</span></div><div id="frameVJ93QQ_left" class="column frame-1-c"><div id="frameVJ93QQ_left_temp" class="move-span temp"></div></div></div><div id="frameRA2O7o" class="frame move-span cl frame-1"><div id="frameRA2O7o_left" class="column frame-1-c"><div id="frameRA2O7o_left_temp" class="move-span temp"></div><?php block_display('680');?></div></div></div><!--[/diy]-->
            <div class="toppic">
                <!--[diy=diy9]--><div id="diy9" class="area"><div id="framebfMq4f" class=" frame move-span cl frame-1"><div id="framebfMq4f_left" class="column frame-1-c"><div id="framebfMq4f_left_temp" class="move-span temp"></div><?php block_display('681');?><?php block_display('682');?><?php block_display('849');?><?php block_display('850');?></div></div></div><!--[/diy]-->
            </div>
        </div>
        <div id="forum_l">
            <div class="fl bm">
                <div id="new_top">
                    <div class="new_top_l">
                        <div class="n_t_tit">最新发布</div>
                        <!--[diy=diy5]--><div id="diy5" class="area"><div id="framecuqZSx" class=" frame move-span cl frame-1"><div id="framecuqZSx_left" class="column frame-1-c"><div id="framecuqZSx_left_temp" class="move-span temp"></div><?php block_display('678');?></div></div></div><!--[/diy]-->
                    </div>
                    <div class="new_top_r">
                        <div class="n_t_tit">最新回复</div>
                        <!--[diy=diy6]--><div id="diy6" class="area"><div id="framewB9aj9" class=" frame move-span cl frame-1"><div id="framewB9aj9_left" class="column frame-1-c"><div id="framewB9aj9_left_temp" class="move-span temp"></div><?php block_display('679');?></div></div></div><!--[/diy]-->
                    </div>
                </div>

                <?php if(!empty($_G['setting']['pluginhooks']['index_top'])) echo $_G['setting']['pluginhooks']['index_top'];?>

                <?php if(!empty($_G['setting']['pluginhooks']['index_catlist_top'])) echo $_G['setting']['pluginhooks']['index_catlist_top'];?>
                <div class="mtm">
                    <?php if(empty($gid) && !empty($forum_favlist)) { ?>
                    <?php $forumscount = count($forum_favlist);?>                    <?php $forumcolumns = 3;?>                    <?php $forumcolwidth = (floor(100 / $forumcolumns) - 0.1).'%';?>                    <div class="flg cl">
                        <div class="bm_h cl">
                            <h2><a href="home.php?mod=space&amp;do=favorite&amp;type=forum" class="xs2">我收藏的版块</a></h2>
                        </div>
                        <div id="category_0" class="bm_c" style="<?php echo $collapse['category_0']; ?>">
                            <table cellspacing="0" cellpadding="0" class="fl_tb">
                                <tr>
                                    <?php $favorderid = 0; $i = 1;?>                                    <?php if(is_array($forum_favlist)) foreach($forum_favlist as $key => $favorite) { ?>                                    <?php if($favforumlist[$favorite['id']]) { ?>
                                    <?php $forum=$favforumlist[$favorite[id]];?>                                    <?php $forumurl = !empty($forum['domain']) && !empty($_G['setting']['domain']['root']['forum']) ? 'http://'.$forum['domain'].'.'.$_G['setting']['domain']['root']['forum'] : 'forum.php?mod=forumdisplay&fid='.$forum['fid'];?>                                    <?php if($forumcolumns>0) { ?>
                                    <?php if($favorderid && ($favorderid % $forumcolumns == 0)) { ?>
                                </tr>
                                <?php if($favorderid < $forumscount) { ?>
                                <tr class="fl_row">
                                    <?php } ?>
                                    <?php } ?>
                                    <td class="fl_g"<?php if($forumcolwidth) { ?> width="<?php echo $forumcolwidth;?>"<?php } ?>>
                                        <div class="fl_icn_g"<?php if(!empty($forum['extra']['iconwidth']) && !empty($forum['icon'])) { ?> style="width: <?php echo $forum['extra']['iconwidth'];?>px;"<?php } ?>>
                                         <?php if($forum['icon']) { ?>
                                         <?php echo $forum['icon'];?>
                                         <?php } else { ?>
                                         <a href="<?php echo $forumurl;?>"<?php if($forum['redirect']) { ?> target="_blank"<?php } ?>><img src="<?php echo $_G['style']['styleimgdir'];?>/0<?php echo $i;?>.png" alt="<?php echo $forum['name'];?>" /></a>
                                            <?php $i >= 9 ? $i = 1 : $i++;?>                                            <?php } ?>
                                        </div>
                                        <dl<?php if(!empty($forum['extra']['iconwidth']) && !empty($forum['icon'])) { ?> style="margin-left: <?php echo $forum['extra']['iconwidth'];?>px;"<?php } ?>>
                                            <dt><a href="<?php echo $forumurl;?>" class="xs2"<?php if($forum['redirect']) { ?> target="_blank"<?php } if($forum['extra']['namecolor']) { ?> style="color: <?php echo $forum['extra']['namecolor'];?>;"<?php } ?>><?php echo $forum['name'];?></a></dt>
                                            <?php if(empty($forum['redirect'])) { ?><dd class="xg1"><em><span class="t">主题:</span><?php echo dnumber($forum['threads']); ?></em><em><span class="t">帖数:</span><?php echo dnumber($forum['posts']); ?></em></dd><?php } ?>
                                            <dd class="xg1">
                                                <?php if(!$forum['redirect']) { ?><em<?php if($forum['todayposts']) { ?> class="xi1"<?php } ?>><span class="t">今日:</span><?php if($forum['todayposts']) { ?><?php echo $forum['todayposts'];?><?php } else { ?>0<?php } ?></em><?php } ?>
                                                <?php if($forum['permission'] == 1) { ?>
                                                私密版块
                                                <?php } else { ?>
                                                <em class="l">
                                                    <?php if(!$forum['redirect']) { ?><span class="t"><?php echo '最新'; ?>:</span><?php } if($forum['redirect']) { ?><a href="<?php echo $forumurl;?>" class="xi2">链接到外部地址</a><?php } elseif(is_array($forum['lastpost'])) { ?><a href="forum.php?mod=redirect&amp;tid=<?php echo $forum['lastpost']['tid'];?>&amp;goto=lastpost#lastpost"><?php echo $forum['lastpost']['dateline'];?></a><?php } else { ?>从未<?php } ?>
                                                </em>
                                                <?php } ?>
                                            </dd>
                                            <?php if(!empty($_G['setting']['pluginhooks']['index_favforum_extra'][$forum[fid]])) echo $_G['setting']['pluginhooks']['index_favforum_extra'][$forum[fid]];?>
                                        </dl>
                                    </td>
                                    <?php $favorderid++;?>                                    <?php } else { ?>
                                    <td class="fl_icn" <?php if(!empty($forum['extra']['iconwidth']) && !empty($forum['icon'])) { ?> style="width: <?php echo $forum['extra']['iconwidth'];?>px;"<?php } ?>>
                                        <?php if($forum['icon']) { ?>
                                        <?php echo $forum['icon'];?>
                                        <?php } else { ?>
                                        <a href="<?php echo $forumurl;?>"<?php if($forum['redirect']) { ?> target="_blank"<?php } ?>><img src="<?php echo $_G['style']['styleimgdir'];?>/0<?php echo $i;?>.png" alt="<?php echo $forum['name'];?>" /></a>
                                        <?php $i >= 9 ? $i = 1 : $i++;?>                                        <?php } ?>
                                    </td>
                                    <td>
                                        <h2><a href="<?php echo $forumurl;?>"<?php if($forum['redirect']) { ?> target="_blank"<?php } if($forum['extra']['namecolor']) { ?> style="color: <?php echo $forum['extra']['namecolor'];?>;"<?php } ?>><?php echo $forum['name'];?></a><?php if($forum['todayposts'] && !$forum['redirect']) { ?><em class="xw0 xi1" title="今日"> (<?php echo $forum['todayposts'];?>)</em><?php } ?></h2>
                                        <?php if($forum['description']) { ?><p class="xg2"><?php echo $forum['description'];?></p><?php } ?>
                                        <?php if($forum['subforums']) { ?><p>子版块: <?php echo $forum['subforums'];?></p><?php } ?>
                                        <?php if($forum['moderators']) { ?><p>版主: <span class="xi2"><?php echo $forum['moderators'];?></span></p><?php } ?>
                                        <?php if(!empty($_G['setting']['pluginhooks']['index_favforum_extra'][$forum[fid]])) echo $_G['setting']['pluginhooks']['index_favforum_extra'][$forum[fid]];?>
                                    </td>
                                    <td class="fl_i">
                                        <?php if(empty($forum['redirect'])) { ?><span class="xi2"><?php echo dnumber($forum['threads']); ?></span><span class="xg1"> / <?php echo dnumber($forum['posts']); ?></span><?php } ?>
                                    </td>
                                    <td class="fl_by">
                                        <div>
                                            <?php if($forum['permission'] == 1) { ?>
                                            私密版块
                                            <?php } else { ?>
                                            <?php if($forum['redirect']) { ?>
                                            <a href="<?php echo $forumurl;?>" class="xi2">链接到外部地址</a>
                                            <?php } elseif(is_array($forum['lastpost'])) { ?>
                                            <a href="forum.php?mod=redirect&amp;tid=<?php echo $forum['lastpost']['tid'];?>&amp;goto=lastpost#lastpost" class="xi2"><?php echo cutstr($forum['lastpost']['subject'], 30); ?></a> <cite><?php echo $forum['lastpost']['dateline'];?> <?php if($forum['lastpost']['author']) { ?><?php echo $forum['lastpost']['author'];?><?php } else { ?><?php echo $_G['setting']['anonymoustext'];?><?php } ?></cite>
                                            <?php } else { ?>
                                            从未
                                            <?php } ?>
                                            <?php } ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="fl_row">

                                    <?php } ?>
                                    <?php } ?>
                                    <?php } ?>
                                    <?php if(($columnspad = $favorderid % $forumcolumns) > 0) { echo str_repeat('<td class="fl_g"'.($forumcolwidth ? " width=\"$forumcolwidth\"" : '').'></td>', $forumcolumns - $columnspad);; } ?>
                                </tr>
                            </table>

                        </div>
                    </div>
                    <?php echo adshow("intercat/bm a_c/-1");?>                    <?php } ?>
                    <?php if(is_array($catlist)) foreach($catlist as $key => $cat) { ?>                    <?php if(!empty($_G['setting']['pluginhooks']['index_catlist'][$cat[fid]])) echo $_G['setting']['pluginhooks']['index_catlist'][$cat[fid]];?>
                    <div class="<?php if($cat['forumcolumns']) { ?> flg<?php } ?> cl">
                        <div class="bm_h cl">
                            <?php if($cat['moderators']) { ?><span class="y">分区版主: <?php echo $cat['moderators'];?></span><?php } ?>
                            <?php $caturl = !empty($cat['domain']) && !empty($_G['setting']['domain']['root']['forum']) ? 'http://'.$cat['domain'].'.'.$_G['setting']['domain']['root']['forum'] : '';?>                            <h2><a href="<?php if(!empty($caturl)) { ?><?php echo $caturl;?><?php } else { ?>forum.php?gid=<?php echo $cat['fid'];?><?php } ?>" class="xs2" style="<?php if($cat['extra']['namecolor']) { ?>color: <?php echo $cat['extra']['namecolor'];?>;<?php } ?>"><?php echo $cat['name'];?></a></h2>
                        </div>
                        <div id="category_<?php echo $cat['fid'];?>" class="bm_c">
                            <table cellspacing="0" cellpadding="0" class="fl_tb">
                                <tr>
                                    <?php $i = 1;?>                                    <?php if(is_array($cat['forums'])) foreach($cat['forums'] as $forumid) { ?>                                    <?php $forum=$forumlist[$forumid];?>                                    <?php $forumurl = !empty($forum['domain']) && !empty($_G['setting']['domain']['root']['forum']) ? 'http://'.$forum['domain'].'.'.$_G['setting']['domain']['root']['forum'] : 'forum.php?mod=forumdisplay&fid='.$forum['fid'];?>                                    <?php if($cat['forumcolumns']) { ?>
                                    <?php if($forum['orderid'] && ($forum['orderid'] % $cat['forumcolumns'] == 0)) { ?>
                                </tr>
                                <?php if($forum['orderid'] < $cat['forumscount']) { ?>
                                <tr class="fl_row">
                                    <?php } ?>
                                    <?php } ?>
                                    <td class="fl_g" width="<?php echo $cat['forumcolwidth'];?>">
                                        <div class="fl_icn_g"<?php if(!empty($forum['extra']['iconwidth']) && !empty($forum['icon'])) { ?> style="width: <?php echo $forum['extra']['iconwidth'];?>px;"<?php } ?>>
                                             <?php if($forum['icon']) { ?>
                                             <?php echo $forum['icon'];?>
                                             <?php } else { ?>
                                             <a href="<?php echo $forumurl;?>"<?php if($forum['redirect']) { ?> target="_blank"<?php } ?>><img src="<?php echo $_G['style']['styleimgdir'];?>/0<?php echo $i;?>.png" alt="<?php echo $forum['name'];?>" /></a>
                                            <?php $i >= 9 ? $i = 1 : $i++;?>                                            <?php } ?>
                                        </div>
                                        <dl<?php if(!empty($forum['extra']['iconwidth']) && !empty($forum['icon'])) { ?> style="margin-left: <?php echo $forum['extra']['iconwidth'];?>px;"<?php } ?>>
                                            <dt><a href="<?php echo $forumurl;?>" class="xs2"<?php if($forum['redirect']) { ?> target="_blank"<?php } if($forum['extra']['namecolor']) { ?> style="color: <?php echo $forum['extra']['namecolor'];?>;"<?php } ?>><?php echo $forum['name'];?></a></dt>
                                            <?php if(empty($forum['redirect'])) { ?><dd class="xg1"><em><span class="t">主题:</span><?php echo dnumber($forum['threads']); ?></em><em><span class="t">帖数:</span><?php echo dnumber($forum['posts']); ?></em></dd><?php } ?>
                                            <dd class="xg1">
                                                <?php if(!$forum['redirect']) { ?><em<?php if($forum['todayposts']) { ?> class="xi1"<?php } ?>><span class="t">今日:</span><?php if($forum['todayposts']) { ?><?php echo $forum['todayposts'];?><?php } else { ?>0<?php } ?></em><?php } ?>
                                                <?php if($forum['permission'] == 1) { ?>
                                                私密版块
                                                <?php } else { ?>
                                                <em class="l">
                                                    <?php if(!$forum['redirect']) { ?><span class="t"><?php echo '最新'; ?>:</span><?php } if($forum['redirect']) { ?><a href="<?php echo $forumurl;?>" class="xi2">链接到外部地址</a><?php } elseif(is_array($forum['lastpost'])) { ?><a href="forum.php?mod=redirect&amp;tid=<?php echo $forum['lastpost']['tid'];?>&amp;goto=lastpost#lastpost"><?php echo $forum['lastpost']['dateline'];?></a><?php } else { ?>从未<?php } ?>
                                                </em>
                                                <?php } ?>
                                            </dd>
                                            <?php if(!empty($_G['setting']['pluginhooks']['index_forum_extra'][$forum[fid]])) echo $_G['setting']['pluginhooks']['index_forum_extra'][$forum[fid]];?>
                                        </dl>
                                    </td>
                                    <?php } else { ?>
                                    <td class="fl_icn" <?php if(!empty($forum['extra']['iconwidth']) && !empty($forum['icon'])) { ?> style="width: <?php echo $forum['extra']['iconwidth'];?>px;"<?php } ?>>
                                        <?php if($forum['icon']) { ?>
                                        <?php echo $forum['icon'];?>
                                        <?php } else { ?>
                                        <a href="<?php echo $forumurl;?>"<?php if($forum['redirect']) { ?> target="_blank"<?php } ?>><img src="<?php echo $_G['style']['styleimgdir'];?>/0<?php echo $i;?>.png" alt="<?php echo $forum['name'];?>" /></a>
                                        <?php $i >= 9 ? $i = 1 : $i++;?>                                        <?php } ?>
                                    </td>
                                    <td>
                                        <h2><a href="<?php echo $forumurl;?>"<?php if($forum['redirect']) { ?> target="_blank"<?php } if($forum['extra']['namecolor']) { ?> style="color: <?php echo $forum['extra']['namecolor'];?>;"<?php } ?>><?php echo $forum['name'];?></a><?php if($forum['todayposts'] && !$forum['redirect']) { ?><em class="xw0 xi1" title="今日"> (<?php echo $forum['todayposts'];?>)</em><?php } ?></h2>
                                        <?php if($forum['description']) { ?><p class="xg2"><?php echo $forum['description'];?></p><?php } ?>
                                        <?php if($forum['subforums']) { ?><p>子版块: <?php echo $forum['subforums'];?></p><?php } ?>
                                        <?php if($forum['moderators']) { ?><p>版主: <span class="xi2"><?php echo $forum['moderators'];?></span></p><?php } ?>
                                        <?php if(!empty($_G['setting']['pluginhooks']['index_forum_extra'][$forum[fid]])) echo $_G['setting']['pluginhooks']['index_forum_extra'][$forum[fid]];?>
                                    </td>
                                    <td class="fl_i">
                                        <?php if(empty($forum['redirect'])) { ?><span class="xi2"><?php echo dnumber($forum['threads']); ?></span><span class="xg1"> / <?php echo dnumber($forum['posts']); ?></span><?php } ?>
                                    </td>
                                    <td class="fl_by">
                                        <div>
                                            <?php if($forum['permission'] == 1) { ?>
                                            私密版块
                                            <?php } else { ?>
                                            <?php if($forum['redirect']) { ?>
                                            <a href="<?php echo $forumurl;?>" class="xi2">链接到外部地址</a>
                                            <?php } elseif(is_array($forum['lastpost'])) { ?>
                                            <a href="forum.php?mod=redirect&amp;tid=<?php echo $forum['lastpost']['tid'];?>&amp;goto=lastpost#lastpost" class="xi2"><?php echo cutstr($forum['lastpost']['subject'], 30); ?></a> <cite><?php echo $forum['lastpost']['dateline'];?> <?php if($forum['lastpost']['author']) { ?><?php echo $forum['lastpost']['author'];?><?php } else { ?><?php echo $_G['setting']['anonymoustext'];?><?php } ?></cite>
                                            <?php } else { ?>
                                            从未
                                            <?php } ?>
                                            <?php } ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="fl_row">
                                    <?php } ?>
                                    <?php } ?>
                                    <?php echo $cat['endrows'];?>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <?php echo adshow("intercat/bm a_c/$cat[fid]");?>                    <?php } ?>
                </div>

                <?php if(!empty($_G['setting']['pluginhooks']['index_middle'])) echo $_G['setting']['pluginhooks']['index_middle'];?>
                <div class="wp mtn">
                    <!--[diy=diy3]--><div id="diy3" class="area"></div><!--[/diy]-->
                </div>

                <?php if(empty($gid) && $_G['setting']['whosonlinestatus']) { ?>
                <div id="online" class="oll">
                    <div class="bm_h">
                        <?php if($detailstatus) { ?>
                        <span class="o"><a href="forum.php?showoldetails=no#online" title="收起/展开"><img src="<?php echo IMGDIR;?>/collapsed_no.gif" alt="收起/展开" /></a></span>
                        <h3>
                            <strong><a href="home.php?mod=space&amp;do=friend&amp;view=online&amp;type=member">在线会员</a></strong>
                            <span class="xs1">- <strong><?php echo $onlinenum;?></strong> 人在线
                                - <strong><?php echo $membercount;?></strong> 会员(<strong><?php echo $invisiblecount;?></strong> 隐身),
                                <strong><?php echo $guestcount;?></strong> 位游客
                                - 最高记录是 <strong><?php echo $onlineinfo['0'];?></strong> 于 <strong><?php echo $onlineinfo['1'];?></strong>.</span>
                        </h3>
                        <?php } else { ?>
                        <?php if(empty($_G['setting']['sessionclose'])) { ?>
                        <span class="o"><a href="forum.php?showoldetails=yes#online" title="收起/展开"><img src="<?php echo IMGDIR;?>/collapsed_yes.gif" alt="收起/展开" /></a></span>
                        <?php } ?>
                        <h3>
                            <strong>
                                <?php if(!empty($_G['setting']['whosonlinestatus'])) { ?>
                                在线会员
                                <?php } else { ?>
                                <a href="home.php?mod=space&amp;do=friend&amp;view=online&amp;type=member">在线会员</a>
                                <?php } ?>
                            </strong>
                            <span class="xs1">- 总计 <strong><?php echo $onlinenum;?></strong> 人在线
                                <?php if($membercount) { ?>- <strong><?php echo $membercount;?></strong> 会员,<strong><?php echo $guestcount;?></strong> 位游客<?php } ?>
                                - 最高记录是 <strong><?php echo $onlineinfo['0'];?></strong> 于 <strong><?php echo $onlineinfo['1'];?></strong>.</span>
                        </h3>
                        <?php } ?>
                    </div>
                    <?php if($_G['setting']['whosonlinestatus'] && $detailstatus) { ?>
                    <dl id="onlinelist" class="bm_c">
                        <dt class="ptm pbm bbda"><?php echo $_G['cache']['onlinelist']['legend'];?></dt>
                        <?php if($detailstatus) { ?>
                        <dd class="ptm pbm">
                            <ul class="cl">
                                <?php if($whosonline) { ?>
                                <?php if(is_array($whosonline)) foreach($whosonline as $key => $online) { ?>                                <li title="时间: <?php echo $online['lastactivity'];?>">
                                    <img src="<?php echo STATICURL;?>image/common/<?php echo $online['icon'];?>" alt="icon" />
                                    <?php if($online['uid']) { ?>
                                    <a href="home.php?mod=space&amp;uid=<?php echo $online['uid'];?>"><?php echo $online['username'];?></a>
                                    <?php } else { ?>
                                    <?php echo $online['username'];?>
                                    <?php } ?>
                                </li>
                                <?php } ?>
                                <?php } else { ?>
                                <li style="width: auto">当前只有游客或隐身会员在线</li>
                                <?php } ?>
                            </ul>
                        </dd>
                        <?php } ?>
                    </dl>
                    <?php } ?>
                </div>
                <?php } ?>



                <?php if(!empty($_G['setting']['pluginhooks']['index_bottom'])) echo $_G['setting']['pluginhooks']['index_bottom'];?>
            </div>
        </div>

        

    </div>
    <?php if($_G['group']['radminid'] == 1) { ?>
    <?php helper_manyou::checkupdate();?>    <?php } ?>
  <div class="friendlink">
                   <b class="text_b">友情链接</b> 
                   <div><!--[diy=diy49]--><div id="diy49" class="area"><div id="frame8JO5e4" class="frame move-span cl frame-1"><div id="frame8JO5e4_left" class="column frame-1-c"><div id="frame8JO5e4_left_temp" class="move-span temp"></div><?php block_display('956');?></div></div></div><!--[/diy]--> </div>
        </div>
    	</div>
<?php if(empty($topic) || ($topic['usefooter'])) { ?><?php $focusid = getfocus_rand($_G[basescript]);?><?php if($focusid !== null) { ?><?php $focus = $_G['cache']['focus']['data'][$focusid];?><?php $focusnum = count($_G['setting']['focus'][$_G[basescript]]);?><div class="focus" id="sitefocus">
<div class="bm">
<div class="bm_h cl">
<a href="javascript:;" onclick="setcookie('nofocus_<?php echo $_G['basescript'];?>', 1, <?php echo $_G['cache']['focus']['cookie'];?>*3600);$('sitefocus').style.display='none'" class="y" title="关闭">关闭</a>
<h2>
<?php if($_G['cache']['focus']['title']) { ?><?php echo $_G['cache']['focus']['title'];?><?php } else { ?>站长推荐<?php } ?>
<span id="focus_ctrl" class="fctrl"><img src="<?php echo IMGDIR;?>/pic_nv_prev.gif" alt="上一条" title="上一条" id="focusprev" class="cur1" onclick="showfocus('prev');" /> <em><span id="focuscur"></span>/<?php echo $focusnum;?></em> <img src="<?php echo IMGDIR;?>/pic_nv_next.gif" alt="下一条" title="下一条" id="focusnext" class="cur1" onclick="showfocus('next')" /></span>
</h2>
</div>
<div class="bm_c" id="focus_con">
</div>
</div>
</div><?php $focusi = 0;?><?php if(is_array($_G['setting']['focus'][$_G['basescript']])) foreach($_G['setting']['focus'][$_G['basescript']] as $id) { ?><div class="bm_c" style="display: none" id="focus_<?php echo $focusi;?>">
<dl class="xld cl bbda">
<dt><a href="<?php echo $_G['cache']['focus']['data'][$id]['url'];?>" class="xi2" target="_blank"><?php echo $_G['cache']['focus']['data'][$id]['subject'];?></a></dt>
<?php if($_G['cache']['focus']['data'][$id]['image']) { ?>
<dd class="m"><a href="<?php echo $_G['cache']['focus']['data'][$id]['url'];?>" target="_blank"><img src="<?php echo $_G['cache']['focus']['data'][$id]['image'];?>" alt="<?php echo $_G['cache']['focus']['data'][$id]['subject'];?>" /></a></dd>
<?php } ?>
<dd><?php echo $_G['cache']['focus']['data'][$id]['summary'];?></dd>
</dl>
<p class="ptn cl"><a href="<?php echo $_G['cache']['focus']['data'][$id]['url'];?>" class="xi2 y" target="_blank">查看 &raquo;</a></p>
</div><?php $focusi ++;?><?php } ?>
<script type="text/javascript">
var focusnum = <?php echo $focusnum;?>;
if(focusnum < 2) {
$('focus_ctrl').style.display = 'none';
}
if(!$('focuscur').innerHTML) {
var randomnum = parseInt(Math.round(Math.random() * focusnum));
$('focuscur').innerHTML = Math.max(1, randomnum);
}
showfocus();
var focusautoshow = window.setInterval('showfocus(\'next\', 1);', 5000);
</script>
<?php } if($_G['uid'] && $_G['member']['allowadmincp'] == 1 && $_G['setting']['showpatchnotice'] == 1) { ?>
<div class="focus patch" id="patch_notice"></div>
<?php } ?><?php echo adshow("footerbanner/wp a_f/1");?><?php echo adshow("footerbanner/wp a_f/2");?><?php echo adshow("footerbanner/wp a_f/3");?><?php echo adshow("float/a_fl/1");?><?php echo adshow("float/a_fr/2");?><?php echo adshow("couplebanner/a_fl a_cb/1");?><?php echo adshow("couplebanner/a_fr a_cb/2");?><?php echo adshow("cornerbanner/a_cn");?><?php if(!empty($_G['setting']['pluginhooks']['global_footer'])) echo $_G['setting']['pluginhooks']['global_footer'];?>
        </div>
<div id="ft">
            <div class="wp cl">
                <div class="wp">
<div id="flk" class="y">
<p>
                            

</p>
<p class="xs0">
格林尼治时间 GMT<?php echo $_G['timenow']['offset'];?>, <?php echo $_G['timenow']['time'];?></br>
<span id="debuginfo">
         All rigths reserved,Copyright☆2013_ <strong>by Pro_Niki.</strong>			
</span>
</p>
</div>
<div id="frt">
<p>Welcome To <strong>LPer社区!</strong></p>
</div><?php updatesession();?><?php if($_G['uid'] && $_G['group']['allowinvisible']) { ?>
<script type="text/javascript">
var invisiblestatus = '<?php if($_G['session']['invisible']) { ?>隐身<?php } else { ?>在线<?php } ?>';
var loginstatusobj = $('loginstatusid');
if(loginstatusobj != undefined && loginstatusobj != null) loginstatusobj.innerHTML = invisiblestatus;
</script>
<?php } ?>
        </div>
        </div>
</div>

<?php if($upgradecredit !== false) { ?>
<div id="g_upmine_menu" class="tip tip_3" style="display:none;">
<div class="tip_c">
积分 <?php echo $_G['member']['credits'];?>, 距离下一级还需 <?php echo $upgradecredit;?> 积分
</div>
<div class="tip_horn"></div>
</div>
<?php } } if(!$_G['setting']['bbclosed']) { if($_G['uid'] && !isset($_G['cookie']['checkpm'])) { ?>
<script src="home.php?mod=spacecp&ac=pm&op=checknewpm&rand=<?php echo $_G['timestamp'];?>" type="text/javascript"></script>
<?php } if($_G['uid'] && helper_access::check_module('follow') && !isset($_G['cookie']['checkfollow'])) { ?>
<script src="home.php?mod=spacecp&ac=follow&op=checkfeed&rand=<?php echo $_G['timestamp'];?>" type="text/javascript"></script>
<?php } if(!isset($_G['cookie']['sendmail'])) { ?>
<script src="home.php?mod=misc&ac=sendmail&rand=<?php echo $_G['timestamp'];?>" type="text/javascript"></script>
<?php } if($_G['uid'] && $_G['member']['allowadmincp'] == 1 && !isset($_G['cookie']['checkpatch'])) { ?>
<script src="misc.php?mod=patch&action=checkpatch&rand=<?php echo $_G['timestamp'];?>" type="text/javascript"></script>
<?php } } if($_GET['diy'] == 'yes') { if(check_diy_perm($topic) && (empty($do) || $do != 'index')) { ?>
<script src="<?php echo $_G['setting']['jspath'];?>common_diy.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<script src="<?php echo $_G['setting']['jspath'];?>portal_diy<?php if(!check_diy_perm($topic, 'layout')) { ?>_data<?php } ?>.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<?php } if($space['self'] && CURMODULE == 'space' && $do == 'index') { ?>
<script src="<?php echo $_G['setting']['jspath'];?>common_diy.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<script src="<?php echo $_G['setting']['jspath'];?>space_diy.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<?php } } if($_G['uid'] && $_G['member']['allowadmincp'] == 1 && $_G['setting']['showpatchnotice'] == 1) { ?>
<script type="text/javascript">patchNotice();</script>
<?php } if($_G['uid'] && $_G['member']['allowadmincp'] == 1 && empty($_G['cookie']['pluginnotice'])) { ?>
<div class="focus plugin" id="plugin_notice"></div>
<script type="text/javascript">pluginNotice();</script>
<?php } if($_G['member']['newprompt'] && (empty($_G['cookie']['promptstate_'.$_G['uid']]) || $_G['cookie']['promptstate_'.$_G['uid']] != $_G['member']['newprompt']) && $_GET['do'] != 'notice') { ?>
<script type="text/javascript">noticeTitle();</script>
<?php } ?><?php userappprompt();?><?php if($_G['basescript'] != 'userapp') { ?>
<span id="scrolltop" onclick="window.scrollTo('0','0')">回顶部</span>
<script type="text/javascript">_attachEvent(window, 'scroll', function(){showTopLink();});</script>
<?php } ?>
<!--<?php output();?><script src="http://s20.cnzz.com/stat.php?id=5214937&web_id=5214937&show=pic1" type="text/javascript" language="JavaScript"></script>-->
</body>
</html>
