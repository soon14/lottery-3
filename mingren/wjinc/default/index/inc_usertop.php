<?php
/* 此程序来自家园网络QQ1655707002 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ $this->freshSession();
//更新级别
$ngrade=$this->getValue("select max(level) from {$this->prename}member_level where minScore <= {$this->user['scoreTotal']}");
if($ngrade>$this->user['grade']){
    $sql="update {$this->prename}members set grade={$ngrade} where uid=?";
    $this->update($sql, $this->user['uid']);
}else{$ngrade=$this->user['grade'];}

$date=strtotime('00:00:00');
?>
<div class="width1000 userInfo">
    <div class="header-re">
        <a href="javascript:;" title="回到首页" class="logo f-left data-url" data-url="/page/default.shtml"></a>
        <ul class="clearfix">
            <li>欢迎您
                <i class="user-head"></i>
                <?=$this->user['nickname']?>
            </li>
            <li>

                <em id="ebalance" class="color-yellow"><?=$this->user['coin']?>
                </em> 元
                <a href="javascript:void(0);" id="bnt_refreshbalance" class="refresh inline v-am ml5 mr5" title="刷新" onclick="reloadMemberInfo();"></a>

            </li>
            <li><em id="ebalance" class="color-yellow"><?=$this->user['score']?>
                </em> 积分</li>
            <li class="recharge v-am">
                <a href="javascript:void(0);" id="eDpIcon" class="inline v-am" onClick="qinyiUrl('/cash/recharge',this)" style="background:url('/qinyi/ico01_r1_c17x.png') no-repeat center center;width:50px;display:inline-block;height:66px;line-height:66px;"></a>
                <a href="javascript:void(0);" class="inline v-am" onClick="qinyiUrl('/cash/toCash',this)" style="background:url('/qinyi/ico01_r9_c17x.png') no-repeat center center;width:50px;display:inline-block;height:66px;line-height:66px;"></a>
            </li>
            <li style="background:url('/qinyi/notice_message.png') no-repeat center left;">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;消息(<a href="#" class="msg-num v-am ml5">0</a>)
            </li>
            <li style="margin:0;padding:0;width:1px;"></li>
            <li><a style="color:#FFF;" href="user/logout" id="topForm:j_id6" name="topForm:j_id6" onclick="if(!confirm('请确认：是否退出系统?'))return false;;A4J.AJAX.Submit('topForm',event,/user/logout );return false;" title="安全退出系统">退出</a>
            </li>
        </ul>
    </div>
</div>