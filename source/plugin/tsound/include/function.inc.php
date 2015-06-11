<?php

foreach($_GET as $k => $v) {
	$_G['onez_'.$k] = function_exists('daddslashes') ? daddslashes($v) : $v;
}
foreach($_POST as $k => $v) {
	$_G['onez_'.$k] = function_exists('daddslashes') ? daddslashes($v) : $v;
}
global $tsound;
$tsound = $_G['cache']['plugin']['tsound'];

function tsound_dzToFlash($str){
  global $_G;
  if(strtolower($_G['charset'])!='utf-8'){
    $str=tsound_oiconv($_G['charset'],'utf-8',$str);
  }
  return $str;
}
function tsound_FlashToDz($str){
  global $_G;
  if(strtolower($_G['charset'])!='utf-8'){
    $str=tsound_oiconv('utf-8',$_G['charset'],$str);
  }
  return $str;
}
function tsound_oiconv($from,$to,$string){
  if(function_exists('mb_convert_encoding')){
    return mb_convert_encoding($string,$to,$from);
  }else{
    return iconv($from,$to,$string);
  }
}
function tsound_upload(){
  global $_G;
  $token='data';
  $name=$_FILES[$token]['name'];
  $_FILES[$token]['error'] && exit('上传失败，请重试');
  if(!$_FILES[$token]['tmp_name']) {
    return $_POST[$token];
  }	
  $filetype=strtolower(end(explode('.',$name)));
  if($filetype!='mp3')exit('不支持的文件格式');
  $path=DISCUZ_ROOT.'./data/cache/tsound';
  if(!file_exists($path))@mkdir($path,0777);
  @touch("$path/index.html");
  $file=uniqid().'.'.$filetype;
  if(@copy($_FILES[$token]['tmp_name'], $path.'/'.$file)) {
    $succeed = true;
  }elseif(function_exists('move_uploaded_file') && @move_uploaded_file($_FILES[$token]['tmp_name'], $path.'/'.$file)) {
    $succeed = true;
  }
	if($succeed) {
    return trim($_G['siteurl'],'/').'/data/cache/tsound/'.$file;
	} else {
		exit('Can not write to cache files, please check directory ./data/ and ./data/cache/ .');
	}
}
function tsound_parse($url){
  return tsound_insertflash('source/plugin/tsound/template/player.swf','son='.$url,250,40,'tsound');
}
function tsound_insertflash($Flash,$Vars,$width,$Height,$ID){
  strpos($Flash,'?')===false && $Flash.='?t='.@filemtime($Flash);
  $fullcode=0;
  if($fullcode){
    $FlashHtml='<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" ';
    $FlashHtml.='codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" ';
    $FlashHtml.='width="' . $width . '" height="' . $Height . '" id="' . $ID . '">';
    $FlashHtml.='<param name="movie" value="' . $Flash . '">';
    $FlashHtml.='<param name="quality" value="high">';
    $FlashHtml.='<param name="allowFullScreen" value="true">';
    $FlashHtml.='<param name="wmode" value="opaque">';
    $FlashHtml.='<param name="allowscriptaccess" value="always">';
    $FlashHtml.='<param name="FlashVars" value="'.$Vars.'">';
  }
  $FlashHtml.='<embed src="' . $Flash . '" name="' . $ID . '" quality="high" allowscriptaccess="always" pluginspage="http://www.macromedia.com/go/getflashplayer" ';
  $FlashHtml.='type="application/x-shockwave-flash" width="' . $width . '" FlashVars="'.$Vars.'" wmode="opaque" allowFullScreen="true" height="' . $Height . '"></embed>';
  if($fullcode){
    $FlashHtml.='</object>';
  }
  return $FlashHtml;
}
function tsound_json($a=false){
  if (is_null($a)) return 'null'; 
  if ($a === false) return 'false'; 
  if ($a === true) return 'true'; 
  if (is_scalar($a)){ 
    if (is_float($a)){ 
      return floatval(str_replace(",", ".", strval($a))); 
    } 
    if (is_string($a)) { 
      $jsonReplaces = array(array("\\", "/", "\n", "\t", "\r", "\b", "\f", '"'), array('\\\\', '\\/', '\\n', '\\t', '\\r', '\\b', '\\f', '\"')); 
      return '"' . str_replace($jsonReplaces[0], $jsonReplaces[1], $a) . '"'; 
    }else{
       return $a; 
    }
  } 
  $isList = true; 
  for($i = 0, reset($a); $i < count($a); $i++, next($a)){ 
    if(key($a) !== $i){ 
      $isList = false; 
      break; 
    } 
  } 
  $result = array(); 
  if ($isList){ 
    foreach ($a as $v) $result[] = tsound_json($v); 
    return '[' . join(',', $result) . ']'; 
  }else{
    foreach ($a as $k => $v) $result[] = tsound_json($k).':'.tsound_json($v); 
    return '{' . join(',', $result) . '}'; 
  } 
}
?>