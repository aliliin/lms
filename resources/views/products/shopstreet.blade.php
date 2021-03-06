﻿
<!DOCTYPE html>
<html>
<head>
	<meta name="renderer" content="webkit" />
	<meta http-equiv="X-UA-COMPATIBLE" content="IE=edge,chrome=1" />
	<meta content="text/html; charset=UTF-8">
	<meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="format-detection" content="telephone=no">
	<title>六星开源商城-六星教育</title>
	<meta name="keywords" content="六星教育" />
	<meta name="description" content="六星教育" />
	<link rel="shortcut  icon" type="image/x-icon" href="/template/wap/default/public/images/favicon.ico" media="screen" />
	<link rel="stylesheet" type="text/css" href="static/css/pre_foot.css">
	<link rel="stylesheet" type="text/css" href="static/css/pro-detail.css">
	<link rel="stylesheet" type="text/css" href="static/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="static/css/showbox.css">
	<link rel="stylesheet" href="static/css/layer.css" id="layuicss-skinlayercss">
	<script src="static/js/showbox.js"></script>
	<script src="static/js/jquery.js"></script>
	<script type="text/javascript" src="static/js/layer.js"></script>
	<script src="static/js/load_task.js" type="text/javascript"></script>
	<script type="text/javascript">
		var CSS = "/template/wap/default/public/css";
		var APPMAIN = 'http://tp.23673.com/wap';
		var ADMINMAIN = 'http://tp.23673.com/admin';

		$(function() {
			showLoadMaskLayer();
		})

		$(document).ready(function() {
			hiddenLoadMaskLayer();
			//编写代码
		});

		//页面底部选中
		function buttomActive(event) {
			clearButton();
			if (event == "#buttom_home") {
				$("#buttom_home").find("img").attr("src", "/template/wap/default/public/images/home_check.png");
			} else if (event == "#buttom_classify") {
				$("#buttom_classify").find("img").attr("src", "/template/wap/default/public/images/classify_check.png");
			} else if (event == "#buttom_stroe") {
				$("#buttom_stroe").find("img").attr("src", "/template/wap/default/public/images/store_check.png");
			} else if (event == "#bottom_cart") {
				$("#bottom_cart").find("img").attr("src", "/template/wap/default/public/images/cart_check.png");
			} else if (event == "#bottom_member") {
				$("#bottom_member").find("img").attr("src", "/template/wap/default/public/images/user_check.png");
			}
		}

		function clearButton() {
			$("#buttom_home").find("img").attr("src", "/template/wap/default/public/images/home_uncheck.png");
			$("#buttom_classify").find("img").attr("src", "/template/wap/default/public/images/classify_uncheck.png");
			$("#buttom_stroe").find("img").attr("src", "/template/wap/default/public/images/store_uncheck.png");
			$("#bottom_cart").find("img").attr("src", "/template/wap/default/public/images/cart_uncheck.png");
			$("#bottom_member").find("img").attr("src", "/template/wap/default/public/images/user_uncheck.png");
		}

		//显示加载遮罩层
		function showLoadMaskLayer() {
			$(".mask-layer-loading").fadeIn(300);
		}

		//隐藏加载遮罩层
		function hiddenLoadMaskLayer() {
			$(".mask-layer-loading").fadeOut(300);
		}
	</script>
	<style>
		body .sub-nav.nav-b5 dd i {
			margin: 3px auto 5px auto;
		}

		body .fixed.bottom {
			bottom: 0;
		}

		.mask-layer-loading {
			position: fixed;
			width: 100%;
			height: 100%;
			z-index: 999999;
			top: 0;
			left: 0;
			text-align: center;
			display: none;
		}

		.mask-layer-loading i,
		.mask-layer-loading img {
			text-align: center;
			color: #000000;
			font-size: 50px;
			position: relative;
			top: 50%;
		}
	</style>

	<link rel="stylesheet" type="text/css" href="static/css/components.css">
	<link rel="stylesheet" type="text/css" href="static/css/goods_list.css">
	<link rel="stylesheet" type="text/css" href="static/css/shopstreet.css">

	<!-- 添加样式文件 -->
	<style type="text/css">
		.vertical-bar {
			border-left: 1px solid #efefef;
			height: 64px;
			vertical-align: middle;
			display: inline-block;
			margin-top: 5px;
			float: left;
		}
	</style>

</head>
	<body class="body-gray">
		<section class="head">
			<a class="head_back" onclick="window.history.go(-1)" href="javascript:void(0)">	</a>
			<div class="head-title">
				<div class="custom-search">
					<form action="" method="get">
						<input type="text" class="custom-search-input" style="position:relative;" placeholder="请输入店铺名称" value='' id="shop">
						<button type="button" class="custom-search-button" onclick="search()">搜索</button>
					</form>
				</div>
			</div>
		</section>
		<div class="motify" style="display: none;">
			<div class="motify-inner">弹出框提示</div>
		</div>
		<div class="order_div">
			<!-- 全部 -->
			<span class="select" id="shop_group"><a href="javascript:;">全部 </a>
			</span>
			<!-- 销量 -->
			<span>
				<a href="http://tp.23673.com/wap/index/shopstreet?shop_group_id=&shop_name=&order_type=1&sort=desc&shop_group_name=">销量
					<i class="desc"></i>
				</a>
			</span>
			<!-- 信誉 -->
			<span>
				<a href="http://tp.23673.com/wap/index/shopstreet?shop_group_id=&shop_name=&order_type=2&sort=desc&shop_group_name=">信誉
					<i class="desc"></i>
				</a>
			</span>
			<!-- 筛选 -->
			<span><a href="javascript:;"><i class="screening"></i>筛选</a></span>
		</div>
		<!-- 店铺列表 -->
		<div class="main">
			<ul class="shop-list">
				<li>
					<a href="http://tp.23673.com/wap/shop/index?shop_id=0" title="官方直营店">
						<div class="store-name">
							<h1>官方直营店</h1>
							<span class="flag-stores">直营店</span>
							<span class="flag-security">保</span>
							<img src="static/picture/right_arrow.png" class="right-arrow" />
						</div>
						<div class="store-item">
							<img alt="" src="static/picture/temp_14653489106946.jpg" class="store-logo">
							<div class="store-right">
								<div class="store-detail">
									<div class="left">
										<div class="scope-business">经营范围：<strong>珠宝/首饰</strong></div>
										<div class="good-rate">好评率：<strong>90%</strong></div>
										<div class="credibility">信誉：
											<img style="vertical-align: middle;width:15px;" src="static/picture/credibility_starts.png" alt='5' />
											<img style="vertical-align: middle;width:15px;" src="static/picture/credibility_starts.png" alt='5' />
											<img style="vertical-align: middle;width:15px;" src="static/picture/credibility_starts.png" alt='5' />
											<img style="vertical-align: middle;width:15px;" src="static/picture/credibility_starts.png" alt='5' />
											<img style="vertical-align: middle;width:15px;" src="static/picture/credibility_starts.png" alt='5' />
										</div>
									</div>
									<!-- <i class="vertical-bar"></i>
								<div class="right" style="margin-top:12px;">
									<address>太原</address>
								</div> -->
								</div>
							</div>
						</div>
					</a>
				</li>
				<li>
					<a href="http://tp.23673.com/wap/shop/index?shop_id=1" title="海尔加盟店">

						<div class="store-name">
							<h1>海尔加盟店</h1>
							<!-- 						<span class="flag-brand">普通店</span> -->
							<span class="flag-security">保</span>
							<img src="static/picture/right_arrow.png" class="right-arrow" />
						</div>
						<div class="store-item">
							<img alt="" src="static/picture/1500622271.jpg" class="store-logo">
							<div class="store-right">
								<div class="store-detail">
									<div class="left">
										<div class="scope-business">经营范围：<strong>珠宝/首饰</strong></div>
										<div class="good-rate">好评率：<strong>90%</strong></div>
										<div class="credibility">信誉：
											<img style="vertical-align: middle;width:15px;" src="static/picture/credibility_starts.png" alt='5' />
											<img style="vertical-align: middle;width:15px;" src="static/picture/credibility_starts.png" alt='5' />
											<img style="vertical-align: middle;width:15px;" src="static/picture/credibility_starts.png" alt='5' />
											<img style="vertical-align: middle;width:15px;" src="static/picture/credibility_starts.png" alt='5' />
											<img style="vertical-align: middle;width:15px;" src="static/picture/credibility_starts.png" alt='5' />
										</div>
									</div>
									<!-- <i class="vertical-bar"></i>
								<div class="right" style="margin-top:12px;">
									<address>太原</address>
								</div> -->
								</div>
							</div>
						</div>
					</a>
				</li>
				<li>
					<a href="http://tp.23673.com/wap/shop/index?shop_id=41" title="乔丹旗舰店">

						<div class="store-name">
							<h1>乔丹旗舰店</h1>
							<!-- 						<span class="flag-brand">普通店</span> -->
							<span class="flag-security">保</span>
							<img src="static/picture/right_arrow.png" class="right-arrow" />
						</div>
						<div class="store-item">
							<img alt="" src="static/picture/1500623512.jpg" class="store-logo">
							<div class="store-right">
								<div class="store-detail">
									<div class="left">
										<div class="scope-business">经营范围：<strong>珠宝/首饰</strong></div>
										<div class="good-rate">好评率：<strong>90%</strong></div>
										<div class="credibility">信誉：
											<img style="vertical-align: middle;width:15px;" src="static/picture/credibility_starts.png" alt='5' />
											<img style="vertical-align: middle;width:15px;" src="static/picture/credibility_starts.png" alt='5' />
											<img style="vertical-align: middle;width:15px;" src="static/picture/credibility_starts.png" alt='5' />
											<img style="vertical-align: middle;width:15px;" src="static/picture/credibility_starts.png" alt='5' />
											<img style="vertical-align: middle;width:15px;" src="static/picture/credibility_starts.png" alt='5' />
										</div>
									</div>
									<!-- <i class="vertical-bar"></i>
								<div class="right" style="margin-top:12px;">
									<address>太原</address>
								</div> -->
								</div>
							</div>
						</div>
					</a>
				</li>
				<li>
					<a href="http://tp.23673.com/wap/shop/index?shop_id=42" title="苏泊尔家电">

						<div class="store-name">
							<h1>苏泊尔家电</h1>
							<span class="flag-stores">直营店</span>
							<span class="flag-security">保</span>
							<img src="static/picture/right_arrow.png" class="right-arrow" />
						</div>
						<div class="store-item">
							<img alt="" src="static/picture/1500623721.jpg" class="store-logo">
							<div class="store-right">
								<div class="store-detail">
									<div class="left">
										<div class="scope-business">经营范围：<strong>家居用品</strong></div>
										<div class="good-rate">好评率：<strong>90%</strong></div>
										<div class="credibility">信誉：
											<img style="vertical-align: middle;width:15px;" src="static/picture/credibility_starts_none.png" alt='0' />
											<img style="vertical-align: middle;width:15px;" src="static/picture/credibility_starts_none.png" alt='0' />
											<img style="vertical-align: middle;width:15px;" src="static/picture/credibility_starts_none.png" alt='0' />
											<img style="vertical-align: middle;width:15px;" src="static/picture/credibility_starts_none.png" alt='0' />
											<img style="vertical-align: middle;width:15px;" src="static/picture/credibility_starts_none.png" alt='0' />
										</div>
									</div>
									<!-- <i class="vertical-bar"></i>
								<div class="right" style="margin-top:12px;">
									<address>太原</address>
								</div> -->
								</div>
							</div>
						</div>
					</a>
				</li>
			</ul>
		</div>
		<!-- 导航 -->
		<!-- 全部分类 -->
		<div class="total_content" style="display:none;">
			<div class="total_left">
				<ul>
					<li><a target="_self" href="http://tp.23673.com/wap/index/shopstreet" class="selected"><span>全部</span></a></li>
					<li>
						<a target="_self" href="http://tp.23673.com/wap/index/shopstreet?shop_group_id=1&shop_group_name=珠宝/首饰" title="珠宝/首饰">
							<span>珠宝/首饰</span>
						</a>
					</li>
					<li>
						<a target="_self" href="http://tp.23673.com/wap/index/shopstreet?shop_group_id=2&shop_group_name=服装鞋包" title="服装鞋包">
							<span>服装鞋包</span>
						</a>
					</li>
					<li>
						<a target="_self" href="http://tp.23673.com/wap/index/shopstreet?shop_group_id=3&shop_group_name=3C数码" title="3C数码">
							<span>3C数码</span>
						</a>
					</li>
					<li>
						<a target="_self" href="http://tp.23673.com/wap/index/shopstreet?shop_group_id=4&shop_group_name=美容护理" title="美容护理">
							<span>美容护理</span>
						</a>
					</li>
					<li>
						<a target="_self" href="http://tp.23673.com/wap/index/shopstreet?shop_group_id=5&shop_group_name=家居用品" title="家居用品">
							<span>家居用品</span>
						</a>
					</li>
					<li>
						<a target="_self" href="http://tp.23673.com/wap/index/shopstreet?shop_group_id=6&shop_group_name=食品/保健" title="食品/保健">
							<span>食品/保健</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
		<div style="height:58px;"></div>
		<div class="fixed bottom">
			<div class="distribution-tip" id="distribution-tip" style="display: none;"></div>
			<dl class="sub-nav nav-b5">
				<dd id="buttom_home">
					<a href="http://tp.23673.com/wap">
						<div class="nav-b5-relative">
							<img src="static/picture/home_check.png" />
							<span>首页</span>
						</div>
					</a>
				</dd>
				<dd id="buttom_classify">
					<a href="http://tp.23673.com/wap/goods/goodsClassificationList">
						<div class="nav-b5-relative">
							<img src="static/picture/classify_uncheck.png" />
							<span>分类</span>
						</div>
					</a>
				</dd>
				<dd id="buttom_stroe">
					<a href="http://tp.23673.com/wap/index/shopstreet">
						<div class="nav-b5-relative">
							<img src="static/picture/store_uncheck.png" />
							<span>店铺街</span>
						</div>
					</a>
				</dd>
				<dd id="bottom_cart">
					<a href="http://tp.23673.com/wap/goods/cart">
						<div class="nav-b5-relative">
							<img src="static/picture/cart_uncheck.png" />
							<span>购物车</span>
						</div>
					</a>
				</dd>
				<dd id="bottom_member">
					<a href="http://tp.23673.com/wap/Member/index">
						<div class="nav-b5-relative">
							<img src="static/picture/user_uncheck.png" />
							<span>会员中心</span>
						</div>
					</a>
				</dd>
			</dl>
		</div>
		<!-- 加载弹出层 -->
		<div class="mask-layer-loading">
			<img src="static/picture/mask_load.gif" />
		</div>
		<script type="text/javascript">
			$("#shop_group ").click(function() {
				if ($(".total_content").is(":hidden")) {
					$(".total_content").show();
				} else {
					$(".total_content").hide();
				}
			});

			function search() {
				var shop_name_1 = $('#shop').val();
				location.href = "http://tp.23673.com/wap/index/shopStreet?shop_name=" + shop_name_1;
			}

			$(function() {
				buttomActive('#buttom_stroe');
			});
		</script>
	</body>
</html>
