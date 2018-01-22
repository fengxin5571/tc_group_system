$(function(){
    var special_id = 3
    loadSpecial(special_id);
})

function loadSpecial(special_id){
    $.ajax({
        url: ApiUrl + "/index.php?act=index&op=special&special_id=" + special_id,
        type: 'get',
        dataType: 'json',
        success: function(result) {
            $('title,h1').html(result.datas.special_desc);
            var data = result.datas;
            var html = '';
            $.each(data, function(k, v) {
                $.each(v, function(kk, vv) {
                    switch (kk) {
                        case 'adv_list':
                        case 'home3':
                            $.each(vv.item, function(k3, v3) {
                                vv.item[k3].url = buildUrl(v3.type, v3.data);
                            });
                            break;

                        case 'home1':
                            vv.url = buildUrl(vv.type, vv.data);
                            break;

                        case 'home2':
                        case 'home4':
                            vv.square_url = buildUrl(vv.square_type, vv.square_data);
                            vv.rectangle1_url = buildUrl(vv.rectangle1_type, vv.rectangle1_data);
                            vv.rectangle2_url = buildUrl(vv.rectangle2_type, vv.rectangle2_data);
                            break;
                        case 'nav_list':
                        	$.each(vv.nav,function(k3,v3){
                        	if(v3.nav_id==30||v3.nav_id==31){
                        		vv.nav[k3].nav_url=WapSiteUrl+"/index.html";
                        	}
                        	  if(v3.nav_type==2){//如果是文章类型导航
                        		  vv.nav[k3].nav_url=buildUrl(v3.nav_type,v3.item_id);
                        	  }else if(v3.nav_type==4){//视频类型导航
                        		  vv.nav[k3].nav_url=buildUrl(v3.nav_type,v3.item_id);
                        	  }
                        	});
                            break;
                    }
                    if (k == 0) {
                        $("#main-container1").html(template.render(kk, vv));
                     } else {
                          alert
	                       if(kk=="nav_list"){//绑定到导航数据
	                  		 $("#nav_index").html(template.render(kk, vv));
	                  	}else if(kk=="article_list"){
	                  		$("#group_news").html(template.render(kk, vv));
	                  	}else if(kk=="home1"){
	                  		var html=$("#join_us").html();
	                  		html+=template.render(kk, vv);
	                  		$("#join_us").html(html);
	                  	}else if(kk="rec_list"){
	                  		console.log(vv.rec[0]);
	                  		 $("#rec").html(template.render(kk, vv));
                        }else{
	                  		 html += template.render(kk, vv);
	                  	}
                     }
                    return false;
                });
            });
            
            $("#main-container").html(html);

            $('.swiper-container').each(function() {
                if ($(this).find('.swiper-slide').length < 2) {
                    return;
                }
                var swiper=new Swiper('.swiper-container',{
                    pagination:'.swiper-pagination',
                    slidersPerView:1,
                    paginationClickable:true,
                    loop:true,
                    autoplay:3000,
                    autoplayDisableOnInteraction:false
                })
                
            });

        }
    });

}
