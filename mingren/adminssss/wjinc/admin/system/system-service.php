<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ 
	$xmlservice=$_SERVER['DOCUMENT_ROOT'].'/mychat/data/service/service.xml';
	$xml = new DOMDocument();
	$xml->load($xmlservice);
	$fileNum = $xml->getElementsByTagName('r');
	$len = $fileNum->length;
	
	//echo "View5=". $_SESSION["view5"];
?>
    <article class="module width_full">
	<input type="hidden" value="<?=$this->user['username']?>" />
	<header><h3 class="tabs_involved">客服登陆
    	<div class="submit_link wz">
            <input type="submit" value="添加客服" onclick="$('#addServiceAdmin').load('/qq836651666.php/system/serviceadd')" class="alt_btn"/>
        </div></h3></header>
	<div class="tab_content">
        <table class="tablesorter" cellspacing="0" width="100%">
        <thead> 
            <tr> 
                <td>客服名称</td> 
                <!--<td>状态</td>-->
                <td>操作</td> 
            </tr> 
        </thead>
        <tbody>
        	<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ for($j=0; $j<$len; $j++){ 
				$serviceId=$fileNum->item($j)->getElementsByTagName('i')->item(0)->nodeValue;
			?>
        	<tr> 
                <td><input type="text" id="serviceName<?=$serviceId?>" value="<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ echo $fileNum->item($j)->getElementsByTagName('n')->item(0)->nodeValue;?>"/></td> 
                <!--<td><span>在线</span></td>-->
                <td><a href="/qq836651666.php/system/serviceOpen/<?=$serviceId?>" target="ajax" call="serviceOpen"  dataType="html">登录</a> | 
                <a onclick="this.href=this.href+'|'+$(this).parent().prev().find('input').val()" href="/qq836651666.php/system/serviceSave/<?=$serviceId?>" target="ajax" call="serviceSave" dataType="html">保存修改</a> | 
                <a href="/qq836651666.php/system/serviceDel/<?=$serviceId?>" target="ajax" call="serviceDel" dataType="html">删除</a></td>
            <tr>
            <?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ }?>
        </tbody> 
        </table>
    </div><!-- end of .tab_container -->
</article><!-- end of content manager article -->

<div id="addServiceAdmin">
</div>