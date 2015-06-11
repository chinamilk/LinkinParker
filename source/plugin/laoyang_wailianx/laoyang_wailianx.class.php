<?php

/**
 * 	[外链增强包(laoyang_wailianx.{modulename})] (C)2012-2099 Powered by 吉他社(www.jitashe.net).
 * 	Version: 1.0
 * 	Date: 2013-02-27 13:47
 */
if (!defined('IN_DISCUZ'))
{
    exit('Access Denied');
}

class plugin_laoyang_wailianx
{
    public function viewthread_postbottom_output()
    {
        global $postlist,$_G;;
        $config = $_G['cache']['plugin']['laoyang_wailianx'];
        if(!$config['kaiguan']) return array();
        foreach ($postlist as $id => &$post)
        {
            $post['message'] = $this->wailian_replace($post['message']);
        }
        unset($post);
        return array();
    }

    function wailian_replace($content)
    {
        $preg_searchs = "/\<a href\=\"http\:\/\/(.+?)\"/ie";
        $preg_replaces = '$this->iframe_url(\'\\1\')';   
        $content = preg_replace($preg_searchs, $preg_replaces, $content);
        return $content;
    }

    function iframe_url($url)
    {       
        global $_G;
        $wlist = $_G['cache']['plugin']['laoyang_wailianx']['baimingdan'];
        $wlist=explode("\r\n", $wlist);        
        require_once('rootdomain.class.php');
        $rootDomain=RootDomain::instace();  
        $rootDomain->setUrl();
        $currentdomain=$rootDomain->getDomain();
        $wlist[]=$currentdomain;          
        $domain=  explode('/', $url);
        $domain=$domain[0];
		$rootDomain->setUrl($url);
		$topdomain=$rootDomain->getDomain();  
        if(in_array($domain, $wlist)||in_array($topdomain, $wlist))
        {
            return "<a href=\"http://$url\"";
        }
        else{
            $url = rawurlencode($url);
            return "<a rel=\"nofollow\" href=\"/plugin.php?id=laoyang_wailianx&url=http://$url\"";
        }
        
    }
    
}

class plugin_laoyang_wailianx_group extends plugin_laoyang_wailianx{}
class plugin_laoyang_wailianx_forum extends plugin_laoyang_wailianx{}

?>