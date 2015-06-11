<?php
if(!defined('IN_DISCUZ')) {exit('Access Denied');}

class plugin_ajaxbaidu  {

        function global_footer() {

                global $_G;

                $config = $_G['cache']['plugin']['ajaxbaidu'];
				if($config['open']==1){
					$str = '
					<script src="/source/plugin/ajaxbaidu/js/jquery-1.4.2.min.js" type="text/javascript"></script>
					<script>jQuery.noConflict();</script>
					<script type="text/javascript">
					jQuery(function(){
						jQuery("form").bind("keyup", function() { d=jQuery("#scbar_txt").val();lookup(d); }); 
						jQuery("form").bind("blur", function() { fill(); }); 
						});					
					</script>	
					<script type="text/javascript">
							jQuery(function(){
								jQuery("#scbar").css("position","relative");
								jQuery("#scbar").css("overflow","visible");
								jQuery("#scbar").append("<div class=\"suggestionsBox\" id=\"suggestions\" style=\"display: none;\"><div class=\"suggestionList\"><ul id=\"autoSuggestionsList\"><\/ul><\/div><\/div>"); 
						
								
							jQuery("#suggestions").hover(function(){
								},function(){
								jQuery(this).hide();
								}); 
								
							});
					</script>			
					<script type="text/javascript"> 
					
							function lookup(scbar_txt) { 
								if(scbar_txt.length < 0) { 
									jQuery("#scbar_txt").hide(); 
								} else { 
									jQuery.post("/source/plugin/ajaxbaidu/search_list.php", {queryString: ""+scbar_txt+""}, function(data){ 
										if(data.length >0) { 
											jQuery("#suggestions").show(); 
											jQuery("#autoSuggestionsList").html(data); 
										} 
									}); 
								} 
							} 
							 
							function fill(thisValue) { 
								jQuery("#scbar_txt").val(thisValue); 
								jQuery("#suggestions").hide(); 
								jQuery("#scbar_form").submit();
								
							} 
								
					</script>';
				}
				return $str;
			
        }

       function global_cpnav_extra1() {
				  global $_G;
                $configs = $_G['cache']['plugin']['ajaxbaidu'];
				if($configs['open']==1){
					$cor=$configs['bgcolorHI'];
					$fontcor= $configs['fontColorHI'];
					$str = '
					<style>
					  .suggestionsBox { background: none repeat scroll 0 0 white;
						border: 1px solid #DCDCDC;
						color: #323232;
						left: 45px;
						position: absolute;
						top: 37px;
						width: 400px;
						z-index: 999; } 
					.suggestionList { margin: 0px; padding: 0px; } 
					.suggestionList li {  cursor: pointer;
						height: 30px;
						line-height: 30px;
						list-style: none outside none;
						margin: 0 0 3px;
						overflow: hidden;
						padding: 1px 1px 1px 5px;
						position: relative;} 
					.suggestionList li:hover { background-color: '.$cor.'; } 
					#ajfont{color:'.$fontcor.';}
					.jr{position:absolute;top:9px;right:-5px} 
						</style>';

					return $str;
				}
        }

}

?>

         