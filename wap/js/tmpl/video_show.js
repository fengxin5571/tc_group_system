//v3-b11
$(function(){
	var vd_id = getQueryString('video_id')
	
	if (vd_id=='') {
    	window.location.href = WapSiteUrl + '/index.html';
    	return;
	}
	else {
		$.ajax({
			url:ApiUrl+"/index.php?act=video&op=video_show",
			type:'get',
			data:{video_id:vd_id},
			jsonp:'callback',
			dataType:'jsonp',
			success:function(result){			    
				var data = result.datas;				
				$.each(data,function(k,v){
					if(k=="video"){
						var html = template.render('video', v);
						$("#video_show").html(html);
						$("title").html(v.video_title);
					}else if(k=="xg"){
						var html = template.render('video_list', v);
						$("#video_xg_show").html(html);
					}
				});
				
			}
		});
	}	
});