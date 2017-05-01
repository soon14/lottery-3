<div class="curlot clearfixkj" id="myLot">
    <div class="todayNumber fl">
        <div class="totayNumber-con" id="historyList">
            <ul class="issul" style="text-align:center">
                <li name="th" class="th"><span>期号</span><em >开奖号码</em></li>
				<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */
	               $sql="select time, number, data from {$this->prename}data where type={$this->type} order by number desc,time desc limit 15";
	              if($data=$this->getRows($sql)) foreach($data as $var){
				     if($this->type=='20'){
				 ?>
				   <li><span style="width:60px;"><?=$var['number']?></span><em style="font-size:13px; font-weight:600;"><?=$var['data']?></em></li>
				   <?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ }else if($this->type=='18'){ //快乐十分 ?>
				    <li><span style="width:90px;"><?=$var['number']?></span><em style="font-size:13px; font-weight:600;"><?=$var['data']?></em></li>
					 <?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ }else{ //其它 ?>
				    <li><span><?=$var['number']?></span><em><?=$var['data']?></em></li>
					<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ } } ?>
            </ul>        
		</div>
    </div>    
</div>