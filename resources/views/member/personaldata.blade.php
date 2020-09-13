﻿<!DOCTYPE html>
<html>
<head>
<meta name="renderer" content="webkit" />
<meta http-equiv="X-UA-COMPATIBLE" content="IE=edge,chrome=1"/>
<meta content="text/html; charset=UTF-8">
<meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<title>六星开源商城-六星教育</title>
<meta name="keywords" content="六星教育" />
<meta name="description" content="六星教育"/>
<link rel="shortcut  icon" type="image/x-icon" href="/template/wap/default/public/images/favicon.ico" media="screen"/>
<link rel="stylesheet" type="text/css" href="static/css/pre_foot_1.css">
<link rel="stylesheet" type="text/css" href="static/css/pro-detail_1.css">
<link rel="stylesheet" type="text/css" href="static/css/font-awesome.min_1.css">
<link rel="stylesheet" type="text/css" href="static/css/showbox_1.css">
<link rel="stylesheet" href="static/css/layer_1.css" id="layuicss-skinlayercss">
<script src="static/js/showbox_1.js"></script>
<script src="static/js/jquery_1.js"></script>
<script type="text/javascript" src="static/js/layer_1.js"></script>
<script src="static/js/load_task_1.js" type="text/javascript"></script>
<script type="text/javascript">
var CSS = "/template/wap/default/public/css";
var APPMAIN='http://tp.23673.com/wap';
var ADMINMAIN='http://tp.23673.com/admin';

$(function(){
	showLoadMaskLayer();
})

$(document).ready(function(){
	hiddenLoadMaskLayer();
	//编写代码
});

//页面底部选中
function buttomActive(event){
	clearButton();
	if(event == "#buttom_home"){
		$("#buttom_home").find("img").attr("src","/template/wap/default/public/images/home_check.png");
	}else if(event == "#buttom_classify"){
		$("#buttom_classify").find("img").attr("src","/template/wap/default/public/images/classify_check.png");
	}else if(event == "#buttom_stroe"){
		$("#buttom_stroe").find("img").attr("src","/template/wap/default/public/images/store_check.png");
	}else if(event == "#bottom_cart"){
		$("#bottom_cart").find("img").attr("src","/template/wap/default/public/images/cart_check.png");
	}else if(event == "#bottom_member"){
		$("#bottom_member").find("img").attr("src","/template/wap/default/public/images/user_check.png");
	}
}

function clearButton(){
	$("#buttom_home").find("img").attr("src","/template/wap/default/public/images/home_uncheck.png");
	$("#buttom_classify").find("img").attr("src","/template/wap/default/public/images/classify_uncheck.png");
	$("#buttom_stroe").find("img").attr("src","/template/wap/default/public/images/store_uncheck.png");
	$("#bottom_cart").find("img").attr("src","/template/wap/default/public/images/cart_uncheck.png");
	$("#bottom_member").find("img").attr("src","/template/wap/default/public/images/user_uncheck.png");
}

//显示加载遮罩层
function showLoadMaskLayer(){
	$(".mask-layer-loading").fadeIn(300);
}

//隐藏加载遮罩层
function hiddenLoadMaskLayer(){
	$(".mask-layer-loading").fadeOut(300);
}
</script>
<style>
body .sub-nav.nav-b5 dd i {margin: 3px auto 5px auto;}
body .fixed.bottom {bottom: 0;}
.mask-layer-loading{position: fixed;width: 100%;height: 100%;z-index: 999999;top: 0;left: 0;text-align: center;display: none;}
.mask-layer-loading i,.mask-layer-loading img{text-align: center;color:#000000;font-size:50px;position: relative;top:50%;}
</style>

    <link rel="stylesheet" type="text/css" href="static/css/foundation.css">
    <link rel="stylesheet" type="text/css" href="static/css/normalize.css">
<!--     <script src="static/js/classfirst.js"></script> -->
<!--     <script src="static/js/classsub.js"></script> -->
    <link rel="stylesheet" type="text/css" href="static/css/common-v4.4.css">
<!--     <script src="static/js/foundation.js"></script> -->
    <meta class="foundation-data-attribute-namespace">
    <meta class="foundation-mq-xxlarge">
    <meta class="foundation-mq-xlarge">
    <meta class="foundation-mq-large">
    <meta class="foundation-mq-medium">
    <meta class="foundation-mq-small">
<!--     <script src="static/js/foundation.alert.js"></script> -->
<!--     <script src="static/js/common.js"></script> -->
    <style  type="text/css">
.button-submit{
	width:90%;
	margin:0 auto;
	margin-top:50px;
}
.button-submit button{
	color:#FFF;
	background-color:#E03115;
	font-size:15px;
	border:none;
	line-height:40px;
	height:40px;
}
.personal-center .side-nav{
	margin-top:68px;
}
#divInfo>.side-nav>li{
	margin-left: 5px;
    margin-right: 7px;
    padding-left: 5px;
    padding-right: 0px;
    height: 35px;
    line-height: 30px;
    min-height: 35px;
    border-bottom: 1px solid #f1f1f1;
}
#divInfo>.side-nav>li:first-child{
	padding-bottom: 8px;
    margin-top: 0px;
    padding-top: 0px;
    height: 44px;
}
.value.touxiang{
	float: left;
}
.personal-center .side-nav{
	margin-top:45px;
	padding-top:7px;
}
.personal-center .text{
	font-size: 13px;
}
#divInfo>.side-nav>li.border-bottom-none{border-bottom: none;}
#divInfo>.side-nav>li.border-bottom-none img{
    margin-right: 0px;
    border-radius: 0px;
    width: 32px;
    height: auto;
}
.body-gray{background:#f5f5f5;}
.mt-55.mlr-15 input{
	box-shadow: none;
    margin: 0;
    height: 35px;
    border: none;
    max-width: 72%;
	min-width: 60%;
    display: inline-block;
}
.mt-55.mlr-15>div
{
	line-height:50px;
	padding-left:15px;
	overflow: hidden;
	background: #fff;
}
.mt-55.mlr-15>div:first-child{
margin-top:45px;
}
.mt-55.mlr-15>div>span{
	width: 28%;
	font-size: 14px;
	display: block;
	float:left;
}
.mt-55.mlr-15>div>span.left-img{
	width: 16%;
}
.mt-55.mlr-15>div>span>img{
	width: 26px;
	height:auto;
    float: left;
    margin-top: 16px;
}
.border_right{
	    border-right: 1px solid #ddd;
    height: 24px;
    width: 2px;
    float: left;
    margin-top: 16px;
    margin-left: 14px;
}
.mt-55.mlr-15 input:focus{
	background: #fff;
}
.personal-center .value{
	font-size: 12px;
    color: #999;
}
.personal-center .value img{
	height: 40px;
	width:40px;
    margin-right: 0px;
    border-radius: 50%;
    border: 1px solid #f5f5f5;
}
.personal-center .arrow, .personal-center .head-arrow{
	margin-top: 10px;
}
.personal-center .set_a{
	color: #29afe4;
}
.mt-55.mlr-15>div.threeBind{
	padding-left: 0px;
    border-bottom: 1px solid #ddd;
    border-top: 1px solid #ddd;
    margin-top: 54px;
}
.mt-55.mlr-15>div.threeBind ul{
	overflow: hidden;
	margin-left: 0.5rem;
	    margin-bottom: 0px;
}
.mt-55.mlr-15>div.threeBind ul li{
	overflow: hidden;
    line-height: 35px;
    margin-bottom: 0px;
}
.mt-55.mlr-15>div.threeBind ul li>img:first-child{
      float: left;
    margin-top: 9px;
    max-width: 26px;
    height: auto;
}
.mt-55.mlr-15>div.threeBind ul li>a{
	    display: block;
    float: left;
    border-bottom: 1px solid #ddd;
    width: 91%;
    color: #333;
    font-size: 14px;
    padding-left: 6px;
        height: 42px;
    line-height: 42px;
}
.mt-55.mlr-15>div.threeBind ul li>a:after{
	clear: both;
}
.mt-55.mlr-15>div.threeBind ul li:last-child>a{
	 border-bottom:0px;
}
.mt-55.mlr-15>div.threeBind ul li>a>div{
	float: right;
}
.mt-55.mlr-15>div.threeBind ul li>a>div>span:first-child{
	    color: #999;
}
.mt-55.mlr-15>div.threeBind ul li>a>div>span:first-child.wei_span{
	color: #00A0E9;
}
.mt-55.mlr-15>div.threeBind ul li>a>div>span:last-child{
	border-right: 1px solid #ddd;
    border-bottom: 1px solid #ddd;
    transform: rotate(-46deg);
    -ms-transform: rotate(-46deg);
    -moz-transform: rotate(-46deg);
    -webkit-transform: rotate(-46deg);
    -o-transform: rotate(-46deg);
    width: 12px;
    height: 12px;
    display: block;
    float: right;
    margin: 13px 8px 10px 0px;
}
.sendOutCode{
	border: 1px solid #E03115!important;
	color: #E03115;
	padding:0;
	width: 30px;
	background: #fff;
	border-radius: 4px;
	min-width: 25%!important;
	height: 25px;
	font-size: 12px;
	margin-left: 20px;
}
</style>

</head>
<body class="body-gray">

<section class="head">
		<a class="head_back" id="backoutapp" onclick="backPage()" href="javascript:void(0)"><i class="icon-back"></i></a>
		<div class="head-title" id="title">个人资料</div>

	</section>

	<div class="motify" style="display: none;"><div class="motify-inner">弹出框提示</div></div>
	 <!--submit errow tip begin-->
<!--submit errow tip end-->
<div class="personal-complete">
	<div class="personal-complete-tip"  id="personaltip"></div>
	<!--side nav begin-->
	<div class="personal-center" id="divInfo" >
		<ul class="side-nav" id="list" >
			<li>
					<a href="javascript:void(0)">
					<div class="cont-value" style="padding:0px;">
													<span class="value touxiang"><img src="static/picture/1540908417_1.jpg" /></span>

					</div>
					</a>
			</li>

			<li isnew="False" >
				<a href="javascript:void(0)">
					<div class="title">
						<i></i>
						<span class="text">账号</span>
					</div>
					<div class="cont-value">
						<span class="value">admin&nbsp;</span>
					</div>
				</a>
			</li>

			<li isnew="False" >
				<a href="javascript:void(0)" >
					<div class="title">
						<i></i>
						<span class="text" tage="nickname">昵称</span>
					</div>
					<div class="cont-value">
						<i class="arrow"></i><span class="value"  id="nickname">admin</span>
					</div>
				</a>
			</li>
			<li isnew="False" >
				<a href="javascript:void(0)" >
					<div class="title">
						<i></i>
						<span class="text" tage="password">密码</span>
					</div>
					<div class="cont-value">
						<i class="arrow"></i><span class="value set_a"  id="password">修改</span>
					</div>
				</a>
			</li>
			<li ><a href="javascript:void(0)">
					<div class="title">
						<i></i>
						<span class="text" tage="mobilephone">手机</span>
					</div>
					<div class="cont-value">
						<i class="arrow"></i>
													<span class="value set_a" id="mobilephone">绑定手机号</span>
											</div>
			</a></li>
			<li><a href="javascript:void(0)">
					<div class="title">
						<i></i>
					<span class="text" tage="qqno">QQ号</span>
					</div>
					<div class="cont-value">
						<i class="arrow"></i><span class="value" id="qqno">&nbsp;</span>
					</div>
			</a></li>

			<li><a href="javascript:void(0)">
					<div class="title">
						<i></i>
					<span class="text" tage="email">邮箱</span>
					</div>
					<div class="cont-value">
						<i class="arrow"></i><span class="value" id="emailno">&nbsp;</span>
						<input type="hidden" id="oldEmail" value="">
					</div>
			</a></li>
			<li class="border-bottom-none"><a href="javascript:void(0)">
					<div class="title">
						<i></i>
					<span class="text" tage="threeBind">第三方账号绑定</span>
					</div>
					<div class="cont-value">
						<i class="arrow"></i><span class="value" id="threeBindno">
							<!--<img src="static/picture/personaldata_weixin.png" alt="" />-->
							<img src="static/picture/personaldata_qq.png" alt="" />
						</span>
					</div>
			</a></li>
		</ul>

			<div  class="button-submit">
		<a id="logout" href="javascript:void(0)" >

				<button onclick="logout()" >
			退出登录
			</button>

			</a>

		</div>


	</div>

</div>
<!--form begin-->
<!-- 第三方绑定 -->
<form class="mt-55 mlr-15" id="edit" style="display: none;margin:45px 0 0 0;width:100%;">
	<div class="threeBind">
		<ul>
			<!-- <li><img src="static/picture/personaldata_weixin.png" alt="" /><a href="javascript:;"><span>微信</span> <div><span class="wei_span">未绑定</span><span class="right_border">&nbsp;</span></div></a> </li> -->

						<li><img src="static/picture/personaldata_qq.png" alt="" /><a href="http://tp.23673.com/wap/login/oauthlogin?type=QQLOGIN"><span>QQ</span> <div><span class="wei_span">未绑定</span><span class="right_border">&nbsp;</span></div></a> </li>


			<!-- <li><img src="static/picture/personaldata_weibo.png" alt="" /><a href=""><span>微博</span> <div><span class="wei_span" >未绑定</span><span class="right_border">&nbsp;</span></div></a> </li> -->
		</ul>
	</div>

</form>

<!-- 密码修改 -->
<form class="mt-55 mlr-15" id="editpassword" style="display: none;background-color:#fff;margin:45px 0 0 0" >
		<div><span>当前密码：</span>
			<input type="text" id="oldpassword" style="margin:0;height:50px;border-bottom:none;"  placeholder="原始密码"   onfocus="$(this).attr('type','password')">
		</div>

		<div><span>新&nbsp;&nbsp;密&nbsp;码：</span>
			<input type="text" id="newpassword" style="box-shadow:none;margin:0;height:35px;border:none;width:auto;display:inline-block;"  placeholder="新密码"  onfocus="$(this).attr('type','password')"/>
			<span>确认新密码：</span><input type="text" id="newpassword2"   placeholder="确认新密码"  onfocus="$(this).attr('type','password')" >
		</div>
		<!--03 end-->
</form>

<!-- 手机号绑定 -->
<form class="mt-55 mlr-15" id="edit_mobile" style="display: none;background-color:#fff;margin-top: 10px;margin:0;    margin-top: 8px;" >
		<div>
			<span>手机号</span>
			<input type="text" id="mobile"  placeholder="请输入手机号码"  value=''/>
			<input type="hidden" id="oldMobile" value="">
		</div>
				<div>
			<span>手机动态码</span>
			<input type="text" id="mobile_code"  placeholder="请输入手机动态码"  value='' style="max-width: 32%;min-width: 30%;" />
			<input type="button" class="sendOutCode" id="send_mobile"  value="获取动态码"  style="height: 30px;margin-left: 20px;">
		</div>
		</form>

<form class="mt-55 mlr-15" id="edit_nick_name" style="display: none;background-color:#fff;margin-top: 10px;margin:0;margin-top: 8px;">
		<div><span>昵称</span>
			<input type="text" id="input_nick_name"  placeholder="请输入昵称"  value='admin'/>
		</div>
</form>

<form class="mt-55 mlr-15" id="edit_email" style="display: none;background-color:#fff;margin-top: 10px;margin:0;margin-top: 8px;">
		<div><span>邮箱</span>
			<input type="text" id="email"  placeholder="请输入邮箱"  value=''/>
		</div>

</form>

<div  id="saveBtn"class="button-submit" style="display: none;">
	<a href="javascript:void(0)" onclick="btnsave()">
		<button >保存</button>
	</a>
</div>



	<!-- 加载弹出层 -->
	<div class="mask-layer-loading">
		<img src="static/picture/mask_load_1.gif"/>
	</div>

<script>
// 	$(document).foundation().foundation('joyride', 'start');
</script>
<script type="text/javascript">
	var title = "";//
	var value = "";
	var type = "";
	$(function () {
		buttomActive('#bottom_member');
    	$("#list li").click(function () {
            var titleTag = this.children[0].children[0].children[1];
            if (titleTag == undefined) {
                titleTag = this.children[0].children[1].children[1];
            }
            title = titleTag.innerHTML;
			type = $(titleTag).attr("tage");
			value = this.children[0].children[1].children[1];
			if (value == undefined) {
				value = this.children[0].children[2].children[1]
			}
			value = value.innerHTML;

			value = value.replace("&nbsp;", "");
			$("#value").attr("placeholder", "");

			$("#personaltip").toggle()
			if (title == "账号") {
				if ($(this).attr("isnew") == "False") {
					return;
				} else {
					$("#value").attr("placeholder", "请输入会员名");
					$("#title").html(title);
					$("#saveBtn").toggle();
					$("#divInfo").toggle();
					$("#exit").toggle();
					$("#edit").toggle();
					return;
				}
			}
			if (title == "密码") {
				$("#title").html("修改密码");
				$("#saveBtn").toggle();
				$("#divInfo").toggle();
				$("#exit").toggle();
				$("#editpassword").toggle();
			}else if(title == "手机"){
				$("#value").attr("placeholder", "请输入手机号码!");
				$("#title").html("绑定手机号码");
				$("#saveBtn").toggle();
				$("#divInfo").toggle();
				$("#exit").toggle();
				$("#edit_mobile").toggle();
			}else if(title == "昵称"){
				$("#value").attr("placeholder", "请输入昵称");
				$("#title").html("修改昵称");
				$("#saveBtn").toggle();
				$("#divInfo").toggle();
				$("#exit").toggle();
				$("#edit_nick_name").toggle();
			}else if(title == "邮箱"){
				$("#edit_email").toggle();
				$("#title").html(title);
				$("#saveBtn").toggle();
				$("#divInfo").toggle();
				$("#exit").toggle();
				$("#value").attr("placeholder", "请输入邮箱!");
				$("#input_ico").attr("src","/template/wap/default/public/images/center_email.png");
			} else {
				$("#title").html(title);
				$("#value").val(value);
				$("#saveBtn").toggle();
				$("#divInfo").toggle();
				$("#exit").toggle();
				$("#edit").toggle();
				if(title=='第三方账号绑定'){
					$('.button-submit').hide();
				}
				if(title == "真实姓名"){
					$("#value").attr("placeholder", "请输入真实姓名!");
					$("#input_ico").attr("src","/template/wap/default/public/images/center_user.png");
				}else if(title == "QQ号"){
					$("#value").attr("placeholder", "请输入QQ号!");
					$("#input_ico").attr("src","/template/wap/default/public/images/center_qq.png");
				}else if(title == "微信号"){
					$("#value").attr("placeholder", "请输入微信号!");
					$("#input_ico").attr("src","/template/wap/default/public/images/center_weixn.png");
				}
			}
		});
	});
	//点击返回
	function backPage(){
		var title=$("#title").html();
		if(title=="个人资料"){
			var shop_id = "0";
			if(shop_id == 0)
				{
				window.location.href="http://tp.23673.com/wap/member/index";
				}
			else{
				window.location.href="http://tp.23673.com/wap/member/index?shop_id="+shop_id;
			}
		}else{
			window.location.href=window.location.href;
		}
	}
	function logout(){
		  $.ajax({
              url: "http://tp.23673.com/wap/member/logout",
              type: "post",
              success: function (res) {
                  if (res['code'] > 0) {
                	  window.location.href="http://tp.23673.com/wap/login/index";
                  } else {
	            	  if(res["message"]!=null){
	            		  showBox(res["message"]);
	            	  }
                  }
              }
          })
	}
    $("#logout").click(function (){
        var json ={
        		"logout" : "1",
            }
        window.webkit.messageHandlers.logout.postMessage(json);
    })
    $("#backoutapp").click(function (){
        var json ={
        		"center" : "1",
            }
        window.webkit.messageHandlers.center.postMessage(json);
    })
	function btnsave() {
        var url = "http://tp.23673.com/wap";
        var value = "";
        switch (type) {
            case "password":
                //密码(6-16)位
                var oldpassword = $("#oldpassword").val();
                var newpassword = $("#newpassword").val();
                var newpassword2 = $("#newpassword2").val();
                var reg = /^[\@A-Za-z0-9\!\#\$\%\^\&\*\.\~]{6,16}$/;
                 if (oldpassword.length == 0) {
                	showBox("请输入原始密码", {
        				time: 2000
        			});
                    return false;
                }
                if (!reg.test(newpassword)) {
                	showBox("请输入6-20位新密码", {
        				time: 2000
        			});
                    return false;
                }
                if(newpassword2!=newpassword){
                	showBox("两次密码不一致请重新输入", {
        				time: 2000
        			});
                	 return false;
                }
                $.ajax({
                    url: "http://tp.23673.com/wap/member/modifypassword",
                    data: { "new_password":newpassword,"old_password":oldpassword },
                    type: "post",
                    success: function (res) {
                    	//alert(JSON.stringify(res));
                        if (res['code']> 0) {
                            backPage();
                        } else {
                        	showBox("原始密码错误");
                        }
                    }
                })
                break;
            case "truename":
                var truename = $.trim($("#truename").text());
                value = $.trim($("#value").val());
                if (value == "") {
                	showBox("真实姓名不能为空");
                	 return false;
                }
                if (truename == value) {
                	showBox("与原真实姓名一致,无需修改");
                	 return false;
                }
                $.ajax({
                    url: "APP_MIAN/member/updaterealname",
                    data: { "truename": value },
                    type: "post",
                    success: function (res) {
                        if (res["retval"]  == 1) {
                             $("#truename").text(value);
                             backPage();
                        } else {
                        	showBox("修改失败");
                        }
                    }
                })
                break;
            case "mobilephone":
            	var oldMobile = $.trim($("#oldMobile").val());
            	var	value = $.trim($("#mobile").val());
                var vertification = $("#input_mobile_code").val();
        	   	var code = $("#mobile_code").val();
        	   	var result = '';
        	   	var res ='';
        	   	if (value == oldMobile) {
                	showBox("与原手机号码一致,无需修改");
                	 return false;
                }
                if (value == "") {
                	showBox("手机不能为空");
                	 return false;
                }else{
                	                }
                               if(code.length == 0){
               	   showBox("请输入手机验证码");
            	   return false;
               }else{
               		$.ajax({
	                    url: "http://tp.23673.com/wap/member/check_dynamic_code",
	                    data: { "vertification": code },
	                    type: "post",
	                    async : false,
	                    success : function(data){
	                    	if(data['code'] < 0){
	                    		showBox(data['message']);
	                    		result = true;
	                    	}
	                    	return result;
	                    }
	                })
	                if(result){
	                	return false;
	                }
               	}
               	                $.ajax({
                    url: "http://tp.23673.com/wap/member/modifymobile",
                    data: { "mobilephone": value },
                    type: "post",
                    success: function (res) {
                        if (res["code"] > 0) {
                            $("#mobilephone").text(value);
                            backPage();
                        } else {
                        	showBox(res["message"]);
                        }
                    }
                })
                break;
            case "qqno":
                value = $.trim($("#value").val());
                if (value == "") {
                	showBox("QQ号不能为空");
                	 return false;
                }
                $.ajax({
                    url: "http://tp.23673.com/wap/member/modifyqq",
                    data: {"qqno": value },
                    type: "post",
                    success: function (res) {
                        if (res["code"] > 0) {
                            backPage();
                            $("#qqno").text(value);
                        } else {
                        	showBox(res["message"]);
                        }
                    }
                })
                break;
            case "wxno":
                value = $.trim($("#value").val());
                if (value == "") {
                	showBox("微信号不能为空");
                	 return false;
                }
                $.ajax({
                    url: "http://tp.23673.com/wap/member/modifyqq",
                    data: { "wxno": value },
                    type: "post",
                    success: function (res) {
                        if (res["retval"]== 1) {
                            backPage();
                            $("#wxno").text(value);
                        } else {
                        	showBox("修改失败");
                        }
                    }
                })
                break;
            case 'email':
            	   var oldEmail = $("#oldEmail").val();
            	   var value = $("#email").val();
            	   var vertification = $("#input_email_code").val();
            	   var code = $("#email_code").val();
            	   var result = '';
            	   var res ='';
            	   if(value == oldEmail){
            	   		showBox("与原邮箱一致无需更改");
                	   	return false;
            	   }
                   if (value == "") {
                	   showBox("邮箱不能为空");
                	   return false;
                   }else{
                   		$.ajax({
							type: "post",
							url: "http://tp.23673.com/wap/login/email",
							data: {"email":value},
							async: false,
							success: function(data){
								if(data){
									layer.msg("该邮箱已存在");
									return false;
								}
							}
						});
                   }
                                      $.ajax({
                       url: "http://tp.23673.com/wap/member/modifyemail",
                       data: { "email": value },
                       type: "post",
                       success: function (res) {
                           if (res["code"]== 1) {
                               backPage();
                               $("#emailno").text(value);
                           } else {
                        	   showBox("修改失败");
                           }
                       }
                   })
                   break;
            case "nickname":
            	var nickname = $("#nickname").text();
            	value = $.trim($("#input_nick_name").val());
            	if(nickname == value){
    				showBox("与原昵称一致,无需修改");
    				return false;
            	}
            	if(value == ""){
            		showBox("昵称不能为空");
            		return false;
            	}
                $.ajax({
                    url: "http://tp.23673.com/wap/member/modifynickname",
                    data: { "nickname": value },
                    type: "post",
                    success: function (res) {
                    	if(res.code >0){
                            $("#emailno").text(value);
                        	backPage();
                    	}else{
                        	showBox(res.message);
                    	}
                    }
                })
            	break;
        }
    }

    $("#send_mobile").click(function (){
		var mobile = $("#mobile").val();
		var mobile_code = $("#input_mobile_code").val();
		//验证手机号格式是否正确
		if(mobile.search(/^1[34578]\d{9}$/) == -1){
 			$("#mobile").trigger("focus");
 			layer.msg("手机号码有误，请重填");
			return false;
		}
		//验证手机号是否已经注册
		$.ajax({
			type: "post",
			url: "http://tp.23673.com/wap/login/mobile",
			data: {"mobile":mobile},
			async: false,
			success: function(data){
				if(data){
					layer.msg("该手机号已注册");
					return false;
				}else{
			 		//判断输入的验证码是否正确
					$.ajax({
						type: "post",
						url: "http://tp.23673.com/wap/login/sendsmsregistercode",
						data: {"mobile":mobile,"vertification":vertification},
						success: function(data){
							//alert(JSON.stringify(data));
							if(data['code']=='0'){
								time();
							}else{
								layer.msg(data["message"]);
								$(".verifyimg").attr("src",'/captcha.html');
								return false;
							}
						}
					});
				}
			}
		});
	});
    //发送邮箱验证码
	$("#send_email").click(function (){
		var email = $("#email").val();
		var email_code = $("#input_email_code").val();
		//验证邮箱格式是否正确
		if(email.search(/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/) == -1){
 			$("#email").trigger("focus");
 			layer.msg("邮箱格式不正确");
			return false;
		}
		//验证手机号是否已经注册
		$.ajax({
			type: "post",
			url: "http://tp.23673.com/wap/login/email",
			data: {"email":email},
			async: false,
			success: function(data){
				if(data){
					layer.msg("该邮箱已存在");
					return false;
				}else{
			 		//判断输入的验证码是否正确
					$.ajax({
						type: "post",
						url: "http://tp.23673.com/wap/member/sendbindcode",
						data: {"email":email,"vertification":email_code,"type":"email"},
						success: function(data){
							if(data['code']== 0){
								time();
							}else{
								layer.msg(data["message"]);
								$(".verifyimg").attr("src",'/captcha.html');
								return false;
							}
						}
					});
				}
			}
		});
	});

	//发送短信验证码
	$("#send_mobile").click(function (){
		var mobile = $("#mobile").val();
		var mobile_code = $("#input_mobile_code").val();
		//验证邮箱格式是否正确
		if(mobile.search(/^1(3|4|5|7|8)\d{9}$/) == -1){
 			$("#mobile").trigger("focus");
 			layer.msg("手机格式不正确");
			return false;
		}
		//验证手机号是否已经注册
		$.ajax({
			type: "post",
			url: "http://tp.23673.com/wap/login/mobile",
			data: {"mobile":mobile},
			async: false,
			success: function(data){
				if(data){
					layer.msg("该手机号已存在");
					return false;
				}else{
			 		//判断输入的验证码是否正确
					$.ajax({
						type: "post",
						url: "http://tp.23673.com/wap/member/sendbindcode",
						data: {"mobile":mobile,"vertification":mobile_code,"type":"mobile"},
						success: function(data){
							if(data['code']== 0){
								time();
							}else{
								layer.msg(data["message"]);
								$(".verifyimg").attr("src",'/captcha.html');
								return false;
							}
						}
					});
				}
			}
		});
	});

	var wait=120;
	function time() {
	    if (wait == 0) {
	    	$(".sendOutCode").removeAttr("disabled");
	    	$(".sendOutCode").val("获取验证码");
	        wait = 120;
	    } else {
	    	$(".sendOutCode").attr("disabled", 'disabled');
	    	$(".sendOutCode").val(wait+"s后重新发送");
	        wait--;
	        setTimeout(function() {
	            time()
	        },
	        1000)
	    }
	}
</script>

</body>
</html>
