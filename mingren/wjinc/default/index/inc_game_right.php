<div class="incgameright" style="background-color:#fff;overflow:hidden;">
<div style="width:680px;float:left;padding-left:20px;">
	<div class="jspContainer" style="width: 680px; height: 35px;">
	<div class="jspPane" style="padding: 0px 10px; top: 0px; left: 0px; width: 660px;"><table class="table table-info fs-12 text-center">
							<thead class="table-border">
								<tr>
									<th >玩法</th>
									<th >号码</th>
									<th >注数与金额以及倍数</th>
									<th >返点</th>
									<th width="30" class="delete">取消</th>
								</tr>
							
							</thead>
						</table><table id="lt_cf_content" class="table table-info fs-12 text-center">

						</table><ul id="J-balls-order-container" class="result-ball-panel clearfix"></ul></div></div>
	<div class="codeList clearfix" style="padding:0 10px;"><ul class="touzhu-cont" style="border:0px;"><table></table></ul></div>
</div>
<div style="width:350px;float:right;">
	<div class="jixuanBox clearfix">
	<ul>
		<!-- <li class="jb-btn-01"><a href="javascript:void(0)" onclick="gameActionRandom(1)" num="1">机选1注</a></li> -->
		<li class="jb-btn-02"><a href="javascript:void(0)" onclick="gameActionAddCode()">添加号码</a></li>
		<!-- <li class="jb-btn-03"><a href="javascript:void(0)" onclick="genMultiRandom(3)" num="5">机选3注</a></li> -->
		<li class="jb-btn-04"><a href="javascript:void(0)" onclick="gameActionRemoveCode()">清空列表</a></li>
	</ul>    
	</div>
	<div class="betSubmit danwei clearfix"  >
	<span class="tz-tongji fs14" style=" display:block; height:20px; width:100%;  color:#333; margin-top:10px; float:left;padding-left:50px;">总投注数：<strong class="fe0" id="all-count" style="color:#ea5635">0</strong>注，
	                    总金额：￥<strong class="fe0" id="all-amount" style="color:#ea5635;">0.00</strong>元</span>
	<div></div>
		<span id="zh-div"  style="color:black;display:none;font-size:16px;font-weight:normal; color:#d9d340;">请选择追号期数：<select id="zhselect" class="select"><option value="0">-</option><option value="5">5期</option><option value="10">10期</option><option value="20">20期</option><option value="50">50期</option><option value="80">80期</option></select>
		<!--&nbsp;&nbsp;起始倍数：--><input id="zh_bs" style="width:45px;text-align:center;display:none" value="1" type="text">
		</span>
		<label class="btn-grayO-118x36 touzhu-bottom" id="zhui">追号生成<input type="checkbox" style="display:none" name="zhuiHao" value="生成追号" /></label>
		<input type="button" id="qzhui" style="display:none" onclick="zhuidiv()" />
	    <a href="javascript:void(0)" class="btn-blue-160x39" style="margin-top:10px;" id="btnPostBet">确认购买</a>
	</div>
</div>
</div>
