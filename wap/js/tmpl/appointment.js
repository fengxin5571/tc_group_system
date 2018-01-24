$(function(){	
	$.ajax({
		url:ApiUrl+"/index.php?act=appointment",
		type:'get',
		jsonp:'callback',
		dataType:'jsonp',
		success:function(result){
			var data = result.datas;
			var html = template.render('appointment', data);				
			$("#appointment_show").html(html);
		}
	}); 

});
