//v3-b11
$(function(){
	var article_id = getQueryString('article_id');

	if (article_id=='') {
    	window.location.href = WapSiteUrl + '/index.html';
    	return;
	}
	else {
		$.ajax({
			url:ApiUrl+"/index.php?act=article&op=article_show_wap",
			type:'get',
			data:{article_id:article_id},
			jsonp:'callback',
			dataType:'jsonp',
			success:function(result){
				var data = result.datas;
				$("title").html(data.article_title);
				var html = template.render('article', data);
				$("#article_show").html(html);
				$(".article_con_zn").html(data.article_content);
			}
		});
	}	
});