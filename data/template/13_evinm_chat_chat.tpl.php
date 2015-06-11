<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?><?php
$return = <<<EOF

<script src="source/plugin/evinm_chat/js/jquery.min.js" type="text/javascript"></script>
<script src="source/plugin/evinm_chat/js/jquery.vticker-min.js" type="text/javascript"></script>
<script language="javascript">	var jq = jQuery.noConflict();</script>
<script type="text/javascript">
jq(document).keydown(function(e) {
if (e.ctrlKey && e.which ==13 || e.which==13 ){
jq.post("plugin.php?id=evinm_chat:do&amp;ac=add",{
chatmessage:jq("#chatmessage").val()
},function(){
jq("#chatmessage").val("")
}); 	
}
});

jq(function(){
timestamp = 0;
updateMsg();
jq("#sendchat").click(function(){		
jq.post("plugin.php?id=evinm_chat:do&amp;ac=add",{
chatmessage:jq("#chatmessage").val()
},function(){
jq("#chatmessage").val("")
}); 
});

jq(".firendlist").hide();

EOF;
 if($config['iszhankai'] == '1' || $userset['iszhankai'] == '1') { 
$return .= <<<EOF

jq("#e_chat_slimp").hide();

EOF;
 } 
$return .= <<<EOF

jq(".online").bind("click",function(){
if(jq(".online").hasClass("hover")){			
}else{
jq(".online").addClass("hover");
}
jq(".userlist").show();
jq(".firendlist").hide();
jq(".friden").removeClass("hover");
});

jq(".friden").bind("click",function(){
if(jq(".friden").hasClass("hover")){			
}else{
jq(".friden").addClass("hover");
}
jq(".firendlist").show();
jq(".userlist").hide();
jq(".online").removeClass("hover");
});

jq("#e_chat_slimp").bind("click",function(){
if(!jq("#e_chat").is(":animated")){
var chat_width = jq(".chart_right").width() + jq(".chart_left").width() + 4;
jq("#e_chat").removeClass("ehide");
jq("#e_chat").animate({width:chat_width,height:"400"},500);
jq("#e_chat_slimp").hide();		
}
});

jq(".ssmall").bind("click",function(){	
if(!jq("#e_chat").is(":animated")){
jq("#e_chat").animate({width:"0",height:"0"},500,function(){
jq("#e_chat").addClass("ehide");
jq("#e_chat_slimp").show();
});			
}		
});

jq(".ssmall").mouseover(function(){
jq(".stbtn").addClass("tssbgo");
}).mouseout(function(){
jq(".stbtn").removeClass("tssbgo");
});

jq(".sset").mouseover(function(){
jq(".stbtn").addClass("tssbgt");
}).mouseout(function(){
jq(".stbtn").removeClass("tssbgt");
})

jq(".kzside").bind("click",function(){			
if(jq(".chart_right").is(":visible")){
if(!jq("#e_chat").is(":animated")){
jq("#e_chat").animate({width:"-=136"},200,function(){
jq(".chart_right").animate({width:"0"});
jq(".chart_right").hide();					
jq(".kzside").removeClass("hide_side").addClass("show_side");					
});
}
}else{
if(!jq("#e_chat").is(":animated")){
jq(".chart_right").animate({width:"140"},1,function(){
jq("#e_chat").animate({width:"+=136"},200,function(){					
jq(".chart_right").show();
jq(".kzside").removeClass("show_side").addClass("hide_side");					
});
});				
}
}
});	

jq('.news-container').vTicker({
        speed: 500,
        pause: 6000,
        showItems: 1,
        animation: 'fade',
        mousePause: false,
        height: 0,
        direction: 'up'
    });	

jq(".clearc").bind("click",function(){
jq("#chatmessagebody").html("")
//jq("#chatmessage").html("")
})
    
}) 

function updateMsg(){
jq.post("plugin.php?id=evinm_chat:backend",{ time: timestamp }, function(xml) {		
jq("#loading").remove();				
addMessages(xml);
},'xml');	
setTimeout('updateMsg()', 2000);
}

function addMessages(xml) { 

if(jq("status",xml).text() == "2") return;	
timestamp = jq("time",xml).text();	
jq(xml).find("message").each(function(){

//jq("message",xml).each(function() {

    var author = jq("author",this).text(); 
var content = jq("text",this).text(); 
var sex = jq("sex",this).text(); 
if(author == "系统消息"){
var htmlcode = "<span style=\"color:{$config['syscolor']};\"><strong>"+author+"</strong>: "+content+"</span><br />";
}else if({$config['isshowgender']} == '1'){
if(sex > '0'){
if({$userset['showsexy']} == '0'){
var htmlcode = "<strong>"+author+"</strong>: "+content+"<br />";
}else{
var htmlcode = "<strong>"+author+"</strong><img src=\"source/plugin/evinm_chat/images/sex"+sex+".gif\" />: "+content+"<br />";
}
}else{
var htmlcode = "<strong>"+author+"</strong>: "+content+"<br />";
}			
}else{
var htmlcode = "<strong>"+author+"</strong>: "+content+"<br />";
}	
jq("#chatmessagebody").prepend( htmlcode ); 
});
}
</script>

<div id="e_chat" 

EOF;
 if($userset['iszhankai'] == '1') { 
$return .= <<<EOF

style="width: 522px; _width: 530px;height: 400px; "

EOF;
 } elseif($userset['iszhankai'] == '0') { 
$return .= <<<EOF
	
class="ehide whdyl"	

EOF;
 } elseif($config['iszhankai'] == '0') { 
$return .= <<<EOF
	
class="ehide whdyl"

EOF;
 } 
$return .= <<<EOF
 >
<div class="chart_right y cl boxshadow">
<div class="body_tools rht">
<span class="pl20">聊天室(在线:{$count}人)</span>
</div>
<div class="right_body">
<ul class="listheader">
<li class="online hover">在线</li>
<li class="friden">好友</li>
</ul>
<div class="userlist mtm uslist">
<div class="usbox">
<ul>

EOF;
 if($whosonline) { if(is_array($whosonline)) foreach($whosonline as $online) { 
$return .= <<<EOF
<li><img src = "{$_G['style']['styleimgdir']}/{$online['icon']}"> <span>{$online['username']}</span></li>

EOF;
 } } 
$return .= <<<EOF

</ul>
</div>
<div class="usboxbtips">

EOF;
 if($count > '6') { 
$return .= <<<EOF

<span></span> <a href="home.php?mod=space&amp;do=friend&amp;view=online&amp;type=member" target="_blank" >查看全部</a>

EOF;
 } 
$return .= <<<EOF
					
</div>
<div class="usboxbad">
<a href="
EOF;
 if($config['online_ad'] != '') { 
$return .= <<<EOF
{$online_ad_row['1']}
EOF;
 } else { 
$return .= <<<EOF
http://www.wuzhuo.net
EOF;
 } 
$return .= <<<EOF
" target="_blank"><img src="
EOF;
 if($config['online_ad'] != '') { 
$return .= <<<EOF
{$online_ad_row['0']}
EOF;
 } else { 
$return .= <<<EOF
source/plugin/evinm_chat/images/samallad.jpg | http://www.wuzhuo.net
EOF;
 } 
$return .= <<<EOF
" /></a>
</div>
</div>
<div class="firendlist mtm uslist" style="display:hidden !important;">

EOF;
 if($count_friendonline == O) { 
$return .= <<<EOF

<div class="nofriendsonline">当前无好友在线</div>
<div class="nofriendsonline_ad"><a href="
EOF;
 if($config['firend_ad'] != '') { 
$return .= <<<EOF
{$firend_ad_row['1']}
EOF;
 } else { 
$return .= <<<EOF
http://www.wuzhuo.net
EOF;
 } 
$return .= <<<EOF
" target="_blank"><img src = "
EOF;
 if($config['firend_ad'] != '') { 
$return .= <<<EOF
{$firend_ad_row['0']}
EOF;
 } else { 
$return .= <<<EOF
source/plugin/evinm_chat/images/sidead.jpg
EOF;
 } 
$return .= <<<EOF
" ></a></div>

EOF;
 } else { 
$return .= <<<EOF
	
<ul>

EOF;
 if($onlinefriends) { if(is_array($onlinefriends)) foreach($onlinefriends as $onlinefs) { 
$return .= <<<EOF
<li><img src = "{$_G['style']['styleimgdir']}/{$onlinefs['icon']}"> <span>{$onlinefs['username']}</span></li>

EOF;
 } } 
$return .= <<<EOF

</ul>

EOF;
 } 
$return .= <<<EOF
	
</div>
</div>
</div>

<div class="chart_left z cl">
<!-- 头像区 -->
<div class='left_avatar boxshadow'>
<a href="home.php?mod=space&amp;uid={$_G['uid']}" target="_blank">{$myinfo['avatar']}</a>
</div>
<form class="mod-ask-form" method="post" id="chatform" action="plugin.php?id=evinm_wenda:ask" autocomplete="off"  onsubmit="$('{$editorid}_textarea').value = wysiwyg ? html2bbcode(getEditorContents()) : $('{$editorid}_textarea').value" enctype="multipart/form-data">
<div class="left_body boxshadow">
<div class="body_tools">
<span class="pl80 z">
{$_G['username']}
</span>
<div class="y stbtn">					
<span class="ssmall"></span>					
<span class="sset" onclick="showWindow('userset','plugin.php?id=evinm_chat:userset&uid={$_G['uid']}','get','0')"></span>					
</div>
</div>
<div class="body_message">							
<div class="kzside hide_side">
</div>
<div id="chatmessagebody">
<div id="loading">
<img src="source/plugin/evinm_chat/images/loading.gif" />
<br>
正在初始化，请稍后...
</div>
</div>
</div>
<div class="body_edit_header">
<div class="bar news-container cl">					
<ul>

EOF;
 if($gglists) { if(is_array($gglists)) foreach($gglists as $gonggao) { if($gonggao['type'] == "thread") { 
$return .= <<<EOF

<li style="height:24px"><a href="{$gonggao['url']}" target="_blank">{$gonggao['subject']}</a><br /></li>

EOF;
 } elseif($gonggao['type'] == 'link') { 
$return .= <<<EOF

<li style="height:24px"><a href="{$gonggao['url']}" style="color:#369" target="_blank">{$gonggao['subject']}</a><br /></li>

EOF;
 } else { 
$return .= <<<EOF

<li style="height:24px">{$gonggao['subject']}<br /></li>

EOF;
 } } } 
$return .= <<<EOF

</ul>
</div>
</div>
<div class="body_edit_area">
<textarea name="chatmessage" id="chatmessage" class="xg1" onfocus="handlePromptchat(1);" onclick="showchatFace(this.id, 'chatmessage', msgstr);" onblur="handlePromptchat(0);" onkeydown="ctrlEnter(event, 'add');" rows="2" style="width:352px;height:41px">您可以在此处输入聊天内容开始聊天...</textarea>
<div class="body_deit_botm cl">
<span class="keytips z">Enter/Ctrl+Enter发送消息</span>
<a id="sendchat" class=" sendchat y"><img src="source/plugin/evinm_chat/images/sendchat.png" alt="发送消息"></a>
<a id="sendchat" class=" sendchat clearc y"><img src="source/plugin/evinm_chat/images/cclear.jpg" alt="清屏"></a>
</div>
</div>
</div>
</form>	
</div>


</div>
<div id="e_chat_slimp" class="fixed-bottom">
<div class="onlinemembers_slimp">{$count}人在线</div>
</div>

<script type="text/javascript">
var msgstr = '您可以在此处输入聊天内容开始聊天...';

function showchatFace(showid, target, dropstr) {
if($(showid + '_menu') != null) {
$(showid+'_menu').style.display = '';
} else {
var faceDiv = document.createElement("div");
faceDiv.id = showid+'_menu';
faceDiv.className = 'p_pop facel';
faceDiv.style.position = 'absolute';
faceDiv.style.zIndex = 1001;
var faceul = document.createElement("ul");
for(i=1; i<31; i++) {
var faceli = document.createElement("li");
faceli.innerHTML = '<img src="' + STATICURL + 'image/smiley/comcom/'+i+'.gif" onclick="insertFace(\''+showid+'\','+i+', \''+ target +'\', \''+dropstr+'\')" style="cursor:pointer; position:relative;" />';
faceul.appendChild(faceli);
}
faceDiv.appendChild(faceul);
$('append_parent').appendChild(faceDiv)
}
setMenuPosition(showid, 0);
doane();
_attachEvent(document.body, 'click', function(){if($(showid+'_menu')) $(showid+'_menu').style.display = 'none';});
}

function insertFace(showid, id, target, dropstr) {
  	var faceText = '[em:'+id+':]'; 
var obj = $(target);
if($(target) != null) {
if(obj.value == msgstr) {
obj.value = faceText;

}else{
obj.value += faceText;	
}		
}	
}

function handlePromptchat(type) {
var msgObj = $('chatmessage');
if(type) {
if(msgObj.value == msgstr) {
msgObj.value = '';

}
if($('chatmessage_menu')) {
if($('chatmessage_menu').style.display == 'block') {
showchatFace('chatmessage', 'chatmessage', msgstr);
}
}
if(BROWSER.firefox || BROWSER.chrome) {
showchatFace('chatmessage', 'chatmessage', msgstr);
}
} else {
if(msgObj.value == ''){
msgObj.value = msgstr;
msgObj.className = 'xg1';
}
}
}

</script>

<style type="text/css">
body {
   _background-image:url(about:blank);
   _background-attachment:fixed;/*防止页面抖动*/
}
#e_chat_slimp{
width:150px;
height:50px;
cursor: pointer;
position:fixed;
_position: absolute;
left:15px; 
bottom:0;	
overflow:hidden;
_bottom:expression(document.documentElement.scrollTop);
background:url(source/plugin/evinm_chat/images/s_chat.png);

EOF;
 if($config['iszhankai'] == '1' || $userset['iszhankai'] == '1') { 
$return .= <<<EOF

display:none;

EOF;
 } 
$return .= <<<EOF
	
}

#e_chat{

EOF;
 if($config['iszhankai'] == '1') { 
$return .= <<<EOF

width:524px;
_width:530px;
height:400px;

EOF;
 } 
$return .= <<<EOF

position:fixed;
left:15px; 
bottom:0;	
overflow:hidden;
position: fixed;
_position: absolute;
_bottom:expression(document.documentElement.scrollTop);
}

.whdyl {
height:0px ;
width:0px ;
}
.eshow {
display:block !important;
}
.ehide {
display:none !important;
}
.pl80 {
padding-left:80px;
}
.pl20 {
padding-left:10px;
}
.pr10 {
padding-right:10px;
}
.left_avatar{
width:48px;
height:48px;
border:1px solid #C1C2C6;
position: absolute;
top:0px;
left:15px;
z-index:2;
background:#fff;
padding:1px;
}
.left_body {
position: absolute;
bottom:0px;
border:1px solid #C1C2C6;
width:378px;
height:372px;
_height:372px;
background:#fff;
overflow:hidden;
}
.body_tools, .body_edit_header {
width:100%;
height:30px;
line-height:30px;
border-bottom:1px solid #C1C2C6;
background:url(source/plugin/evinm_chat/images/chat_tit.gif) repeat-x;
}
#loading {
margin-top:60px;
text-align:center;
color:#666;
font-size:12px;
}
.body_message {
width:100%;
height:220px;
_height:220px;
border-bottom:1px solid #C1C2C6;
overflow:hidden;
}
.kzside {
float:right;
width:10px;
height:100%;
}
.hide_side{
background:url(source/plugin/evinm_chat/images/hide_side.png);
}
.show_side{
background:url(source/plugin/evinm_chat/images/show_side.png);
}
.body_edit_area {
padding:8px;	
}
.body_edit_header {
height:24px;
line-height:24px;
}
.chart_left {	
width:378px;
height:100%;
_height:400px;

}
.chart_right {
width:140px;
position: absolute;
border:1px solid #C1C2C6;	
height:372px;
background:#fff;
bottom:0px;
right:4px;
_right:0px;
}
.listheader  {
height:24px;
line-height:24px;
}
.stbtn {
width:60px;
height:30px;
background:url(source/plugin/evinm_chat/images/sb1.gif);
}
.stbtn span {
display:inline-block;
width:50%;
height:30px;
cursor: pointer;
float:left;
}
.tssbgo {background:url(source/plugin/evinm_chat/images/sb2.gif);}
.tssbgt {background:url(source/plugin/evinm_chat/images/sb3.gif);}

.listheader  li {
float:left;
width:68px;
border:1px solid #fff;
text-align:center;
}
.listheader li.hover {
border-bottom:1px solid #D7D7D8;
background:#fafafa;
}
.uslist {
width:120px;
margin:0 10px;
}
.uslist li {
border:none;
height:16px  !important;
line-height:16px !important;
text-align:left;
border-bottom:1px dashed  #CCCCCC;
padding:7px 5px !important;
}
.uslist li span {
display:inline-block;
height:12px;
padding-bottom:2px;
}
.usbox {
height:190px;
overflow-y:auto ;
}
.usboxbtips {
height:22px;
margin-top:3px;
line-height:22px;
padding-left:30px;
}
.usboxbtips span{
display:inline-block;
width:16px;
height:16px;
float:left;
margin-top:3px;
background:url(source/plugin/evinm_chat/images/moreonlines.gif) no-repeat;
}
.usboxbad {
padding: 6px 1px;
}
.sendchat {
border:none;
margin-top:3px;
margin-right:3px;
cursor: pointer;
}
.boxshadow {
filter:progid:DXImageTransform.Microsoft.Shadow(color=#B7B8BD,direction=120,strength=4);
-moz-box-shadow:0px 0px 10px #B7B8BD;
-webkit-box-shadow:0px 0px 10px #B7B8BD;
box-shadow:0px 0px 10px #B7B8BD;
}
#chatmessage_menu {
width:348px;
}
.p_pop, .p_pof, .sllt {
padding: 4px;
border: 1px solid;
min-width: 60px;
border-color: #DDD;
background: #FEFEFE;
box-shadow: 1px 2px 2px rgba(0, 0, 0, 0.3);
}
.p_pop li {
display: inline;
}
.facel img {
margin: 5px;
}
.nofriendsonline {
text-align:center;
padding:15px 0;
}
.nofriendsonline_ad {
padding:5px 0px 0px 2px;
}

#chatmessagebody {
width:358px;
_width:355px;
height:208px;
padding-left:10px;
margin-top:6px;
margin-bottom:6px;
overflow-y:auto ;
}
.news-container{
height:270px;
padding-left:10px;
width:360px;
overflow:hidden;
}
.news-container ul li a{
padding-bottom:0px;
font-size:12px;
height:12px;
}
.keytips {
padding-top:6px;
}
.clearc {
margin-right:10px;
}
.onlinemembers_slimp {
margin-top:30px;
margin-left:48px;
}
.body_deit_botm {
padding-top:4px;
}
.usboxbad img {
width:120px;
height:80px;
}
.nofriendsonline_ad img {
width:120px;
height:250px;
_margin-bottom:2px;
}
</style>



EOF;
?>