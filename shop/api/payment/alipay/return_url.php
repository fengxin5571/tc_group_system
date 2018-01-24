<?php
/**
 * 支付宝返回地址
 *
 * 
 * by 太常系统 www.sxtaichang.com
 */
$_GET['act']	= 'payment';
$_GET['op']		= 'return';
$_GET['payment_code'] = 'alipay';
require_once(dirname(__FILE__).'/../../../index.php');
?>