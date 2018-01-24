//v3-b11
$(function(){
	var vd_id = getQueryString('video_id');
	
	if (vd_id=='') {
    	window.location.href = WapSiteUrl + '/index.html';
    	return;
	}
	else {
		$.ajax({
			url:ApiUrl+"/index.php?act=video&op=video_list",
			type:'get',
			data:{vd_id:vd_id},
			jsonp:'callback',
			dataType:'jsonp',
			success:function(result){
				var data = result.datas;
				var html="";
				$.each(data,function(k,v){
					if(k=="video_type_name"){
						$("title").html(v);
					}else if(k=="video_list"){
						html=template.render(k, v);
						$("#video_show").html(html);
					}else if(k=="video_class"){
						html=template.render(k, v);
						$("#video_class_show").html(html);
					}
				});
				
				
			}
		});
	}	
});