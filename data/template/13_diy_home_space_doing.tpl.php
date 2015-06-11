<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('space_doing');?><?php include template('common/header'); ?><div id="pt" class="bm cl">
<div class="z">
<a href="./" class="nvhm" title="首页"><?php echo $_G['setting']['bbname'];?></a> <em>&rsaquo;</em>
<?php if($diymode) { ?><a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>"><?php echo $space['username'];?></a> <em>&rsaquo;</em><?php } ?>
<a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=doing&amp;view=me&amp;from=space">记录</a>
</div>
</div>
<style id="diy_style" type="text/css"></style>
<div class="wp">
<!--[diy=diy1]--><div id="diy1" class="area"></div><!--[/diy]-->
</div>
<div id="ct" class="ct2 ct2_sp wp cl">
<?php if($diymode) { include template('home/space_menu'); ?><div class="bm">
<div class="bm_c cl">
<?php } ?>
<div class="sd">
<!--[diy=diy2]--><div id="diy2" class="area"></div><!--[/diy]-->
</div>
<div class="mn">
<!--[diy=diycontenttop]--><div id="diycontenttop" class="area"></div><!--[/diy]-->
<?php if($_G['uid'] && empty($diymode)) { ?>
<ul class="tb tb_w cl">
<li<?php echo $actives['we'];?>><a href="home.php?mod=space&amp;do=<?php echo $do;?>&amp;view=we">我和好友的记录</a></li>
<li<?php echo $actives['me'];?>><a href="home.php?mod=space&amp;do=<?php echo $do;?>&amp;view=me">我的记录</a></li>
<li<?php echo $actives['all'];?>><a href="home.php?mod=space&amp;do=<?php echo $do;?>&amp;view=all">随便看看</a></li>
</ul>
<?php } ?>
<div class="<?php if(empty($diymode)) { ?>bm <?php } ?>bml">
<div class="bm_c">
<?php if($space['self'] && helper_access::check_module('doing')) { include template('home/space_doing_form'); } if($searchkey) { ?>
<p class="tbmu bw0">以下是搜索记录 <strong class="xi1"><?php echo $searchkey;?></strong> 结果列表</p>
<?php } if($dolist) { ?>
<div class="xld<?php if(empty($diymode)) { ?> xlda<?php } ?> xltda"><?php if(is_array($dolist)) foreach($dolist as $dv) { ?><?php $doid = $dv[doid];?><?php $_GET[key] = $key = random(8);?><dl id="<?php echo $key;?>dl<?php echo $doid;?>" class="pbn bbda cl">
<?php if(empty($diymode)) { ?><dd class="m avt"><a href="home.php?mod=space&amp;uid=<?php echo $dv['uid'];?>" c="1"><?php echo avatar($dv[uid],small);?></a></dd><?php } ?>
<dd class="ptn xs2">
<?php if(empty($diymode)) { ?><a href="home.php?mod=space&amp;uid=<?php echo $dv['uid'];?>"><?php echo $dv['username'];?></a>: <?php } ?><span><?php echo $dv['message'];?></span> <?php if($dv['status'] == 1) { ?> <span class="xw1">(待审核)</span><?php } ?>
</dd><?php $list = $clist[$doid];?><dd class="cmt brm" id="<?php echo $key;?>_<?php echo $doid;?>"<?php if(empty($list) || !$showdoinglist[$doid]) { ?> style="display:none;"<?php } ?>>
<span id="<?php echo $key;?>_form_<?php echo $doid;?>_0"></span><?php include template('home/space_doing_li'); ?></dd>
<dd class="ptn xg1">
<span class="y"><?php echo dgmdate($dv['dateline'], 'u');?></span>
<?php if(helper_access::check_module('doing')) { ?>
<a href="javascript:;" onclick="docomment_form(<?php echo $doid;?>, 0, '<?php echo $key;?>');">回复</a><span class="pipe">|</span>
<?php } if($dv['uid']==$_G['uid']) { ?><a href="home.php?mod=spacecp&amp;ac=doing&amp;op=delete&amp;doid=<?php echo $doid;?>&amp;id=<?php echo $dv['id'];?>&amp;handlekey=doinghk_<?php echo $doid;?>_<?php echo $dv['id'];?>" id="<?php echo $key;?>_doing_delete_<?php echo $doid;?>_<?php echo $dv['id'];?>" onclick="showWindow(this.id, this.href, 'get', 0);">删除</a><?php } if(checkperm('managedoing')) { ?>
<span class="pipe">IP: <?php echo $dv['ip'];?></span>
<?php } ?>
</dd>
</dl>
<?php } if($pricount) { ?>
<p class="mtm">本页有 <?php echo $pricount;?> 条记录因未通过审核而隐藏</p>
<?php } ?>
</div>
<?php if($multi) { ?>
<div class="pgs cl mtm"><?php echo $multi;?></div>
<?php } elseif($_GET['highlight']) { ?>
<div class="pgs cl mtm"><div class="pg"><a href="home.php?mod=space&amp;do=doing&amp;view=me">查看更多</a></div></div>
<?php } } else { ?>
<p class="emp">现在还没有记录<?php if($space['self']) { ?>您可以用一句话记录下这一刻在做什么<?php } ?></p>
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
<?php } include template('common/footer'); ?>