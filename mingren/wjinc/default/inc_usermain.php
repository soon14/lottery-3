<div style=" " class="maintop" id="maintop" >
<?php
/* 此程序来自家园网络QQ1655707002 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ $this->display('index/inc_usertop.php') ?>

<div class="width1000" >
	<div class="nav clearfix">
					<div class="layout">
						<div class="game-type-list f-left">
							<a href="#" class="nav-a">全部游戏分类</a>

							<div id="eleftMenu" class="typle-list clearfix">
								<div class="lottery_div01">
									<dl class="lotter_dl01">
										<dt>
											<img width="75" height="75" src="/qinyi/pic01.jpg">
										<p>时时彩</p>
										</dt>
										<dd>
											<p><a href="javascript:void(0);" onclick="qinyiUrl('/index.php/index/game/5/59',this)">大名分分彩</a></p>
											<p><a href="javascript:void(0);" onclick="qinyiUrl('/index.php/index/game/14/59',this)">大名五分彩</a></p>
											<p><a href="javascript:void(0);" onclick="qinyiUrl('/index.php/index/game/1/2',this)">重庆时时彩</a></p>
											<p><a href="javascript:void(0);" onclick="qinyiUrl('/index/game/3/2',this)">天津时时彩</a></p>
											<p><a href="javascript:void(0);" onclick="qinyiUrl('/index/game/12/2',this)">新疆时时彩</a></p>
										</dd>
									</dl>
									<dl class="lotter_dl01 lotter_dl02">
										<dt>
											<img width="75" height="75" src="/qinyi/pic02.jpg">

										<p>11选5</p>
										</dt>
										<dd>
											<p><a href="javascript:;" onclick="qinyiUrl('/index/game/16/2',this)">江西十一选五</a></p>
											<p><a href="javascript:;" onclick="qinyiUrl('/index/game/7/10',this)">山东十一选五</a></p>
											<p><a href="javascript:;" onclick="qinyiUrl('/index/game/6/10',this)">广东十一选五</a></p>
										</dd>
									</dl>
									<dl class="lotter_dl01 lotter_dl03">
										<dt>
											<img width="75" height="75" src="/qinyi/pic03.jpg">
										<p>低频彩</p>
										</dt>
										<dd>
											<p><a href="javascript:;" onclick="qinyiUrl('/index.php/index/game/9/12',this)">福彩3D</a></p>
											<p><a href="javascript:;" onclick="qinyiUrl('/index.php/index/game/10/12',this)">排列三五</a></p>
											<p><a href="javascript:;" onclick="qinyiUrl('/index.php/index/game/20/12',this)">北京PK10</a></p>
										</dd>
									</dl>
								</div>
							</div>
						</div>
						<ul id="enav" class="f-left nav-model">
							<li class="account       current" onClick="qinyiUrlGo('/shouye',this)">
								<a href="javascript:void(0);">首页</a>
							</li>
							<li class="account   " onClick="qinyiUrlGo('/safe/info',this)">
								<a href="javascript:void(0);">我的账户</a>
							</li>
							<li class="bank-info       " onClick="qinyiUrl('/cash/recharge',this)" id="mBank">
								<a href="javascript:void(0);">银行充提</a>
							</li>
							<li class="history   " onClick="qinyiUrl('/record/search',this)">
								<a href="javascript:void(0);">游戏记录</a>
							</li>
							<li class="report " onClick="qinyiUrl('/report/coin',this)">
								<a href="javascript:void(0);">帐变报表</a>
							</li>
                            <?php
/* 此程序来自家园网络QQ1655707002 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ if($this->user[type]){?>
							<li class="proxy   " onClick="qinyiUrl('team/memberList',this)">
								<a href="javascript:void(0);">代理管理</a>
							</li>
                            <?php
/* 此程序来自家园网络QQ1655707002 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ }?>
							<li class="notice  " onClick="qinyiUrl('/notice/info',this)">
								<a href="javascript:void(0);">系统公告</a>
							</li>
							<li class="about  " onClick="qinyiUrl('/score/goods/current',this)">
								<a href="javascript:void(0);">平台活动</a>
							</li>
						</ul>
					</div>

				</div>



</div>

</div>