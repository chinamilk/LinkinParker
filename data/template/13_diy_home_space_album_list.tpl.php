<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('space_album_list');?>
<?php $friendsname = array(1 => '�����ѿɼ�',2 => 'ָ�����ѿɼ�',3 => '���Լ��ɼ�',4 => 'ƾ����ɼ�');?><?php include template('common/header'); ?><div id="pt" class="bm cl">
<div class="z">
<a href="./" class="nvhm" title="��ҳ"><?php echo $_G['setting']['bbname'];?></a> <em>&rsaquo;</em>
<?php if($diymode) { ?><a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>"><?php echo $space['username'];?></a> <em>&rsaquo;</em><?php } ?>
<a href="home.php?mod=space&amp;do=album">���</a>
</div>
</div>
<style id="diy_style" type="text/css"></style>
<div class="wp">
<!--[diy=diy1]--><div id="diy1" class="area"></div><!--[/diy]-->
</div>
<div id="ct" class="ct_sp wp cl">
<?php if($diymode) { include template('home/space_menu'); ?><div class="bm">
<div class="bm_c cl">
<?php } ?>
<div class="mn">
<!--[diy=diycontenttop]--><div id="diycontenttop" class="area"></div><!--[/diy]-->
<?php if($_G['uid'] && empty($diymode)) { ?>
<ul class="tb tb_w cl">
<li<?php echo $actives['we'];?>><a href="home.php?mod=space&amp;do=album&amp;view=we">���ѵ����</a></li>
<li<?php echo $actives['me'];?>><a href="home.php?mod=space&amp;do=album&amp;view=me">�ҵ����</a></li>
<li<?php echo $actives['all'];?>><a href="home.php?mod=space&amp;do=album&amp;view=all">��㿴��</a></li>
<?php if(helper_access::check_module('album')) { ?><li class="o"><a href="home.php?mod=spacecp&amp;ac=upload">�ϴ�ͼƬ</a></li><?php } ?>
</ul>
<?php } ?>
<div id="imglist" class="<?php if(empty($diymode)) { ?>bm <?php } ?>bml">
<div class="bm_c">

<div class="tbmu bw0 cl">
<?php if(helper_access::check_module('album') && $space['self'] && $diymode) { ?>
<a href="home.php?mod=spacecp&amp;ac=upload" class="y pn pnc"><strong>�ϴ�ͼƬ</strong></a>
<?php } if($space['self'] && $_GET['view']=='me') { ?>
������̳����־�����ϴ���ͼƬ������ȫ������� <a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=album&amp;id=-1" class="xw1 xi2">Ĭ�����</a> ��
<?php } if($_GET['view'] == 'all') { ?>
<a href="home.php?mod=space&amp;do=album&amp;view=all" <?php if(!$_GET['catid']) { ?><?php echo $orderactives['dateline'];?><?php } ?>>������µ����</a>
<span class="pipe">|</span>
<a href="home.php?mod=space&amp;do=album&amp;view=all&amp;order=hot" <?php echo $orderactives['hot'];?>>����ͼƬ�Ƽ�</a>
<?php if($_G['setting']['albumcategorystat'] && $category) { if(is_array($category)) foreach($category as $value) { ?><span class="pipe">|</span>
<a href="home.php?mod=space&amp;do=album&amp;catid=<?php echo $value['catid'];?>&amp;view=all"<?php if($_GET['catid']==$value['catid']) { ?> class="a"<?php } ?>><?php echo $value['catname'];?></a>
<?php } } } if(($_GET['view'] == 'we') && $userlist) { ?>
������ɸѡ
<select name="fuidsel" onchange="fuidgoto(this.value);" class="ps">
<option value="">ȫ������</option><?php if(is_array($userlist)) foreach($userlist as $value) { ?><option value="<?php echo $value['fuid'];?>"<?php echo $fuid_actives[$value['fuid']];?>><?php echo $value['fusername'];?></option>
<?php } ?>
</select>
<?php } ?>
</div>

<?php if($picmode) { ?>
<div class="ptw">
<?php if($pricount) { ?>
<p class="mbw">��ҳ�� <?php echo $pricount;?> ��ͼƬ�����ߵ���˽���û�δͨ��������</p>
<?php } if($count) { ?>
<ul class="ml mlp cl"><?php if(is_array($list)) foreach($list as $key => $value) { ?><li class="d">
<div class="c">
<a href="home.php?mod=space&amp;uid=<?php echo $value['uid'];?>&amp;do=album&amp;picid=<?php echo $value['picid'];?>"><?php if($value['pic']) { ?><img src="<?php echo $value['pic'];?>" alt="" /><?php } ?></a>
</div>
<p class="ptm"><a href="home.php?mod=space&amp;uid=<?php echo $value['uid'];?>&amp;do=album&amp;id=<?php echo $value['albumid'];?>" class="xi2"><?php echo $value['albumname'];?></a></p>
<span><a href="home.php?mod=space&amp;uid=<?php echo $value['uid'];?>"><?php echo $value['username'];?></a></span>
</li>
<?php } ?>
</ul>
<?php if($multi) { ?><div class="pgs cl mtm"><?php echo $multi;?></div><?php } } else { ?>
<div class="emp">û�п�������б�</div>
<?php } ?>
</div>
<?php } else { if($searchkey) { ?>
<p class="mbw">������������� <span style="color: red; font-weight: 700;"><?php echo $searchkey;?></span> ����б�</p>
<?php } if($pricount) { ?>
<p class="mbw">��ʾ����ҳ�� <?php echo $pricount;?> ����������ߵ���˽���ö�����</p>
<?php } if($count) { ?>
<ul id="waterfall" class="ml waterfall cl"><?php if(is_array($list)) foreach($list as $key => $value) { ?><?php $pwdkey = 'view_pwd_album_'.$value['albumid'];?><li>
<div class="c">
<a href="home.php?mod=space&amp;uid=<?php echo $value['uid'];?>&amp;do=album&amp;id=<?php echo $value['albumid'];?>" target="_blank" <?php if($_G['adminid'] != 1 && $value['uid']!=$_G['uid'] && $value['friend']=='4' && $value['password'] && empty($_G['cookie'][$pwdkey])) { ?> onclick="showWindow('list_album_<?php echo $value['albumid'];?>', this.href, 'get', 0);"<?php } ?>><?php if($value['pic']) { ?><img src="<?php echo $value['pic'];?>" alt="<?php echo $value['albumname'];?>" /><?php } ?></a>
</div>
<h3 class="xw0"><a href="home.php?mod=space&amp;uid=<?php echo $value['uid'];?>&amp;do=album&amp;id=<?php echo $value['albumid'];?>" target="_blank" <?php if($_G['adminid'] != 1 && $value['uid']!=$_G['uid'] && $value['friend']=='4' && $value['password'] && empty($_G['cookie'][$pwdkey])) { ?> onclick="showWindow('list_album_<?php echo $value['albumid'];?>', this.href, 'get', 0);"<?php } ?> class="xi2"><?php if($value['albumname']) { ?><?php echo $value['albumname'];?><?php } else { ?>Ĭ�����<?php } ?></a><?php if($value['picnum']) { ?> (<?php echo $value['picnum'];?>) <?php } ?></h3>
<div class="auth cl">
<?php if($value['uid']==$_G['uid']) { ?>
<p class="xg1"><a href="home.php?mod=spacecp&amp;ac=album&amp;op=editpic&amp;albumid=<?php echo $value['albumid'];?>">�༭</a> <a href="home.php?mod=spacecp&amp;ac=upload&amp;albumid=<?php echo $value['albumid'];?>">�ϴ�</a></p>
<?php } else { ?>
<p><a href="home.php?mod=space&amp;uid=<?php echo $value['uid'];?>" target="_blank"><?php echo $value['username'];?></a></p>
<?php } if($_GET['view']!='me') { ?><p>���� <?php echo dgmdate($value[updatetime], 'n-j H:i');?></p><?php } ?>
</div>
</li>
<?php } if($space['self'] && $_GET['view']=='me') { ?>
<li>
<div class="c">
<a href="home.php?mod=space&amp;uid=<?php echo $value['uid'];?>&amp;do=album&amp;id=-1"><img src="<?php echo IMGDIR;?>/nophoto.gif" alt="Ĭ�����" /></a>
</div>
<div class="auth ptm"><a href="home.php?mod=space&amp;uid=<?php echo $value['uid'];?>&amp;do=album&amp;id=-1" class="xi2">Ĭ�����</a></div>
</li>
<?php } ?>
</ul>
<?php if($multi) { ?><div class="pgs cl mtm"><?php echo $multi;?></div><?php } } else { if($space['self'] && $_GET['view']=='me') { ?>
<ul class="ml waterfall cl">
<li>
<div class="c">
<a href="home.php?mod=space&amp;uid=<?php echo $value['uid'];?>&amp;do=album&amp;id=-1"><img src="<?php echo IMGDIR;?>/nophoto.gif" alt="Ĭ�����" /></a>
</div>
<div class="auth ptm"><a href="home.php?mod=space&amp;uid=<?php echo $value['uid'];?>&amp;do=album&amp;id=-1" class="xi2">Ĭ�����</a></div>
</li>
</ul>
<?php } else { ?>
<div class="emp">û�п�������б�</div>
<?php } } ?>

<script src="<?php echo $_G['style']['styleimgdir'];?>/redef.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<script type="text/javascript" reload="1">
_attachEvent(window, "load", function () {
if($("waterfall")) {
waterfall({"container": $("imglist")});
}
});
</script>

<?php } if(!$_G['setting']['homepagestyle']) { ?><!--[diy=diycontentbottom]--><div id="diycontentbottom" class="area"></div><!--[/diy]--><?php } ?>

</div>
</div>
</div>
<?php if($diymode) { ?>
</div>
</div>
<?php } ?>
</div>

<?php if(!$_G['setting']['homepagestyle']) { ?>
<div class="wp mtn">
<!--[diy=diy3]--><div id="diy3" class="area"></div><!--[/diy]-->
</div>
<?php } ?>

<script type="text/javascript">
function fuidgoto(fuid) {
var parameter = fuid != '' ? '&fuid='+fuid : '';
window.location.href = 'home.php?mod=space&do=album&view=we'+parameter;
}
</script><?php include template('common/footer'); ?>