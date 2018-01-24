/**
 * all shop v3
 */

var sc_id = GetQueryString('sc_id');
var hasMore = true;
var footer = false;
var reset = true;

$(function() {
	function t(){
		if (reset) {
            curpage = 1;
            hasMore = true
        }
        $(".loading").remove();
        if (!hasMore) {
            return false
        }
        hasMore = false;
	
	    $.ajax({
	        url:ApiUrl+"/index.php?act=shop" + "&curpage=" + curpage,
	        data:{sc_id : sc_id},
	        type:'get',
	        jsonp:'callback',
	        dataType:'jsonp',
	        success:function(e){
	            //var data = result.datas;
	        	
	        	curpage++;
                hasMore = e.hasmore;
                if (!hasMore) {
                    get_footer()
                }
                if (e.datas.store_list.length <= 0) {
                    $("#footer").addClass("posa")
                } else {
                    $("#footer").removeClass("posa")
                }
	        	
                var data = e;
	            data.WapSiteUrl = WapSiteUrl;
	            var html = template.render('category-one', data);
	            //$("#categroy-cnt").html(html);
	            if (reset) {
                    reset = false;
                    $("#categroy-cnt").html(html)
                } else {
                    $("#categroy-cnt").append(html)
                }
	        }
	    });
	}
    
    t();
    $(window).scroll(function() {
        if ($(window).scrollTop() + $(window).height() > $(document).height() - 1) {
            t()
        }
    })
});

function get_footer() {
    if (!footer) {
        footer = true;
        $.ajax({
            url: WapSiteUrl + "/js/tmpl/footer.js",
            dataType: "script"
        })
    }
}

function GetQueryString(name) {  
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");  
    var r = window.location.search.substr(1).match(reg);  //获取url中"?"符后的字符串并正则匹配
    var context = "";  
    if (r != null)  
         context = r[2];  
    reg = null;  
    r = null;  
    return context == null || context == "" || context == "undefined" ? 0 : context;  
}