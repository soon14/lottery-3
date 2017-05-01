<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */
	$sql="select u.*, sum(b.mode * b.beiShu * b.actionNum) betAmount, sum(b.bonus) zjAmount, (select sum(c.amount) from ssc_member_cash c where c.`uid`=u.`uid` and c.state=0 ) cashAmount,(select sum(r.amount) from ssc_member_recharge r where r.`uid`=u.`uid` and r.state in(1,2,9) ) rechargeAmount from ssc_members u left join ssc_bets b on u.uid=b.uid and b.isDelete=0  where  u.admin=0";
	
	// 用户名限制
	// 从属关系限制
	if($_GET['username']&&$_GET['username']!="用户名"){
		$_GET['username']=wjStrFilter($_GET['username']);
		if(!ctype_alnum($_GET['username'])) throw new Exception('用户名包含非法字符,请重新输入');
		$sql.=" and u.username='{$_GET['username']}'";
	}else{
		unset($_GET['username']);
	}
	switch($_GET['type']){
		case 1:
			//我自己
			$sql.=" and u.uid={$this->user['uid']}";
		break;
		case 2:
			//直属下线
			if(!$_GET['uid']) $_GET['uid']=$this->user['uid'];
			$sql.=" and u.parentId={$_GET['uid']}";
		break;
		case 3:
			// 所有下级
			$sql.="concat(',',u.parents,',') like '%,{$this->user['uid']},%' and u.uid!={$this->user['uid']}";
		break;
		default:
			// 所有人
			//$sql.=" and concat(',',u.parents,',') like '%,{$this->user['uid']},%'";
		break;
	}
	$sql.=' group by u.uid';
	
	//排序
	switch($_GET['paixu']){
		case 'uid':
			//默认
			$sql.=" order by u.uid asc";
			break;
		case 'coin':
			//按资金
			$sql.=" order by u.coin desc";
			break;
		case 'betAmount':
			//按投注金额
			$sql.=" order by betAmount desc";	
			break;
		case 'zjAmount':
			//按中奖金额
			$sql.=" order by zjAmount desc";
			break;
		case 'fanDian':
			//按返点
			$sql.=" order by u.fanDian desc";
			break;
		case 'score':
			//累计积分
			$sql.=" order by u.scoreTotal desc";
			break;
		default:
			// 注册时间
			$sql.=" order by u.regTime desc";
		break;
	}
	$data=$this->getPage($sql, $this->page, $this->pageSize);
	$sql="select sum(coin) from ssc_coin_log where uid=? and liqType between 2 and 3";
	$sql2="select * from ssc_member_session where uid=? order by id desc limit 1";
?>
<input type="hidden" value="<?=$this->user['username']?>" />
<table class="tablesorter" cellspacing="0"> 
<thead> 
    <tr> 
        <th>用户名</th> 
        <th>ID</th> 
        <th>类型</th> 
        <th>可用</th> 
        <th>积分|等级</th> 
        <th>中奖|返点</th> 
        <th>投注|盈亏</th>
        <th>返点</th> 
        <th>状态</th> 
        <th>最后登录</th> 
		<td>注册时间</td>
        <th>操作</th> 
    </tr> 
</thead> 
<tbody id="nav01"> 
<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */
	if($data['data']) foreach($data['data'] as $var){ 
	$var['fanDianAmount']=$this->getValue($sql, $var['uid']);
	$login=$this->getRow($sql2, $var['uid']);
?>
	<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */
        if($var['isDelete']==0){ //是否删除
    ?>
    <tr> 
        <td><?=$var['username']?></td> 
        <td><?=$var['uid']?></td> 
        <td><?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ if($var['type']){echo'代理';}else{echo '会员';}?></td> 
        <td><?=$var['coin']?><span class='spn10'></td> 
        <td><?=$var['score']?><span class='spn10'>|</span><?=$var['grade']?></td> 
        <td><?=$this->ifs($var['zjAmount'], '--')?><span class='spn10'>|</span><?=$var['fanDianAmount']?></td> 
        <td><?=$this->ifs($var['betAmount'], '--')?><span class='spn10'>|</span><?=$this->ifs($var['zjAmount']-$var['betAmount']+$var['fanDianAmount'], '--')?></td>
        <td><?=$var['fanDian']?>%</td> 
        <td><?=$this->iff($login['isOnLine'] && ceil(strtotime(date('Y-m-d H:i:s', time()))-strtotime(date('Y-m-d H:i:s',$login['accessTime'])))<$GLOBALS['conf']['member']['sessionTime'], '<font color="#FF0000">在线</font>', '离线')?></td> 
        <td><?=$this->iff($login['loginTime'],date('m-d H:i', $login['loginTime']),'--')?><?//=$var['updateTime']?></td> 
        <td class="spn9"><?=date("m-d H:i",$var['regTime'])?></td> 
        <td><a href="/qq836651666.php/Member/userAmount/<?=$var['uid']?>" target="modal"  width="420" title="用户统计" modal="true">统计</a> | <a href="business/coinLog?username=<?=$var['username']?>">帐变</a> | <a href="/qq836651666.php/Member/userUpdate/<?=$var['uid']?>" target="modal"  width="420" title="编辑用户" modal="true" button="确定:dataAddCode|取消:defaultCloseModal">编辑</a> | <a href="Member/index?type=2&uid=<?=$var['uid']?>" call="">下级</a> | <a href="/qq836651666.php/Member/delete/<?=$var['uid']?>" target="modal"  width="320" title="删除用户" modal="true" button="确定:dataAddCode">删</a></td> 
    </tr>
   <?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ }else{?>
    <tr> 
        <td class="spn9"><?=$var['username']?></td> 
        <td class="spn9"><?=$var['uid']?></td> 
        <td class="spn9"><?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ if($var['type']){echo'代理';}else{echo '会员';}?></td> 
        <td class="spn9"><?=$var['coin']?><span class='spn10'>|</span><?=$var['fcoin']?></td> 
        <td class="spn9"><?=$var['score']?><span class='spn10'>|</span><?=$var['scoreTotal']?><span class='spn10'>|</span><?=$var['grade']?></td> 
        <td class="spn9"><?=$this->ifs($var['zjAmount'], '--')?><span class='spn10'>|</span><?=$var['fanDianAmount']?></td> 
        <td class="spn9"><?=$this->ifs($var['betAmount'], '--')?><span class='spn10'>|</span><?=$this->ifs($var['zjAmount']-$var['betAmount']+$var['fanDianAmount'], '--')?></td>
        <td class="spn9"><?=$var['fanDian']?>%</td> 
        <td class="spn9">已删除</td> 
        <td class="spn9"><?=$var['updateTime']?></td> 
        <td class="spn9"><a href="/qq836651666.php/Member/userAmount/<?=$var['uid']?>" target="modal"  width="420" title="用户统计" modal="true">统计</a> | <a href="business/coinLog?username=<?=$var['username']?>">帐变</a> | <a href="Member/index?type=2&uid=<?=$var['uid']?>" call="">下级</a></td> 
    </tr>
	<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ }} ?>
</tbody> 
</table>
<footer>
	<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */
		$rel=get_class($this).'/index-{page}?'.http_build_query($_GET,'','&');
		$this->display('inc/page.php', 0, $data['total'], $rel, 'defaultReplacePageAction');
	?>
</footer>
<script type="text/javascript">  
ghhs("nav01","tr");  
</script>