<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ $this->display('inc_top_yj.php') ?>
<div class="pagemain">
	<div class="search">
  		<form action="/index.php/deposit/main" method="get">
  		
           时间：<input type="text" name="fromTime" class="datainput"  value="<?=$this->iff($_REQUEST['fromTime'],$_REQUEST['fromTime'],date('Y-m-d',$GLOBALS['fromTime']))?>"/>至<input type="text" name="toTime"  class="datainput" value="<?=$this->iff($_REQUEST['toTime'],$_REQUEST['toTime'],date('Y-m-d',$GLOBALS['toTime']))?>"/>
         
      <input type="button" value="查 询" class="btn chazhao">
  </form> 
    </div>
    <div class="display biao-cont">
        <!--下注列表-->
        <table width="100%" class='table_b'>
        <thead>
            <thead>
            <tr class="table_b_th">
                <td>编号</td>
                <td>收益金额</td>
                <td>收益时长(天)</td>
                <td>成功时间</td>
                <td>备注</td>
            </tr>
            </thead>
            <tbody class="table_b_tr">
            <?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */
                $sql="select * from {$this->prename}deposit_log where uid={$this->user['uid']} ";
				if($_GET['fromTime'] && $_GET['endTime']){
                    $fromTime=strtotime($_GET['fromTime']);
                    $endTime=strtotime($_GET['endTime']);
                    $sql.=" and actionTime between $fromTime and $endTime";
                }elseif($_GET['fromTime']){
                    $sql.=' and actionTime>='.strtotime($_GET['fromTime']);
                }elseif($_GET['endTime']){
                    $sql.=' and actionTime<'.(strtotime($_GET['endTime']));
                }else{
					
					if($GLOBALS['fromTime'] && $GLOBALS['toTime']) $sql.=' and actionTime between '.$GLOBALS['fromTime'].' and '.$GLOBALS['toTime'].' ';
				}
                $sql.=' order by actionTime desc';
                
                $pageSize=15;
                
                $list=$this->getPage($sql, $this->page, $pageSize);
                if($list['data']) foreach($list['data'] as $var){
            ?>
            <tr>
                <td><?=$var['id']?></td>
                <td><?=$this->iff($var['depositCoin']>0, $var['depositCoin'], '--')?></td>
                <td><?=$var['CoinTime']?></td>
                <td><?=date('Y-m-d H:i:s', $var['actionTime'])?></td>
                <td><?=$var['info']?></td>
            </tr>
            <?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ }else{ ?>
            <tr>
                <td colspan="7" align="center">没有余额宝收益记录</td>
            </tr>
            <?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ } ?>
            </tbody>
            
        </table>
        <?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */
            $this->display('inc_page.php', 0, $list['total'], $this->pageSize, "/index.php/deposit/main-{page}?fromTime={$_GET['fromTime']}&endTime={$_GET['endTime']}");
        ?>
        <!--下注列表 end -->
    </div>
	
</div>
<!--以下为模板代码-->
</div></div></div><?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ $this->display('inc_footer.php') ?></body></html>
  <script type="text/javascript">
    $("#membernav").show();
 </script>
   
   
 