<div class="game-main"style="width:1100px;">
	<div id="bet-game">
     	<!--选号区域 begin-->
		<div class="game-btn"style="width:1100px;">
			<?php
				if($_COOKIE['mode']){
					$mode=$_COOKIE['mode'];
				}else{
					$mode=2.00;
				}
				$this->getSystemSettings();
				$this->getTypes();
				$sql="select id, groupName, enable from {$this->prename}played_group where enable=1 and type=? order by sort";
				$groups=$this->getObject($sql, 'id', $this->types[$this->type]['type']);
				if($this->groupId && !$groups[$this->groupId]) unset($this->groupId);
				// var_dump($groups);die;
				// groups就是玩法的大分类
				if($groups) foreach($groups as $key=>$group){
					if(!$this->groupId) $this->groupId=$group['id'];
			?>
			<div class="ul-li<?=($this->groupId==$group['id'])?' current':''?>">
	        	<a class="cai" href="/index.php/index/group/<?=$this->type .'/'.$group['id']?>"><span class="content"><?=$group['groupName']?></span></a>
			</div>
			<?php  } ?>
       		<div class="clear"></div>
		</div>
     	<!--选号区域 end-->
		<div class="game-cont">
	     	<!--玩法-->
	     	<?php $this->display('index/inc_game_played.php'); ?>
 			<div class="betBox pr clearfix"id="gameCon">
 <!--玩法详细-->
 <style type="text/css"> 
 .pp{background:#ccc;width:100%;padding-right:10px;}

 .code{}
 .action{}
.over {color:#ea5635;padding:5px 5px 5px 5px; border:1px solid #666666;} 
</style> 
 <script type="text/javascript"> 
function chg(a){ 
  if(a=='y'){
     $('#y').addClass("over");//清除class
     $('#j').removeClass("over");//清除class
     $('#f').removeClass("over");//清除class
     $('#l').removeClass("over");//清除class
     $('#h').removeClass("over");//清除class
  }else if(a=='j'){
     $('#j').addClass("over");//清除class
     $('#y').removeClass("over");//清除class
     $('#f').removeClass("over");//清除class
     $('#l').removeClass("over");//清除class
     $('#h').removeClass("over");//清除class
  }else if(a=='f'){
     $('#f').addClass("over");//清除class
     $('#y').removeClass("over");//清除class
     $('#j').removeClass("over");//清除class
     $('#l').removeClass("over");//清除class
     $('#h').removeClass("over");//清除class
  }else if(a=='l'){
     $('#l').addClass("over");//清除class
     $('#y').removeClass("over");//清除class
     $('#j').removeClass("over");//清除class
     $('#f').removeClass("over");//清除class
     $('#h').removeClass("over");//清除class
  }else if(a=='h'){
     $('#h').addClass("over");//清除class
     $('#y').removeClass("over");//清除class
     $('#j').removeClass("over");//清除class
     $('#l').removeClass("over");//清除class
     $('#f').removeClass("over");//清除class
  }
} 
$(function(){
	//元、角、分模式下选定初始值
	if($('.fn-area label').length == 3)
	{
		var is_has = 0;
		$('.fn-area label').each(function(i){
			if($('.fn-area label').eq(i).hasClass('over'))
			{
				is_has == 1;
			}
		});
		//假如没有被选定
		if(!is_has)
		{
			$('.fn-area label').eq(0).addClass('over');
			$('.fn-area label').eq(0).trigger("click");
		}
	}
	//五星、四星、开放厘毫模式，三星以下隐藏
	function hide_HM()
	{
		if($('.fn-area label').length == 5)
		{
			$('.ul-li').each(function(i){
				if($('.ul-li').eq(i).hasClass('current'))
				{
					if(i >= 2)
					{
						//隐藏厘毫模式
						$('.fn-area label').eq(3).hide();
						$('.fn-area label').eq(4).hide();
						return false;
					}
					else
					{
						//开放厘毫模式
						$('.fn-area label').eq(3).show();
						$('.fn-area label').eq(4).show();
						return false;
					}
				}
			});
		}
	}
	hide_HM();
	$('.ul-li').click(function(){
		if($('.fn-area label').length == 5)
		{
			var index = $(this).index();

			if(index >= 2)
			{
				//隐藏厘毫模式
				$('.fn-area label').eq(3).hide();
				$('.fn-area label').eq(4).hide();
				$('#slider').css('width', '150px');
			}
			else if(index == 1)
			{
				//开放厘毫模式
				$('.fn-area label').eq(3).show();
				$('.fn-area label').eq(4).hide();
				$('#slider').css('width', '100px');
			}
			else if(index == 0)
			{
				$('.fn-area label').eq(3).show();
				$('.fn-area label').eq(4).show();
				$('#slider').css('width', '95px');
			}
		}
	});
});
</script>
<script type="text/javascript">
function zhuidiv(){
    $("#zh-div").toggle(500);//显示隐藏切换,参数可以无,参数说明同上 
}
</script>
<style type="text/css">
.select{
font-family:"微软雅黑";
padding:3px 2px;
font-size:12px;
height:25px;
width:60px;
*width:52px;
margin:-1px;
}
.select_border,.container {*width:50px;}
</style> 
				<div class="c_betresult collect-static clearfix mt20" id="game-dom" >
					<div class="f-left fn-area"style="width:1000px;">
						<!-- <span>本次投注数：1注 金额：2元</span> -->
						<!-- <span class="tz-tongji fs14" style=" display:block; height:20px; width:30%;  color:#333; margin-top:10px; float:left;padding-left:50px;">本次投注数：<strong class="fe0" id="all-count" style="color:#ea5635">0</strong>注，预计消费金额：￥<strong class="fe0" id="all-amount" style="color:#ea5635;">0.00</strong>元</span> -->
						<input id="beishu" value="<?=$this->ifs($_COOKIE['beishu'],1)?>" class="choose-input w50"/>倍
						<label id="y" onclick="chg('y')" class="<?=$this->iff($mode=='2.0000','over')?>" style="margin-left:5px; margin-right:5px;">元<input type="radio" value="2.0000" style="cursor:pointer; margin-left:5px; margin-right:5px; display:none;" data-max-fan-dian="<?=$this->settings['betModeMaxFanDian0']?>" name="danwei" <?=$this->iff($mode=='2.00','checked')?> /></label>
						<label id="j" onclick="chg('j')" class="<?=$this->iff($mode=='0.2000','over')?>" style="margin-left:5px; margin-right:5px;">角<input type="radio" value="0.2000" style="cursor:pointer; margin-left:5px; margin-right:5px; display:none;" data-max-fan-dian="<?=$this->settings['betModeMaxFanDian1']?>" name="danwei" <?=$this->iff($mode=='0.2000','checked')?> /></label>
						<?php if($this->settings['fenmosi']==1){?>
						<label id="f" onclick="chg('f')" class="<?=$this->iff($mode=='0.0200','over')?>" style="margin-left:5px; margin-right:5px;">分<input type="radio" value="0.0200" style="cursor:pointer; margin-left:5px; margin-right:5px; display:none;" data-max-fan-dian="<?=$this->settings['betModeMaxFanDian2']?>" name="danwei" <?=$this->iff($mode=='0.0200','checked')?> /></label>
						<?php  } ?>
						<?php if($this->types[$this->type]['type'] == 1){ ?>
						<label id="l" onclick="chg('l')" class="<?=$this->iff($mode=='0.0020','over')?>" style="margin-left:5px; margin-right:5px;">厘<input type="radio" value="0.0020" style="cursor:pointer; margin-left:5px; margin-right:5px; display:none;" data-max-fan-dian="<?=$this->settings['betModeMaxFanDian2']?>" name="danwei" <?=$this->iff($mode=='0.0020','checked')?> /></label>
						<label id="h" onclick="chg('h')" class="<?=$this->iff($mode=='0.0002','over')?>" style="margin-left:5px; margin-right:5px;">毫<input type="radio" value="0.0002" style="cursor:pointer; margin-left:5px; margin-right:5px; display:none;" data-max-fan-dian="<?=$this->settings['betModeMaxFanDian2']?>" name="danwei" <?=$this->iff($mode=='0.0002','checked')?> /></label>
						<?php } ?>
					 	<div style=" margin-top:0px;float:right; margin-right:100px;">  
							<span id="lt_sel_prize" class="ml20" style= "float:left; width:40px;">返点：</span>
							<div id="slider" class="slider" style="width:150px;float:left; cursor:pointer; margin-top:5px;" value="<?=$this->ifs($_COOKIE['fanDian'], 0)?>" data-bet-count="<?=$this->settings['betMaxCount']?>" data-bet-zj-amount="<?=$this->settings['betMaxZjAmount']?>" max="<?=$this->user['fanDian']?>" game-fan-dian="<?=$this->settings['fanDianMax']?>" fan-dian="<?=$this->user['fanDian']?>" game-fan-dian-bdw="<?=$this->settings['fanDianBdwMax']?>" fan-dian-bdw="<?=$this->user['fanDianBdw']?>" min="0" step="0.1" slideCallBack="gameSetFanDian">
							</div>
							<span id="fandian-value" style= "float:left;width:90px;padding-left:30px;"><?=$maxPl?>/0%</span>
						</div>
						<span id="game-tip-dom" style="color:#999"></span>
					</div>
				</div>
<!--.betSubmit end -->
<!--#gameCon end-->
<!--#myLot end-->
			</div>
		</div>
		<div style='width:300px;float:right;margin:15px 20px 15px 0;' id='historylot'>
        <?php  $this->display('index/inc_data_history.php'); ?>
        </div>
	</div>
</div>
<!--game-cont end-->
