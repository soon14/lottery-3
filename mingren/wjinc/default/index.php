<!DOCTYPE html>
<html>
<head lang="en">
	<?php
	/* 此程序来自家园网络QQ1655707002 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ $this->display('inc_back.php',0,'名人') ?>


</head>
<body style="padding:0;margin:0;">
<?php
/* 此程序来自家园网络QQ1655707002 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ $this->display('inc_usermain.php',0,'名人') ?>

<iframe id="mainiframe" name="mainiframe" allowtransparency="true" style="width: 100%;padding: 0px; background-color: rgb(230, 230, 230);position:relative;float:left;" src="/shouye" height="912px" frameborder="0" scrolling="no"  onLoad="iFrameHeight()"></iframe>

<script src="http://www.sobot.com/chat/pc/pc.min.js?sysNum=8749b2451c0049a49ce16b6784795c85" id="zhichiload" ></script>
<script type="text/javascript" language="javascript">
	function iFrameHeight() {
		var ifm= document.getElementById("mainiframe");
		var subWeb = document.frames ? document.frames["mainiframe"].document : ifm.contentDocument;
		if(ifm != null && subWeb != null) {
			ifm.height = subWeb.body.scrollHeight;
			ifm.width = subWeb.body.scrollWidth;
		}
	}
</script>
</body>
</html>
