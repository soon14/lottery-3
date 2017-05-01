		<div class="login-bg">
			<div class="login_in">
				<div class="login_con">
					<form id="form" action="/user/loginedto" method="post" onajax="userBeforeLoginto" enter="true" call="userLoginto" target="ajax">
						<div class="number">
							<input type="text" placeholder="请填写您的账号" autocomplete="off" class="number_in" name="username" id="eun">
						</div>
						<div class="password">
							<input type="password" placeholder="请填写您的密码" autocomplete="off" class="password_in" name="password" id="epwd">
						</div>
						<p style="height:30px;"></p>
						<div class="button">
							<input onclick="$(this).closest('form').submit()" type="button" class="btn" value="">
						</div>
						<!-- <div class="pr ui-form-item mt" style="display:none;">
                        <input type="text" class="ui-input" name="vcode" id="vcode" placeholder="验证码" />
                        <i class="ico-code">
						<img width="150" height="40" border="0" style="cursor:pointer;margin-bottom:0px;" alt="验证码" align="absmiddle" src="/user/vcode/<?=$this->time?>" title="看不清楚，点我换图" onclick="this.src='/user/vcode/'+(new Date()).getTime()"/></i>
                    </div>-->

					</form>


				</div>
			</div>

		</div>
			<script language='javascript'> 
document.onkeydown=function(event){
	var e = event || window.event || arguments.callee.caller.arguments[0];        
	if(e && e.keyCode==13){
		$('#form').submit();
	}
}; 
</script> 