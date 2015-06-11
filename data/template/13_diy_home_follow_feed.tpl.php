<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('follow_feed');
0
|| checktplrefresh('./template/tqun/home/follow_feed.htm', './template/default/common/seccheck.htm', 1380694977, 'diy', './data/template/13_diy_home_follow_feed.tpl.php', './template/tqun', 'home/follow_feed')
|| checktplrefresh('./template/tqun/home/follow_feed.htm', './template/default/common/seditor.htm', 1380694977, 'diy', './data/template/13_diy_home_follow_feed.tpl.php', './template/tqun', 'home/follow_feed')
|| checktplrefresh('./template/tqun/home/follow_feed.htm', './template/tqun/home/follow_feed_li.htm', 1380694977, 'diy', './data/template/13_diy_home_follow_feed.tpl.php', './template/tqun', 'home/follow_feed')
|| checktplrefresh('./template/tqun/home/follow_feed.htm', './template/tqun/common/footer.htm', 1380694977, 'diy', './data/template/13_diy_home_follow_feed.tpl.php', './template/tqun', 'home/follow_feed')
;?><?php include template('common/header'); ?><div id="pt" class="bm cl">
<div class="z">
<a href="./" class="nvhm" title="首页"><?php echo $_G['setting']['bbname'];?></a> <em>&rsaquo;</em>
<?php if($do == 'feed') { ?>
<a href="home.php?mod=follow">广播</a>
<?php } else { ?>
<a href="home.php?mod=space&amp;uid=<?php echo $space['uid'];?>"><?php echo $space['username'];?></a> <em>&rsaquo;</em>
<a href="home.php?mod=follow&amp;uid=<?php echo $space['uid'];?>&amp;do=view&amp;from=space">广播</a>
<?php } ?>
</div>
</div>
<style id="diy_style" type="text/css"></style>
<div class="wp">
<!--[diy=diy1]--><div id="diy1" class="area"></div><!--[/diy]-->
</div>
<div id="ct" class="ct2 ct2_sp wp cl">
<?php if($do != 'feed') { include template('home/space_menu'); ?><div class="bm">
<div class="bm_c cl">
<?php } ?>
<div class="sd">
<?php if(helper_access::check_module('follow') && $do == 'feed') { ?>
<div class="flw_hd mbm">
<div class="tns">
<table cellspacing="0" cellpadding="0">
<tr>
<th>
<span><a href="home.php?mod=space&amp;uid=<?php echo $uid;?>">广播</a></span>
<p><a href="home.php?mod=space&amp;uid=<?php echo $uid;?>"><?php echo $space['feeds'];?></a></p>
</th>
<th>
<span><a href="home.php?mod=follow&amp;do=following&amp;uid=<?php echo $uid;?>">收听</a></span>
<p><a href="home.php?mod=follow&amp;do=following&amp;uid=<?php echo $uid;?>"><?php echo $space['following'];?></a></p>
</th>
<td>
<span><a href="home.php?mod=follow&amp;do=follower&amp;uid=<?php echo $uid;?>">听众</a></span>
<p><a href="home.php?mod=follow&amp;do=follower&amp;uid=<?php echo $uid;?>"><?php echo $space['follower'];?></a></p>
</td>
</tr>
</table>
</div>
</div>
<?php } ?>
<!--[diy=diy2]--><div id="diy2" class="area"></div><!--[/diy]-->
</div>
<div class="mn">
<!--[diy=diycontenttop]--><div id="diycontenttop" class="area"></div><!--[/diy]-->

<?php if(!empty($_G['setting']['pluginhooks']['follow_top'])) echo $_G['setting']['pluginhooks']['follow_top'];?>

<?php if(in_array($do, array('feed', 'view'))) { if(helper_access::check_module('follow') && ( $do == 'feed' || ( $do == 'view' && $viewself))) { ?>
<div id="flw_header" class="mbw cl">

<script src="<?php echo $_G['setting']['jspath'];?>forum.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<script src="<?php echo $_G['setting']['jspath'];?>forum_moderate.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<script type="text/javascript">
var postminchars = parseInt('<?php echo $_G['setting']['minpostsize'];?>');
var postmaxchars = parseInt('<?php echo $_G['setting']['maxpostsize'];?>');
var disablepostctrl = parseInt('<?php echo $_G['group']['disablepostctrl'];?>');
</script><?php $dmfid = $_G['setting']['followforumid'] && !empty($defaultforum) ? $_G['setting']['followforumid'] : 0;?><form method="post" autocomplete="off" id="fastpostform" action="home.php?mod=spacecp&amp;ac=follow&amp;op=newthread&amp;topicsubmit=yes&amp;infloat=yes&amp;handlekey=fastnewpost&amp;inajax=1" onsubmit="return fastpostvalidate(this);">
<div id="fastpostreturn" style="margin:-5px 0 5px"></div>
<div class="mbn cl" id="forumlistdev" style="display: none;">
<select name="defaultforum" id="fid" class="ps z" onchange="modifyformurl(this.value);">
<option value="0">浏览其它版块</option>
</select>
<select name="forumlist" id="forumlist" class="ps z" onchange="addforumlist(this);" style="display: none;">
<option value="0">选择版块</option>
<?php echo $forumlist;?>
</select>

<div class="ftid">
<span class="ftid" id="threadclass"></span>
</div>
</div>
<div id="flw_post_subject" style="display:none;">
<span id="flw_checklen" class="y"><span id="checklen" class="xg1">80</span></span>
<input type="text" id="subject" name="subject" onkeyup="strLenCalc(this, 'checklen', 80);" tabindex="11" />
</div>

<div id="flw_post_extra" class="mtn cl">
<div<?php if($_G['setting']['fastsmilies']) { ?> class="hasfsl"<?php } ?> id="fastposteditor">
<div class="tedt">
<div class="area">
<textarea rows="5" cols="80" name="message" id="fastpostmessage" onKeyDown="seditor_ctlent(event, '$(\'fastpostsubmit\').click()');" tabindex="12" class="pt xs2"></textarea>
</div>
</div>

<?php if(checkperm('seccode') && ($secqaacheck || $seccodecheck)) { ?><?php
$sectpl = <<<EOF
<sec> <span id="sec<hash>" onclick="showMenu(this.id)"><sec></span><div id="sec<hash>_menu" class="p_pop p_opt" style="display:none"><sec></div>
EOF;
?>
<div class="mtm sec"><?php $_G['sechashi'] = !empty($_G['cookie']['sechashi']) ? $_G['sechash'] + 1 : 0;
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
?><?php unset($secshow);?><?php if(empty($secreturn)) { ?><?php echo $seccheckhtml;?><?php } ?></div>
<?php } ?>

<div id="flw_bar" class="ptm">
<p class="y pnpost">
<label class="vm"><input type="checkbox" name="syncbbs" id="syncbbs" class="pc" value="1" onclick="showSyncInfo(this.checked)" />同步到论坛</label>&nbsp;
<button <?php if($_G['uid']) { ?>type="submit" <?php } else { ?>type="button" onclick="showWindow('login', 'member.php?mod=logging&action=login&guestmessage=yes')" <?php } ?>name="topicsubmit_btn" id="fastpostsubmit" value="topicsubmitbtn" tabindex="13" class="pn pnc vm"><strong><?php echo '发布'; ?></strong></button>
</p><?php $seditor = array('fastpost', array('smilies', 'at'), 0, '<span id="spanButtonPlaceholder">上传</span>');?><script src="<?php echo $_G['setting']['jspath'];?>seditor.js?<?php echo VERHASH;?>" type="text/javascript"></script>
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
</div></div>
</div>
<script type="text/javascript">
var editorid = '';
var ATTACHNUM = {'imageused':0,'imageunused':0,'attachused':0,'attachunused':0}, ATTACHUNUSEDAID = new Array(), IMGUNUSEDAID = new Array();
</script>
<script src="<?php echo $_G['setting']['jspath'];?>swfupload.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<script src="<?php echo $_G['setting']['jspath'];?>swfupload.queue.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<script src="<?php echo $_G['setting']['jspath'];?>handlers.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<script src="<?php echo $_G['setting']['jspath'];?>fileprogress.js?<?php echo VERHASH;?>" type="text/javascript"></script>

<div class="upfl<?php if(empty($_GET['from']) && $_G['setting']['fastsmilies']) { ?> hasfsl<?php } ?>">
<div id="attachlist" class="fieldset flash cl"><span style="font-size:0"></span></div>

<script type="text/javascript">
var fid = <?php if($_G['setting']['followforumid']) { ?><?php echo $_G['setting']['followforumid'];?><?php } else { ?>0<?php } ?>;
var resulttype = 'follow';
var upload = new SWFUpload({
// Backend Settings
upload_url: "<?php echo $_G['siteurl'];?>misc.php?mod=swfupload&action=swfupload&operation=upload&fid=<?php echo $dmfid;?>",
post_params: {"uid" : "<?php echo $_G['uid'];?>", "hash":"<?php echo $swfconfig['hash'];?>"},

// File Upload Settings
file_size_limit : "<?php echo $swfconfig['max'];?>",	// 100MB
file_types : "<?php echo $swfconfig['attachexts']['ext'];?>",
file_types_description : "<?php echo $swfconfig['attachexts']['depict'];?>",
file_upload_limit : <?php echo $swfconfig['limit'];?>,
file_queue_limit : 0,

// Event Handler Settings (all my handlers are in the Handler.js file)
swfupload_preload_handler : preLoad,
swfupload_load_failed_handler : loadFailed,
file_dialog_start_handler : fileDialogStart,
file_queued_handler : fileQueued,
file_queue_error_handler : fileQueueError,
file_dialog_complete_handler : fileDialogComplete,
upload_start_handler : uploadStart,
upload_progress_handler : uploadProgress,
upload_error_handler : uploadError,
upload_success_handler : uploadSuccess,
upload_complete_handler : uploadComplete,

// Button Settings
button_image_url : "<?php echo IMGDIR;?>/flw_post_attach.png",
button_placeholder_id : "spanButtonPlaceholder",
button_width: 18,
button_height: 25,
button_cursor:SWFUpload.CURSOR.HAND,
button_window_mode: "transparent",

custom_settings : {
progressTarget : "attachlist",
uploadSource: 'forum',
uploadType: 'attach',
<?php if($swfconfig['maxsizeperday']) { ?>
maxSizePerDay: <?php echo $swfconfig['maxsizeperday'];?>,
<?php } if($swfconfig['maxattachnum']) { ?>
maxAttachNum: <?php echo $swfconfig['maxattachnum'];?>,
<?php } ?>
uploadFrom: 'fastpost'
},

// Debug Settings
debug: false
});

var attachBtn = $('flw_bar').getElementsByTagName('object')[0];
var flwbarBtn = $('flw_bar').getElementsByTagName('a');
if(BROWSER.ie && BROWSER.ie < 7 && attachBtn) {
attachBtn.style.left = flwbarBtn ? flwbarBtn.length * 25 : 0;
}

</script>
</div>

<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<input type="hidden" name="usesig" value="<?php echo $usesigcheck;?>" />
<input type="hidden" name="adddynamic" value="1" />
<input type="hidden" name="addfeed" value="1" />
<input type="hidden" name="topicsubmit" value="true" />
<input type="hidden" name="referer" value="<?php echo dreferer(); ?>" />
</div>
</form>

<script type="text/javascript">
var nofollowfeed = <?php if(!empty($list['feed'])) { ?>0<?php } else { ?>1<?php } ?>;
var userdatakey = cookiepre+'fastpost<?php echo $_G['uid'];?>';
function showSyncInfo(flag) {
display('flw_post_subject');
display('forumlistdev');
var sObj = $('subject');
sObj.value = '';
strLenCalc(sObj, 'checklen', 80);
}
function fastpostvalidateextra() {
var sObj = $('subject');
if(!$('syncbbs').checked) {
$('subject').value = '  ';
}
return true;
}
function backupContent() {
var obj = $('fastpostform');
if(!obj) return;
var data = subject = message = '';
saveUserdata(userdatakey, data);
for(var i = 0; i < obj.elements.length; i++) {
var el = obj.elements[i];
if(el.name != '' && el.tagName == 'SELECT') {
var elvalue = el.value;
if(trim(elvalue)) {
data += el.name + String.fromCharCode(9) + el.tagName + String.fromCharCode(9) + el.type + String.fromCharCode(9) + elvalue + String.fromCharCode(9, 9);
if(el.tagName == 'SELECT' && el.name == 'defaultforum') {
var values = {};
for(var j = 0; j < el.options.length; j++) {
var option = el.options[j];
var ov = parseInt(option.value);
if(typeof values[option.value] == 'undefined' && !isNaN(ov) && option.innerText != '' && option.innerText != 'undefined') {
data += el.name + String.fromCharCode(9) + option.tagName + String.fromCharCode(9) + option.value + String.fromCharCode(9) + option.text + String.fromCharCode(9, 9);
values[option.value] = option.value;
}
}
}
}
}
}
saveUserdata(userdatakey, data);
}
function addforumlist(listObj) {
var fid = listObj.value;
if(fid) {
var dforum = $('fid');
//判断是否已经在列表中
var haveoption = false;
for(var i = 0; i < dforum.options.length; i++) {
if(dforum.options[i].value == fid) {
dforum.selectedIndex = i;
haveoption = true;
break;
}
}
if(!haveoption) {
var option = listObj.options[listObj.selectedIndex];
var oOption = document.createElement("OPTION");
oOption.text = trim(option.text);
oOption.value = option.value;
dforum.options.add(oOption);
dforum.selectedIndex = dforum.options.length-1;
}

modifyformurl(fid);
}
dforum.style.display = '';
listObj.style.display = 'none';
}
function modifyformurl(mfid) {
if(parseInt(mfid)) {
backupContent();
//noteX 修改表单中的两个固定地址
$('fastpostform').action = 'home.php?mod=spacecp&ac=follow&op=newthread&topicsubmit=yes&infloat=yes&handlekey=fastnewpost&inajax=1&fid='+mfid;
if(upload) {
fid = mfid;
var uploadurl = '<?php echo $_G['siteroot'];?>misc.php?mod=swfupload&action=swfupload&operation=upload&fid='+mfid;
upload.setUploadURL(uploadurl);
}
getthreadclass();
} else {
var flist = $('forumlist');
var dforum = $('fid');
dforum.style.display = 'none';
flist.style.display = '';
}

}

function resumeContent() {
var data = loadUserdata(userdatakey);
if(in_array((data = trim(data)), ['', 'null', 'false', null, false])) {
modifyformurl(<?php echo $dmfid;?>);
return false;
}
var data = data.split(/\x09\x09/);
var formObj = $('fastpostform');
var sValue = 0;
for(var i = 0; i < formObj.elements.length; i++) {
var el = formObj.elements[i];
if(el.name != '' && el.tagName == 'SELECT') {
for(var j = 0; j < data.length; j++) {
var ele = data[j].split(/\x09/);
if(ele[0] == el.name) {
elvalue = !isUndefined(ele[3]) ? ele[3] : '';
if(ele[1] == 'SELECT') {
//添加选项
var values = {0:0<?php if($_G['setting']['followforumid']) { ?>,<?php echo $_G['setting']['followforumid'];?>:<?php echo $_G['setting']['followforumid'];?><?php } ?>};
for(var oi = 0; oi < data.length; oi++) {
var oObj = data[oi].split(/\x09/);
if(oObj[0] == el.name && oObj[1] == 'OPTION' && typeof values[oObj[2]] == 'undefined') {
var oOption = document.createElement("OPTION");
el.options.add(oOption);
oOption.text = oObj[3];
values[oObj[2]] = oOption.value = oObj[2];
if(elvalue == oObj[2]) {
el.selectedIndex = el.options.length-1;
modifyformurl(elvalue);
}
}
}
if(el.options.length < 2) {
modifyformurl(0);
}

}
break
}
}
}
}
}
function succeedhandle_fastnewpost(url, msg, values) {
if(nofollowfeed) {
window.location.reload();
} else {
if(parseInt(values.feedid)) {
getNewFollowFeed(values.tid, values.fid, values.pid, values.feedid);
} else {
showDialog(msg, 'notice', null, null, 0, null, null, null, null, 3);
}
showCreditPrompt();
//清空上次的输入
var sObj = $('subject');
$('attachlist').innerHTML = $('fastpostmessage').value = sObj.value = '';
strLenCalc(sObj, 'checklen', 80);
//var msg = '您的主题已发布，<a href="'+url+'" class="xi2">点击这里查看主题</a>'
//showDialog(msg, 'notice', null, null, 0, null, null, null, null, 3);
}

}
function getNewFollowFeed(tid, fid, pid, feedid) {
var x = new Ajax();
x.get('forum.php?mod=ajax&action=getpostfeed&inajax=1&tid='+tid+'&fid='+fid+'&pid='+pid+'&feedid='+feedid, function(s){
newli = document.createElement("li");
newli.innerHTML = s;
var listObj = $('followlist');

listObj.insertBefore(newli, listObj.firstChild);
});
}

resumeContent();

function cleartitle(obj) {
if($('flw_post_subject').style.display== 'none') {
var sObj = $('subject');
sObj.value = '';
strLenCalc(sObj, 'checklen', 80);
obj.innerHTML = '添加标题';
} else {
obj.innerHTML = '自动截取标题';
}
}
</script>
</div>
<?php } if(in_array($do, array('feed', 'view'))) { if($do == 'feed') { ?>
<ul class="tb tb_w cl">
<li<?php echo $actives['follow'];?>><a href="home.php?mod=follow&amp;view=follow">我收听的</a></li>
<li<?php echo $actives['special'];?>><a href="home.php?mod=follow&amp;view=special">特别收听</a></li>
<li<?php echo $actives['other'];?>><a href="home.php?mod=follow&amp;view=other">广播大厅</a></li>
<?php if(!empty($_G['setting']['pluginhooks']['follow_nav_extra'])) echo $_G['setting']['pluginhooks']['follow_nav_extra'];?>
</ul>
<div class="bm bml">
<div class="bm_c">
<?php } if(!empty($list['feed'])) { ?>
<div class="flw_feed">
<ul id="followlist"><?php $carray = array();?><?php $beforeuser = 0;?><?php $hiddennum = 0;?><?php if(is_array($list['feed'])) foreach($list['feed'] as $feed) { ?><?php $content = $list['content'][$feed['tid']];?><?php $thread = $list['threads'][$content['tid']];?><?php if(!empty($thread) && $thread['displayorder'] >= 0 || !empty($feed['note'])) { ?>
<li class="cl<?php if($lastviewtime && $feed['dateline'] > $lastviewtime) { ?> unread<?php } ?>" id="feed_li_<?php echo $feed['feedid'];?>" onmouseover="this.className='flw_feed_hover cl'" onmouseout="this.className='cl'">
<?php if($_GET['do'] != 'view' && !isset($_GET['banavatar'])) { ?>
<div class="z flw_avt">
<a href="home.php?mod=space&amp;uid=<?php echo $feed['uid'];?>" class="z" c="1" shref="home.php?mod=space&amp;uid=<?php echo $feed['uid'];?>"><?php echo avatar($feed[uid],'small');?></a>
<span class="cnr"></span>
</div>
<?php } ?>
<div class="flw_article" <?php if($_GET['do'] == 'view' || $_GET['banavatar']) { ?>style="margin-left:0"<?php } ?>>
<?php if($feed['uid'] == $_G['uid'] || $_G['adminid'] == 1) { ?>
<a href="home.php?mod=spacecp&amp;ac=follow&amp;feedid=<?php echo $feed['feedid'];?>&amp;op=delete" id="c_delete_<?php echo $feed['feedid'];?>" onclick="showWindow(this.id, this.href, 'get', 0);" class="flw_delete" title="<?php echo '删除该条广播'; ?>">删除</a>
<?php } ?>
<div class="flw_author">
<a href="home.php?mod=space&amp;uid=<?php echo $feed['uid'];?>" shref="home.php?mod=space&amp;uid=<?php echo $feed['uid'];?>"><?php echo $feed['username'];?></a>
<span class="xg1">&nbsp;<?php echo dgmdate($feed['dateline'], 'u');?></span>
</div>
<?php if($feed['note']) { ?>
<div class="flw_quotenote xs2 pbw">
<?php echo $feed['note'];?>
</div>
<div class="flw_quote">
<?php } if(!empty($thread) && $thread['displayorder'] >= 0) { ?>
<h2 class="wx ptn pbn">
<?php if(isset($carray[$feed['cid']])) { ?>
<a href="javascript:;" onclick="vieworiginal(this, 'original_content_<?php echo $feed['feedid'];?>');return false;" class="flw_readfull y xw0 xs1 xi2">+ 展开全文</a>
<?php } if($thread['fid'] != $_G['setting']['followforumid']) { ?>
<a href="forum.php?mod=viewthread&amp;tid=<?php echo $content['tid'];?>&amp;extra=page%3D1" target="_blank"><?php echo $thread['subject'];?></a>
<?php } ?>
</h2>

<div class="pbm c cl" id="original_content_<?php echo $feed['feedid'];?>" <?php if(isset($carray[$feed['cid']])) { ?> style="display: none"<?php } ?>>
<?php echo $content['content'];?>
<?php if($thread['special'] && $thread['fid'] != $_G['setting']['followforumid']) { ?>
<br/>
<a href="forum.php?mod=viewthread&amp;tid=<?php echo $content['tid'];?>&amp;extra=page%3D1" target="_blank">这是一个特殊主题，点这里可以回原帖查看详细内容</a>
<?php } ?>
</div>
<div class="xg1 cl">
<span class="y">
<?php if(helper_access::check_module('follow')) { ?>
<a href="javascript:;" id="relay_<?php echo $feed['feedid'];?>" onclick="quickrelay(<?php echo $feed['feedid'];?>, <?php echo $thread['tid'];?>);">转播(<?php echo $content['relay'];?>)</a>&nbsp;
<?php } ?> 
<a href="javascript:;" onclick="quickreply(<?php echo $thread['fid'];?>, <?php echo $thread['tid'];?>, <?php echo $feed['feedid'];?>)">回复(<?php echo $thread['replies'];?>)</a>
</span>
<?php if($feed['note']) { ?><a href="home.php?mod=space&amp;uid=<?php echo $feed['uid'];?>"><?php echo $thread['author'];?></a> 发表于 <?php echo dgmdate($thread['dateline']);?>&nbsp;<?php } if($thread['fid'] != $_G['setting']['followforumid'] && $_G['cache']['forums'][$thread['fid']]['name']) { ?>#<a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $thread['fid'];?>"><?php echo $_G['cache']['forums'][$thread['fid']]['name'];?></a><?php } ?>
</div>
<?php } else { ?>
<div class="pbm c cl" id="original_content_<?php echo $feed['feedid'];?>" <?php if(isset($carray[$feed['cid']])) { ?> style="display: none"<?php } ?>>
该主题已被删除
</div>
<?php } if($feed['note']) { ?></div><?php } ?>
</div>
<div id="replybox_<?php echo $feed['feedid'];?>" class="flw_replybox cl" style="display: none;"></div>
<div id="relaybox_<?php echo $feed['feedid'];?>" class="flw_replybox cl" style="display: none;"></div>
</li>
<?php } else { ?><?php $hiddennum++;?><?php } if(!isset($carray[$feed['cid']])) { ?><?php $carray[$feed['cid']] = $feed['cid'];?><?php } } ?></ul>

<?php if(count($list['feed']) > 19 && ($archiver || $primary)) { ?>
<div id="loadingfeed" class="pgbtn"><a href="javascript:;" onclick="loadmore();return false;">更多 &raquo;</a></div>
<?php } else { ?>
<div id="loadingfeed"></div>
<?php } ?>
<iframe id="downloadframe" name="downloadframe" width="0" height="0" marginwidth="0" frameborder="0" src="about:blank"></iframe>
<script type="text/javascript">
function succeedhandle_attachpay(url, msg, values) {
hideWindow('attachpay');
window.location.href = url;
//$('downloadframe').src = url;
}
</script>
</div>
<?php } else { ?>
<div class="emp">
<h2 class="mbw xg1 xs2 hm"><?php if($viewself) { ?>还没有关注的内容<?php } else { ?>TA还没有发表广播<?php } ?></h2>
<?php if($do == 'feed' && $view == 'special') { ?>
<div class="mtw hm xg1">
您可以将指定的用户加入到“特别收听”列表，然后通过页面筛选阅读他们广播, <a href="home.php?mod=follow&amp;do=following&amp;uid=<?php echo $uid;?>" class="xi2">添加特别收听</a>
</div>
<?php } if(!empty($recommend) && $showrecommend && $view != 'special') { ?><?php $showrecommend = false;?><div class="flw_user_list mbm">
<h3 class="xi2 xs2 mbw ptm pbm bbda">推荐收听</h3>
<ul class="ml mls cl"><?php if(is_array($recommend)) foreach($recommend as $ruid => $rusername) { ?><li>
<a href="home.php?mod=space&amp;uid=<?php echo $ruid;?>" class="avt" c="1" shref="home.php?mod=space&amp;uid=<?php echo $ruid;?>"><?php echo avatar($ruid,small);?></a>
<p><a href="home.php?mod=space&amp;uid=<?php echo $ruid;?>" style="text-decoration: none !important;"><?php echo $rusername;?></a></p>
<?php if(helper_access::check_module('follow')) { ?>
<span><a id="a_followmod_<?php echo $ruid;?>" href="home.php?mod=spacecp&amp;ac=follow&amp;op=add&amp;hash=<?php echo FORMHASH;?>&amp;fuid=<?php echo $ruid;?>&amp;from=block" onclick="ajaxget(this.href);doane(event);" style="text-decoration: none !important;">收听</a></span>
<?php } ?>
</li>
<?php } ?>
</ul>
</div>
<?php } ?>
</div>
<?php } if(count($list['feed']) > 19 && ($archiver || $primary)) { ?>
<script type="text/javascript">
var scrollY = 0;
var page = 2;
var feedInfo = {scrollY: 0, archiver: <?php echo $archiver;?>, primary: <?php echo $primary;?>, query: true, scrollNum:1};
var loadingfeed = $('loadingfeed');

function loadmore() {
var currentScroll = document.documentElement.scrollTop || document.body.scrollTop;
var sHeight = document.documentElement.scrollHeight;
if(currentScroll >= scrollY && currentScroll > (sHeight/5-5) && (feedInfo.primary ||feedInfo.archiver) && feedInfo.query) {
/*
if(feedInfo.scrollNum) {
loadingfeed.className="flw_loading hm vm";
loadingfeed.innerHTML = "<img src=\"<?php echo IMGDIR;?>/loading.gif\" class=\"vm\" /> 加载中...";
}
*/
feedInfo.query = false;
var archiver = 0;
if(feedInfo.primary) {
archiver = 0;
} else if(feedInfo.archiver) {
archiver = 1;
}
var url = 'home.php?mod=spacecp&ac=follow&op=getfeed&archiver='+archiver+'&page='+page+'&inajax=1'<?php if($do == 'feed') { ?>+'&viewtype=<?php echo $view;?>'<?php } elseif($do == 'view') { ?>+'&uid=<?php echo $uid;?>&banavatar=1'<?php } ?>;
var x = new Ajax();
x.get(url, function(s) {
if(trim(s) == 'false') {
if(!archiver) {
feedInfo.primary = false;
loadmore();
page = 1;
} else {
feedInfo.archiver = false;
page = 1;
}
} else {
$('followlist').innerHTML = $('followlist').innerHTML + s;
}
if(!feedInfo.primary && !feedInfo.archiver) {
loadingfeed.className = "";
loadingfeed.innerHTML = "";
}
feedInfo.query = true;
});
page++;
if(feedInfo.scrollNum) {
feedInfo.scrollNum--;
} else if(!feedInfo.scrollNum) {
window.onscroll = null;
}

}
scrollY = currentScroll;
}

_attachEvent(window, "load", function () {
scrollY =  document.documentElement.scrollTop || document.body.scrollTop;
window.onscroll = loadmore;
});
</script>
<?php } if($do == 'feed') { ?>
</div>
</div>
<?php } } ?>

<script type="text/javascript">
var boxflag = {};
function quickreply(fid, tid, feedid) {
$('relaybox_'+feedid).style.display = 'none';
var replyboxid = 'replybox_'+feedid;
if($(replyboxid).style.display == '' && boxflag[replyboxid]) {
$(replyboxid).style.display = 'none';
} else {
boxflag[replyboxid] = true;
ajaxget('forum.php?mod=ajax&action=quickreply&tid='+tid+'&fid='+fid+'&handlekey=qreply_'+feedid+'&feedid='+feedid, replyboxid);
$(replyboxid).style.display = '';
}
}
function quickrelay(feedid, tid) {
$('replybox_'+feedid).style.display = 'none';
var replyboxid = 'relaybox_'+feedid;
if($(replyboxid).style.display == '') {
$(replyboxid).style.display = 'none';
} else {
ajaxget('home.php?mod=spacecp&ac=follow&op=relay&feedid='+feedid+'&tid='+tid+'&handlekey=qrelay_'+feedid, replyboxid);
$(replyboxid).style.display = '';
}
}
</script>

<?php } elseif(in_array($do, array('following', 'follower'))) { if($list) { ?>
<ul class="flw_ulist"><?php if(is_array($list)) foreach($list as $fuid => $fuser) { ?><li class="cl">
<?php if($do=='following') { ?>
<a href="home.php?mod=space&amp;uid=<?php echo $fuser['followuid'];?>" title="<?php echo $fuser['fusername'];?>" id="edit_avt" class="flw_avt" c="1" shref="home.php?mod=space&amp;uid=<?php echo $fuser['followuid'];?>"><?php echo avatar($fuser['followuid'],small);?></a>
<?php if($viewself) { ?>
<a id="a_followmod_<?php echo $fuser['followuid'];?>" href="home.php?mod=spacecp&amp;ac=follow&amp;op=del&amp;fuid=<?php echo $fuser['followuid'];?>" onclick="ajaxget(this.href);doane(event);" class="flw_btn_unfo">取消收听</a>
<?php } elseif($fuser['followuid'] != $_G['uid']) { if($fuser['mutual']) { if($fuser['mutual'] > 0) { ?><span class="z flw_status_2">互相收听</span><?php } else { ?><span class="z flw_status_1">TA未收听您</span><?php } ?><a id="a_followmod_<?php echo $fuser['followuid'];?>" href="home.php?mod=spacecp&amp;ac=follow&amp;op=del&amp;fuid=<?php echo $fuser['followuid'];?>"  onclick="ajaxget(this.href);doane(event);" class="flw_btn_unfo">取消收听</a>
<?php } elseif(helper_access::check_module('follow')) { ?>
<a id="a_followmod_<?php echo $fuser['followuid'];?>" href="home.php?mod=spacecp&amp;ac=follow&amp;op=add&amp;hash=<?php echo FORMHASH;?>&amp;fuid=<?php echo $fuser['followuid'];?>" onclick="ajaxget(this.href);doane(event);" class="flw_btn_fo">收听</a>
<?php } } ?>
<h6 class="pbn xs2"><a href="home.php?mod=space&amp;uid=<?php echo $fuser['followuid'];?>" title="<?php echo $fuser['fusername'];?>" class="xi2" c="1" shref="home.php?mod=space&amp;uid=<?php echo $fuser['followuid'];?>"><?php echo $fuser['fusername'];?></a>&nbsp;<span id="followbkame_<?php echo $fuser['followuid'];?>" class="xg1 xs1 xw0"><?php if($fuser['bkname']) { ?><?php echo $fuser['bkname'];?><?php } ?></span></h6>
<?php if(!empty($fuser['recentnote'])) { ?><p><span class="xg1">最近动作：</span><?php echo $fuser['recentnote'];?></p><?php } ?>
<p class="ptm xg1">
<?php if($memberprofile[$fuid]['resideprovince'] || $memberprofile[$fuid]['residecity']) { ?>来自：<?php echo $memberprofile[$fuid]['resideprovince'];?> <?php echo $memberprofile[$fuid]['residecity'];?> &nbsp;<?php } ?>
听众: <a href="home.php?mod=follow&amp;do=follower&amp;uid=<?php echo $fuser['followuid'];?>"><strong class="xi2" id="followernum_<?php echo $fuser['followuid'];?>"><?php echo $memberinfo[$fuid]['follower'];?></strong></a>人 &nbsp;
收听: <a href="home.php?mod=follow&amp;do=following&amp;uid=<?php echo $fuser['followuid'];?>"><strong class="xi2"><?php echo $memberinfo[$fuid]['following'];?></strong></a>人 &nbsp;
<?php if($viewself && $fuser['followuid'] != $_G['uid']) { ?>
<span class="pipe">|</span>
<a href="home.php?mod=spacecp&amp;ac=follow&amp;op=bkname&amp;fuid=<?php echo $fuser['followuid'];?>&amp;handlekey=followbkame_<?php echo $fuser['followuid'];?>" id="fbkname_<?php echo $fuser['followuid'];?>" onclick="showWindow('followbkame_<?php echo $fuser['followuid'];?>', this.href, 'get', 0);"><?php if($fuser['bkname']) { ?>修改备注<?php } else { ?>添加备注<?php } ?></a>
<?php if(helper_access::check_module('follow')) { ?>
<span class="pipe">|</span>
<a id="a_specialfollow_<?php echo $fuser['followuid'];?>" href="home.php?mod=spacecp&amp;ac=follow&amp;op=add&amp;hash=<?php echo FORMHASH;?>&amp;special=<?php if($fuser['status'] == 1) { ?>2<?php } else { ?>1<?php } ?>&amp;fuid=<?php echo $fuser['followuid'];?>" onclick="ajaxget(this.href);doane(event);"><?php if($fuser['status'] == 1) { ?>取消特别收听<?php } else { ?>添加特别收听<?php } ?></a>
<?php } } ?>
</p>
<?php } else { ?>
<a href="home.php?mod=space&amp;uid=<?php echo $fuser['uid'];?>" title="<?php echo $fuser['username'];?>" id="edit_avt" class="flw_avt" c="1" shref="home.php?mod=space&amp;uid=<?php echo $fuser['uid'];?>"><?php echo avatar($fuser['uid'],small);?></a>
<?php if($fuser['uid'] != $_G['uid']) { if($fuser['mutual']) { if($fuser['mutual'] > 0) { ?><span class="z flw_status_2">互相收听</span><?php } else { ?><span class="z flw_status_1">TA未收听您</span><?php } ?><a id="a_followmod_<?php echo $fuser['uid'];?>" href="home.php?mod=spacecp&amp;ac=follow&amp;op=del&amp;fuid=<?php echo $fuser['uid'];?>"  onclick="ajaxget(this.href);doane(event);" class="flw_btn_unfo">取消收听</a>
<?php } elseif(helper_access::check_module('follow')) { ?>
<a id="a_followmod_<?php echo $fuser['uid'];?>" href="home.php?mod=spacecp&amp;ac=follow&amp;op=add&amp;hash=<?php echo FORMHASH;?>&amp;fuid=<?php echo $fuser['uid'];?>" onclick="ajaxget(this.href);doane(event);" class="flw_btn_fo">收听</a>
<?php } } ?>
<h6 class="pbn xs2"><a href="home.php?mod=space&amp;uid=<?php echo $fuser['uid'];?>" title="<?php echo $fuser['username'];?>" class="xi2" c="1" shref="home.php?mod=space&amp;uid=<?php echo $fuser['uid'];?>"><?php echo $fuser['username'];?></a></h6>
<p><span class="xg1">最近动作：</span><?php echo $fuser['recentnote'];?></p>
<p class="ptm xg1">
<?php if($memberprofile[$fuid]['resideprovince'] || $memberprofile[$fuid]['residecity']) { ?>来自：<?php echo $memberprofile[$fuid]['resideprovince'];?> <?php echo $memberprofile[$fuid]['residecity'];?> &nbsp;<?php } ?>
听众: <a href="home.php?mod=follow&amp;do=follower&amp;uid=<?php echo $fuser['uid'];?>"><strong class="xi2" id="followernum_<?php echo $fuser['uid'];?>"><?php echo $memberinfo[$fuid]['follower'];?></strong></a>人 &nbsp;
收听: <a href="home.php?mod=follow&amp;do=following&amp;uid=<?php echo $fuser['uid'];?>"><strong class="xi2"><?php echo $memberinfo[$fuid]['following'];?></strong></a>人
</p>
<?php } ?>
</li>
<?php } ?>
</ul>
<?php if(!empty($multi)) { ?><div><?php echo $multi;?></div><?php } ?>
<br/>
<?php } else { ?>
<div id="nofollowmsg">
<div class="flw_thread">
<ul>
<li class="flw_article">
<div class="emp">
<h2 class="xg1 xs2 hm">
<?php if($viewself) { if($do=='following') { ?>
您还没有收听任何人，您可以先到<a href="home.php?mod=follow&amp;view=other" class="xi2">广播大厅</a>寻找感兴趣的人并收听他
<?php } else { ?>
还没有人收听您，多<a href="home.php?mod=follow" class="xi2">发广播</a>多互动，别人才会收听您 :)
<?php } } else { if($do=='following') { ?>
TA还没有收听任何人
<?php } else { ?>
还没有人收听TA
<?php } } ?>
</h2>
</div>
</li>
</ul>
</div>
</div>
<?php } } if(!$_G['setting']['homepagestyle']) { ?><!--[diy=diycontentbottom]--><div id="diycontentbottom" class="area"></div><!--[/diy]--><?php } if($do != 'feed') { ?>
</div>
</div>
<?php } ?>
</div>
</div>

<?php if(!$_G['setting']['homepagestyle']) { ?>
<div class="wp mtn">
<!--[diy=diy3]--><div id="diy3" class="area"></div><!--[/diy]-->
</div>
<?php } if($showguide && $do == 'feed') { ?>
<style type="text/css">
.widthauto #nv_menu { width: 95%; }
.widthauto #nv_menu div { position: absolute;left: 50%;margin-left: -472px;width:944px; }
</style>
<div id="nv_menu" style="display:none;">
<div>
<img src="<?php echo IMGDIR;?>/flw_guide.png" alt="" />
<button class="pn pnc" style="margin: -50px 0 20px 430px;" onclick="hideMenu()"><span>我知道了</span></button>
</div>
</div>
<script type="text/javascript">
showMenu({'ctrlid':'nv','pos':'13','cover':'1'});
</script>
<?php } ?>

<script type="text/javascript" reload="1">
function succeedhandle_followmod(url, msg, values) {
var numObj = $('followernum_'+values['fuid']);
if(numObj) {followernum = parseInt(numObj.innerHTML);}
if(values['type'] == 'add') {
if(values['from'] == 'head') {
if($('followflag')) $('followflag').style.display = '';
if($('unfollowflag')) $('unfollowflag').style.display = 'none';
if($('fbkname_'+values['fuid'])) $('fbkname_'+values['fuid']).style.display = '';
} else if($('a_followmod_'+values['fuid'])) {

$('a_followmod_'+values['fuid']).innerHTML = '取消收听';
if(values['from'] != 'block') {
$('a_followmod_'+values['fuid']).className = 'flw_btn_unfo';
}
$('a_followmod_'+values['fuid']).href = 'home.php?mod=spacecp&ac=follow&op=del&fuid='+values['fuid']+(values['from'] == 'block' ? '&from=block' : '');

}
if(numObj) {
numObj.innerHTML = followernum + 1;
}

} else if(values['type'] == 'del') {
if(values['from'] == 'head') {
if($('followflag')) $('followflag').style.display = 'none';
if($('unfollowflag')) $('unfollowflag').style.display = '';
if($('followbkame_'+values['fuid'])) $('followbkame_'+values['fuid']).innerHTML = '';
if($('fbkname_'+values['fuid'])) {
$('fbkname_'+values['fuid']).innerHTML = '[添加备注]';
$('fbkname_'+values['fuid']).style.display = 'none';
}
} else if($('a_followmod_'+values['fuid']))  {
$('a_followmod_'+values['fuid']).innerHTML = '收听';
if(values['from'] != 'block') {
$('a_followmod_'+values['fuid']).className = 'flw_btn_fo';
}
$('a_followmod_'+values['fuid']).href = 'home.php?mod=spacecp&ac=follow&op=add&hash=<?php echo FORMHASH;?>&fuid='+values['fuid']+(values['from'] == 'block' ? '&from=block' : '');
}
if(numObj) {
numObj.innerHTML = followernum - 1;
}
} else if(values['type'] == 'special') {
if(values['from'] == 'head') {
var specialObj = $('specialflag_'+values['fuid']);
if(values['special'] == 1) {
specialObj.className = 'flw_specialfo';
specialObj.innerHTML = '添加特别收听';
} else {
specialObj.className = 'flw_specialunfo';
specialObj.innerHTML = '取消特别收听';
}
specialObj.title = specialObj.innerHTML;
specialObj.href = 'home.php?mod=spacecp&ac=follow&op=add&hash=<?php echo FORMHASH;?>&special='+values['special']+'&fuid='+values['fuid']+'&from=head';
} else {
$('a_specialfollow_'+values['fuid']).innerHTML = values['special'] == 1 ? '添加特别收听' : '取消特别收听';
$('a_specialfollow_'+values['fuid']).href = 'home.php?mod=spacecp&ac=follow&op=add&hash=<?php echo FORMHASH;?>&special='+values['special']+'&fuid='+values['fuid'];
}
}
}
function changefeed(tid, pid, flag, obj) {
var x = new Ajax();
var o = obj.parentNode;
for(var i = 0; i < 4; i++) {
if(o.id.indexOf('original_content_') == -1) {
o = o.parentNode;
} else {
break;
}
}
x.get('forum.php?mod=ajax&action=getpostfeed&inajax=1&tid='+tid+'&pid='+pid+'&type=changefeed&flag='+flag, function(s){
o.innerHTML = s;
});
}
function vieworiginal(clickobj, id) {
var obj = $(id);
if(obj.style.display == 'none') {
obj.style.display =  '';
clickobj.innerHTML = '- 收起';
} else {
obj.style.display =  'none';
clickobj.innerHTML = '+ 展开全文';
}
}
</script>	</div>
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
