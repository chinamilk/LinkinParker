<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('space_profile');
0
|| checktplrefresh('./template/tqun/home/space_profile.htm', './template/default/home/space_profile_body.htm', 1380680027, '14', './data/template/13_14_home_space_profile.tpl.php', './template/tqun', 'home/space_profile')
|| checktplrefresh('./template/tqun/home/space_profile.htm', './template/tqun/common/footer.htm', 1380680027, '14', './data/template/13_14_home_space_profile.tpl.php', './template/tqun', 'home/space_profile')
;?><?php include template('common/header'); ?><div id="pt" class="bm cl">
<div class="z">
<a href="./" class="nvhm" title="��ҳ"><?php echo $_G['setting']['bbname'];?></a> <em>&rsaquo;</em>
<a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>"><?php echo $space['username'];?></a> <em>&rsaquo;</em>
<a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=blog&amp;view=me">��������</a>
</div>
</div>
<style id="diy_style" type="text/css"></style>
<div class="wp">
<!--[diy=diy1]--><div id="diy1" class="area"></div><!--[/diy]-->
</div>
<div id="ct" class="ct_sp wp cl"><?php include template('home/space_menu'); ?><div class="bm">
<div class="bm_c cl">

<div class="mn">
<!--[diy=diycontenttop]--><div id="diycontenttop" class="area"></div><!--[/diy]-->
<div class="bml"><div class="bm_c u_profile">

<div class="pbm mbm bbda cl">
<h2 class="mbn">
<?php echo $space['username'];?>
<?php if($_G['ols'][$space['uid']]) { ?>
<img src="<?php echo IMGDIR;?>/ol.gif" alt="online" title="����" class="vm" />&nbsp;
<?php } ?>
<span class="xw0">(UID: <?php echo $space['uid'];?><?php $isfriendinfo = 'home_friend_info_'.$space['uid'].'_'.$_G[uid];?><?php if($_G[$isfriendinfo]['note']) { ?>
, <span class="xg1"><?php echo $_G[$isfriendinfo]['note'];?></span>
<?php } ?>
)</span>
</h2>
<?php if(CURMODULE == 'space') { ?>
<?php if(!empty($_G['setting']['pluginhooks']['space_profile_baseinfo_top'])) echo $_G['setting']['pluginhooks']['space_profile_baseinfo_top'];?>
<?php } elseif(CURMODULE == 'follow') { ?>
<?php if(!empty($_G['setting']['pluginhooks']['follow_profile_baseinfo_top'])) echo $_G['setting']['pluginhooks']['follow_profile_baseinfo_top'];?>
<?php } ?>
<ul class="pf_l cl pbm mbm">
<?php if($_G['setting']['allowspacedomain'] && $_G['setting']['domain']['root']['home'] && checkperm('domainlength') && !empty($space['domain'])) { ?><?php $spaceurl = 'http://'.$space['domain'].'.'.$_G['setting']['domain']['root']['home'];?><li><em>��������</em><a href="<?php echo $spaceurl;?>" onclick="setCopy('<?php echo $spaceurl;?>', '�ռ��ַ���Ƴɹ�');return false;"><?php echo $spaceurl;?></a></li>
<?php } if($_G['setting']['homepagestyle']) { ?>
<li><em>�ռ������</em><strong class="xi1"><?php echo $space['views'];?></strong></li>
<?php } if(in_array($_G['adminid'], array(1, 2))) { ?>
<li><em>Email</em><?php echo $space['email'];?></li>
<?php } ?>
<li><em>����״̬</em><?php if($space['emailstatus'] > 0) { ?>����֤<?php } else { ?>δ��֤<?php } ?></li>
<li><em>��Ƶ��֤</em><?php if($space['videophotostatus'] > 0) { ?>����֤ <?php if($showvideophoto) { ?>&nbsp;&nbsp;(<a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=videophoto" id="viewphoto" onclick="showWindow(this.id, this.href, 'get', 0)">�鿴��֤��Ƭ</a>)<?php } } else { ?>δ��֤<?php } ?></li>
</ul>
<ul>
<?php if($space['spacenote']) { ?><li><em class="xg1">���¼�¼&nbsp;&nbsp;</em><?php echo $space['spacenote'];?></li><?php } if($space['customstatus']) { ?><li class="xg1"><em>�Զ���ͷ��&nbsp;&nbsp;</em><?php echo $space['customstatus'];?></li><?php } if($space['group']['maxsigsize'] && $space['sightml']) { ?><li><em class="xg1">����ǩ��&nbsp;&nbsp;</em><table><tr><td><?php echo $space['sightml'];?></td></tr></table></li><?php } ?>
</ul>
<ul class="cl bbda pbm mbm">
<li>
<em class="xg2">ͳ����Ϣ</em>
<a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=friend&amp;view=me&amp;from=space" target="_blank">������ <?php echo $space['friends'];?></a>
<?php if(helper_access::check_module('doing')) { ?>
<span class="pipe">|</span>
<a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=doing&amp;view=me&amp;from=space" target="_blank">��¼�� <?php echo $space['doings'];?></a>
<?php } if(helper_access::check_module('blog')) { ?>
<span class="pipe">|</span>
<a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=blog&amp;view=me&amp;from=space" target="_blank">��־�� <?php echo $space['blogs'];?></a>
<?php } if(helper_access::check_module('album')) { ?>
<span class="pipe">|</span>
<a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=album&amp;view=me&amp;from=space" target="_blank">����� <?php echo $space['albums'];?></a>
<?php } if($_G['setting']['allowviewuserthread'] !== false) { ?>
<span class="pipe">|</span><?php $space['posts'] = $space['posts'] - $space['threads'];?><a href="<?php if(CURMODULE != 'follow') { ?>home.php?mod=space&uid=<?php echo $space['uid'];?>&do=thread&view=me&type=reply&from=space<?php } else { ?>home.php?mod=space&uid=<?php echo $space['uid'];?>&view=thread&type=reply<?php } ?>" target="_blank">������ <?php echo $space['posts'];?></a>
<span class="pipe">|</span>
<a href="<?php if(CURMODULE != 'follow') { ?>home.php?mod=space&uid=<?php echo $space['uid'];?>&do=thread&view=me&type=thread&from=space<?php } else { ?>home.php?mod=space&uid=<?php echo $space['uid'];?>&view=thread<?php } ?>" target="_blank">������ <?php echo $space['threads'];?></a>
<?php } if(helper_access::check_module('share')) { ?>
<span class="pipe">|</span>
<a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=share&amp;view=me&amp;from=space" target="_blank">������ <?php echo $space['sharings'];?></a>
<?php } ?>
</li>
</ul>
<?php if(CURMODULE == 'space') { ?>
<?php if(!empty($_G['setting']['pluginhooks']['space_profile_baseinfo_middle'])) echo $_G['setting']['pluginhooks']['space_profile_baseinfo_middle'];?>
<?php } elseif(CURMODULE == 'follow') { ?>
<?php if(!empty($_G['setting']['pluginhooks']['follow_profile_baseinfo_middle'])) echo $_G['setting']['pluginhooks']['follow_profile_baseinfo_middle'];?>
<?php } ?>
<ul class="pf_l cl"><?php if(is_array($profiles)) foreach($profiles as $value) { ?><li><em><?php echo $value['title'];?></em><?php echo $value['value'];?></li>
<?php } ?>
</ul>
</div>
<?php if(CURMODULE == 'space') { ?>
<?php if(!empty($_G['setting']['pluginhooks']['space_profile_baseinfo_bottom'])) echo $_G['setting']['pluginhooks']['space_profile_baseinfo_bottom'];?>
<?php } elseif(CURMODULE == 'follow') { ?>
<?php if(!empty($_G['setting']['pluginhooks']['follow_profile_baseinfo_bottom'])) echo $_G['setting']['pluginhooks']['follow_profile_baseinfo_bottom'];?>
<?php } if($space['medals']) { ?>
<div class="pbm mbm bbda cl">
<h2 class="mbn">ѫ��</h2>
<p class="md_ctrl">
<a href="home.php?mod=medal"><?php if(is_array($space['medals'])) foreach($space['medals'] as $medal) { ?><img src="<?php echo STATICURL;?>/image/common/<?php echo $medal['image'];?>" alt="<?php echo $medal['name'];?>" id="md_<?php echo $medal['medalid'];?>" onmouseover="showMenu({'ctrlid':this.id, 'menuid':'md_<?php echo $medal['medalid'];?>_menu', 'pos':'12!'});" />
<?php } ?>
</a>
</p>
</div><?php if(is_array($space['medals'])) foreach($space['medals'] as $medal) { ?><div id="md_<?php echo $medal['medalid'];?>_menu" class="tip tip_4" style="display: none;">
<div class="tip_horn"></div>
<div class="tip_c">
<h4><?php echo $medal['name'];?></h4>
<p><?php echo $medal['description'];?></p>
</div>
</div>
<?php } } if($_G['setting']['verify']['enabled']) { ?><?php $showverify = true;?><?php if(is_array($_G['setting']['verify'])) foreach($_G['setting']['verify'] as $vid => $verify) { if($verify['available']) { if($showverify) { ?>
<div class="pbm mbm bbda cl">
<h2 class="mbn">�û���֤</h2><?php $showverify = false;?><?php } if($space['verify'.$vid] == 1) { ?>
<a href="home.php?mod=spacecp&amp;ac=profile&amp;op=verify&amp;vid=<?php echo $vid;?>" target="_blank"><?php if($verify['icon']) { ?><img src="<?php echo $verify['icon'];?>" class="vm" alt="<?php echo $verify['title'];?>" title="<?php echo $verify['title'];?>" /><?php } else { ?><?php echo $verify['title'];?><?php } ?></a>&nbsp;
<?php } elseif(!empty($verify['unverifyicon'])) { ?>
<a href="home.php?mod=spacecp&amp;ac=profile&amp;op=verify&amp;vid=<?php echo $vid;?>" target="_blank"><?php if($verify['unverifyicon']) { ?><img src="<?php echo $verify['unverifyicon'];?>" class="vm" alt="<?php echo $verify['title'];?>" title="<?php echo $verify['title'];?>" /><?php } ?></a>&nbsp;
<?php } } } if(!$showverify) { ?></div><?php } } if($count) { ?>
<div class="pbm mbm bbda cl">
<h2 class="mbn">�������°��</h2><?php if(is_array($manage_forum)) foreach($manage_forum as $key => $value) { ?><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $key;?>" target="_blank"><?php echo $value;?></a> &nbsp;
<?php } ?>
</div>
<?php } if($groupcount) { ?>
<div class="pbm mbm bbda cl">
<h2 class="mbn">�Ѽ���Ⱥ��</h2><?php if(is_array($usergrouplist)) foreach($usergrouplist as $key => $value) { ?><a href="forum.php?mod=group&amp;fid=<?php echo $value['fid'];?>" target="_blank"><?php echo $value['name'];?></a> &nbsp;
<?php } ?>
</div>
<?php } ?>
<div class="pbm mbm bbda cl">
<h2 class="mbn">��Ծ�ſ�</h2>
<ul>
<?php if($space['adminid']) { ?><li><em class="xg1">������&nbsp;&nbsp;</em><span style="color:<?php echo $space['admingroup']['color'];?>"><a href="home.php?mod=spacecp&amp;ac=usergroup&amp;gid=<?php echo $space['adminid'];?>" target="_blank"><?php echo $space['admingroup']['grouptitle'];?></a></span> <?php echo $space['admingroup']['icon'];?></li><?php } ?>
<li><em class="xg1">�û���&nbsp;&nbsp;</em><span style="color:<?php echo $space['group']['color'];?>"<?php if($upgradecredit !== false) { ?> class="xi2" onmouseover="showTip(this)" tip="���� <?php echo $space['credits'];?>, ������һ������ <?php echo $upgradecredit;?> ����"<?php } ?>><a href="home.php?mod=spacecp&amp;ac=usergroup&amp;gid=<?php echo $space['groupid'];?>" target="_blank"><?php echo $space['group']['grouptitle'];?></a></span> <?php echo $space['group']['icon'];?> <?php if(!empty($space['groupexpiry'])) { ?>&nbsp;��Ч����&nbsp;<?php echo dgmdate($space[groupexpiry], 'Y-m-d H:i');?><?php } ?></li>
<?php if($space['extgroupids']) { ?><li><em class="xg1">��չ�û���&nbsp;&nbsp;</em><?php echo $space['extgroupids'];?></li><?php } ?>
</ul>
<ul id="pbbs" class="pf_l">
<?php if($space['oltime']) { ?><li><em>����ʱ��</em><?php echo $space['oltime'];?> Сʱ</li><?php } ?>
<li><em>ע��ʱ��</em><?php echo $space['regdate'];?></li>
<li><em>������</em><?php echo $space['lastvisit'];?></li>
<?php if($_G['uid'] == $space['uid'] || $_G['group']['allowviewip']) { ?>
<li><em>ע�� IP</em><?php echo $space['regip'];?> - <?php echo $space['regip_loc'];?></li>
<li><em>�ϴη��� IP</em><?php echo $space['lastip'];?> - <?php echo $space['lastip_loc'];?></li>
<?php } if($space['lastactivity']) { ?><li><em>�ϴλʱ��</em><?php echo $space['lastactivity'];?></li><?php } if($space['lastpost']) { ?><li><em>�ϴη���ʱ��</em><?php echo $space['lastpost'];?></li><?php } if($space['lastsendmail']) { ?><li><em>�ϴ��ʼ�֪ͨ</em><?php echo $space['lastsendmail'];?></li><?php } ?>
<li><em>����ʱ��</em><?php $timeoffset = array(
		'9999' => 'ʹ��ϵͳĬ��',
		'-12' => '(GMT -12:00) �������п˵�, ����ֻ���',
		'-11' => '(GMT -11:00) ��;��, ��Ħ��Ⱥ��',
		'-10' => '(GMT -10:00) ������',
		'-9' => '(GMT -09:00) ����˹��',
		'-8' => '(GMT -08:00) ̫ƽ��ʱ��(�����ͼ��ô�), �Ừ��',
		'-7' => '(GMT -07:00) ɽ��ʱ��(�����ͼ��ô�), ����ɣ��',
		'-6' => '(GMT -06:00) �в�ʱ��(�����ͼ��ô�), ī�����',
		'-5' => '(GMT -05:00) ����ʱ��(�����ͼ��ô�), �����, ����, ����',
		'-4' => '(GMT -04:00) ������ʱ��(���ô�), ������˹, ����˹',
		'-3.5' => '(GMT -03:30) Ŧ����',
		'-3' => '(GMT -03:00) ��������, ����ŵ˹����˹, ���ζ�, ������Ⱥ��',
		'-2' => '(GMT -02:00) �д�����, ��ɭ��Ⱥ��, ʥ�����õ�',
		'-1' => '(GMT -01:00) ����Ⱥ��, ��ý�Ⱥ�� [�������α�׼ʱ��] ������, �׶�, ��˹��, ����������',
		'0' => '(GMT) �����������������֣����������׶أ���˹��������ά��',
		'1' => '(GMT +01:00) ����, ��³����, �籾����, �����, ����, ����',
		'2' => '(GMT +02:00) �ն�����, ����������, �Ϸ�, ��ɳ',
		'3' => '(GMT +03:00) �͸��, ���ŵ�, Ī˹��, �����',
		'3.5' => '(GMT +03:30) �º���',
		'4' => '(GMT +04:00) ��������, �Ϳ�, ��˹����, �ر���˹',
		'4.5' => '(GMT +04:30) ������',
		'5' => '(GMT +05:00) Ҷ�����ձ�, ��˹����, ������, ��ʲ��',
		'5.5' => '(GMT +05:30) ����, �Ӷ�����, �����˹, �µ���',
		'5.75' => '(GMT +05:45) �ӵ�����',
		'6' => '(GMT +06:00) ����ľͼ, ������, �￨, ����������',
		'6.5' => '(GMT +06:30) ����',
		'7' => '(GMT +07:00) ����, ����, �żӴ�',
		'8' => '(GMT +08:00) ����, ���, ��˹, �¼���, ̨��',
		'9' => '(GMT +09:00) ����, ����, �׶�, ����, �ſ�Ŀ�',
		'9.5' => '(GMT +09:30) ��������, �����',
		'10' => '(GMT +10:00) ������, �ص�, ī����, Ϥ��, ������',
		'11' => '(GMT +11:00) ��ӵ�, �¿��������, ������Ⱥ��',
		'12' => '(GMT +12:00) �¿���, �����, 쳼�, ���ܶ�Ⱥ��');?><?php echo $timeoffset[$space['timeoffset']];?>
</li>
</ul>
</div>
<div id="psts" class="<?php if($clist) { ?>pbm mbm bbda <?php } ?>cl">
<h2 class="mbn">ͳ����Ϣ</h2>
<ul class="pf_l">
<li><em>���ÿռ�</em><?php echo $space['attachsize'];?></li>
<?php if($space['buyercredit']) { ?>
<li><em>��������</em><a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=trade&amp;view=eccredit#sellcredit" target="_blank"><?php echo $space['buyercredit'];?> <img src="<?php echo STATICURL;?>image/traderank/buyer/<?php echo $space['buyerrank'];?>.gif" border="0" class="vm" /></a></li>
<?php } if($space['sellercredit']) { ?>
<li><em>�������</em><a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=trade&amp;view=eccredit#buyercredit" target="_blank"><?php echo $space['sellercredit'];?> <img src="<?php echo STATICURL;?>image/traderank/seller/<?php echo $space['sellerrank'];?>.gif" border="0" class="vm" /></a></li>
<?php } ?>
<li><em>����</em><?php echo $space['credits'];?></li><?php if(is_array($_G['setting']['extcredits'])) foreach($_G['setting']['extcredits'] as $key => $value) { if($value['title']) { ?>
<li><em><?php echo $value['title'];?></em><?php echo $space["extcredits$key"];?> <?php echo $value['unit'];?></li>
<?php } } ?>
</ul>
</div>
<?php if($clist) { ?>
<div class="cl">
<h2 class="mbm">Υ���¼</h2>
<table id="pcr" class="dt">
<tr>
<th width="15%">������Ϊ</th>
<th width="15%">����ʱ��</th>
<th>��������</th>
<th width="15%">������</th>
</tr><?php if(is_array($clist)) foreach($clist as $crime) { ?><tr>
<td>
<?php if($crime['action'] == 'crime_delpost') { ?>
ɾ������
<?php } elseif($crime['action'] == 'crime_warnpost') { ?>
��������
<?php } elseif($crime['action'] == 'crime_banpost') { ?>
��������
<?php } elseif($crime['action'] == 'crime_banspeak') { ?>
��ֹ����
<?php } elseif($crime['action'] == 'crime_banvisit') { ?>
��ֹ����
<?php } elseif($crime['action'] == 'crime_banstatus') { ?>
�����û�
<?php } elseif($crime['action'] == 'crime_avatar') { ?>
���ͷ��
<?php } elseif($crime['action'] == 'crime_sightml') { ?>
���ǩ��
<?php } elseif($crime['action'] == 'crime_customstatus') { ?>
����Զ���ͷ��
<?php } ?>
</td>
<td><?php echo dgmdate($crime[dateline]);?></td>
<td><?php echo $crime['reason'];?></td>
<td><a href="home.php?mod=space&amp;uid=<?php echo $crime['operatorid'];?>" target="_blank"><?php echo $crime['operator'];?></a></td>
</tr>
<?php } ?>
</table>
</div>
<?php } if(CURMODULE == 'space') { ?>
<?php if(!empty($_G['setting']['pluginhooks']['space_profile_extrainfo'])) echo $_G['setting']['pluginhooks']['space_profile_extrainfo'];?>
<?php } elseif(CURMODULE == 'follow') { ?>
<?php if(!empty($_G['setting']['pluginhooks']['follow_profile_extrainfo'])) echo $_G['setting']['pluginhooks']['follow_profile_extrainfo'];?>
<?php } ?>
</div></div>
<?php if(!$_G['setting']['homepagestyle']) { ?><!--[diy=diycontentbottom]--><div id="diycontentbottom" class="area"></div><!--[/diy]--><?php } ?>
</div>

</div>
</div>
</div>

<div class="wp mtn">
<!--[diy=diy3]--><div id="diy3" class="area"></div><!--[/diy]-->
</div>	</div>
<?php if(empty($topic) || ($topic['usefooter'])) { ?><?php $focusid = getfocus_rand($_G[basescript]);?><?php if($focusid !== null) { ?><?php $focus = $_G['cache']['focus']['data'][$focusid];?><?php $focusnum = count($_G['setting']['focus'][$_G[basescript]]);?><div class="focus" id="sitefocus">
<div class="bm">
<div class="bm_h cl">
<a href="javascript:;" onclick="setcookie('nofocus_<?php echo $_G['basescript'];?>', 1, <?php echo $_G['cache']['focus']['cookie'];?>*3600);$('sitefocus').style.display='none'" class="y" title="�ر�">�ر�</a>
<h2>
<?php if($_G['cache']['focus']['title']) { ?><?php echo $_G['cache']['focus']['title'];?><?php } else { ?>վ���Ƽ�<?php } ?>
<span id="focus_ctrl" class="fctrl"><img src="<?php echo IMGDIR;?>/pic_nv_prev.gif" alt="��һ��" title="��һ��" id="focusprev" class="cur1" onclick="showfocus('prev');" /> <em><span id="focuscur"></span>/<?php echo $focusnum;?></em> <img src="<?php echo IMGDIR;?>/pic_nv_next.gif" alt="��һ��" title="��һ��" id="focusnext" class="cur1" onclick="showfocus('next')" /></span>
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
<p class="ptn cl"><a href="<?php echo $_G['cache']['focus']['data'][$id]['url'];?>" class="xi2 y" target="_blank">�鿴 &raquo;</a></p>
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
��������ʱ�� GMT<?php echo $_G['timenow']['offset'];?>, <?php echo $_G['timenow']['time'];?></br>
<span id="debuginfo">
         All rigths reserved,Copyright��2013_ <strong>by Pro_Niki.</strong>			
</span>
</p>
</div>
<div id="frt">
<p>Welcome To <strong>LPer����!</strong></p>
</div><?php updatesession();?><?php if($_G['uid'] && $_G['group']['allowinvisible']) { ?>
<script type="text/javascript">
var invisiblestatus = '<?php if($_G['session']['invisible']) { ?>����<?php } else { ?>����<?php } ?>';
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
���� <?php echo $_G['member']['credits'];?>, ������һ������ <?php echo $upgradecredit;?> ����
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
<span id="scrolltop" onclick="window.scrollTo('0','0')">�ض���</span>
<script type="text/javascript">_attachEvent(window, 'scroll', function(){showTopLink();});</script>
<?php } ?>
<!--<?php output();?><script src="http://s20.cnzz.com/stat.php?id=5214937&web_id=5214937&show=pic1" type="text/javascript" language="JavaScript"></script>-->
</body>
</html>
