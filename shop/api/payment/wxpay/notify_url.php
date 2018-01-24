<?php
/**
 * 接收微信支付异步通知回调地址
 *
 * v3-b12
 *
 * by 太常系统 www.sxtaichang.com
 */
error_reporting(7);
$_GET['act']	= 'payment';
$_GET['op']		= 'wxpay_notify';
require_once(dirname(__FILE__).'/../../../index.php');
