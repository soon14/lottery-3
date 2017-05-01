<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */
	$sql="select uid, username, isDelete, enable from {$this->prename}sysmember where admin=1";
	$data=$this->getPage($sql, $this->page, $this->pageSize);
	//print_r($sql);
	$sql="select * from {$this->prename}member_session where uid=? order by id desc limit 1";
?>
<article class="module width_full">
<input type="hidden" value="<?=$this->user['username']?>" />
	<header>
		<h3 class="tabs_involved">管理员管理
			<div class="submit_link wz">
				<input type="button" value="添加管理员" onclick="manageAddManagerModal()" class="alt_btn">
			</div>
		</h3>
	</header>
	<table class="tablesorter" cellspacing="0">
		<thead>
			<tr>
				<td>UID</td>
				<td>用户名</td>
				<td>登录IP</td>
				<td>状态</td>
				<td>最后登录时间</td>
				<td>操作</td>
			</tr>
		</thead>
		<tbody>
		<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */
			if($data['data']) foreach($data['data'] as $var){
				if(!$var['isDelete']){
				$login=$this->getRow($sql, $var['uid']);
		?>
			<tr>
				<td><?=$var['uid']?></td>
				<td><?=$var['username']?></td>
				<td><?=$this->ifs(long2ip($login['loginIP']),'--')?></td>
				<td><?=$this->iff($login['isOnLine'] && ceil(strtotime(date('Y-m-d H:i:s', time()))-strtotime(date('Y-m-d H:i:s',$login['accessTime'])))<$GLOBALS['conf']['member']['sessionTime'], '<font color="#FF0000">在线</font>', '离线')?></td> 
				<td><?=$this->iff($login['loginTime'],date('Y-m-d H:i:s', $login['loginTime']),'--')?></td>
                <?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */
				if($var['username']=='admin'){
				?>
				<td><a href="/qq836651666.php/manage/pwdManagerModal/<?=$var['uid']?>" target="ajax" call="manageChangePwdModal">修改密码</a></td>
                 <?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */
				}else{
				?>
                <td><a href="/qq836651666.php/manage/pwdManagerModal/<?=$var['uid']?>" target="ajax" call="manageChangePwdModal">修改密码</a> | <a href="/qq836651666.php/manage/deleteManager/<?=$var['uid']?>" target="ajax" call="manageDeleteManager" dataType="json">删除</a></td>
                 <?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */
				}
				?>
			</tr>
		<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ 
				}else{?>
                
			    <tr style="color:#999999;">
				<td><?=$var['uid']?></td>
				<td><?=$var['username']?></td>
				<td><?=$this->ifs(long2ip($login['loginIP']),'--')?></td>
				<td>已被删除</td>
				<td><?=$this->iff($login['loginTime'],date('Y-m-d H:i:s', $login['loginTime']),'--')?></td>
                <td><a href="/qq836651666.php/manage/backNormalManager/<?=$var['uid']?>" target="ajax" call="manageBackNormalManager" dataType="json">还原</a> | <a href="/qq836651666.php/manage/clearManager/<?=$var['uid']?>" target="ajax" onajax="beforeClearManager" call="manageClearManager" dataType="json">清除</a></td>
                
			</tr>
		<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */			}
		} ?>
		</tbody>
	</table>
	<footer>
	<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */
		$rel=get_class($this).'/coinLog-{page}?'.http_build_query($_GET,'','&');
		$this->display('inc/page.php', 0, $data['total'], $rel, 'betLogSearchPageAction');
	?>
	</footer>
</article>