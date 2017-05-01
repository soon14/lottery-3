 <?php
/* 此程序来自家园网络QQ1655707002 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */
	$lastNo=$this->getGameLastNo($this->type);
	$kjHao=$this->getValue("select data from {$this->prename}data where type={$this->type} and number='{$lastNo['actionNo']}'");
	if($kjHao) $kjHao=explode(',', $kjHao);
	$actionNo=$this->getGameNo($this->type);
	$types=$this->getTypes();
	$kjdTime=$types[$this->type]['data_ftime'];
	$diffTime=strtotime($actionNo['actionTime'])-$this->time-$kjdTime;
	$kjDiffTime=strtotime($lastNo['actionTime'])-$this->time;
?> <!--获取开奖时间、期号等DATA -->
<style type="text/css">
.gameimg-div{margin:0 auto;text-align: center;width:100%;margin-top:-10px;}
.gameimg{display: inline-block;}
.gamediv{margin-top:90px;  position:absolute; font-size:14px; color:#990000;}
.zst{margin:23px 10px;font-size:16px;color:#fff;font-weight:bolder;}
.zjhm{margin:20px 0px;font-size:10px;color:#fff;font-weight:bolder;border:2px solid #eee;border-radius:5px;padding:5px;position:relative;}
.zjhm-show{width:250px;height:400px;border:2px solid #ddd;border-radius:5px;position:absolute;top:0px;left:25px;background:#eee;display:none;}
.wjkjData{border:2px solid #fff;border-radius:10px;}
</style>
 <div class="todayNumber fl" style="width:1100px">
        <div class="totayNumber-con" id="historyList" style="width:1100px;">
            <!-- 以下是投注区域顶部模块-->
 <div class="bd" id="kaijiang" type="<?=$this->type?>" ctype="<?=$types[$this->type]['type']?>">
      <table width="100%" cellpadding="0" cellspacing="0" border="0" class="game_top_area">
        <tr valign="top">
          <td style="width:180px;"><!-- 下面是根据不同的彩种设置的图片 -->
                <!-- <div class="gameimg-div"><?php if($types[$this->type]['type']==2) { //11选5?>
                    <img src="/qinyi/lottery/jx115.png" class="gameimg" /> 
    
                    <?php }else if($types[$this->type]['type']==6){ //北京赛车?>
                    <img src="/images/index/c7.png" class="gameimg"/>
  
                    <?php  }else if($types[$this->type]['type']==4){ //快乐十分?>
                    <img src="/images/index/c9.png" class="gameimg" />
      
                    <?php  }else if($types[$this->type]['id']==9){ //福彩3D?>
                    <img src="/images/index/3d.png" class="gameimg" />
                    <!-- </span></div> --><!--
                    <?php  }else if($types[$this->type]['id']==10){ //排列三?>
                    <img src="/images/index/p3.png" class="gameimg" />
      
                    <?php  }else{ ?>
                    <img src="/qinyi/lottery/cqssc.png" class="gameimg"/>
      
                    <?php  } ?>
                </div> -->
                <div style="height:20px;"></div>
          <!-- 这是显示彩种的名字 -->
          <span style="font-size:26px;color:#fff;display:block;width:100%;text-align:center;"><?=$types[$this->type]['title']?></span><div style="height:8px;"></div><hr><div style="height:5px;"></div><span style="font-size:8px;color:#fff;display:block;width:100%;text-align:center;">5分钟、10分钟一期，共120期</span>
          </td>
          <td class="game_top_aleft">
          <ul style="margin:22px 0 0 50px;">
              <li style="display:none;" class="ni kj-title"><p class="i2">&nbsp;第<span class="i1"><?=$actionNo['actionNo']?></span> 期 </p></li>
               <li><span id="current_endtime"><b style="color:#ffc734"><?=$actionNo['actionTime']?></b></span></li>
			  <li class="tm"><span id='current_titles' style="font-size:15px; margin-left:25px; color:#FFF;">投注截至剩余时间</span></li>
			 
			  <li class="tb"><em></em><span class="i2" action="/index.php/display/freshKanJiang/<?=$this->type?>" id="pre-kanjiang">00:00:00</span></li>
	    </ul>
	  </td>
    <!-- 下面是不同的彩种有不同的彩种的开奖码 -->
    <?php if($types[$this->type]['type']==4) { //快乐十分?>
    <td class="game_top_aright"> 
	    <div class="kj-bottom"><span class="tit">&nbsp;&nbsp;第 <span class="last_issues"><b><?=$lastNo['actionNo']?></span></b> 期  </span><br /><span class="gamediv1">开奖号码</span><br /><span></span><span id="lockgame"></span><div class="clear"> </div ></div> 
        <div class="grid_code_ssc wjkjData" style="margin-top:15px; margin-right:80px;">
          	<p style="display:none"><!-- <img src="/images/common/kjts.png" /> --></p>
            <ul class="kj-hao" ctype="g1" cnum="8" >
                <li id="span_lot_0" class="gr_s gr_s020"> <?=$kjHao[0]?> </li>
                <li id="span_lot_1" class="gr_s gr_s020"> <?=$kjHao[1]?> </li>
                <li id="span_lot_2" class="gr_s gr_s020"> <?=$kjHao[2]?> </li>
                <li id="span_lot_3" class="gr_s gr_s020"> <?=$kjHao[3]?> </li>
                <li id="span_lot_4" class="gr_s gr_s020"> <?=$kjHao[4]?> </li>
                <li id="span_lot_5" class="gr_s gr_s020"> <?=$kjHao[5]?> </li>
                <li id="span_lot_6" class="gr_s gr_s020"> <?=$kjHao[6]?> </li>
                <li id="span_lot_7" class="gr_s gr_s020"> <?=$kjHao[7]?> </li>

            </ul>
            <div class="clear"></div>
        </div>   
	</td>
    <?php }else if($types[$this->type]['type']==6) { //PK10?>
       <td class="game_top_aright"> 
	    <div class="kj-bottom"><span class="tit">&nbsp;&nbsp;第 <span class="last_issues"><b><?=$lastNo['actionNo']?></span></b> 期  </span><br /><span class="gamediv1">开奖号码</span><br /><span></span><span id="lockgame"></span><div class="clear"> 
		 </div ></div> 
          <div class="grid_code_ssc wjkjData" style="margin-top:15px; margin-right:15px;">
		  <a href="#" onclick="javascript:window.open('http://www.zhanpj2888.cn/pk10.html','','height=470,width=718,top=0,left=0,toolbar=no,menubar=no,scrollbars=no, resizable=no,location=no, status=no')"><center></center></a>
          	  <p style="display:none"><!-- <img src="/images/common/kjts.png" /> --></p>
              <ul class="kj-hao" ctype="g1" cnum="10">
                <li id="span_lot_0" class="gr_s gr_s020"> <?=$kjHao[0]?> </li>
                <li id="span_lot_1" class="gr_s gr_s020"> <?=$kjHao[1]?> </li>
                <li id="span_lot_2" class="gr_s gr_s020"> <?=$kjHao[2]?> </li>
                <li id="span_lot_3" class="gr_s gr_s020"> <?=$kjHao[3]?> </li>
                <li id="span_lot_4" class="gr_s gr_s020"> <?=$kjHao[4]?> </li>
                <li id="span_lot_5" class="gr_s gr_s020"> <?=$kjHao[5]?> </li>
                <li id="span_lot_6" class="gr_s gr_s020"> <?=$kjHao[6]?> </li>
                <li id="span_lot_7" class="gr_s gr_s020"> <?=$kjHao[7]?> </li>
                <li id="span_lot_8" class="gr_s gr_s020"> <?=$kjHao[8]?> </li>
                <li id="span_lot_9" class="gr_s gr_s020"> <?=$kjHao[9]?> </li>
              </ul>
              <div class="clear"></div>
          </div>   
	  </td>
	  <?php
/* 此程序来自家园网络QQ1655707002 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ }else if($types[$this->type]['type']==10) { //六合彩?>
       <td class="game_top_aright"> 
	    <div class="kj-bottom"><span class="tit">&nbsp;&nbsp;第 <span class="last_issues"><?=$lastNo['actionNo']?></span> 期  <span id="kjsay">开奖倒计时：<em class="kjtips">00:00</em></span></span><img id="voice" class="voice-on"  title="声音开启，点击关闭" onclick="voiceKJ()"><span id="lockgame"></span><div class="clear"></div></div>
          <div class="grid_code_tl wjkjData" >
          	   <p style="display:none"><!-- <img src="/images/common/kjts.png" /> --></p>
              <ul class="kj-hao" ctype="g1" cnum="49" style="margin-left:60px;padding-top:20px;">
                    <li id="span_lot_0" class="gr_s gr_s020"> <?=$kjHao[0]?> </li>
                    <li id="span_lot_1" class="gr_s gr_s020"> <?=$kjHao[1]?> </li>
                    <li id="span_lot_2" class="gr_s gr_s020"> <?=$kjHao[2]?> </li>
                    <li id="span_lot_3" class="gr_s gr_s020"> <?=$kjHao[3]?> </li>
                    <li id="span_lot_4" class="gr_s gr_s020"> <?=$kjHao[4]?> </li>
                    <li id="span_lot_5" class="gr_s gr_s020"> <?=$kjHao[5]?> </li>
					<li id="span_lot_5" class="gr_s gr_s020"> <?=$kjHao[6]?> </li>
              </ul>
              <div class="clear"></div>
           </div> 
	  </td>
     <?php
/* 此程序来自家园网络QQ1655707002 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ }else if($types[$this->type]['type']==9) { //快3?>
      <td class="game_top_aright"> 
	    <div class="kj-bottom"><span class="tit">&nbsp;&nbsp;第 <span class="last_issues"><b><?=$lastNo['actionNo']?></span></b> 期  总共:<b style="color:#FF0000"><?=$types[$this->type]['num']?></b>&nbsp;期  <span id="kjsay">开奖倒计时：<em class="kjtips">00:00</em></span> </span><img id="voice" class="voice-on"  title="声音开启，点击关闭" onclick="voiceKJ()"><span id="lockgame"></span><div class="clear"></div></div>  
            <div class="grid_code_tl wjkjData" >
               <p style="display:none"><!-- <img src="/images/common/kjts.png" /> --></p>
              <ul class="kj-hao k3" ctype="g2"  cnum="6" style="margin-left:70px;">
                    <li id="span_lot_0" class="gr_ks gr_ks<?=intval($kjHao[0])?>"> </li>
                    <li id="span_lot_1" class="gr_ks gr_ks<?=intval($kjHao[1])?>"> </li>
                    <li id="span_lot_2" class="gr_ks gr_ks<?=intval($kjHao[2])?>"> </li>
                  </ul>
              <div class="clear"></div>
           </div>
       </td> 
     <?php
/* 此程序来自家园网络QQ1655707002 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ }else if($types[$this->type]['type']==3) { //3D?>
      <td class="game_top_aright"> 
	    <div class="kj-bottom"><span class="tit">&nbsp;&nbsp;第 <span class="last_issues"><b><?=$lastNo['actionNo']?></span></b> 期  </span><br /><span class="gamediv1">开奖号码</span><br /><span></span><span id="lockgame"></span><div class="clear"> 
		 </div ></div> 
            <div class="grid_code_tl wjkjData" >
              	 <p style="display:none"><!-- <img src="/images/common/kjts.png" /> --></p>
              	<ul class="kj-hao" ctype="g0"  cnum="6" style="margin-left:100px;">
                    <li id="span_lot_0" class="gr_s gr_s<?=intval($kjHao[0])?>"> </li>
                    <li id="span_lot_1" class="gr_s gr_s<?=intval($kjHao[1])?>"> </li>
                    <li id="span_lot_2" class="gr_s gr_s<?=intval($kjHao[2])?>"> </li>
                  </ul>
              <div class="clear"></div>
           </div>
       </td> 
      <?php
/* 此程序来自家园网络QQ1655707002 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ }else if($types[$this->type]['type']==2) { //11选5?>
       
         <td class="game_top_aright"> 
	    <div class="kj-bottom"><span class="tit">&nbsp;&nbsp;第 <span class="last_issues"><b><?=$lastNo['actionNo']?></b></span> 期 </span><br /><span class="gamediv1">开奖号码</span><br /><span></span><span id="lockgame"></span><div class="clear"> 
		 </div ></div> 
              <div class="grid_code_ssc wjkjData">
              	 <p style="display:none"><!-- <img src="/images/common/kjts.png" /> --></p>
                  <ul class="kj-hao" ctype="g3" cnum="6" >
                    <li id="span_lot_0" class="gr_s gr_s<?=$kjHao[0]?>"> </li>
                    <li id="span_lot_1" class="gr_s gr_s<?=$kjHao[1]?>"> </li>
                    <li id="span_lot_2" class="gr_s gr_s<?=$kjHao[2]?>"> </li>
                    <li id="span_lot_3" class="gr_s gr_s<?=$kjHao[3]?>"> </li>
                    <li id="span_lot_4" class="gr_s gr_s<?=$kjHao[4]?>"> </li>
                  </ul>
                  <div class="clear"></div>
            </div>   
             
	  </td>
      
 	<?php }else{  ?>
    <td class="game_top_aright"> 
	    <div class="kj-bottom"><span class="tit">&nbsp;&nbsp;第 <span class="last_issues"><b><?=$lastNo['actionNo']?></b></span> 期</span><br /><span class="gamediv1">开奖号码</span><br /><span></span><span id="lockgame"></span><div class="clear"></div ></div> 
        <div class="grid_code_ssc wjkjData" >
            <p style=" display:none;"><!-- <img src="/images/common/kjts.png" /> --></p>
                <ul class="kj-hao" ctype="g0"  cnum="10">
                    <li id="span_lot_0" class="gr_s gr_s<?=intval($kjHao[0])?>"> </li>
                    <li id="span_lot_1" class="gr_s gr_s<?=intval($kjHao[1])?>"> </li>
                    <li id="span_lot_2" class="gr_s gr_s<?=intval($kjHao[2])?>"> </li>
                    <li id="span_lot_3" class="gr_s gr_s<?=intval($kjHao[3])?>"> </li>
                    <li id="span_lot_4" class="gr_s gr_s<?=intval($kjHao[4])?>"> </li>
                </ul>
            <div class="clear"></div>
        </div>   
             
	</td>
    <?php  }?>
    <td>
        <div class="zst">走势图</div>
    </td>
    <td>
        <div class="zjhm" id="zjhm">中奖号码 <div class="zjhm-show"id="zjhm-show"><?php  $this->display('index/inc_data_history.php'); ?></div></div>
    </td>
    <script type="text/javascript">
        $('#zjhm').toggle(function(){
            $('#zjhm-show').css('display','block');
        },function(){
            $('#zjhm-show').css('display','none');
        });
        /*var zjhm = document.getElementById('zjhm');
        var zjhm_show = document.getElementById('zjhm-show');
        zjhm.onmouseover(function(){
            zjhm_show.style.display = 'block';
        });
        zjhm.zjhm_show.onmouseout(function(){
            zjhm_show.style.display = 'none';
        })*/
    </script>
</tr>
      </table>
    </div> 
	<!-- ID kaijiang END  -->
		</div>
    </div>
	
    <div class="clear"></div>
<script type="text/javascript">
$(function(){
	window.S=<?=json_encode($diffTime>0)?>;
	window.KS=<?=json_encode($kjDiffTime>0)?>;
	window.kjTime=parseInt(<?=json_encode($kjdTime)?>);
	
	if($.browser.msie){
		window.diffTime=<?=$diffTime?>;
		setTimeout(function(){
			gameKanJiangDataC(<?=$diffTime?>);
		}, 1000);
	}else{
		setTimeout(gameKanJiangDataC, 1000, <?=$diffTime?>);
	}
	<?php
/* 此程序来自家园网络QQ1655707002 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ if($kjDiffTime>0){ ?> 
		if($.browser.msie){
		setTimeout(function(){
			setKJWaiting(<?=$kjDiffTime?>);
		}, 1000);
		}else{
			setTimeout(setKJWaiting, 1000, <?=$kjDiffTime?>);
		}
	<?php } ?> 
	
	<?php if(!$kjHao){ ?> 
		loadKjData();
	<?php  } ?> 
});
</script>