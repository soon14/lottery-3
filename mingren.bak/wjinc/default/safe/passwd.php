<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ $this->display('inc_top_zh.php') ?>
<div class="pagemain">
	
    <div class="display biao-cont">
    	<form action="/index.php/safe/setPasswd" method="post" target="ajax" onajax="safeBeforSetPwd" call="safeSetPwd">
<table width="100%" border="0" cellspacing="1" cellpadding="4" class='table_b'>

    <tr height=25 class='table_b_th'>
      <td align="left" style="font-weight:bold;padding-left:10px;" colspan=2>登录密码管理</td> 
    </tr>
    <tr height=25 class='table_b_tr_b'>
      <td align="right" width="25%" style="font-weight:bold;">原始密码：</td>
      <td align="left" width="75%"><input type="password" name="oldpassword" /></td> 
    </tr> 
    <tr height=25 class='table_b_tr_b'>
      <td align="right" style="font-weight:bold;">新密码：</td>
      <td align="left" ><input type="password" name="newpassword" /></td> 
    </tr> 
    <tr height=25 class='table_b_tr_b'>
      <td align="right" style="font-weight:bold;">确认新密码：</td>
      <td align="left" ><input type="password"   class="confirm"/></td> 
    </tr>  
    <tr height=25 class='table_b_tr_b'>
      <td align="right" style="font-weight:bold;"></td>
      <td align="left"><input type="button" id='put_button_pass' class="btn" style="width:100px" value="修改密码" onclick="$(this).closest('form').submit()" > 
        <input type="reset" value="重置" onClick="this.form.reset()"  class="btn"/> </td> 
    </tr> 

</table>
</form> 

		
<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ if($args[0]){ ?>
<form action="/index.php/safe/setCoinPwd2" method="post" target="ajax" onajax="safeBeforSetCoinPwd2" call="safeSetPwd">
<table width="100%" border="0" cellspacing="1" cellpadding="4" class='table_b'>
    <tr class='table_b_th'>
      <td align="left" style="font-weight:bold;padding-left:10px;" colspan=2>资金密码管理</td> 
    </tr>
    <tr height=25 class='table_b_tr_b'>
      <td align="right" width="25%" style="font-weight:bold;">原始密码：</td>
      <td align="left" width="75%"><input type="password" name="oldpassword"  /></td> 
    </tr> 
    <tr height=25 class='table_b_tr_b'>
      <td align="right" style="font-weight:bold;">新密码：</td>
      <td align="left" ><input type="password" name="newpassword"  /></td> 
    </tr> 
    <tr height=25 class='table_b_tr_b'>
      <td align="right" style="font-weight:bold;">确认密码：</td>
      <td align="left" ><input type="password" class="confirm"  /></td> 
    </tr>  
    <tr height=25 class='table_b_tr_b'>
      <td align="right" style="font-weight:bold;"></td>
      <td align="left"><input type="button" id='put_button_pass' class="btn" style="width:100px" value="修改密码"  onclick="$(this).closest('form').submit()"> 
        <input type="reset" value="重置" onClick="this.form.reset()"  class="btn"/> </td> 
    </tr> 
</table> 
</form>
<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ }else{?>
<form action="/index.php/safe/setCoinPwd" method="post" target="ajax" onajax="safeBeforSetCoinPwd" call="safeSetPwd">
<table width="100%" border="0" cellspacing="1" cellpadding="4" class='table_b'>
    <tr class='table_b_th'>
      <td align="left" style="font-weight:bold;padding-left:10px;" colspan=2>设置资金密码</td> 
    </tr>
    <tr height=25 class='table_b_tr_b'>
      <td align="right" width="25%" style="font-weight:bold;"><font color=#777777>温馨提示：</font></td>
      <td align="left" width="75%"><div class='font_line_2'>资金密码：提款、充值、还有积分兑换等都要求必须输入资金密码！</div></td> 
    </tr> 
    <tr height=25 class='table_b_tr_b'>
      <td align="right" style="font-weight:bold;">密码：</td>
      <td align="left" ><input type="password" name="newpassword"  /></td> 
    </tr> 
    <tr height=25 class='table_b_tr_b'>
      <td align="right" style="font-weight:bold;">确认密码：</td>
      <td align="left" ><input type="password" class="confirm"/></td> 
    </tr>  
    <tr height=25 class='table_b_tr_b'>
      <td align="right" style="font-weight:bold;"></td>
      <td align="left"><input type="button" id='put_button_pass' class="btn" value="设置密码"  onclick="$(this).closest('form').submit()"> 
        <input type="reset" value="重置" onClick="this.form.reset()"  class="btn"/> </td> 
    </tr> 
</table> 
</form>
<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ }?>

		
    </div>

<!--以下为模板代码-->
</div></div></div><?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ $this->display('inc_footer.php') ?></body></html>
   
 