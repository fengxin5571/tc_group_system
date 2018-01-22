<?php defined('InShopNC') or exit('Access Invalid!');?>
<?php 
if($output['goods_common_info']['mobile_body']&&is_array($output['goods_common_info']['mobile_body'])){
	foreach($output['goods_common_info']['mobile_body'] as $mobile){
		if($mobile[type]=="text"){
			echo $mobile[value];
		}elseif($mobile[type]=="image"){
			echo '<img src="'.$mobile[value].'"/>';
		}
		
	}
}
?>
