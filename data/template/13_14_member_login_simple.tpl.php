<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); if(CURMODULE != 'logging') { ?>
<script src="<?php echo $_G['setting']['jspath'];?>logging.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<form method="post" autocomplete="off" id="lsform" action="member.php?mod=logging&amp;action=login&amp;loginsubmit=yes&amp;infloat=yes&amp;lssubmit=yes" onsubmit="<?php if($_G['setting']['pwdsafety']) { ?>pwmd5('ls_password');<?php } ?>return lsSubmit();">
<div class="fastlg cl">
<span id="return_ls" style="display:none"></span>
<div class="y pns">
<table cellspacing="0" cellpadding="0">
<tr>
<?php if(!$_G['setting']['autoidselect']) { ?>

                                        <td><input id="ls_name" type="text" tabindex="901" onblur="if(this.value == ''){this.value = 'UID/用户名/Email';this.className = '';}" onfocus="if(this.value == 'UID/用户名/Email'){this.value = '';this.className = '';}" value="UID/用户名/Email" name="username" /></td>
<?php } else { ?>
<td><input type="text" name="name" id="ls_username" class="px vm xg1" <?php if($_G['setting']['autoidselect']) { ?> value="UID/用户名/Email" onfocus="if(this.value == 'UID/用户名/Email'){this.value = '';this.className = 'px vm';}" onblur="if(this.value == ''){this.value = 'UID/用户名/Email';this.className = 'px vm xg1';}"<?php } ?> tabindex="901" /></td>
<?php } ?>
<td><input type="password" name="password" id="ls_password" autocomplete="off" tabindex="902" /></td>
                                        <td class="fastlg_l"><button type="submit" id="login_dl" tabindex="904"><em></em></button></td>
<td class="cl"><a href="member.php?mod=<?php echo $_G['setting']['regname'];?>" id="login_zc"><span></span></a></td>

</table>
<input type="hidden" name="quickforward" value="yes" />
<input type="hidden" name="handlekey" value="ls" />
</div>
<?php if(!empty($_G['setting']['pluginhooks']['global_login_extra'])) echo $_G['setting']['pluginhooks']['global_login_extra'];?>
</div>
</form>
<?php } ?>