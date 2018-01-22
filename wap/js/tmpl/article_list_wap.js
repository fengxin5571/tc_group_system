//v3-b11
$(function(){
	var ac_id = getQueryString('article_id');
	if (ac_id=='') {
    	window.location.href = WapSiteUrl + '/index.html';
    	return;
	}
	else {
		$.ajax({
			url:ApiUrl+"/index.php?act=article&op=article_list_wap",
			type:'get',
			data:{ac_id:ac_id},
			jsonp:'callback',
			dataType:'jsonp',
			success:function(result){
				var data = result.datas;
				var html="";
				$.each(data,function(k,v){
					if(k=="article_type_name"){
						$("title").html(v);
					}else if(k=="article_list"){
						html=template.render(k, v);		
						$("#article_list_show").html(html);
					}else if(k=="article_class"){
						html=template.render(k,v);
						$("#article_class_show").html(html);
						$.each(v.a_class,function(kk,vv){
							if(ac_id==vv.ac_id){
								$("#nav_"+vv.ac_id).addClass("color_zn");
							}
						});
					}
				});
							
			}
		});
	}	
});