<?php
/* 此程序来自家园网络QQ1655707002 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ $this->display('inc_top_zh.php') ?>
<div class="pagemain">
    <div class="display biao-cont">
    	<table width="100%" border="0" cellspacing="1" cellpadding="4" class='table_b'>

    <tr height=25 class='table_b_th'>
      <td align="left" style="font-weight:bold;padding-left:10px;" colspan=4>个人基本信息</td> 
    </tr>
    <tr height=25 class='table_b_tr_b'>
      <td align="right" width="25%" style="font-weight:bold;">登陆账号：</td>
      <td align="left" width="25%"><?=$this->user['username']?></td> 
      <td align="right" width="25%" style="font-weight:bold;">呢称：</td>
      <td align="left" width="25%"><?=$this->user['nickname']?></td>
    </tr> 
    <tr height=25 class='table_b_tr_b'>
      <td align="right" style="font-weight:bold;">VIP等级：</td>
      <td align="left" >VIP<?=$this->user['grade']?></td>
      <td align="right" style="font-weight:bold;">积分：</td>
      <td align="left" ><?=$this->user['score']?></td>
    </tr> 
    <tr height=25 class='table_b_tr_b'>
      <td align="right" style="font-weight:bold;">会员类型：</td>
      <td align="left" ><?=$this->iff($this->user['type'], '代理', '会员')?></td>
      
      
    </tr>
    <tr height=25 class='table_b_tr_b'>
	  <td align="right" style="font-weight:bold;">可用资金：</td>
      <td align="left" ><?=$this->user['coin']?> 元</td>
      
      
    </tr> 
</table>

<form action="/index.php/safe/nickname" method="post" target="ajax" onajax="safeBefornickname" call="safeSetnickname">
<table border="0"  style="margin:auto auto 10px 163px;" cellspacing="1" cellpadding="4">
    <tr >
	<td align="center" height="20">&nbsp;&nbsp;&nbsp;修改您的昵称：&nbsp;&nbsp;</td>
	<td align="left" style="font-weight:bold;"><input type="text" maxlength="10" name="nickname" style="width:140px;" value="<?=$this->user['nickname']?>" /></td>
      <td align="left" colspan="3"><input type="submit" class="btn" style="margin-left:20px;" value="提交" /></td>
    </tr> 
</table>
</form>
<form action="/index.php/safe/care" method="post" target="ajax" onajax="safeBeforcare" call="safeSetcare" style="display:none;">
<table border="0" style="margin:auto auto 10px auto;" cellspacing="1" cellpadding="4" >
    <tr >
	<td align="left" height="20">修改登录问候语：&nbsp;&nbsp;</td>
	<td align="left" style="font-weight:bold;">
	<input type="text" maxlength="18" name="care" style="width:340px;" value="<?=$this->user['care']?>" /></td>
      <td align="left" colspan="3"><input type="submit" class="btn" value="提交" style="margin-left:20px;"/></td>
    </tr> 
</table>
</form>
<br>
</div></div>
<!--以下为模板代码-->
</div></div></div><?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ $this->display('inc_footer.php') ?></body></html>
   
 