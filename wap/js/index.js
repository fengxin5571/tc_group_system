$(function() {

    var headerClone = $('#header').clone();
    $(window).scroll(function(){
        if ($(window).scrollTop() <= $('#main-container1').height()) {
            headerClone = $('#header').clone();
            $('#header').remove();
            headerClone.addClass('transparent').removeClass('');
            headerClone.prependTo('.nctouch-home-top');
        } else {
            headerClone = $('#header').clone();
            $('#header').remove();
            headerClone.addClass('').removeClass('transparent');
            headerClone.prependTo('body');
        }
    });
    $.ajax({
        url: ApiUrl + "/index.php?act=index",
        type: 'get',
        dataType: 'json',
        success: function(result) {
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
                    	
                    	if(kk=="nav_list"){//绑定到导航数据
                    		 $("#nav_index").html(template.render(kk, vv));
                    	}else{
                    		 html += template.render(kk, vv);
                    	}
                    	
                       
                    }
                    return false;
                });
            });
            
            $("#main-container2").html(html);

            $('.adv_list').each(function() {
                if ($(this).find('.item').length < 2) {
                    return;
                }

                Swipe(this, {
                    startSlide: 2,
                    speed: 400,
                    auto: 3000,
                    continuous: true,
                    disableScroll: false,
                    stopPropagation: false,
                    callback: function(index, elem) {},
                    transitionEnd: function(index, elem) {}
                });
            });

        }
    });

});

//v4 返利
var uid = window.location.href.split("#V3");
var  fragment = uid[1];
if(fragment){
	if (fragment.indexOf("V3") == 0) {document.cookie='uid=0';}
		else {document.cookie='uid='+uid[1];}
	}