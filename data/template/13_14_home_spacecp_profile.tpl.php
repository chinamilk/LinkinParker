<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('spacecp_profile');
0
|| checktplrefresh('./template/default/home/spacecp_profile.htm', './template/tqun/common/header.htm', 1380694743, '14', './data/template/13_14_home_spacecp_profile.tpl.php', './template/tqun', 'home/spacecp_profile')
|| checktplrefresh('./template/default/home/spacecp_profile.htm', './template/default/home/spacecp_header.htm', 1380694743, '14', './data/template/13_14_home_spacecp_profile.tpl.php', './template/tqun', 'home/spacecp_profile')
|| checktplrefresh('./template/default/home/spacecp_profile.htm', './template/default/home/spacecp_footer.htm', 1380694743, '14', './data/template/13_14_home_spacecp_profile.tpl.php', './template/tqun', 'home/spacecp_profile')
|| checktplrefresh('./template/default/home/spacecp_profile.htm', './template/default/common/seccheck.htm', 1380694743, '14', './data/template/13_14_home_spacecp_profile.tpl.php', './template/tqun', 'home/spacecp_profile')
|| checktplrefresh('./template/default/home/spacecp_profile.htm', './template/default/home/spacecp_profile_nav.htm', 1380694743, '14', './data/template/13_14_home_spacecp_profile.tpl.php', './template/tqun', 'home/spacecp_profile')
|| checktplrefresh('./template/default/home/spacecp_profile.htm', './template/default/common/seditor.htm', 1380694743, '14', './data/template/13_14_home_spacecp_profile.tpl.php', './template/tqun', 'home/spacecp_profile')
|| checktplrefresh('./template/default/home/spacecp_profile.htm', './template/default/home/spacecp_footer.htm', 1380694743, '14', './data/template/13_14_home_spacecp_profile.tpl.php', './template/tqun', 'home/spacecp_profile')
|| checktplrefresh('./template/default/home/spacecp_profile.htm', './template/tqun/common/footer.htm', 1380694743, '14', './data/template/13_14_home_spacecp_profile.tpl.php', './template/tqun', 'home/spacecp_profile')
|| checktplrefresh('./template/default/home/spacecp_profile.htm', './template/tqun/common/header_common.htm', 1380694743, '14', './data/template/13_14_home_spacecp_profile.tpl.php', './template/tqun', 'home/spacecp_profile')
|| checktplrefresh('./template/default/home/spacecp_profile.htm', './template/tqun/common/pubsearchform.htm', 1380694743, '14', './data/template/13_14_home_spacecp_profile.tpl.php', './template/tqun', 'home/spacecp_profile')
|| checktplrefresh('./template/default/home/spacecp_profile.htm', './template/default/home/spacecp_header_name.htm', 1380694743, '14', './data/template/13_14_home_spacecp_profile.tpl.php', './template/tqun', 'home/spacecp_profile')
|| checktplrefresh('./template/default/home/spacecp_profile.htm', './template/default/home/spacecp_header_name.htm', 1380694743, '14', './data/template/13_14_home_spacecp_profile.tpl.php', './template/tqun', 'home/spacecp_profile')
;?>
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
<base href="<?php echo $_G['siteurl'];?>" /><link rel="stylesheet" type="text/css" href="data/cache/style_<?php echo STYLEID;?>_common.css?<?php echo VERHASH;?>" /><link rel="stylesheet" type="text/css" href="data/cache/style_<?php echo STYLEID;?>_home_spacecp.css?<?php echo VERHASH;?>" /><?php if($_G['uid'] && isset($_G['cookie']['extstyle']) && strpos($_G['cookie']['extstyle'], TPLDIR) !== false) { ?><link rel="stylesheet" id="css_extstyle" type="text/css" href="<?php echo $_G['cookie']['extstyle'];?>/style.css" /><?php } elseif($_G['style']['defaultextstyle']) { ?><link rel="stylesheet" id="css_extstyle" type="text/css" href="<?php echo $_G['style']['defaultextstyle'];?>/style.css" /><?php } ?><script type="text/javascript">var STYLEID = '<?php echo STYLEID;?>', STATICURL = '<?php echo STATICURL;?>', IMGDIR = '<?php echo IMGDIR;?>', VERHASH = '<?php echo VERHASH;?>', charset = '<?php echo CHARSET;?>', discuz_uid = '<?php echo $_G['uid'];?>', cookiepre = '<?php echo $_G['config']['cookie']['cookiepre'];?>', cookiedomain = '<?php echo $_G['config']['cookie']['cookiedomain'];?>', cookiepath = '<?php echo $_G['config']['cookie']['cookiepath'];?>', showusercard = '<?php echo $_G['setting']['showusercard'];?>', attackevasive = '<?php echo $_G['config']['security']['attackevasive'];?>', disallowfloat = '<?php echo $_G['setting']['disallowfloat'];?>', creditnotice = '<?php if($_G['setting']['creditnotice']) { ?><?php echo $_G['setting']['creditnames'];?><?php } ?>', defaultstyle = '<?php echo $_G['style']['defaultextstyle'];?>', REPORTURL = '<?php echo $_G['currenturl_encode'];?>', SITEURL = '<?php echo $_G['siteurl'];?>', JSPATH = '<?php echo $_G['setting']['jspath'];?>';</script>
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

    <div id="wp" class="wp"><div id="pt" class="bm cl">
<div class="z">
<a href="./" class="nvhm" title="首页"><?php echo $_G['setting']['bbname'];?></a> <em>&rsaquo;</em>
<a href="home.php?mod=spacecp">设置</a> <em>&rsaquo;</em><?php if($actives['profile']) { ?>
个人资料
<?php } elseif($actives['verify']) { ?>
认证
<?php } elseif($actives['avatar']) { ?>
修改头像
<?php } elseif($actives['credit']) { ?>
积分
<?php } elseif($actives['usergroup']) { ?>
用户组
<?php } elseif($actives['privacy']) { ?>
隐私筛选
<?php } elseif($actives['sendmail']) { ?>
邮件提醒
<?php } elseif($actives['password']) { ?>
密码安全
<?php } elseif($actives['promotion']) { ?>
访问推广
<?php } elseif($actives['plugin']) { ?>
<?php echo $_G['setting']['plugins'][$pluginkey][$_GET['id']]['name'];?>
<?php } ?></div>
</div>
<div id="ct" class="ct2_a wp cl">
<div class="mn">
<div class="bm bw0">
<h1 class="mt"><?php if($actives['profile']) { ?>
个人资料
<?php } elseif($actives['verify']) { ?>
认证
<?php } elseif($actives['avatar']) { ?>
修改头像
<?php } elseif($actives['credit']) { ?>
积分
<?php } elseif($actives['usergroup']) { ?>
用户组
<?php } elseif($actives['privacy']) { ?>
隐私筛选
<?php } elseif($actives['sendmail']) { ?>
邮件提醒
<?php } elseif($actives['password']) { ?>
密码安全
<?php } elseif($actives['promotion']) { ?>
访问推广
<?php } elseif($actives['plugin']) { ?>
<?php echo $_G['setting']['plugins'][$pluginkey][$_GET['id']]['name'];?>
<?php } ?></h1>
<!--don't close the div here--><?php if($validate) { ?>
<p class="tbmu mbm">管理员否决了您的注册申请，请完善注册原因，重新提交申请</p>
<form action="member.php?mod=regverify" method="post" autocomplete="off">
<input type="hidden" value="<?php echo FORMHASH;?>" name="formhash" />
<table summary="个人资料" cellspacing="0" cellpadding="0" class="tfm">
<tr>
<th>否决原因</th>
<td><?php echo $validate['remark'];?></td>
<td>&nbsp;</td>
</tr>
<tr>
<th>注册原因</th>
<td><input type="text" class="px" name="regmessagenew" value="" /></td>
<td>&nbsp;</td>
</tr>
<tr>
<th>&nbsp;</th>
<td colspan="2">
<button type="submit" name="verifysubmit" value="true" class="pn pnc" /><strong>重新提交申请</strong></button>
</td>
</tr>
</table>
</div></div>
<div class="appl"><div class="tbn">
<h2 class="mt bbda">设置</h2>
<ul>
<li<?php echo $actives['avatar'];?>><a href="home.php?mod=spacecp&amp;ac=avatar">修改头像</a></li>
<li<?php echo $actives['profile'];?>><a href="home.php?mod=spacecp&amp;ac=profile">个人资料</a></li>
<?php if($_G['setting']['verify']['enabled'] && allowverify() || $_G['setting']['my_app_status'] && $_G['setting']['videophoto']) { ?>
<li<?php echo $actives['verify'];?>><a href="<?php if($_G['setting']['verify']['enabled']) { ?>home.php?mod=spacecp&ac=profile&op=verify<?php } else { ?>home.php?mod=spacecp&ac=videophoto<?php } ?>">认证</a></li>
<?php } ?>
<li<?php echo $actives['credit'];?>><a href="home.php?mod=spacecp&amp;ac=credit">积分</a></li>
<li<?php echo $actives['usergroup'];?>><a href="home.php?mod=spacecp&amp;ac=usergroup">用户组</a></li>
<li<?php echo $actives['privacy'];?>><a href="home.php?mod=spacecp&amp;ac=privacy">隐私筛选</a></li>

<?php if($_G['setting']['sendmailday']) { ?><li<?php echo $actives['sendmail'];?>><a href="home.php?mod=spacecp&amp;ac=sendmail">邮件提醒</a></li><?php } ?>
<li<?php echo $actives['password'];?>><a href="home.php?mod=spacecp&amp;ac=profile&amp;op=password">密码安全</a></li>

<?php if($_G['setting']['creditspolicy']['promotion_visit'] || $_G['setting']['creditspolicy']['promotion_register']) { ?>
<li<?php echo $actives['promotion'];?>><a href="home.php?mod=spacecp&amp;ac=promotion">访问推广</a></li>
<?php } if(!empty($_G['setting']['plugins']['spacecp'])) { if(is_array($_G['setting']['plugins']['spacecp'])) foreach($_G['setting']['plugins']['spacecp'] as $id => $module) { if(!$module['adminid'] || ($module['adminid'] && $_G['adminid'] > 0 && $module['adminid'] >= $_G['adminid'])) { ?><li<?php if($_GET['id'] == $id) { ?> class="a"<?php } ?>><a href="home.php?mod=spacecp&amp;ac=plugin&amp;id=<?php echo $id;?>"><?php echo $module['name'];?></a></li><?php } } } ?>
</ul>
</div></div>
<?php } else { if($operation == 'password') { ?>
<p class="bbda pbm mbm"><?php if(!$_G['setting']['connect']['allow'] || !$conisregister) { ?>您必须填写原密码才能修改下面的资料<?php } else { ?>您目前使用的是QQ帐号绑定本站，您可以在这里设置独立密码，只有设置了独立密码后本站需要填写密码的相应功能才可使用<?php } ?></p>
<form action="home.php?mod=spacecp&amp;ac=profile" method="post" autocomplete="off">
<input type="hidden" value="<?php echo FORMHASH;?>" name="formhash" />
<table summary="个人资料" cellspacing="0" cellpadding="0" class="tfm">
<?php if(!$_G['setting']['connect']['allow'] || !$conisregister) { ?>
<tr>
<th><span class="rq" title="必填">*</span>旧密码</th>
<td><input type="password" name="oldpassword" id="oldpassword" class="px" /></td>
</tr>
<?php } ?>
<tr>
<th>新密码</th>
<td>
<input type="password" name="newpassword" id="newpassword" class="px" />
<p class="d">如不需要更改密码，此处请留空 </p>
</td>
</tr>
<tr>
<th>确认新密码</th>
<td>
<input type="password" name="newpassword2" id="newpassword2"class="px" />
<p class="d">如不需要更改密码，此处请留空 </p>
</td>
</tr>
<tr id="contact"<?php if($_GET['from'] == 'contact') { ?> style="background-color: <?php echo $_G['style']['specialbg'];?>;"<?php } ?>>
<th>Email</th>
<td>
<input type="text" name="emailnew" id="emailnew" value="<?php echo $space['email'];?>" class="px" />
<p class="d">
<?php if(empty($space['newemail'])) { ?>
<img src="<?php echo IMGDIR;?>/mail_active.png" alt="已验证" class="vm" /> <span class="xi1">当前邮箱已经验证激活</span>
<?php } else { ?>
<?php echo $acitvemessage;?>
<?php } ?>
</p>
<?php if($_G['setting']['regverify'] == 1 && (($_G['group']['grouptype'] == 'member' && $_G['adminid'] == 0) || $_G['groupid'] == 8)) { ?><p class="d">!如更改地址，系统将修改您的密码并重新验证其有效性，请慎用 </p><?php } ?>
</td>
</tr>

<tr>
<th>安全提问</th>
<td>
<select name="questionidnew" id="questionidnew">
<option value="" selected>保持原有的安全提问和答案</option>
<option value="0">无安全提问</option>
<option value="1">母亲的名字</option>
<option value="2">爷爷的名字</option>
<option value="3">父亲出生的城市</option>
<option value="4">您其中一位老师的名字</option>
<option value="5">您个人计算机的型号</option>
<option value="6">您最喜欢的餐馆名称</option>
<option value="7">驾驶执照最后四位数字</option>
</select>
<p class="d">如果您启用安全提问，登录时需填入相应的项目才能登录 </p>
</td>
</tr>

<tr>
<th>回答</th>
<td>
<input type="text" name="answernew" id="answernew" class="px" />
<p class="d">如您设置新的安全提问，请在此输入答案 </p>
</td>
</tr>
<?php if(checkperm('seccode') && ($secqaacheck || $seccodecheck)) { ?><?php $sectpl = '<tr><th><sec></th><td><sec><p class="d"><sec></p></td>';?><?php $_G['sechashi'] = !empty($_G['cookie']['sechashi']) ? $_G['sechash'] + 1 : 0;
$sechash = 'S'.($_G['inajax'] ? 'A' : '').$_G['sid'].$_G['sechashi'];
$sectpl = !empty($sectpl) ? explode("<sec>", $sectpl) : array('<br />',': ','<br />','');
$sectpldefault = $sectpl;
$sectplqaa = str_replace('<hash>', 'qaa'.$sechash, $sectpldefault);
$sectplcode = str_replace('<hash>', 'code'.$sechash, $sectpldefault);
$secshow = !isset($secshow) ? 1 : $secshow;
$sectabindex = !isset($sectabindex) ? 1 : $sectabindex;?><?php
$__STATICURL = STATICURL;$seccheckhtml = <<<EOF

<input name="sechash" type="hidden" value="{$sechash}" />

EOF;
 if($sectpl) { if($secqaacheck) { 
$seccheckhtml .= <<<EOF

{$sectplqaa['0']}验证问答{$sectplqaa['1']}<input name="secanswer" id="secqaaverify_{$sechash}" type="text" autocomplete="off" style="width:100px" class="txt px vm" onblur="checksec('qaa', '{$sechash}')" tabindex="{$sectabindex}" />
<a href="javascript:;" onclick="updatesecqaa('{$sechash}');doane(event);" class="xi2">换一个</a>
<span id="checksecqaaverify_{$sechash}"><img src="{$__STATICURL}image/common/none.gif" width="16" height="16" class="vm" /></span>
{$sectplqaa['2']}<span id="secqaa_{$sechash}"></span>

EOF;
 if($secshow) { 
$seccheckhtml .= <<<EOF
<script type="text/javascript" reload="1">updatesecqaa('{$sechash}');</script>
EOF;
 } 
$seccheckhtml .= <<<EOF

{$sectplqaa['3']}

EOF;
 } if($seccodecheck) { 
$seccheckhtml .= <<<EOF

{$sectplcode['0']}验证码{$sectplcode['1']}<input name="seccodeverify" id="seccodeverify_{$sechash}" type="text" autocomplete="off" style="
EOF;
 if($_G['setting']['seccodedata']['type'] != 1) { 
$seccheckhtml .= <<<EOF
ime-mode:disabled;
EOF;
 } 
$seccheckhtml .= <<<EOF
width:100px" class="txt px vm" onblur="checksec('code', '{$sechash}')" tabindex="{$sectabindex}" />
<a href="javascript:;" onclick="updateseccode('{$sechash}');doane(event);" class="xi2">换一个</a>
<span id="checkseccodeverify_{$sechash}"><img src="{$__STATICURL}image/common/none.gif" width="16" height="16" class="vm" /></span>
{$sectplcode['2']}<span id="seccode_{$sechash}"></span>

EOF;
 if($secshow) { 
$seccheckhtml .= <<<EOF
<script type="text/javascript" reload="1">updateseccode('{$sechash}');</script>
EOF;
 } 
$seccheckhtml .= <<<EOF

{$sectplcode['3']}

EOF;
 } } 
$seccheckhtml .= <<<EOF


EOF;
?><?php unset($secshow);?><?php if(empty($secreturn)) { ?><?php echo $seccheckhtml;?><?php } } ?>
<tr>
<th>&nbsp;</th>
<td><button type="submit" name="pwdsubmit" value="true" class="pn pnc" /><strong>保存</strong></button></td>
</tr>
</table>
<input type="hidden" name="passwordsubmit" value="true" />
</form>
<?php } else { ?>
<?php if(!empty($_G['setting']['pluginhooks']['spacecp_profile_top'])) echo $_G['setting']['pluginhooks']['spacecp_profile_top'];?><ul class="tb cl">
<?php if($operation != 'verify') { if(is_array($profilegroup)) foreach($profilegroup as $key => $value) { if($value['available']) { ?>
<li <?php echo $opactives[$key];?>><a href="home.php?mod=spacecp&amp;ac=profile&amp;op=<?php echo $key;?>"><?php echo $value['title'];?></a></li>
<?php } } if($_G['setting']['allowspacedomain'] && $_G['setting']['domain']['root']['home'] && checkperm('domainlength')) { ?>
<li <?php echo $opactives['domain'];?>><a href="home.php?mod=spacecp&amp;ac=domain">我的空间域名</a></li>
<?php } } else { if($_G['setting']['verify']) { if(is_array($_G['setting']['verify'])) foreach($_G['setting']['verify'] as $vid => $verify) { if($verify['available'] && (empty($verify['groupid']) || in_array($_G['groupid'], $verify['groupid']))) { if($vid != 7) { ?>
<li <?php echo $opactives['verify'.$vid];?>><a href="home.php?mod=spacecp&amp;ac=profile&amp;op=verify&amp;vid=<?php echo $vid;?>"><?php echo $verify['title'];?></a></li>
<?php } elseif($_G['setting']['my_app_status'] && $vid == 7) { ?>
<li <?php echo $opactives['videophoto'];?>><a href="home.php?mod=spacecp&amp;ac=videophoto">视频认证</a></li>
<?php } } } } } if(!empty($_G['setting']['plugins']['spacecp_profile'])) { if(is_array($_G['setting']['plugins']['spacecp_profile'])) foreach($_G['setting']['plugins']['spacecp_profile'] as $id => $module) { if(!$module['adminid'] || ($module['adminid'] && $_G['adminid'] > 0 && $module['adminid'] >= $_G['adminid'])) { ?><li<?php if($_GET['id'] == $id) { ?> class="a"<?php } ?>><a href="home.php?mod=spacecp&amp;ac=plugin&amp;op=profile&amp;id=<?php echo $id;?>"><?php echo $module['name'];?></a></li><?php } } } ?>
</ul><?php if($vid) { ?>
<p class="tbms mtm <?php if(!$showbtn) { ?>tbms_r<?php } ?>"><?php if($showbtn) { ?>以下信息通过审核后将不能再次修改，提交后请耐心等待核查 <?php } else { ?>恭喜您，您的认证审核已经通过，下面的资料项已经不允许被修改 <?php } ?></p>
<?php } ?>
<iframe id="frame_profile" name="frame_profile" style="display: none"></iframe>
<form action="<?php if($operation != 'plugin') { ?>home.php?mod=spacecp&ac=profile&op=<?php echo $operation;?><?php } else { ?>home.php?mod=spacecp&ac=plugin&op=profile&id=<?php echo $_GET['id'];?><?php } ?>" method="post" enctype="multipart/form-data" autocomplete="off"<?php if($operation != 'plugin') { ?> target="frame_profile"<?php } ?> onsubmit="clearErrorInfo();">
<input type="hidden" value="<?php echo FORMHASH;?>" name="formhash" />
<?php if($_GET['vid']) { ?>
<input type="hidden" value="<?php echo $_GET['vid'];?>" name="vid" />
<?php } ?>
<table cellspacing="0" cellpadding="0" class="tfm" id="profilelist">
<tr>
<th>用户名</th>
<td><?php echo $_G['member']['username'];?></td>
<td>&nbsp;</td>
</tr><?php if(is_array($settings)) foreach($settings as $key => $value) { if($value['available']) { ?>
<tr id="tr_<?php echo $key;?>">
<th id="th_<?php echo $key;?>"><?php if($value['required']) { ?><span class="rq" title="必填">*</span><?php } ?><?php echo $value['title'];?></th>
<td id="td_<?php echo $key;?>">
<?php echo $htmls[$key];?>
</td>
<td class="p">
<?php if($vid) { ?>
<input type="hidden" name="privacy[<?php echo $key;?>]" value="3" />
<?php } else { ?>
<select name="privacy[<?php echo $key;?>]">
<option value="0"<?php if($privacy[$key] == "0") { ?> selected="selected"<?php } ?>>公开</option>
<option value="1"<?php if($privacy[$key] == "1") { ?> selected="selected"<?php } ?>>好友可见</option>
<option value="3"<?php if($privacy[$key] == "3") { ?> selected="selected"<?php } ?>>保密</option>
</select>
<?php } ?>
</td>
</tr>
<?php } } if($allowcstatus && in_array('customstatus', $allowitems)) { ?>
<tr>
<th id="th_customstatus">自定义头衔</th>
<td id="td_customstatus">
<input type="text" value="<?php echo $space['customstatus'];?>" name="customstatus" id="customstatus" class="px" />
<div class="rq mtn" id="showerror_customstatus"></div>
</td>
<td>&nbsp;</td>
</tr>
<?php } if($_G['group']['maxsigsize'] && in_array('sightml', $allowitems)) { ?>
<tr>
<th id="th_sightml">个人签名</th>
<td id="td_sightml">
<div class="tedt">
<div class="bar">
<span class="y"><a href="javascript:;" onclick="$('signhtmlpreview').innerHTML = bbcode2html($('sightmlmessage').value)">预览</a></span>
<?php if($_G['group']['allowsigbbcode']) { if($_G['group']['allowsigimgcode']) { ?><?php $seditor = array('sightml', array('bold', 'color', 'img', 'link', 'smilies'));?><?php } else { ?><?php $seditor = array('sightml', array('bold', 'color', 'link', 'smilies'));?><?php } ?><script src="<?php echo $_G['setting']['jspath'];?>seditor.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<div class="fpd">
<?php if(in_array('bold', $seditor['1'])) { ?>
<a href="javascript:;" title="文字加粗" class="fbld"<?php if(empty($seditor['2'])) { ?> onclick="seditor_insertunit('<?php echo $seditor['0'];?>', '[b]', '[/b]');doane(event);"<?php } ?>>B</a>
<?php } if(in_array('color', $seditor['1'])) { ?>
<a href="javascript:;" title="设置文字颜色" class="fclr" id="<?php echo $seditor['0'];?>forecolor"<?php if(empty($seditor['2'])) { ?> onclick="showColorBox(this.id, 2, '<?php echo $seditor['0'];?>');doane(event);"<?php } ?>>Color</a>
<?php } if(in_array('img', $seditor['1'])) { ?>
<a id="<?php echo $seditor['0'];?>img" href="javascript:;" title="图片" class="fmg"<?php if(empty($seditor['2'])) { ?> onclick="seditor_menu('<?php echo $seditor['0'];?>', 'img');doane(event);"<?php } ?>>Image</a>
<?php } if(in_array('link', $seditor['1'])) { ?>
<a id="<?php echo $seditor['0'];?>url" href="javascript:;" title="添加链接" class="flnk"<?php if(empty($seditor['2'])) { ?> onclick="seditor_menu('<?php echo $seditor['0'];?>', 'url');doane(event);"<?php } ?>>Link</a>
<?php } if(in_array('quote', $seditor['1'])) { ?>
<a id="<?php echo $seditor['0'];?>quote" href="javascript:;" title="引用" class="fqt"<?php if(empty($seditor['2'])) { ?> onclick="seditor_menu('<?php echo $seditor['0'];?>', 'quote');doane(event);"<?php } ?>>Quote</a>
<?php } if(in_array('code', $seditor['1'])) { ?>
<a id="<?php echo $seditor['0'];?>code" href="javascript:;" title="代码" class="fcd"<?php if(empty($seditor['2'])) { ?> onclick="seditor_menu('<?php echo $seditor['0'];?>', 'code');doane(event);"<?php } ?>>Code</a>
<?php } if(in_array('smilies', $seditor['1'])) { ?>
<a href="javascript:;" class="fsml" id="<?php echo $seditor['0'];?>sml"<?php if(empty($seditor['2'])) { ?> onclick="showMenu({'ctrlid':this.id,'evt':'click','layer':2});return false;"<?php } ?>>Smilies</a>
<?php if(empty($seditor['2'])) { ?>
<script type="text/javascript" reload="1">smilies_show('<?php echo $seditor['0'];?>smiliesdiv', <?php echo $_G['setting']['smcols'];?>, '<?php echo $seditor['0'];?>');</script>
<?php } } if(in_array('at', $seditor['1']) && $_G['group']['allowat']) { ?>
<script src="<?php echo $_G['setting']['jspath'];?>at.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<a id="<?php echo $seditor['0'];?>at" href="javascript:;" title="@朋友" class="fat"<?php if(empty($seditor['2'])) { ?> onclick="seditor_menu('<?php echo $seditor['0'];?>', 'at');doane(event);"<?php } ?>>@朋友</a>
<?php } ?>
<?php echo $seditor['3'];?>
</div><?php } ?>
</div>
<div class="area">
<textarea rows="3" cols="80" name="sightml" id="sightmlmessage" class="pt" onkeydown="ctrlEnter(event, 'profilesubmitbtn');"><?php echo $space['sightml'];?></textarea>
</div>
</div>
<div id="signhtmlpreview"></div>
<div id="showerror_sightml" class="rq mtn"></div>
<script src="<?php echo $_G['setting']['jspath'];?>bbcode.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<script type="text/javascript">var forumallowhtml = 0,allowhtml = 0,allowsmilies = 0,allowbbcode = parseInt('<?php echo $_G['group']['allowsigbbcode'];?>'),allowimgcode = parseInt('<?php echo $_G['group']['allowsigimgcode'];?>');var DISCUZCODE = [];DISCUZCODE['num'] = '-1';DISCUZCODE['html'] = [];</script>
</td>
<td>&nbsp;</td>
</tr>
<?php } if(in_array('timeoffset', $allowitems)) { ?>
<tr>
<th id="th_timeoffset">时区</th>
<td id="td_timeoffset"><?php $timeoffset = array(
		'9999' => '使用系统默认',
		'-12' => '(GMT -12:00) 埃尼威托克岛, 夸贾林环礁',
		'-11' => '(GMT -11:00) 中途岛, 萨摩亚群岛',
		'-10' => '(GMT -10:00) 夏威夷',
		'-9' => '(GMT -09:00) 阿拉斯加',
		'-8' => '(GMT -08:00) 太平洋时间(美国和加拿大), 提华纳',
		'-7' => '(GMT -07:00) 山区时间(美国和加拿大), 亚利桑那',
		'-6' => '(GMT -06:00) 中部时间(美国和加拿大), 墨西哥城',
		'-5' => '(GMT -05:00) 东部时间(美国和加拿大), 波哥大, 利马, 基多',
		'-4' => '(GMT -04:00) 大西洋时间(加拿大), 加拉加斯, 拉巴斯',
		'-3.5' => '(GMT -03:30) 纽芬兰',
		'-3' => '(GMT -03:00) 巴西利亚, 布宜诺斯艾利斯, 乔治敦, 福克兰群岛',
		'-2' => '(GMT -02:00) 中大西洋, 阿森松群岛, 圣赫勒拿岛',
		'-1' => '(GMT -01:00) 亚速群岛, 佛得角群岛 [格林尼治标准时间] 都柏林, 伦敦, 里斯本, 卡萨布兰卡',
		'0' => '(GMT) 卡萨布兰卡，都柏林，爱丁堡，伦敦，里斯本，蒙罗维亚',
		'1' => '(GMT +01:00) 柏林, 布鲁塞尔, 哥本哈根, 马德里, 巴黎, 罗马',
		'2' => '(GMT +02:00) 赫尔辛基, 加里宁格勒, 南非, 华沙',
		'3' => '(GMT +03:00) 巴格达, 利雅得, 莫斯科, 奈洛比',
		'3.5' => '(GMT +03:30) 德黑兰',
		'4' => '(GMT +04:00) 阿布扎比, 巴库, 马斯喀特, 特比利斯',
		'4.5' => '(GMT +04:30) 坎布尔',
		'5' => '(GMT +05:00) 叶卡特琳堡, 伊斯兰堡, 卡拉奇, 塔什干',
		'5.5' => '(GMT +05:30) 孟买, 加尔各答, 马德拉斯, 新德里',
		'5.75' => '(GMT +05:45) 加德满都',
		'6' => '(GMT +06:00) 阿拉木图, 科伦坡, 达卡, 新西伯利亚',
		'6.5' => '(GMT +06:30) 仰光',
		'7' => '(GMT +07:00) 曼谷, 河内, 雅加达',
		'8' => '(GMT +08:00) 北京, 香港, 帕斯, 新加坡, 台北',
		'9' => '(GMT +09:00) 大阪, 札幌, 首尔, 东京, 雅库茨克',
		'9.5' => '(GMT +09:30) 阿德莱德, 达尔文',
		'10' => '(GMT +10:00) 堪培拉, 关岛, 墨尔本, 悉尼, 海参崴',
		'11' => '(GMT +11:00) 马加丹, 新喀里多尼亚, 所罗门群岛',
		'12' => '(GMT +12:00) 奥克兰, 惠灵顿, 斐济, 马绍尔群岛');?><select name="timeoffset"><?php if(is_array($timeoffset)) foreach($timeoffset as $key => $desc) { ?><option value="<?php echo $key;?>"<?php if($key==$space['timeoffset']) { ?> selected="selected"<?php } ?>><?php echo $desc;?></option>
<?php } ?>
</select>
<p class="mtn">当前时间 : <?php echo dgmdate($_G[timestamp]);?></p>
<p class="d">如果发现当前显示的时间与您本地时间相差几个小时，那么您需要更改自己的时区设置 </p>
</td>
<td>&nbsp;</td>
</tr>
<?php } if($operation == 'contact') { ?>
<tr>
<th id="th_sightml">Email</th>
<td id="td_sightml"><?php echo $space['email'];?>&nbsp;(<a href="home.php?mod=spacecp&amp;ac=profile&amp;op=password&amp;from=contact#contact">修改</a>)</td>
<td>&nbsp;</td>
</tr>
<?php } if($operation == 'plugin') { ?><?php include(template($_GET['id']));?><?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['spacecp_profile_extra'])) echo $_G['setting']['pluginhooks']['spacecp_profile_extra'];?>
<?php if($showbtn) { ?>
<tr>
<th>&nbsp;</th>
<td colspan="2">
<input type="hidden" name="profilesubmit" value="true" />
<button type="submit" name="profilesubmitbtn" id="profilesubmitbtn" value="true" class="pn pnc" /><strong>保存</strong></button>
<span id="submit_result" class="rq"></span>
</td>
</tr>
<?php } ?>
</table>
<?php if(!empty($_G['setting']['pluginhooks']['spacecp_profile_bottom'])) echo $_G['setting']['pluginhooks']['spacecp_profile_bottom'];?>
</form>
<script type="text/javascript">
function show_error(fieldid, extrainfo) {
var elem = $('th_'+fieldid);
if(elem) {
elem.className = "rq";
fieldname = elem.innerHTML;
extrainfo = (typeof extrainfo == "string") ? extrainfo : "";
$('showerror_'+fieldid).innerHTML = "请检查该资料项 " + extrainfo;
$(fieldid).focus();
}
}
function show_success(message) {
message = message == '' ? '资料更新成功' : message;
showDialog(message, 'right', '提示信息', function(){
top.window.location.href = top.window.location.href;
}, 0, null, '', '', '', '', 3);
}
function clearErrorInfo() {
var spanObj = $('profilelist').getElementsByTagName("div");
for(var i in spanObj) {
if(typeof spanObj[i].id != "undefined" && spanObj[i].id.indexOf("_")) {
var ids = explode('_', spanObj[i].id);
if(ids[0] == "showerror") {
spanObj[i].innerHTML = '';
$('th_'+ids[1]).className = '';
}
}
}
}
</script>
<?php } ?>
</div>
</div>
<div class="appl"><div class="tbn">
<h2 class="mt bbda">设置</h2>
<ul>
<li<?php echo $actives['avatar'];?>><a href="home.php?mod=spacecp&amp;ac=avatar">修改头像</a></li>
<li<?php echo $actives['profile'];?>><a href="home.php?mod=spacecp&amp;ac=profile">个人资料</a></li>
<?php if($_G['setting']['verify']['enabled'] && allowverify() || $_G['setting']['my_app_status'] && $_G['setting']['videophoto']) { ?>
<li<?php echo $actives['verify'];?>><a href="<?php if($_G['setting']['verify']['enabled']) { ?>home.php?mod=spacecp&ac=profile&op=verify<?php } else { ?>home.php?mod=spacecp&ac=videophoto<?php } ?>">认证</a></li>
<?php } ?>
<li<?php echo $actives['credit'];?>><a href="home.php?mod=spacecp&amp;ac=credit">积分</a></li>
<li<?php echo $actives['usergroup'];?>><a href="home.php?mod=spacecp&amp;ac=usergroup">用户组</a></li>
<li<?php echo $actives['privacy'];?>><a href="home.php?mod=spacecp&amp;ac=privacy">隐私筛选</a></li>

<?php if($_G['setting']['sendmailday']) { ?><li<?php echo $actives['sendmail'];?>><a href="home.php?mod=spacecp&amp;ac=sendmail">邮件提醒</a></li><?php } ?>
<li<?php echo $actives['password'];?>><a href="home.php?mod=spacecp&amp;ac=profile&amp;op=password">密码安全</a></li>

<?php if($_G['setting']['creditspolicy']['promotion_visit'] || $_G['setting']['creditspolicy']['promotion_register']) { ?>
<li<?php echo $actives['promotion'];?>><a href="home.php?mod=spacecp&amp;ac=promotion">访问推广</a></li>
<?php } if(!empty($_G['setting']['plugins']['spacecp'])) { if(is_array($_G['setting']['plugins']['spacecp'])) foreach($_G['setting']['plugins']['spacecp'] as $id => $module) { if(!$module['adminid'] || ($module['adminid'] && $_G['adminid'] > 0 && $module['adminid'] >= $_G['adminid'])) { ?><li<?php if($_GET['id'] == $id) { ?> class="a"<?php } ?>><a href="home.php?mod=spacecp&amp;ac=plugin&amp;id=<?php echo $id;?>"><?php echo $module['name'];?></a></li><?php } } } ?>
</ul>
</div></div>
<?php } ?>
</div>	</div>
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
