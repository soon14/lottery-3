<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ $this->display('inc_top_hy.php') ?>
<div class="pagemain">
	
    <div class="display biao-cont">
    <form action="/index.php/team/insertLink" method="post" target="ajax" onajax="teamBeforeAddLink" call="teamAddLink">
<input name="uid" type="hidden" id="uid" value="<?=$this->user['uid']?>" />
<table width="100%" border="0" cellspacing="1" cellpadding="4" class='table_b'>
    <tr class='table_b_th'>
      <td align="left" style="font-weight:bold;padding-left:10px;" colspan=2>新增注册链接</td> 
    </tr>
    
    <tr height=25 class='table_b_tr_b'>
      <td align="right" style="font-weight:bold;">账号类型：</td>
      <td align="left" ><label><input type="radio" name="type" value="1" title="代理" style="width:auto;" />代理</label><label><input name="type"  type="radio" value="0" title="会员" style="margin-left:30px;width:auto;" checked="checked" />会员</label></td> 
    </tr>
    <tr height=25 class='table_b_tr_b'>
      <td align="right" style="font-weight:bold;">返点%：</td>
      <td align="left" ><input name="fanDian" max="<?=$this->user['fanDian']?>" value=""  fanDianDiff=<?=$this->settings['fanDianDiff']?> /><span style="color:#000; margin-left:10px;">0-<?=$this->user['fanDian']?>%</span></td> 
    </tr>
     <tr height=25 class='table_b_tr_b'>
      <td align="right" style="font-weight:bold;"></td>
      <td align="left"><input type="submit" id='put_button_pass' class="btn addbtn" value="增加链接" >
        <input type="reset" value="重置" class="btn"/> </td> 
    </tr> 

   
</table> 
</form>
    </div>
</div>
<!--以下为模板代码-->
</div></div></div><?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ $this->display('team/inc_footer.php') ?></body></html>
  
   
 