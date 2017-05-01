<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ $this->display('inc_top_gg.php'); $info=$args[0]; ?>
<div class="pagemain">
    <div class="display biao-cont">
    
    	 <table width="100%" class='table_b'>
        <thead>
            <thead>
            <tr class="table_b_th">
                <td style="width:80px;display:none">编号</td>
                <td>公告标题</td>
                <td style="width:180px;">发布时间</td>
            </tr>
            </thead>
            <tbody class="table_b_tr">
           <?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */
			$cout=0;
            $styles=array('tr_line_2_a','tr_line_2_b');
            if($args[0]) foreach($args[0]['data'] as $var){
			$cout+=1;
			$mod=$cout%2;
        ?>
            <tr>
            	<td style="display:none"><?=$var['id']?></td>
            	<td class="tl"><a style='background-color:transparent;' href="/index.php/notice/view/<?=$var['id']?>"  title="<?=$var['title']?>"  style=" margin-left:15px;"><?=$var['title']?></a></td>
            	<td class="tl" style="text-align:center"><?=date('Y-m-d H:i:s', $var['addTime'])?></td>
            </tr>
            <?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ }else{ ?>
            <tr>
                <td colspan="3" align="center">没有记录</td>
            </tr>
            <?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ } ?>
            </tbody>
            
        </table>
        <?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ $this->display('inc_page.php', 0, $args[0]['total'], $this->pageSize, "/index.php/notice/info-{page}", 0); ?>
    </div>
	</div>

<!--以下为模板代码-->
</div></div></div><?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ $this->display('inc_footer.php') ?></body></html>
   
   
 