<?php
/**
 * 入口
 *
 *
 *
 * by 太常系统 www.sxtaichang.com
 */
$site_url = strtolower('http://'.$_SERVER['HTTP_HOST'].substr($_SERVER['PHP_SELF'], 0, strrpos($_SERVER['PHP_SELF'], '/index.php')).'/cms/index.php');
//@header('Location: '.$site_url);
include('cms/index.php');

