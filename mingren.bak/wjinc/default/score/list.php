<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ $this->display('inc_top_yj.php') ?>
<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ if($this->limittype=='current'){?>
<script type="text/javascript">
$(function(){
	$('.state-on').hover(function(){
		$(this).removeClass('state-on').addClass('state-complete').text('[确认收货]');
	},function(){
		$(this).removeClass('state-complete').addClass('state-on').text('正在发货');
	});
	$('.state-wait').hover(function(){
		$(this).removeClass('state-wait').addClass('state-off').text('[取消兑换]');
	},function(){
		$(this).removeClass('state-off').addClass('state-wait').text('等待发货');
	});
});

function scoreSetState(err, data){
	if(err){
		alert(err);
	}else{
		location.reload();
	}
}

function scoreBeforeSetState(){
	var state=$(this).attr('state');
	if(state==1){
		return confirm('取消兑换礼品只能返还<?=$this->payout * 100?>%积分，你确认要取消兑换嘛？');
	}else if(state==2){
		return confirm('你要确认收货嘛？');
	}
}
</script>
<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ } ?>
<link type="text/css" href="/skin/new/css/score.css" rel="stylesheet" />
<div class="pagemain">
<!-- begin -->
<div class="zzsc-list">
            <?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */
                if($args[0]) foreach($args[0]['data'] as $var){
            ?>
    <!-- 开始模块 -->
    <div class="dressing" style="width:210px;">    
      <div class="dressing_wrap">
        <div class="skinimg"><a href="javascript:void(0)" target="_blank"><img src="/<?=$var['picmax']?>" width="210" height="130" /></a></div>
        <div class="information_area">
          <div class="information_area_wrap">
            <div class="item clearfix">
              <h4  style="float:left">积分兑换</h4>
              <i class="W_vline" style="float:left">|</i>
              <div class="price" style="float:left"><span>＄<?=$var['score']?> 积分</span></div>
            </div>
            <div class="tipinfo clearfix">
              <div class="t_open" style="float:left; color:#810104"><?=Object::CsubStr($var['content'],0,40)?></div>
              <div class="t_open" style="float:left; margin-bottom:10px; margin-top:10px;"><span>剩余：</span>
			  <span class="W_textb"><?=$this->iff($var['sum']=='0', '不限', $var['sum']-$var['surplus'])?>份</span>
			  </div>
			  <!-- <div class="t_open" style="float:left;margin-bottom:10px; color:#810104;width:100%;">&nbsp;&nbsp;人已参与活动</div> -->
			  <?php
			  		//人已参与活动数据
			     //$this->getValue("select count(distinct uid) from {$this->prename}score_swap where goodId=?", $var['id'])
			  ?>
              <div  style="float:right">
			  <a <?=$this->iff($this->formatGoodTime($var['startTime'], $var['stopTime'])!='已结束','title="点击参与" href="/index.php/score/swap/'.$var['id'].'"','')?> style="display:block;" class="buybtn"><span>兑换积分</span></a>
			  <?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */
					if($var['state']){
						$state=array('1'=>'state-wait','2'=>'state-on');
			   ?>
			   <a href="/index.php/score/setSwapState/<?=$var['swapId']?>" state="<?=$var['state']?>" target="ajax" onajax="scoreBeforeSetState" call="scoreSetState" class="buybtn" style="display:block;"><?=$this->iff($var['state']==1,'等待发货','正在发货')?></a>
			   <?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ } ?>
			  </div>
            </div>
          </div>
        </div>
      </div>
    </div>
	 <!-- 结束模块 -->
	 <?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ } $this->display('inc_page.php', 0, $args[0]['total'], $this->pageSize, "/index.php/score/goods-{page}/{$this->scoretype}/{$this->limittype}", 1); ?>
     <div style="clear:both"></div>
</div>
<!-- end-->
	
</div>
<!--以下为模板代码-->
</div></div></div><?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ $this->display('inc_footer.php') ?></body></html>
  
  
   
 