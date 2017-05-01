<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */
		 $x115 = array(6,7,15,16);
		 $ssc = array(1,3,5,12,14);
		 if(in_array($this->type, $x115)){
				$ttt = 'chart115'; 
		 }else if(in_array($this->type, $ssc)){
				$ttt='chartssc';
		 }else{
		        $ttt=' ';
		 }
?>
<!-- 这部分要挪到头部 -->
<!-- <table border='0' cellspacing='0' cellpadding='0' width="100%" class="history-table">
  <tr style="background-color:#f4f1e5;">
    <?php  if($ttt==' '){ ?>
    <th style="color:#ffd34e;border-right:1px solid #e5e5e5;">期号</th>
    <?php }else{ ?>
    <th style="border-right:1px solid #e5e5e5;"><a href="/index.php/<?=$ttt ?>?type=<?=$this->type ?>&amp;count=30" target="_blank" style="color:#ea5635;text-decoration:underline;">历史号码走势</a></th>
    <?php } ?>
    <th><a href="javascript:void(0);" style="text-decoration:none; color:#333;">开奖号码</a></th>
  </tr>
  <?php  $this->display('index/inc_data_history_get.php', 0, 5); ?>
</table> -->
