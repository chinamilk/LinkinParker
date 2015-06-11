<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('space_share_list');?><?php include template('common/header'); ?><div id="pt" class="bm cl">
<div class="z">
<a href="./" class="nvhm" title="首页"><?php echo $_G['setting']['bbname'];?></a> <em>&rsaquo;</em>
<?php if($diymode) { ?><a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>"><?php echo $space['username'];?></a> <em>&rsaquo;</em><?php } ?>
<a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>&amp;do=share&amp;view=me&amp;from=space">分享</a>
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
<li<?php echo $actives['we'];?>><a href="home.php?mod=space&amp;do=share&amp;view=we">好友的分享</a></li>
<li<?php echo $actives['me'];?>><a href="home.php?mod=space&amp;do=share&amp;view=me">我的分享</a></li>
<li<?php echo $actives['all'];?>><a href="home.php?mod=space&amp;do=share&amp;view=all">随便看看</a></li>
</ul>
<?php } ?>
<div class="<?php if(empty($diymode)) { ?>bm <?php } ?>bml">
<div class="bm_c">

<?php if(helper_access::check_module('share') && $space['self']) { include template('home/space_share_form'); } ?>

<p class="tbmu bw0">
按类型查看:
<a href="<?php echo $navtheurl;?>&type=all"<?php echo $sub_actives['type_all'];?>>全部</a><span class="pipe">|</span>
<a href="<?php echo $navtheurl;?>&type=link"<?php echo $sub_actives['type_link'];?>>网址</a><span class="pipe">|</span>
<a href="<?php echo $navtheurl;?>&type=video"<?php echo $sub_actives['type_video'];?>>视频</a><span class="pipe">|</span>
<a href="<?php echo $navtheurl;?>&type=music"<?php echo $sub_actives['type_music'];?>>音乐</a><span class="pipe">|</span>
<a href="<?php echo $navtheurl;?>&type=flash"<?php echo $sub_actives['type_flash'];?>>Flash</a><span class="pipe">|</span>
<?php if(helper_access::check_module('blog')) { ?>
<a href="<?php echo $navtheurl;?>&type=blog"<?php echo $sub_actives['type_blog'];?>>日志</a><span class="pipe">|</span>
<?php } if(helper_access::check_module('album')) { ?>
<a href="<?php echo $navtheurl;?>&type=album"<?php echo $sub_actives['type_album'];?>>相册</a><span class="pipe">|</span>
<a href="<?php echo $navtheurl;?>&type=pic"<?php echo $sub_actives['type_pic'];?>>图片</a><span class="pipe">|</span>
<?php } ?>
<a href="<?php echo $navtheurl;?>&type=poll"<?php echo $sub_actives['type_poll'];?>>投票</a><span class="pipe">|</span>
<a href="<?php echo $navtheurl;?>&type=space"<?php echo $sub_actives['type_space'];?>>用户</a><span class="pipe">|</span>
<a href="<?php echo $navtheurl;?>&type=thread"<?php echo $sub_actives['type_thread'];?>>帖子</a>
<?php if(helper_access::check_module('portal')) { ?>
<span class="pipe">|</span>
<a href="<?php echo $navtheurl;?>&type=article"<?php echo $sub_actives['type_article'];?>>文章</a>
<?php } ?>
</p>

<?php if($list) { ?>
<ul id="share_ul" class="el sl"><?php if(is_array($list)) foreach($list as $k => $value) { include template('home/space_share_li'); } ?>
</ul>
<?php if($pricount) { ?>
<p class="mtm">本页有 <?php echo $pricount;?> 条分享因未通过审核而隐藏</p>
<?php } if($multi) { ?><div class="pgs cl mtm"><?php echo $multi;?></div><?php } } else { ?>
<ul id="share_ul" class="el sl"></ul>
<p class="emp">现在还没分享</p>
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
function succeedhandle_shareadd(url, msg, values) {
share_add(values['sid']);
}
</script><?php include template('common/footer'); ?>