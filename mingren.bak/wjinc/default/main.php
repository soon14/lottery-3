<!DOCTYPE html>
<html>
<?php
/* 此程序来自家园网络QQ1655707002 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ $this->display('inc_base_qy.php',0,'投注中心') ?>
<head>
    <link href="/skin/new/css/lottery.css1" rel="stylesheet" type="text/css" />
    <link href="/qinyi/skins.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/skin/main/game.js"></script>
    <script type="text/javascript" src="/skin/js/jquery.simplemodal.src.js"></script>
    <style type="text/css">
        .bottomweiba .warp-support, .bottom {
            margin: 0 auto;
        // background-color: #fff;
        }
        .bottomweiba .warp-support {
            height: 80px;
            padding-top: 20px;
            border-top: 1px solid #e6e6e6;
        }
        .bottomweiba .support-group {
            width: 945px;
            height: 41px;
            margin: 10px auto;
            background: url(../qinyi/support-group.png) no-repeat;
        }
        .bottomweiba .warp-support, .bottom {
            margin: 0 auto;
            background-color: #fff;
        }
        .bottomweiba .bottom {
            height: 40px;
            padding-top: 60px;
            text-align: center;
            color: #fff;
            background: url(../qinyi/bottom-bg.png) repeat-x;
            background-color:#FFF;
        }
        .bottomweiba .bottom .bottom-nav li {
            display: inline-block;
            padding: 0 5px;
        }

    </style>
</head>

<?php
/* 此程序来自家园网络QQ1655707002 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */
if($this->type){
?>
<body>
<?php
$row=$this->getRow("select enable,title from {$this->prename}type where id={$this->type}");
if(!$row['enable']){
    echo '<div style="margin:50px auto;width:1000px;">'.$row['title'].'预备上线中！具体时间请关注公告，感谢您对我们的支持！</div>';
    exit;
}
}else{
    $this->type=1;
    $this->groupId=2;
    $this->played=10;
}
?>
<body style="background:url(/../qinyi/content-bg.jpg) repeat;#000;">
<div id="mainbody">

    <div  class="gamemain pageBady clearfix">
        <div class="lotMain w1200">
            <!-- 开奖信息 -->
            <?php
            /* 此程序来自家园网络QQ1655707002 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ $this->display('index/inc_data_current.php'); ?>
        </div>
        <div class="bg-line"></div>
        <div class="lotMain w1200">
            <!-- 开奖信息 end -->
            <div class="game">
                <!--游戏body-->
                <?php
                /* 此程序来自家园网络QQ1655707002 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ $this->display('index/inc_game.php'); ?>
                <!--游戏body  end-->
            </div>

            <?php
            /* 此程序来自家园网络QQ1655707002 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ if($this->settings['switchDLBuy']==0 || ($this->settings['switchZDLBuy']==0 && ($this->user['parents']==$this->user['uid']))){ //代理和总代不能买单?>
                <input name="wjdl" type="hidden" value="<?=$this->ifs($this->user['type'],1)?>" id="wjdl" />
                <?php
                /* 此程序来自家园网络QQ1655707002 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ } ?>

        </div>
        <div class="lotMain w1200">
                <?php
                /* 此程序来自家园网络QQ1655707002 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ $this->display('index/inc_game_right.php'); ?>
        </div>

    </div>

    <?php
    /* 此程序来自家园网络QQ1655707002 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ $this->display('inc_footer.php');  ?>
</div>
<script type="text/javascript">
    var game={
            type:<?=json_encode($this->type)?>,
            played:<?=json_encode($this->played)?>,
            groupId:<?=json_encode($this->groupId)?>
        },
        user="<?=$this->user['username']?>",
        aflag=<?=json_encode($this->user['admin']==1)?>;
</script>
<div id="foot_id">
    <div id="footer">
        <div class="footer01">
            <dl class="footer01_dl01">
                <dt>
                <p class="p01">关于我们</p>
                <p class="p02">About us</p>
                </dt>
                <dd> <a href="#">平台介绍</a> <a href="#">隐私保护</a> <a href="#">联系我们</a> </dd>
            </dl>
            <dl class="footer01_dl01">
                <dt>
                <p class="p01">使用帮助</p>
                <p class="p02">Guide us</p>
                </dt>
                <dd> <a href="#">如何存款</a> <a href="#">如何提款</a> <a href="#">代理政策</a> </dd>
            </dl>
            <dl class="footer01_dl01">
                <dt>
                <p class="p01">推荐浏览器</p>
                <p class="p02">Recommend</p>
                </dt>
                <dd> <a href="http://windows.microsoft.com/zh-cn/internet-explorer/download-ie" target="_blank"> IE</a> <a href="http://www.google.cn/chrome/browser/desktop/index.html" target="_blank">Chrome</a> <a href="http://www.firefox.com.cn/download/" target="_blank">Firefox</a> </dd>
            </dl>
            <!-- <dl class="footer01_dl01 wechat">
                <dt>
                <p class="p01">官方微信号</p>
                <p class="p02">About Wechat</p>
                </dt>
                <dd> <a href="#"><img width="82" height="82" src="/qinyi/index/wechat.png"></a> </dd>
            </dl> -->
            <dl class="footer01_dl01 mobile" style="width:140px;">
                <dt>
                <p class="p01">手机APP下载</p>
                <p class="p02">Mobile</p>
                </dt>
                <dd class="mobieimg"> <a href="#"><img width="87" height="83" src="/qinyi/index/pic13.png"></a>
                </dd>
            </dl>
        </div>
         <div class="footer02"style="background:#1b567a;">
         <!--   <div class="footer02_in">
                <div class="footer02_in_l">
                    <h4>银行支持<span>About us</span></h4>
                    <ul class="footer02_ul01">
                        <li> <a href="#"><img width="117" height="48" src="/qinyi/index/footer_pic_r1_c1.jpg"></a> </li>
                        <li> <a href="#"><img width="117" height="48" src="/qinyi/index/footer_pic_r1_c4.jpg"></a> </li>
                        <li> <a href="#"><img width="117" height="48" src="/qinyi/index/footer_pic_r1_c6.jpg"></a> </li>
                        <li> <a href="#"><img width="117" height="48" src="/qinyi/index/footer_pic_r1_c8.jpg"></a> </li>
                        <li> <a href="#"><img width="117" height="48" src="/qinyi/index/footer_pic_r3_c1.jpg"></a> </li>
                        <li> <a href="#"><img width="117" height="48" src="/qinyi/index/footer_pic_r3_c4.jpg"></a> </li>
                        <li> <a href="#"><img width="117" height="48" src="/qinyi/index/footer_pic_r3_c6.jpg"></a> </li>
                        <li> <a href="#"><img width="117" height="48" src="/qinyi/index/footer_pic_r3_c8.jpg"></a> </li>
                    </ul>
                </div>
                <div class="footer02_in_l footer02_in_r">
                    <h4>合作支持<span>Partner</span></h4>
                    <ul class="footer02_ul01">
                        <li> <a href="#"><img width="133" height="48" src="/qinyi/index/footer_pic02_r1_c1.jpg"></a> </li>
                        <li> <a href="#"><img width="153" height="48" src="/qinyi/index/footer_pic02_r1_c4.jpg"></a> </li>
                        <li> <a href="#"><img width="153" height="48" src="/qinyi/index/footer_pic02_r1_c11.jpg"></a> </li>
                        <li> <a href="#"><img width="167" height="48" src="/qinyi/index/footer_pic02_r6_c2.jpg"></a> </li>
                        <li> <a href="#"><img width="117" height="48" src="/qinyi/index/footer_pic02_r6_c7.jpg"></a> </li>
                        <li> <a href="#"><img width="58" height="48" src="/qinyi/index/footer_pic02_r6_c11.jpg"></a> </li>
                        <li> <a href="#"><img width="52" height="48" src="/qinyi/index/footer_pic02_r6_c14.jpg"></a> </li>
                    </ul>
                </div>
            </div> -->
            <p class="p01">我们是由菲律宾政府 NORTH CAGAYAN 和 CEZA 所授权 并拥有合法博彩牌照，并接受其机构监管，严格按照上述机构颁发的规则进行运营。</p>
            <p>Copyright &copy; 2015 xinsheng, Inc. All Rights Reserved.</p>
        </div>
        <div onmouseout="iScrollAmount=1" onmouseover="iScrollAmount=0" style="display:none" id="enotice"> </div>
    </div>
</div>
<style type="text/css">
.footer01{ height:170px; width:745px; margin:0 auto; padding-top:30px;}
.footer01_dl01{ width:200px; color:#262626; float:left; }
.footer01_dl01 .p01{ color:#262626; font-size:14px;}
.footer01_dl01 .p02{color:#9F9F9F;}
.footer01_dl01 dt{ padding-left:20px; margin-bottom:10px;}
.footer01_dl01 dd a{ display:block; height:30px; background:url(../qinyi/index/ico01_r44_c3.png) no-repeat left center; line-height:30px; color:#575757; padding-left:25px; font-size:12px;}
.footer01 .wechat dd a{ background:none;}
.footer01 .mobile dd a{ background:none;}

.footer02{ background:#32365E;}
.footer02_in{ width:1100px; margin:0 auto; overflow:hidden;}
.footer02_in_l{ float:left; }
.footer02_in h4{ font-size:14px; color:#ECECEC; font-weight:100; margin-top:20px;}
.footer02_in h4 span{ color:#9F9F9F; font-size:12px; padding-left:10px;}
.footer02_ul01{ float:left; width:520px; border-right:1px solid #3d4375; padding-top:30px;}
.footer02_ul01 li{ float:left; margin-right:12px; margin-bottom:10px;}
.footer02_in_r{ float: right; }
.footer02_in_r .footer02_ul01{ border:0px;}
.footer02 .p01{ background:#31365d; color:#9193AF; line-height:50px; height:50px;font-size: 12px;}
.footer02 p{ background:#171735; height:30px; text-align:center; color:#515575; line-height:30px;font-size: 12px;}
</style>
</body>
</html>