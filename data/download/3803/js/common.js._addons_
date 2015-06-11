jQuery.noConflict();
jQuery(function() {
    function megaHoverOver(){
        jQuery(this).find(".sub").stop().fadeTo('fast', 1).show();

        (function(jQuery) { 
            jQuery.fn.calcSubWidth = function() {
                rowWidth = 0;
                jQuery(this).find("ul").each(function() {					
                    rowWidth += jQuery(this).width(); 
                });	
            };
        })(jQuery); 
		
        if ( jQuery(this).find(".row").length > 0 ) { 
            var biggestRow = 0;	
            jQuery(this).find(".row").each(function() {							   
                jQuery(this).calcSubWidth();
                if(rowWidth > biggestRow) {
                    biggestRow = rowWidth;
                }
            });
            jQuery(this).find(".sub").css({
                'width' :biggestRow
            });
            jQuery(this).find(".row:last").css({
                'margin':'0'
            });
			
        } else {
			
            jQuery(this).calcSubWidth();
            jQuery(this).find(".sub").css({
                'width' : rowWidth
            });
			
        }
    }
	
    function megaHoverOut(){ 
        jQuery(this).find(".sub").stop().fadeTo('fast', 0, function() {
            jQuery(this).hide(); 
        });
    }

    var config = {    
        sensitivity: 2, 
        interval: 20, 
        over: megaHoverOver,    
        timeout: 200, 
        out: megaHoverOut 
    };

    jQuery("ul.topnav li").hoverIntent(config);
    jQuery("ul.topnav li .sub").css({
        'opacity':'0'
    });
    
    jQuery(".by em span,.favorite_usr span[title],.favorite2_usr span[title]").each(function(){        
        jQuery(this).html(jQuery(this).html().replace(/&nbsp;/ig,''));
    });
    
    jQuery('#scbar_txt2').click(function(){
        jQuery(this).val('');
    });
    
    jQuery('#maillist').submit(function(){
        if(jQuery.browser.msie){
            document.charset='gb18030';
            setTimeout(function(){
                document.charset='utf-8';
            },500);
        }
    });
    
    jQuery('#mlsubmit').click(function(){
        jQuery('#to').val(jQuery('#scbar_txt2').val());
        jQuery('#maillist').submit();
    });

    initSearchmenu('scbar', '');
    5
    if(jQuery('#scbar_mod').val() == 'model'){
        bind_search_model();
    }
    jQuery('#scbar_type_menu').click(function(){
        jQuery('#scbar_type_menu').hide();
        if(jQuery('#scbar_mod').val() != 'model'){
            jQuery('#scbar_txt').unbind('click keydown.autocomplete keypress.autocomplete');
        } else{
            bind_search_model();  
        }
    });
     
    jQuery('#divqqbox #divmenu').bind('click',function(){
        jQuery('#divonline').show('slow');
    });
    jQuery('#divqqbox #divonline .close').bind('click',function(){
        jQuery('#divonline').hide('fast');
    });    
});

function jd_strLenCalc(obj, checklen, maxlen) {
    var v = jQuery(obj).val(), maxlen = !maxlen ? 140 : maxlen, curlen = maxlen, len = v.length;
        
    curlen = maxlen - len;

    if(curlen >= 0) {
        jQuery('#' + checklen).html(curlen);
    } else {
        jQuery(obj).val(v.substr(0, maxlen));
    }
}

function showcustomcalendar(obj, inpid, t, rettype) {
    var showselect_row = function (inpid, s, v, notime, rettype) {
        if(v >= 0) {
            if(!rettype) {
                var notime = !notime ? 0 : 1;
                var t = today.getTime();
                t += 86400000 * v;
                var d = new Date();
                d.setTime(t);
                var month = d.getMonth() + 1;
                month = month < 10 ? '0' + month : month;
                var day = d.getDate();
                day = day < 10 ? '0' + day : day;
                var hour = d.getHours();
                hour = hour < 10 ? '0' + hour : hour;
                var minute = d.getMinutes();
                minute = minute < 10 ? '0' + minute : minute;
                return '<a href="javascript:;" onclick="$(\'' + inpid + '\').value = \'' + d.getFullYear() + '-' + month + '-' + day + (!notime ? ' ' + hour + ':' + minute: '') + '\'">' + s + '</a>';
            } else {
                return '<a href="javascript:;" onclick="$(\'' + inpid + '\').value = \'' + v + '\'">' + s + '</a>';
            }
        } else if(v == -1) {
            return '<a href="javascript:;" onclick="$(\'' + inpid + '\').focus()">' + s + '</a>';
        } else if(v == -2) {
            return '<a href="javascript:;" onclick="$(\'' + inpid + '\').onclick()">' + s + '</a>';
        }
    };
    if(!obj.id) {
        var t = !t ? 0 : t;
        var rettype = !rettype ? 0 : rettype;
        obj.id = 'calendarexp_' + Math.random();
        div = document.createElement('div');
        div.id = obj.id + '_menu';
        div.style.display = 'none';
        div.className = 'p_pop';
        $('append_parent').appendChild(div);
        s = '';
        s += showselect_row(inpid, '1 天', 1, 0, rettype);        
        s += showselect_row(inpid, '3 天', 3, 0, rettype);  
        s += showselect_row(inpid, '5 天', 5, 0, rettype);  
        s += showselect_row(inpid, '7 天', 7, 0, rettype);
        s += showselect_row(inpid, '10 天', 10, 0, rettype);  
        s += showselect_row(inpid, '半个月', 15, 0, rettype);               
        s += showselect_row(inpid, '一个月', 30, 0, rettype);
        s += showselect_row(inpid, '自定义', -2);

        $(div.id).innerHTML = s;
    }
    showMenu({
        'ctrlid':obj.id,
        'evt':'click'
    });
    if(BROWSER.ie && BROWSER.ie < 7) {
        doane(event);
    }
} 

function showTopLink() {
    if($('ft')){
        var viewPortHeight = parseInt(document.documentElement.clientHeight);
        var scrollHeight = parseInt(document.body.getBoundingClientRect().top);
        var basew = parseInt($('ft').clientWidth);
        var sw = $('scrolltop').clientWidth;
        if (basew < 1000) {
            var left = parseInt(fetchOffset($('ft'))['left']);
            left = left < sw ? left * 2 - sw : left;
            $('scrolltop').style.left = ( basew + left ) + 'px';
        } else {
            $('scrolltop').style.left = 'auto';
            $('scrolltop').style.right = 0;
        }

        if (scrollHeight < -100) {
            $('scrolltop').style.visibility = 'visible';
        } else {
            $('scrolltop').style.visibility = 'hidden';
        }
    }
}

function open_link(url, target) {
    if(typeof target == "undefined"){
        target = '_blank';
    }
    var tf = jQuery("<form id='tf' action='"+url+"' target='"+target+"' />");
    jQuery(window.document.body).append(tf);
    jQuery(tf).submit();
    jQuery('#tf').remove();
}

function bind_search_model(){
    var scbar = (jQuery("form[action='search.php?mod=model']").length?'.scbar_txt_td ':'') + '#scbar_txt';
    jQuery(scbar).autocomplete(HOST_URL + 'phone.php',{
        minChars: 0,            
        scrollHeight: 300,
        selectFirst: false,
        max :30,            
        extraParams:{
            mod:'misc',
            ac:'ajax',
            op:'phone_model_name',
            inc_id:'1'
        },
        dataType: 'json',
        parse: function(data) {  
            var rows = [];  
            for(var i=0; i<data.length; i++){  
                rows[i] = {   
                    data:data[i],   
                    value:data[i].id,   
                    result:data[i].name   
                };   
            }
            return rows;  
        },
        formatItem: function(row) {
            return row.brand + ' ' + row.name;
        }
    }).result(function(event, row, formatted)
    {
        open_link(row.url);
        jQuery(scbar).val('');
    });
}

function regPortal() {
    showWindow('register', 'registerportal.php');
}

BookmarkApp = function () { 
    function hotKeys() {
        var ua = navigator.userAgent.toLowerCase();
        var str = '';
        var isWebkit = (ua.indexOf('webkit') != - 1);
        var isMac = (ua.indexOf('mac') != - 1);
 
        if (ua.indexOf('konqueror') != - 1) {
            str = 'CTRL + B'; // Konqueror
        } else if (window.home || isWebkit || isMac) {
            str = (isMac ? 'Command/Cmd' : 'CTRL') + ' + D'; // Netscape, Safari, iCab, IE5/Mac
        }
        return ((str) ? '请使用 ' + str + ' 添加到书签/收藏夹.' : str);
    }
 
    function isIE8() {
        var rv = -1;
        if (navigator.appName == 'Microsoft Internet Explorer') {
            var ua = navigator.userAgent;
            var re = new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})");
            if (re.exec(ua) != null) {
                rv = parseFloat(RegExp.$1);
            }
        }
        if (rv > - 1) {
            return (rv == 8)?true:false;
        }else{
           return false; 
        }
    }
 
    function addBookmark(a, cjTitle, cjHref) {                            
        try {
            if (typeof a == "object" && a.tagName.toLowerCase() == "a") {
                a.style.cursor = 'pointer';
                if ((typeof window.sidebar == "object") && (typeof window.sidebar.addPanel == "function")) {
                    window.sidebar.addPanel(cjTitle, cjHref, ""); // Gecko
                    return false;
                } else if (typeof window.external == "object") {
                    if (isIE8()) {
                        window.external.AddToFavoritesBar(cjHref, cjTitle); // IE 8
                    } else {
                        window.external.AddFavorite(cjHref, cjTitle); // IE <=7
                    }
                    return false;
                } else if (window.opera) {
                    a.href = cjHref;
                    a.title = cjTitle;
                    a.rel = 'sidebar'; // Opera 7+
                    return true;
                } else {
                    alert(hotKeys());
                }
            } else {
                throw "Error occured.\r\nNote, only A tagname is allowed!";
            }
        } catch (err) {
            alert(err);
        }
 
    }
 
    return {
        addBookmark : addBookmark
    }
}();