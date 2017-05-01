<?php
/* 此程序来自家园网络QQ1655707002 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ $this->display('inc_top_zh.php') ?>

<div class="ui-form-area mt30 ">
							<div class="ui-desc pt10">
								<span class="inline ml50 text-right">使用提示：</span>
								<div class="inline v-at ml20">
									<p>1、每个游戏帐户最多绑定 <b class="color-red">1</b> 张银行卡 ， 您已经成功绑定 <b class="color-red">0</b> 张。</p>
									<p>2、银行卡锁定以后，不能增加新的银行卡绑定，同时也不能解绑已绑定的银行卡。</p>
									<p>3、新绑定的提款银行卡需要绑定时间超过 <b class="color-red">6</b> 个小时才能正常取款。</p>
									<p>4、一个账户只能绑定同一个开户人姓名的银行卡。</p>
								</div>
							</div>
						</div>

<div class="pagemain">
    <div class="display biao-cont">
    	
<form action="/index.php/safe/setCBAccount" method="post" target="ajax" onajax="safeBeforSetCBA" call="safeSetCBA" name=form1>
<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ if($this->user['coinPassword']){ ?>
<table width="100%" border="0" cellspacing="1" cellpadding="4" class='table_b'>
    <tr class='table_b_th'>
      <td align="left" style="font-weight:bold;padding-left:10px;" colspan=4>个人银行信息</td> 
    </tr>
    <tr height=25 class='table_b_tr_b'>
      <td align="right" width="25%" style="font-weight:bold;">银行类型：</td>
      <td align="left" width="25%">
		<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */
            $myBank=$this->getRow("select * from {$this->prename}member_bank where uid=?", $this->user['uid']);
            $banks=$this->getRows("select * from {$this->prename}bank_list where isDelete=0 and id!=12 order by sort");
            
            $flag=($myBank['editEnable']!=1)&&($myBank);
        ?>
        <select name="bankId" style="height:22px; width:140px;" <?=$this->iff($flag, 'disabled')?>>
        <?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ foreach($banks as $bank){ ?>
            <option value="<?=$bank['id']?>" <?=$this->iff($myBank['bankId']==$bank['id'], 'selected')?>><?=$bank['name']?></option>
        <?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ } ?>
        </select>
      </td> 
      <td align="right" width="10%" style="font-weight:bold;">银行账号：</td>
      <td align="left" width="40%"><input type="text" name="account" style="width:220px;" value="<?=preg_replace('/^.*(\w{4})$/', '***\1', $myBank['account'])?>" <?=$this->iff($flag, 'readonly')?>/></td> 
    </tr> 
    <tr height=25 class='table_b_tr_b'>
      <td align="right" style="font-weight:bold;">账户姓名：</td>
      <td align="left" ><input type="text" name="username" value="<?=$this->iff($myBank['username'],mb_substr($myBank['username'],0,1,'utf-8').'**')?>" <?=$this->iff($flag, 'readonly')?> />
       </td> 
      
	  <td align="right" style="font-weight:bold;">开户行：</td>
      <td align="left" ><input type="text"  name="countname" style="width:220px" value="<?=preg_replace('/^(\w{4}).*(\w{4})$/','\1***\2',$myBank['countname'])?>"  <?=$this->iff($flag, 'readonly')?>/></td>
    </tr>   
	<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */
	$a=preg_replace('/^(\w{4}).*(\w{4})$/','\1***\2',$myBank['editEnable']);
	if($a!=0) {	?>
    <tr height=25 class='table_b_tr_b'>
	<td align="right" style="font-weight:bold;">资金密码：</td>
      <td align="left" ><input type="password" name="coinPassword" <?=$this->iff($flag, 'readonly')?>/></td>
      
      <td align="left" colspan="3"><input type="submit" <?=$this->iff($flag, 'disabled')?> class="btn" style="width:100px" value="设置银行" />
        <input type="reset" value="重置" onClick="this.form.reset()"  class="btn"/> </td> 
    </tr> 
	<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ } else{?>
	<tr height=25 class='table_b_tr_b'><td colspan="4" style="text-align:center; color:#F00;">银行卡已经锁定<?=$a?></td></tr>
	<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ }?>
</table> 
<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ }else{?>
<table width="100%" border="0" cellspacing="1" cellpadding="4" class='table_b'>
    <tr class='table_b_th'>
      <td align="left" style="font-weight:bold;padding-left:10px;" colspan=2>个人银行信息</td> 
    </tr>
    <tr height=25 class='table_b_tr_b'>
      <td align="right" width="25%" style="font-weight:bold;"><font color=#777777>温馨提示：</font></td>
      <td align="left" width="75%"><div class='font_line_2'>设置银行信息要用资金密码，您尚未设置资金密码！&nbsp;&nbsp;<a href="/index.php/safe/passwd" style="text-decoration:none; color:#f00">设置资金密码>></a></div></td> 
    </tr> 
   
</table> 
<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ }?>
</form>
</div>

<br>
</div>
<!--以下为模板代码-->
</div></div></div><?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ $this->display('inc_footer.php') ?></body></html>
   
 