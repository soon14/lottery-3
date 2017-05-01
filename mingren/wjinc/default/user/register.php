<!DOCTYPE html>
<html>
<head lang="en">
	<?php
/* 此程序来自家园网络QQ1655707002 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ $this->display('inc_base_lr.php',0,'用户注册') ?>
    <link href="/skin/new/css/register.css"  type="text/css" rel="stylesheet" />
</head>
<body>
<?php
/* 此程序来自家园网络QQ1655707002 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ $this->display('inc_header_lr.php',0,'用户注册'); ?>
    <div class="pageBady custom clearfix"> 
<div class="w1200 clearfix">
    <div class="fl register-main">
        <div class="registerTit clearfix">
            <ul>
                <li class="on">用户注册<i></i></li>
            </ul>
        </div>
        <div class="registerBox clearfix">
            <div id="mobileReg-form" class="reg-from"  >
         <?php
/* 此程序来自家园网络QQ1655707002 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ if($args[0] && $args[1]){
		$sql="select * from {$this->prename}links where lid=?";
		$linkData=$this->getRow($sql, $args[1]);
		$sql="select * from {$this->prename}members where uid=?";
		$userData=$this->getRow($sql, $args[0]);	
		?>
		<form action="/index.php/user/registered" method="post" onajax="registerBeforSubmit" enter="true" call="registerSubmit" target="ajax">
        	<input type="hidden" name="parentId" value="<?=$args[0]?>" />
            <input type="hidden" name="lid" value="<?=$linkData['lid']?>"  />
                <div class="pr ui-form-item">
                <i class="ico-iphone"></i>
                    <input class="ui-input" type="text" name="username" maxlength="11" id="username" placeholder="请输入您的用户名" data-explain="用户名须是6-12位数字+字母组合。" />
                    <div class="ui-form-explain" style="display: none">
                        <em class="ui-form-arrow"></em>
                    </div>
                </div>
                <div class="pr ui-form-item mt">
                    <i class="ico-pw"></i>
                    <i class="ico-jp"></i>
                    <input class="ui-input" type="password" name="password" maxlength="16" id="password" placeholder="请设置密码" data-explain="6~16位组成，建议使用字母和数字混合。" />
                    <div class="ui-form-explain" style="display: none; width: 230px">
                        <em class="ui-form-arrow"></em>
                    </div>
                </div>
                <div class="pr ui-form-item mt">
                    <i class="ico-pw"></i>
                    <i class="ico-jp"></i>
                    <input class="ui-input" type="password" name="cpasswd" maxlength="16" id="cpasswd" placeholder="请再次输入您设置的密码" data-explain="请再次输入密码" />
                    <div class="ui-form-explain" style="display: none; width: 100px;">
                        <em class="ui-form-arrow"></em>
                    </div>
                </div>
				<div class="pr ui-form-item mt">
                    <i class="ico-ide"></i>
                    <input class="ui-input" type="text" maxlength="11" name="qq" id="qq" placeholder="请输入QQ号码" data-explain="请输入QQ号码" />
                    <div class="ui-form-explain" style="display: none">
                        <em class="ui-form-arrow"></em>
                    </div>
                </div>
				<div class="pr ui-form-item mt item149">
                    <input class="ui-input" type="text" maxlength="6" name="vcode" id="vcode" placeholder="请输入验证码" data-explain="请输入图片中的字符，不区分大小写。" />
                    <span style="position: absolute;right:-140px;top:0;" ><img width="130" height="40" border="0" style="cursor:pointer;margin-bottom:0px;" alt="验证码" align="absmiddle" src="/index.php/user/vcode/<?=$this->time?>"/></span>
                    <div class="ui-form-explain" style="display: none; width: 220px">
                        <em class="ui-form-arrow"></em>
                    </div>
                </div>
                <div class="registerBtn mt" onClick="$(this).closest('form').submit()">注册</div>
                <div class="registerService">
                    <label for="serviceChk">
                        购彩有风险，请理性投注，未满十八岁者需在家长陪同下注册
                    </label>
                </div>
	    </form>
           <?php
/* 此程序来自家园网络QQ1655707002 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ }else{?>
           <div style="font-size:20px; color:#999999"><b>该代理注册链接已失效！可联系客服或前往首页自主注册！
		   <br/><br/>
		   <span style="margin-left:190px">感谢您对我们的支持！</span>
		   <br/><br/>
		   <span style="margin-left:150px">我们将提供更好更优质的服务！</span>
		   <br/><br/>
		   <a href="#" style="margin-left:180px" title="首页">http://XX</a></b>
		   </div>
           <?php
/* 此程序来自家园网络QQ1655707002 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ }?>
            </div>
        </div>
    </div>
    <div class="fl register-r">
        <h2>已经注册，有账号<a href="/index.php/user/login" >立即登录</a></h2>
		<div style="margin-bottom:100px"></div>
        <div class="siteTitle">
            <h2><span>梦/想/改/变/人/生</span><br />
                <em class="fs12">DREAM CHANCE LIFE</em></h2>
        </div>
        <div class="register-safe">
            <ul>
                <li class="borTop">
                    <i class="safe"></i>
                    <h2>安全</h2>
                            <span>正规官方彩票购彩网站<br />
                                国内首家O2O线上线下数字网站。</span>
                </li>
                <li>
                    <i class="pro"></i>
                    <h2>专业</h2>
                            <span>boecp.com 我们只做官方数字彩<br />
                                因为专注，所以更专业!</span>
                </li>
                <li>
                    <i class="sin"></i>
                    <h2>诚信</h2>
                            <span>致力打造健康购彩环境<br />
                                为广大彩民提供便捷、优质的购彩服务</span>
                </li>
            </ul>
        </div>
    </div>
</div></div>
<?php
/* 此程序来自家园网络QQ1655707002 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ $this->display('inc_footer.php') ?>
</body>
</html>