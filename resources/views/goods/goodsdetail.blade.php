﻿<!DOCTYPE html>
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
	<link rel="stylesheet" type="text/css" href="../../../static/css/pre_foot.css">
	<link rel="stylesheet" type="text/css" href="../../../static/css/pro-detail.css">
	<link rel="stylesheet" type="text/css" href="../../../static/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../../../static/css/showbox.css">
	<link rel="stylesheet" href="../../../static/css/layer.css" id="layuicss-skinlayercss">
	<script src="../../../static/js/showbox.js"></script>
	<script src="../../../static/js/jquery.js"></script>
	<script type="text/javascript" src="../../../static/js/layer.js"></script>
	<script src="../../../static/js/load_task.js" type="text/javascript"></script>
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
	<link rel="stylesheet" type="text/css" href="../../../static/css/mall.css">
	<link rel="stylesheet" type="text/css" href="../../../static/css/pre_foot.css">
	<link rel="stylesheet" type="text/css" href="../../../static/css/goods_detail.css">
	<script src="../../../static/js/goods_product.js"></script>
	<script language="javascript" src="../../../static/js/jweixin-1.0.0.js"></script>
	<script type="text/javascript" src="../../../static/js/jscommon.js" language="javascript" charset="gb2312"></script>
	<script src="../../../static/js/jquery.lazyload.js" type="text/javascript"></script>
	<style>
		.js-shelves {
			display: none;
		}
	</style>
</head>
<body class="body-gray">
	<section class="head">
		<a class="head_back" onclick="window.history.go(-1)" href="javascript:void(0)"><i class="icon-back"></i></a>
		<div class="head-title">六星开源商城</div>
	</section>
	<div class="motify" style="display: none;">
		<div class="motify-inner">弹出框提示</div>
	</div>
	<link rel="stylesheet" type="text/css" href="../../../static/css/scroll.css">
	<link rel="stylesheet" type="text/css" href="../../../static/css/detail.css">
	<link rel="stylesheet" type="text/css" href="../../../static/css/components.css">
	<script src="../../../static/js/scroll.js" type="text/javascript"></script>
	<script src="../../../static/js/countdown.js" type="text/javascript"></script>
	<style>
		.address-select{
			width: 30%;
		    float: left;
		    border: 1px solid #e5e5e5;
			height: 20px;
		    line-height: 20px;
		    margin: 5px 15px;
		    margin-left: 0;
		}

	</style>

	<!-- 商品详情 -->
	<div class="h50" style="height:45px;"></div>
	<section id="banner">
		<div class="shop_slider shop_slider_auto" data-tag="module-slider" data-height="320px">
			<div class="inner" data-tag="slider-warp">
				<ul class="pic_list" data-tag="slider-list">
					<li style="width: 320px;">
						<div>
							<img alt="图片" class="pp_init_img" src="{{ $product->image }}" />
						</div>
					</li>
{{--					<li style="width: 320px;">--}}
{{--						<div>--}}
{{--							<img alt="图片" class="pp_init_img" src="../../../static/picture/1500547414511.jpg" />--}}
{{--						</div>--}}
{{--					</li>--}}
{{--					<li style="width: 320px;">--}}
{{--						<div>--}}
{{--							<img alt="图片" class="pp_init_img" src="../../../static/picture/1500547416521.jpg" />--}}
{{--						</div>--}}
{{--					</li>--}}
				</ul>
			</div>
			<div class="bar_wrap">
				<ul class="bar" data-tag="slider-page">
					<li class="cur"></li>
					<li></li>
					<li></li>
				</ul>
			</div>
		</div>
	</section>
	<div class="buy_area">
		<div class="fn_wrap">
			<h1 class="title" id="itemName">{{ $product->title  }}</h1>
		</div>
		<div class="price_wrap">
			<span class="tit" id="priceTitle"></span>
			<span class="price" price="{{ $product->price }}">
				<span style="font-size:14px;display: inline-block;vertical-align: middle;">￥</span>
				{{ $product->price }} </span>
			<span class="flag" id="priceDis" style="display: none"></span>
		</div>

		<hr class="with-margin-l" />
		<div class="stock-detail">
			<!-- 			<span class="price_postage_tit">运费：免邮</span> -->
		</div>
	</div>
	<hr class="with-margin-l" />
	<hr class="divider-line" />
	<div class="statistics">
		<div class="app-field clearfix">
			<div class="control-group">
				<div class="custom-store block-item">
					<a class="custom-store-link clearfix" href="http://tp.23673.com/wap/shop/index?shop_id=0">
						<div class="custom-store-img"></div>
						<div class="custom-store-name">官方直营店</div>
						<div class="custom-store-enter">进入店铺</div>
					</a>
				</div>
				<div class="component-border"></div>
			</div>
			<div class="sort">
				<i class="sort-handler"></i>
			</div>
		</div>
		<hr class="with-margin-l" />
		<div class="price_postage">
			<span class="price_postage_tit">
				<img src="../../../static/picture/pro_detail_shop.jpg" />
				<span style="font-size: 12px;">企业认证</span>
				<img src="../../../static/picture/pro_detail_shop.jpg" />
				<span>担保交易</span>
				<img src="../../../static/picture/pro_detail_shop.jpg" />
				<span class="rz-name font-size-12 c-gray-darker">线下门店</span>
			</span>
		</div>
	</div>
	<div class="mod_tab_wrap">
		<div class="mod_tab" id="detailTab">
			<span onclick="showProperty(this,1)" class="cur">商品详情</span>
			<span onclick="showProperty(this,2)">商品属性</span>
			<span onclick="showProperty(this,3)">商品评价</span>
		</div>
	</div>
	<!-- 商品详情 -->
	<div class="detail_info_wrap" id="p-detail">
		<div class="detail_list" id="content">
			<p class="attr-list-hd tm-clear" style="margin-top: 0px; margin-bottom: 0px; padding: 5px 20px; line-height: 22px; color: rgb(153, 153, 153); font-family: tahoma, arial, 微软雅黑, sans-serif; font-size: 12px; white-space: normal; background-color: rgb(255, 255, 255);"><span
				  style="margin: 0px; padding: 0px; font-weight: 700; float: left;">产品参数：</span></p>
			<ul id="J_AttrUL" style="list-style-type: none;" class=" list-paddingleft-2">
				<li>
					<p>{{ $product->description}}</p>
				</li>
{{--				<li>--}}
{{--					<p>材质成分:&nbsp;桑蚕丝100%</p>--}}
{{--				</li>--}}
{{--				<li>--}}
{{--					<p>销售渠道类型:&nbsp;纯电商(只在线上销售)</p>--}}
{{--				</li>--}}
{{--				<li>--}}
{{--					<p>货号:&nbsp;V6394AAA</p>--}}
{{--				</li>--}}
{{--				<li>--}}
{{--					<p>风格:&nbsp;街头</p>--}}
{{--				</li>--}}
{{--				<li>--}}
{{--					<p>街头:&nbsp;欧美</p>--}}
{{--				</li>--}}
{{--				<li>--}}
{{--					<p>组合形式:&nbsp;单件</p>--}}
{{--				</li>--}}
{{--				<li>--}}
{{--					<p>裙长:&nbsp;短裙</p>--}}
{{--				</li>--}}
{{--				<li>--}}
{{--					<p>款式:&nbsp;裹胸</p>--}}
{{--				</li>--}}
{{--				<li>--}}
{{--					<p>袖长:&nbsp;短袖</p>--}}
{{--				</li>--}}
{{--				<li>--}}
{{--					<p>领型:&nbsp;V领</p>--}}
{{--				</li>--}}
{{--				<li>--}}
{{--					<p>袖型:&nbsp;喇叭袖</p>--}}
{{--				</li>--}}
{{--				<li>--}}
{{--					<p>腰型:&nbsp;中腰</p>--}}
{{--				</li>--}}
{{--				<li>--}}
{{--					<p>衣门襟:&nbsp;套头</p>--}}
{{--				</li>--}}
{{--				<li>--}}
{{--					<p>裙型:&nbsp;A字裙</p>--}}
{{--				</li>--}}
{{--				<li>--}}
{{--					<p>图案:&nbsp;花色</p>--}}
{{--				</li>--}}
{{--				<li>--}}
{{--					<p>流行元素/工艺:&nbsp;印花</p>--}}
{{--				</li>--}}
{{--				<li>--}}
{{--					<p>品牌:&nbsp;vileanx/威琳诗</p>--}}
{{--				</li>--}}
{{--				<li>--}}
{{--					<p>适用年龄:&nbsp;25-29周岁</p>--}}
{{--				</li>--}}
{{--				<li>--}}
{{--					<p>年份季节:&nbsp;2017年夏季</p>--}}
{{--				</li>--}}
{{--				<li>--}}
{{--					<p>颜色分类:&nbsp;花色</p>--}}
{{--				</li>--}}
{{--				<li>--}}
{{--					<p>尺码:&nbsp;S&nbsp;M&nbsp;L&nbsp;XL</p>--}}
{{--				</li>--}}
			</ul>
			<table cellspacing="0" cellpadding="0" align="center" bgcolor="#000000" width="790" style="width: 751px;">
				<tbody style="margin: 0px; padding: 0px;">
					<tr style="margin: 0px; padding: 0px;" class="firstRow">
						<td style="margin: 0px; padding: 0px; border-color: rgb(0, 0, 0);">
                            <a href="https://favorite.taobao.com/popup/add_collection.htm?spm=a1z10.1-b-s.w7566866-14552158213.1.dCZ1Zg&id=106858909&itemid=106858909&itemtype=0&ownerid=d6897baa34b6b782dad74a9ded95cdc3&itemtype=0&scjjc=2&ownerid=&_tb_token_=X8a3fiVaiec0bh&scene=taobao_shop"
							  target="_blank" style="margin: 0px; padding: 0px; text-decoration: none; color: rgb(51, 85, 170); outline: 0px;">
                                <img src="../../../static/picture/tb2odbwavxxxxxdxpxxxxxxxxxx_!!1857068113.png" class="img-ks-lazyload" style="margin: 0px; padding: 0px; border: 0px; vertical-align: top; animation: ks-fadeIn 350ms linear 0ms 1 normal both; opacity: 1; display: block;" />
							</a>
						</td>
					</tr>

					<tr style="margin: 0px; padding: 0px;">
						<td style="margin: 0px; padding-right: 18px; padding-left: 18px; border-width: 0px; border-color: rgb(229, 229, 229); color: rgb(0, 0, 0); font-stretch: normal; font-size: 12px; line-height: normal; font-family: &39;microsoft yahei&#39;">产品信息/INFOMATION产品品牌：Vileanx产品款号：6394产品颜色：花色产品材质：100%真丝适合季节：夏季产品尺码：S-XL商
							场 价 ：￥668产品特点：无弹力，有内衬，有腰带，无拉链，印花工艺洗涤建议：单独轻洗，分色洗涤模特参数：身高173CM，体重96斤 ， 试穿S尺码说明：测量方法不同尺码会有差异，误差2厘米左右色差说明：因光线环境不同，显示器差异，可能会有一点色差，属正常产品指数/INICATOR弹性:无弹微弹中弹高弹超弹厚度:薄偏薄中等较厚厚柔软:软偏软中软偏硬硬版型：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;紧身修身合身宽松
                        </td>
					</tr>

					<tr height="20" style="margin: 0px; padding: 0px;">
						<td style="margin: 0px; padding: 0px; border-color: rgb(0, 0, 0);"><br /></td>
					</tr>

					<tr height="10" style="margin: 0px; padding: 0px;">
						<td style="margin: 0px; padding: 0px; border-color: rgb(0, 0, 0);"><br /></td>
					</tr>

					<tr style="margin: 0px; padding: 0px;">
						<td style="margin: 0px; padding: 0px 15px; border-width: 0px; border-color: rgb(204, 204, 204); color: rgb(0, 0, 0); text-align: center; font-stretch: normal; font-size: 12px; line-height: normal; font-family: &#39;microsoft yahei&#39;;">
							<p>尺码胸围腰围臀围袖长衣长仅供参考其他S86腰带调节不计2682建议100斤以内选-M90腰带调节不计2682建议100-110斤选-L94&nbsp;腰带调节不计2783建议110-120斤选-XL98腰带调节不计2783建议120-130斤选-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
						</td>
					</tr>

					<tr height="10" style="margin: 0px; padding: 0px;">
						<td style="margin: 0px; padding: 0px; border-color: rgb(0, 0, 0);"><br /></td>
					</tr>

					<tr style="margin: 0px; padding: 0px; font-size: 0px; height: 0px;">
						<td style="margin: 0px; padding: 0px; border-color: rgb(0, 0, 0);"><br /></td>
					</tr>

				</tbody>
			</table>
			<p>
                <a href="https://favorite.taobao.com/popup/add_collection.htm?spm=a1z10.1-b-s.w7566866-14552158213.1.dCZ1Zg&id=106858909&itemid=106858909&itemtype=0&ownerid=d6897baa34b6b782dad74a9ded95cdc3&itemtype=0&scjjc=2&ownerid=&_tb_token_=X8a3fiVaiec0bh&scene=taobao_shop"
				  target="_blank" style="margin: 0px; padding: 0px; text-decoration: none; color: rgb(51, 85, 170); outline: 0px; font-family: tahoma, arial, 宋体, sans-serif; font-size: 14px; line-height: 21px; text-align: -webkit-center; white-space: normal; background-color: rgb(255, 255, 255);">
                    <img src="../../../static/picture/tb205x2avxxxxaxxxxxxxxxxxxx_!!1857068113.png" class="img-ks-lazyload" style="margin: 0px; padding: 0px; border: 0px; animation: ks-fadeIn 350ms linear 0ms 1 normal both; opacity: 1; vertical-align: top; display: block;" />
                </a>
                <img src="../../../static/picture/tb2vd3zrbtlpufjsspfxxxlupxa_!!1857068113.jpg" class="img-ks-lazyload" style="margin: 0px; padding: 0px; border: 0px; animation: ks-fadeIn 350ms linear 0ms 1 normal both; opacity: 1; vertical-align: top; color: rgb(64, 64, 64); font-family: tahoma, arial, 宋体, sans-serif; font-size: 14px; line-height: 21px; text-align: -webkit-center; white-space: normal; background-color: rgb(255, 255, 255);" />
                <img src="../../../static/picture/tb2s1o4rhxkpufjy0fixxbuffxa_!!1857068113.jpg" class="img-ks-lazyload" style="margin: 0px; padding: 0px; border: 0px; animation: ks-fadeIn 350ms linear 0ms 1 normal both; opacity: 1; vertical-align: top; color: rgb(64, 64, 64); font-family: tahoma, arial, 宋体, sans-serif; font-size: 14px; line-height: 21px; text-align: -webkit-center; white-space: normal; background-color: rgb(255, 255, 255);" />
                <img src="../../../static/picture/tb2aiywunxmpufjszfnxxxrrxxa_!!1857068113.jpg" class="img-ks-lazyload" style="margin: 0px; padding: 0px; border: 0px; animation: ks-fadeIn 350ms linear 0ms 1 normal both; opacity: 1; vertical-align: top; color: rgb(64, 64, 64); font-family: tahoma, arial, 宋体, sans-serif; font-size: 14px; line-height: 21px; text-align: -webkit-center; white-space: normal; background-color: rgb(255, 255, 255);" />
                <img src="../../../static/picture/tb2kfgorhxlpufjssphxxbjoxxa_!!1857068113.jpg" class="img-ks-lazyload" style="margin: 0px; padding: 0px; border: 0px; animation: ks-fadeIn 350ms linear 0ms 1 normal both; opacity: 1; vertical-align: top; color: rgb(64, 64, 64); font-family: tahoma, arial, 宋体, sans-serif; font-size: 14px; line-height: 21px; text-align: -webkit-center; white-space: normal; background-color: rgb(255, 255, 255);" />
                <img src="../../../static/picture/tb21lsnuh4npufjszfmxxxl4fxa_!!1857068113.jpg" class="img-ks-lazyload" style="margin: 0px; padding: 0px; border: 0px; animation: ks-fadeIn 350ms linear 0ms 1 normal both; opacity: 1; vertical-align: top; color: rgb(64, 64, 64); font-family: tahoma, arial, 宋体, sans-serif; font-size: 14px; line-height: 21px; text-align: -webkit-center; white-space: normal; background-color: rgb(255, 255, 255);" />
                <img src="../../../static/picture/tb2ibmiuhbmpufjszfuxxag_xxa_!!1857068113.jpg" class="img-ks-lazyload" style="margin: 0px; padding: 0px; border: 0px; animation: ks-fadeIn 350ms linear 0ms 1 normal both; opacity: 1; vertical-align: top; color: rgb(64, 64, 64); font-family: tahoma, arial, 宋体, sans-serif; font-size: 14px; line-height: 21px; text-align: -webkit-center; white-space: normal; background-color: rgb(255, 255, 255);" />
                <a href="https://favorite.taobao.com/popup/add_collection.htm?spm=a1z10.1-b-s.w7566866-14552158213.1.dCZ1Zg&id=106858909&itemid=106858909&itemtype=0&ownerid=d6897baa34b6b782dad74a9ded95cdc3&itemtype=0&scjjc=2&ownerid=&_tb_token_=X8a3fiVaiec0bh&scene=taobao_shop"
				  target="_blank" style="margin: 0px; padding: 0px; text-decoration: none; color: rgb(51, 85, 170); outline: 0px; font-family: tahoma, arial, 宋体, sans-serif; font-size: 14px; line-height: 21px; text-align: -webkit-center; white-space: normal; background-color: rgb(255, 255, 255);">
                    <img src="../../../static/picture/tb2gph2avxxxxatxxxxxxxxxxxx_!!1857068113.png" class="img-ks-lazyload" style="margin: 0px; padding: 0px; border: 0px; animation: ks-fadeIn 350ms linear 0ms 1 normal both; opacity: 1; vertical-align: top; display: block;" />
                </a>
                <img src="../../../static/picture/tb2j9udu.lnpufjszfjxxxtavxa_!!1857068113.jpg" class="img-ks-lazyload" style="margin: 0px; padding: 0px; border: 0px; animation: ks-fadeIn 350ms linear 0ms 1 normal both; opacity: 1; vertical-align: top; color: rgb(64, 64, 64); font-family: tahoma, arial, 宋体, sans-serif; font-size: 14px; line-height: 21px; text-align: -webkit-center; white-space: normal; background-color: rgb(255, 255, 255);" />
                <img src="../../../static/picture/tb2x4kvu5pnpufjszfixxxh2vxa_!!1857068113.jpg" class="img-ks-lazyload" style="margin: 0px; padding: 0px; border: 0px; animation: ks-fadeIn 350ms linear 0ms 1 normal both; opacity: 1; vertical-align: top; color: rgb(64, 64, 64); font-family: tahoma, arial, 宋体, sans-serif; font-size: 14px; line-height: 21px; text-align: -webkit-center; white-space: normal; background-color: rgb(255, 255, 255);" />
            </p>
			<p>
                <br />
            </p>
		</div>
	</div>
	<!-- 商品属性 -->
	<div class="detail_info_wrap p-attribute" id="p-attribute" style="display:none;">
		<ul class="attribute-ul">
			<li>
				<em>风格：</em>
				<span id="goods_attr_" title="" class="goods-attr-value"></span>
			</li>
			<li>
				<em>裙长：</em>
				<span id="goods_attr_" title="短款,中款,长款" class="goods-attr-value">短款,中款,长款</span>
			</li>
			<li>
				<em>款式：</em>
				<span id="goods_attr_" title="韩版,休闲,欧美" class="goods-attr-value">韩版,休闲,欧美</span>
			</li>
		</ul>
	</div>
	<!-- 商品评论 -->
	<div class="comment-type" id="productproperty" style="display:none;">
		<ul class="tab-nav">
			<li class="productproperty-list current" data-type="0">全部<em>(0)</em></li>
			<li class="productproperty-list" data-type="4">图片 <em>(0)</em></li>
			<li class="productproperty-list" data-type="1">好评 <em>(0)</em></li>
			<li class="productproperty-list" data-type="2">中评 <em>(0)</em></li>
			<li class="productproperty-list" data-type="3"> 差评 <em>(0)</em></li>
		</ul>
		<!-- 评论展示 -->
		<div id="comment_content">
			<div class="comment-con"></div>
		</div>
	</div>
	<style>
		.footer {
			margin: 0 0 45px 0;
			padding: 0;
			min-height: 1px;
			text-align: center;
			line-height: 16px;
			background-color: #f8f8f8;
		}

		.ft-copyright {
			padding: 50px 0 20px;
			margin: 0 15px;
			font-size: 12px;
			background: url("../../../static/images/logo_copy.png")
				no-repeat center 15px;
			background-size: 110px 30px;
		}

		.ft-copyright a {
			padding-top: 45px;
			color: #ccc;
		}
	</style>
	<div class="footer" style="min-height: 86px;">
		<div class="copyright">
			<div class="ft-copyright">
				<a href="javascript:;" target="_blank">六星开源商城提供技术支持</a>
			</div>
		</div>
	</div>
	<!-- 弹出框 -->
	<div class="success-tip-line" id="success_tip_line" style="display: none;">成功加入购物车！</div>
	<div class="mask" id="mask" style="display: none;"></div>
	<span id="addcart_way" style="display: none;"><i></i></span>
	<section class="s-buy" id="s_buy">
		<div class="popup" id="popup" style="-webkit-border-radius:3px;-moz-border-radius:3px;-o-border-radius:3px;border-radius:3px;display: none"></div>
		<ul class="s-buy-ul">
			<li class="s-buy-pro">
				<span class="pro-img">
					<input type="hidden" id="default_img" value="1827" />
					<img src="../../../static/picture/1500547407503.jpg">
				</span>
				<div class="pro-info">
					<p class="name">印花显瘦A字碎花真丝连衣裙女夏季2017新款欧洲站气质裙子女装潮</p>
					<p class="pro-price" id="price">
						￥359 </p>
				</div>
				<i class="icon-close" id="icon_close"></i>
			</li>
		</ul>
		<hr class="with-margin-l" />
		<ul class="s-buy-ul specification" id="specification">
			<input type="hidden" id="goods_sku0" value="" stock="999" price="359" promotion_price="359.00" member_price="359" skuid="1479" skuname="" class="sku-array">
			<input type="hidden" id="goods_sku_num" value="100">
			<li class="s-buy-li">
				<div class="left" style="float:left;">购买数量：</div>
				<div class="right">
					<span class="reduce quantity-minus-disabled">-</span>
					<input class="number" name="quantity" autocomplete="off" value="1" min="1" max="755" id="num" />
					<span class="add">+</span>
				</div>
				<span style="display: inline-block;margin-top:5px;color:#333;" id="Stock">剩余755件</span>
			</li>
		</ul>
		<ul class="s-buy-ul">
			<li class="s-buy-btn">
				<a class="btn" id="submit_ok" tag="buyBtn1">确定</a>
				<input id="hiddPDetailID" type="hidden" value="380" />
				<input id="hiddSkuId" type="hidden" />
				<input id="hiddSkuName" type="hidden" />
				<input id="hiddSkuprice" type="hidden" />
				<input id="hiddStock" type="hidden" value="755" />
				<input type="hidden" id="hidden_shop_name" value="官方直营店" />
				<input type="hidden" id="hidden_shop_id" value="0" />
				<input type="hidden" id="is_sale" value="1" />
				<input type="hidden" id="goods_id" value="380" />
				<input type="hidden" id="code" value="" />
				<input type="hidden" id="max_buy" value="0" />
				<input type="hidden" id="hidden_current_num" value="1" />
			</li>
		</ul>
	</section>
	<script type="text/javascript">
		$(function() {
			countDown(); //计时器
			//分享
			$.ajax({
				type: "post",
				data: {
					"shop_id": "0",
					"flag": "goods",
					"goods_id": "380"
				},
				url: "http://tp.23673.com/wap/goods/getShareContents",
				success: function(data) {
					wx.config({
						debug: false, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
						appId: $("#appId").val(), // 必填，公众号的唯一标识
						timestamp: $("#jsTimesTamp").val(), // 必填，生成签名的时间戳
						nonceStr: $("#jsNonceStr").val(), // 必填，生成签名的随机串
						signature: $("#jsSignature").val(), // 必填，签名，见附录1
						jsApiList: ['onMenuShareTimeline', 'onMenuShareAppMessage', 'onMenuShareQQ', 'onMenuShareWeibo'] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
					});

					wx.ready(function() {

						var title = data['share_title'];
						var share_contents = data['share_contents'] + '\r\n';
						var share_nick_name = data['share_nick_name'] + '\r\n';
						var desc2 = share_contents + share_nick_name + "收藏热度：★★★★★";
						var url = data['share_url'];
						var img_url = data['share_img'];
						wx.onMenuShareAppMessage({
							title: title,
							desc: desc2,
							link: url,
							imgUrl: img_url,
							trigger: function(res) {
								//alert('用户点击发送给朋友');
							},
							success: function(res) {
								//alert('已分享');
								$.ajax({
									type: "post",
									url: "http://tp.23673.com/wap/index/sharegivepoint",
									data: {
										"share": true
									},
									success: function(data) {

									}
								});
							},
							cancel: function(res) {
								//alert('已取消');
							},
							fail: function(res) {
								//alert(JSON.stringify(res));
							}
						});

						// 2.2 监听“分享到朋友圈”按钮点击、自定义分享内容及分享结果接口
						wx.onMenuShareTimeline({
							title: title,
							link: url,
							imgUrl: img_url,
							trigger: function(res) {
								// alert('用户点击分享到朋友圈');
							},
							success: function(res) {
								//alert('已分享');
								$.ajax({
									type: "post",
									url: "http://tp.23673.com/wap/index/sharegivepoint",
									data: {
										"share": true
									},
									success: function(data) {

									}
								});
							},
							cancel: function(res) {
								//alert('已取消');
							},
							fail: function(res) {
								// alert(JSON.stringify(res));
							}
						});

						// 2.3 监听“分享到QQ”按钮点击、自定义分享内容及分享结果接口
						wx.onMenuShareQQ({
							title: title,
							desc: desc2,
							link: url,
							imgUrl: img_url,
							trigger: function(res) {
								//alert('用户点击分享到QQ');
							},
							complete: function(res) {
								//alert(JSON.stringify(res));
							},
							success: function(res) {
								//alert('已分享');
								$.ajax({
									type: "post",
									url: "http://tp.23673.com/wap/index/sharegivepoint",
									data: {
										"share": true
									},
									success: function(data) {

									}
								});
							},
							cancel: function(res) {
								//alert('已取消');
							},
							fail: function(res) {
								//alert(JSON.stringify(res));
							}
						});

						// 2.4 监听“分享到微博”按钮点击、自定义分享内容及分享结果接口
						wx.onMenuShareWeibo({
							title: title,
							desc: desc2,
							link: url,
							imgUrl: img_url,
							trigger: function(res) {
								//alert('用户点击分享到微博');
							},
							complete: function(res) {
								//alert(JSON.stringify(res));
							},
							success: function(res) {
								//alert('已分享');
								$.ajax({
									type: "post",
									url: "http://tp.23673.com/wap/index/sharegivepoint",
									data: {
										"share": true
									},
									success: function(data) {

									}
								});
							},
							cancel: function(res) {
								//alert('已取消');
							},
							fail: function(res) {
								//alert(JSON.stringify(res));
							}
						});
					});
				}
			});
		});
		//商品评价
		$(".comment-type li").click(function() {
			var type = $(this).data("type");
			var target = $(this);
			$(".comment-type").find("li").removeClass("current");
			$(".comment-type").find("i").removeClass("cur");
			$(target).addClass("current");
			$(target).children().addClass("cur");
			GetDataList();
		})
		function showProperty(sobj, type) {
			$("#detailTab span").removeClass("cur");
			$(sobj).addClass("cur");
			if (type == 1) {
				$("#productproperty").hide();
				$("#p-detail").show();
				$("#p-attribute").hide();
			} else if (type == 2) {
				$("#productproperty").hide();
				$("#p-detail").hide();
				$("#p-attribute").show();
			} else {
				$("#productproperty").show();
				$("#p-detail").hide();
				$("#p-attribute").hide();
				GetDataList();
			}
		}
		/**
		 * 分页显示
		 * @param {Object} pageindex
		 */
		function GetDataList() {
			var commentsType = $(".comment-type li.current").attr('data-type');
			$.ajax({
				type: "post",
				url: "http://tp.23673.com/wap/Goods/getGoodsComments",
				data: {
					'comments_type': commentsType,
					"goods_id": $("#goods_id").val()
				},
				dataType: 'json',
				success: function(data) {
					var listhtml = '';
					if (data['data'].length == 0) {
						$('.comment-con').html('<div class="tip-box"><i class="tip-icon"></i><div class="tip-text">还没有任何评价哦</div></div>');
						$('#pagination').hide();
						return false;
					}
					for (var i = 0; i < data['data'].length; i++) {
						var dataitem = data['data'][i];
						var member_name = dataitem['member_name'];
						member_name = dataitem['is_anonymous'] == 1 ? member_name.replace(member_name.substring(1, member_name.length), '***') + '(匿名)' : member_name;
						listhtml += ' <div class="tablelist" style="border-bottom: 1px solid #e5e5e5;margin-bottom: 10px;">' +
							'<div class="user_info" style="margin-right:10px;">' +
							'<div class="face"><img src="../../../static/picture/default_user_portrait_0.png" style="width:35px;border-radius: 50%;"/></div>' +
							'<div class="name-box">' + member_name + '</div>' +
							'</div>' +
							'<dl>' +
							'<dd>' + dataitem['content'] + '</dd>'
						if (dataitem['image'] != '') {
							var imgs_arr = dataitem['image'].split(',');
							listhtml += '<dd style="margin:5px 0;">'
							for (var key in imgs_arr) {
								listhtml += '<img src="../../../static/picture/34cd7b9f3c934ca883ac81de52f48f3e.gif' + imgs_arr[key] + '" alt="" style="max-width:100%"/>';
							}
							listhtml += '</dd>';
							listhtml += '<dd class="photo-viewer"></dd>'
						}
						listhtml += '<div class="date"><span>' + dataitem['addtime'] + '</span> <span></span></div>';
						listhtml += '</dl>';
						if (dataitem['again_content'] != '') {

							listhtml += '<div style="margin-left:-1px;float:right;margin-top: 9px;width:75%;">追加评价：</div>' +
								'<dl>' +
								'<div style="width: 26%;margin-right: 10px;height:auto;float: left;"></div>' +
								'<dd>' + dataitem['again_content'] + '</dd>'
							if (dataitem['again_image'] != '') {
								var imgs_arr = dataitem['again_image'].split(',');
								listhtml += '<dd>'
								for (var key in imgs_arr) {
									listhtml += '<img src="../../../static/picture/34cd7b9f3c934ca883ac81de52f48f3e.gif' + imgs_arr[key] + '" alt="" />';
								}
								listhtml += '</dd>';
							}
							listhtml += '<div class="date"><span>' + dataitem['again_addtime'] + '</span> <span></span></div>';
							listhtml += '</dl>';
						}
						listhtml += '</div>';
					}
					$(".comment-con").html(listhtml);
				}
			});
		}
	</script>
	<script language="javascript" src="../../../static/js/jweixin-1.0.0.js"> </script>
	<input type="hidden" id="appId" value="">
	<input type="hidden" id="jsTimesTamp" value="">
	<input type="hidden" id="jsNonceStr" value="">
	<input type="hidden" id="jsSignature" value="">
	<div class="js-bottom-opts bottom-fix">
		<div class="responsive-wrapper">
			<a id="global-cart" href="http://tp.23673.com/wap/goods/cart?shop_id=0" class="new-btn buy-cart buy-cart-msg ">
				<i class="iconfont icon-shopping-cart"></i>
				<span class="desc">购物车</span>
			</a>
			<div class="big-btn-2-1">
				<a href="javascript:;" class="big-btn orange-btn" id="addCart">加入购物车</a>
				<a href="javascript:;" class="big-btn red-btn" id="buyBtn1">立即购买</a>
			</div>
		</div>
	</div>
	<div class="btn_wrap btn_wrap_static btn_wrap_nocart no-server js-shelves">
		<div class="product-status">该商品已下架</div>
	</div>
	<input type="hidden" value="293" id="uid" />
	<!-- 加载弹出层 -->
	<div class="mask-layer-loading">
		<img src="../../../static/picture/mask_load.gif" />
	</div>
</body>
</html>
