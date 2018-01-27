  var screen_max = 6;//大图数
  var focus_max = 5;//小图组数
  var pic_max = 4;//组内小图数
  var screen_obj = {};
  var ap_obj = {};
  var upload_obj = {};
  var focus_obj = {};
  var focus_ap_obj = {};
  var focus_upload_obj = {};
  var focus_group_obj={};
$(function(){
    $('#screen_color').colorpicker({showOn:'both'});//初始化切换大图背景颜色控件
    $('#screen_color').parent().css("width",'');
    $('#screen_color').parent().addClass("color");
    $('#ap_color').colorpicker({showOn:'both'});//初始化广告位背景颜色控件
    $('#ap_color').parent().css("width",'');
    $('#ap_color').parent().addClass("color");
	$(".type-file-file").change(function() {//初始化图片上传控件
		$(this).prevAll(".type-file-text").val($(this).val());
	});
	$("#homepageFocusTab .tab-menu li").click(function() {//切换
	    var pic_form = $(this).attr("form");
	    $('form').hide();
	    $("#homepageFocusTab li").removeClass("current");
	    $('#'+pic_form).show();
	    $(this).addClass("current");
	});
	screen_obj = $("#upload_screen_form");//初始化焦点大图区数据
	index_screen_obj = $("#upload_screen_form_index");//初始化焦点大图区数据
	focus_group_obj=$("#upload_join_form");//初始化集团首页加入我们数据
	
    ap_obj = $("#ap_screen");
    upload_obj = $("#upload_screen");
	screen_obj.find("ul").sortable({ items: 'li' });
	$("#ap_id_screen").append(screen_adv_append);

	focus_obj = $("#upload_focus_form");//初始化三张联动区数据
	focus_obj.find(".focus-trigeminy").sortable({ items: 'div[focus_id]' });
	focus_obj.find("ul").sortable({ items: 'li' });
	$("#ap_id_focus").append(focus_adv_append);
    focus_ap_obj = $("#ap_focus");
    focus_upload_obj = $("#upload_focus");
});

//焦点区切换大图上传
function add_screen(add_type) {//增加图片
	for (var i = 1; i <= screen_max; i++) {//防止数组下标重复
		if (screen_obj.find("li[screen_id='"+i+"']").size()==0) {//编号不存在时添加
    	    var text_input = '';
    	    var text_type = '图片调用';
    	    var ap = 0;
    	    text_input += '<input name="screen_list['+i+'][pic_id]" value="'+i+'" type="hidden">';
    	    text_input += '<input name="screen_list['+i+'][pic_name]" value="" type="hidden">';
    	    if(add_type == 'adv') {
    	        ap = 1;
    	        text_type = '广告调用';
    	        text_input += '<input name="screen_list['+i+'][ap_id]" value="" type="hidden">';
    	    } else {
    	        text_input += '<input name="screen_list['+i+'][pic_url]" value="" type="hidden">';
    	    }
    	    text_input += '<input name="screen_list['+i+'][color]" value="" type="hidden">';
    	    text_input += '<input name="screen_list['+i+'][pic_img]" value="" type="hidden">';
			var add_html = '';
			add_html = '<li ap="'+ap+'" screen_id="'+i+'" title="可上下拖拽更改显示顺序">'+text_type+
			'<a class="del" href="JavaScript:del_screen('+i+
			');" title="删除">X</a><div class="focus-thumb" onclick="select_screen('+i+');" title="点击编辑选中区域内容"><img src="" /></div>'+text_input+'</li>';
			screen_obj.find("ul").append(add_html);
			select_screen(i);
			break;
		}
    }
}
//焦点区切换大图上传
function add_index_screen(add_type) {//增加图片
	for (var i = 1; i <= screen_max; i++) {//防止数组下标重复
		if (index_screen_obj.find("li[screen_id='"+i+"']").size()==0) {//编号不存在时添加
    	    var text_input = '';
    	    var text_type = '图片调用';
    	    var ap = 0;
    	    text_input += '<input name="index_screen_list['+i+'][pic_id]" value="'+i+'" type="hidden">';
    	    text_input += '<input name="index_screen_list['+i+'][pic_name]" value="" type="hidden">';
    	    if(add_type == 'adv') {
    	        ap = 1;
    	        text_type = '广告调用';
    	        text_input += '<input name="index_screen_list['+i+'][ap_id]" value="" type="hidden">';
    	    } else {
    	        text_input += '<input name="index_screen_list['+i+'][pic_url]" value="" type="hidden">';
    	    }
    	    text_input += '<input name="index_screen_list['+i+'][color]" value="" type="hidden">';
    	    text_input += '<input name="index_screen_list['+i+'][pic_img]" value="" type="hidden">';
			var add_html = '';
			add_html = '<li ap="'+ap+'" screen_id="'+i+'" title="可上下拖拽更改显示顺序">'+text_type+
			'<a class="del" href="JavaScript:del_index_screen('+i+
			');" title="删除">X</a><div class="focus-thumb" onclick="select_index_screen('+i+');" title="点击编辑选中区域内容"><img src="" /></div>'+text_input+'</li>';
			index_screen_obj.find("ul").append(add_html);
			select_index_screen(i);
			break;
		}
    }
}
//集团首页加入我们展示上传
function add_group_screen(add_type){
	for (var i = 1; i <= screen_max; i++) {//防止数组下标重复
		if (focus_group_obj.find("li[screen_id='"+i+"']").size()==0) {//编号不存在时添加
    	    var text_input = '';
    	    var text_type = '图片调用';
    	    var ap = 0;
    	    text_input += '<input name="index_screen_list['+i+'][pic_id]" value="'+i+'" type="hidden">';
    	    text_input += '<input name="index_screen_list['+i+'][pic_name]" value="" type="hidden">';
    	    if(add_type == 'adv') {
    	        ap = 1;
    	        text_type = '广告调用';
    	        text_input += '<input name="index_screen_list['+i+'][ap_id]" value="" type="hidden">';
    	    } else {
    	        text_input += '<input name="index_screen_list['+i+'][pic_url]" value="" type="hidden">';
    	    }
    	    text_input += '<input name="index_screen_list['+i+'][color]" value="" type="hidden">';
    	    text_input += '<input name="index_screen_list['+i+'][pic_img]" value="" type="hidden">';
			var add_html = '';
			add_html = '<li ap="'+ap+'" screen_id="'+i+'" title="可上下拖拽更改显示顺序">'+text_type+
			'<a class="del" href="JavaScript:del_group_screen('+i+
			');" title="删除">X</a><div class="focus-thumb" onclick="select_group_screen('+i+');" title="点击编辑选中区域内容"><img src="" /></div>'+text_input+'</li>';
			focus_group_obj.find("ul").append(add_html);
			select_group_screen(i);
			break;
		}
    }
    
}
//集团加入我们选中图片
function select_group_screen(pic_id) {//选中图片
    var obj = focus_group_obj.find("li[screen_id='"+pic_id+"']");
    var ap = obj.attr("ap");
    focus_group_obj.find("li").removeClass("selected");
    focus_group_obj.find("input[name='key']").val(pic_id);
    obj.addClass("selected");
    if(ap == '1') {
    	$('#upload_screen_index').hide();
    	index_screen_obj.find("input[name='ap_pic_id']").val(pic_id);
        var a_id = obj.find("input[name='screen_list["+pic_id+"][ap_id]']").val();
        if(a_id == '') {//未选择广告位时用默认的
            $("#ap_id_screen").trigger("onchange");
        } else {
            var color = obj.find("input[name='screen_list["+pic_id+"][color]']").val();
            $("#ap_id_screen").val(a_id);
            $("#ap_color").val(color);
            $("#ap_screen_group").find('.evo-pointer').css("background-color",color);
        }
        $("#ap_screen_group").show();
    } else {
        $("#ap_screen_group").hide();
        var pic_name = obj.find("input[name='index_screen_list["+pic_id+"][pic_name]']").val();
        var pic_url = obj.find("input[name='index_screen_list["+pic_id+"][pic_url]']").val();
        var color = obj.find("input[name='index_screen_list["+pic_id+"][color]']").val();
        $("input[name='screen_id']").val(pic_id);
        $("input[name='screen_pic[pic_name]']").val(pic_name);
        $("input[name='screen_pic[pic_url]']").val(pic_url);
        $("input[name='screen_pic[color]']").val(color);
        $('#upload_screen_group').find(".type-file-file").val('');
        $('#upload_screen_group').find(".type-file-text").val('');
        $('#upload_screen_group').show();
        $('#upload_screen_group').find('.evo-pointer').css("background-color",color);
    }
}
//删除集团加入展示
function del_group_screen(pic_id) {//删除图片
    if (focus_group_obj.find("li").size()<2) {
         return;//保留一个
    }
    focus_group_obj.find("li[screen_id='"+pic_id+"']").remove();
	var slide_id = focus_group_obj.find("input[name='key']").val();
	if (pic_id==slide_id) {
		focus_group_obj.find("input[name='key']").val('');
    	ap_obj.hide();
    	$('#upload_screen_index').hide();
	}
}
//焦点区切换大图上传
function add_video_screen(add_type) {//增加图片
	for (var i = 1; i <= 3; i++) {//防止数组下标重复
		if (screen_obj.find("li[screen_id='"+i+"']").size()==0) {//编号不存在时添加
    	    var text_input = '';
    	    var text_type = '图片调用';
    	    var ap = 0;
    	    text_input += '<input name="screen_list['+i+'][pic_id]" value="'+i+'" type="hidden">';
    	    text_input += '<input name="screen_list['+i+'][pic_name]" value="" type="hidden">';
    	    if(add_type == 'adv') {
    	        ap = 1;
    	        text_type = '广告调用';
    	        text_input += '<input name="screen_list['+i+'][ap_id]" value="" type="hidden">';
    	    } else {
    	        text_input += '<input name="screen_list['+i+'][pic_url]" value="" type="hidden">';
    	    }
    	    text_input += '<input name="screen_list['+i+'][color]" value="" type="hidden">';
    	    text_input += '<input name="screen_list['+i+'][pic_img]" value="" type="hidden">';
			var add_html = '';
			add_html = '<li ap="'+ap+'" screen_id="'+i+'" title="可上下拖拽更改显示顺序">'+text_type+
			'<a class="del" href="JavaScript:del_screen('+i+
			');" title="删除">X</a><div class="focus-thumb" onclick="select_screen('+i+');" title="点击编辑选中区域内容"><img src="" /></div>'+text_input+'</li>';
			screen_obj.find("ul").append(add_html);
			select_screen(i);
			break;
		}
    }
}

function screen_pic(pic_id,pic_img) {//更新图片
	if (pic_img!='') {
	    var color = screen_obj.find("input[name='screen_pic[color]']").val();
	    var pic_name = screen_obj.find("input[name='screen_pic[pic_name]']").val();
	    var pic_url = screen_obj.find("input[name='screen_pic[pic_url]']").val();
	    var obj = screen_obj.find("li[screen_id='"+pic_id+"']");
	    obj.find("img").attr("src",UPLOAD_SITE_URL+'/'+pic_img);
	    obj.find("img").attr("title",pic_name);
        obj.find("input[name='screen_list["+pic_id+"][pic_name]']").val(pic_name);
        obj.find("input[name='screen_list["+pic_id+"][pic_url]']").val(pic_url);
        obj.find("input[name='screen_list["+pic_id+"][color]']").val(color);
        obj.find("input[name='screen_list["+pic_id+"][pic_img]']").val(pic_img);
	    obj.find("div").css("background-color",color);
	}
	screen_obj.find('.web-save-succ').show();
	setTimeout("screen_obj.find('.web-save-succ').hide()",2000);
}
function screen_index_pic(pic_id,pic_img) {//更新图片
	if (pic_img!='') {
	    var color = index_screen_obj.find("input[name='screen_pic[color]']").val();
	    var pic_name = index_screen_obj.find("input[name='screen_pic[pic_name]']").val();
	    var pic_url = index_screen_obj.find("input[name='screen_pic[pic_url]']").val();
	    var obj = index_screen_obj.find("li[screen_id='"+pic_id+"']");
	    obj.find("img").attr("src",UPLOAD_SITE_URL+'/'+pic_img);
	    obj.find("img").attr("title",pic_name);
        obj.find("input[name='index_screen_list["+pic_id+"][pic_name]']").val(pic_name);
        obj.find("input[name='index_screen_list["+pic_id+"][pic_url]']").val(pic_url);
        obj.find("input[name='index_screen_list["+pic_id+"][color]']").val(color);
        obj.find("input[name='index_screen_list["+pic_id+"][pic_img]']").val(pic_img);
	    obj.find("div").css("background-color",color);
	}
	index_screen_obj.find('.web-save-succ').show();
	setTimeout("screen_obj.find('.web-save-succ').hide()",2000);
}
function screen_group_pic(pic_id,pic_img){//更新集团加入我们图片
	if (pic_img!='') {
	    var color = focus_group_obj.find("input[name='screen_pic[color]']").val();
	    var pic_name = focus_group_obj.find("input[name='screen_pic[pic_name]']").val();
	    var pic_url = focus_group_obj.find("input[name='screen_pic[pic_url]']").val();
	    var obj = focus_group_obj.find("li[screen_id='"+pic_id+"']");
	    obj.find("img").attr("src",UPLOAD_SITE_URL+'/'+pic_img);
	    obj.find("img").attr("title",pic_name);
        obj.find("input[name='index_screen_list["+pic_id+"][pic_name]']").val(pic_name);
        obj.find("input[name='index_screen_list["+pic_id+"][pic_url]']").val(pic_url);
        obj.find("input[name='index_screen_list["+pic_id+"][color]']").val(color);
        obj.find("input[name='index_screen_list["+pic_id+"][pic_img]']").val(pic_img);
	    obj.find("div").css("background-color",color);
	}
	focus_group_obj.find('.web-save-succ').show();
	setTimeout("screen_obj.find('.web-save-succ').hide()",2000);
}
function screen_ap(pic_id,color) {//更新广告位
    var obj = screen_obj.find("li[screen_id='"+pic_id+"']");
    obj.find("div").css("background-color",color);
	screen_obj.find('.web-save-succ').show();
	setTimeout("screen_obj.find('.web-save-succ').hide()",2000);
}
function select_screen(pic_id) {//选中图片
    var obj = screen_obj.find("li[screen_id='"+pic_id+"']");
    var ap = obj.attr("ap");
    screen_obj.find("li").removeClass("selected");
    screen_obj.find("input[name='key']").val(pic_id);
    obj.addClass("selected");
    if(ap == '1') {
        upload_obj.hide();
        screen_obj.find("input[name='ap_pic_id']").val(pic_id);
        var a_id = obj.find("input[name='screen_list["+pic_id+"][ap_id]']").val();
        if(a_id == '') {//未选择广告位时用默认的
            $("#ap_id_screen").trigger("onchange");
        } else {
            var color = obj.find("input[name='screen_list["+pic_id+"][color]']").val();
            $("#ap_id_screen").val(a_id);
            $("#ap_color").val(color);
            ap_obj.find('.evo-pointer').css("background-color",color);
        }
        ap_obj.show();
    } else {
        ap_obj.hide();
        var pic_name = obj.find("input[name='screen_list["+pic_id+"][pic_name]']").val();
        var pic_url = obj.find("input[name='screen_list["+pic_id+"][pic_url]']").val();
        var color = obj.find("input[name='screen_list["+pic_id+"][color]']").val();
        $("input[name='screen_id']").val(pic_id);
        $("input[name='screen_pic[pic_name]']").val(pic_name);
        $("input[name='screen_pic[pic_url]']").val(pic_url);
        $("input[name='screen_pic[color]']").val(color);
        upload_obj.find(".type-file-file").val('');
        upload_obj.find(".type-file-text").val('');
        upload_obj.show();
        upload_obj.find('.evo-pointer').css("background-color",color);
    }
}
function select_screen1(pic_id) {//选中图片
	var obj = screen_obj.find("li[screen_id='"+pic_id+"']");
	var ap = obj.attr("ap");
	screen_obj.find("li").removeClass("selected");
	screen_obj.find("input[name='key']").val(pic_id);
	obj.addClass("selected");
	if(ap == '1') {
		upload_obj.hide();
		screen_obj.find("input[name='ap_pic_id']").val(pic_id);
		var a_id = obj.find("input[name='screen_list["+pic_id+"][ap_id]']").val();
		if(a_id == '') {//未选择广告位时用默认的
			$("#ap_id_screen").trigger("onchange");
		} else {
			var color = obj.find("input[name='screen_list["+pic_id+"][color]']").val();
			$("#ap_id_screen").val(a_id);
			$("#ap_color").val(color);
			ap_obj.find('.evo-pointer').css("background-color",color);
		}
		ap_obj.show();
	} else {
		ap_obj.hide();
		var pic_name = obj.find("input[name='screen_list["+pic_id+"][pic_name]']").val();
		var pic_url = obj.find("input[name='screen_list["+pic_id+"][pic_url]']").val();
		var color = obj.find("input[name='screen_list["+pic_id+"][color]']").val();
		$("input[name='screen_id']").val(pic_id);
		$("input[name='screen_pic[pic_name]']").val(pic_name);
		$("input[name='screen_pic[pic_url]']").val(pic_url);
		$("input[name='screen_pic[color]']").val(color);
		upload_obj.find(".type-file-file").val('');
		upload_obj.find(".type-file-text").val('');
		upload_obj.show();
		if(pic_id==1){
			upload_obj.find(".prompt").html("为确保显示效果正确，请选择W:534px H:304px的清晰图片作为联动广告图组单图。");
        }else if(pic_id==2){
        	upload_obj.find(".prompt").html("为确保显示效果正确，请选择W:262px H:149px的清晰图片作为联动广告图组单图。");
        }else if(pic_id==3){
        	upload_obj.find(".prompt").html("为确保显示效果正确，请选择W:262px H:149px的清晰图片作为联动广告图组单图。");
        }
		upload_obj.find('.evo-pointer').css("background-color",color);
	}
}

function select_index_screen(pic_id) {//选中图片
    var obj = index_screen_obj.find("li[screen_id='"+pic_id+"']");
    var ap = obj.attr("ap");
    index_screen_obj.find("li").removeClass("selected");
    index_screen_obj.find("input[name='key']").val(pic_id);
    obj.addClass("selected");
    if(ap == '1') {
    	$('#upload_screen_index').hide();
    	index_screen_obj.find("input[name='ap_pic_id']").val(pic_id);
        var a_id = obj.find("input[name='screen_list["+pic_id+"][ap_id]']").val();
        if(a_id == '') {//未选择广告位时用默认的
            $("#ap_id_screen").trigger("onchange");
        } else {
            var color = obj.find("input[name='screen_list["+pic_id+"][color]']").val();
            $("#ap_id_screen").val(a_id);
            $("#ap_color").val(color);
            $("#ap_screen_index").find('.evo-pointer').css("background-color",color);
        }
        $("#ap_screen_index").show();
    } else {
        $("#ap_screen_index").hide();
        var pic_name = obj.find("input[name='index_screen_list["+pic_id+"][pic_name]']").val();
        var pic_url = obj.find("input[name='index_screen_list["+pic_id+"][pic_url]']").val();
        var color = obj.find("input[name='index_screen_list["+pic_id+"][color]']").val();
        $("input[name='screen_id']").val(pic_id);
        $("input[name='screen_pic[pic_name]']").val(pic_name);
        $("input[name='screen_pic[pic_url]']").val(pic_url);
        $("input[name='screen_pic[color]']").val(color);
        $('#upload_screen_index').find(".type-file-file").val('');
        $('#upload_screen_index').find(".type-file-text").val('');
        $('#upload_screen_index').show();
        $('#upload_screen_index').find('.evo-pointer').css("background-color",color);
    }
}
function select_ap_screen() {//选择广告位
    ap_id = $("#ap_id_screen").val();
    if (ap_id > 0 && typeof screen_adv_list[ap_id] !== "undefined") {
        var adv = screen_adv_list[ap_id];
	    var color = $("#ap_color").val();
	    var pic_name = adv['ap_name'];
	    var pic_img = adv['ap_img'];
	    var obj = screen_obj.find("li.selected");
	    var pic_id = obj.attr("screen_id");
	    obj.find("img").attr("src",UPLOAD_SITE_URL+'/'+ATTACH_ADV+'/'+pic_img);
	    obj.find("img").attr("title",pic_name);
        obj.find("input[name='screen_list["+pic_id+"][pic_name]']").val(pic_name);
        obj.find("input[name='screen_list["+pic_id+"][ap_id]']").val(ap_id);
        obj.find("input[name='screen_list["+pic_id+"][color]']").val(color);
        obj.find("input[name='screen_list["+pic_id+"][pic_img]']").val(ATTACH_ADV+'/'+pic_img);
	    obj.find("div").css("background-color",color);
    }
}
function del_screen(pic_id) {//删除图片
    if (screen_obj.find("li").size()<2) {
         return;//保留一个
    }
	screen_obj.find("li[screen_id='"+pic_id+"']").remove();
	var slide_id = screen_obj.find("input[name='key']").val();
	if (pic_id==slide_id) {
    	screen_obj.find("input[name='key']").val('');
    	ap_obj.hide();
    	upload_obj.hide();
	}
}
function del_index_screen(pic_id) {//删除图片
    if (index_screen_obj.find("li").size()<2) {
         return;//保留一个
    }
    index_screen_obj.find("li[screen_id='"+pic_id+"']").remove();
	var slide_id = index_screen_obj.find("input[name='key']").val();
	if (pic_id==slide_id) {
		index_screen_obj.find("input[name='key']").val('');
    	ap_obj.hide();
    	$('#upload_screen_index').hide();
	}
}
//焦点区切换小图上传
function add_video_focus(add_type) {//增加
	for (var i = 1; i <= focus_max; i++) {//防止数组下标重复
		if (focus_obj.find("div[focus_id='"+i+"']").size()==0) {//编号不存在时添加
			var add_html = '';
			var text_type = '图片调用';
			if(add_type == 'adv') {
			    text_type = '广告调用';
			}
			add_html = '<div focus_id="'+i+'" class="focus-trigeminy-group" title="可上下拖拽更改显示顺序" style="width:980px">'+text_type+
			'<a class="del" href="JavaScript:del_focus('+i+');" title="删除">X</a><ul></ul></div>';
			focus_obj.find("#btn_add_list").before(add_html);
			for (var pic_id = 1; pic_id <= pic_max; pic_id++) {
			    var text_append = '';
			    text_append += '<li style="width:206px;height:149px" list="'+add_type+'" pic_id="'+pic_id+'" onclick="select_focus('+i+',this);" title="可左右拖拽更改图片排列顺序">';
				text_append += '<div class="focus-thumb" style="width:206px;height:149px">';
			    text_append += '<img title="" src=""  style="max-width: 206px;max-height: 149px;"/>';
				text_append += '</div>';
        	    text_append += '<input name="focus_list['+i+'][pic_list]['+pic_id+'][pic_id]" value="'+pic_id+'" type="hidden">';
        	    text_append += '<input name="focus_list['+i+'][pic_list]['+pic_id+'][pic_name]" value="" type="hidden">';
        	    if(add_type == 'adv') {
        	        text_append += '<input name="focus_list['+i+'][pic_list]['+pic_id+'][ap_id]" value="" type="hidden">';
        	    } else {
        	        text_append += '<input name="focus_list['+i+'][pic_list]['+pic_id+'][pic_url]" value="" type="hidden">';
        	    }
        	    text_append += '<input name="focus_list['+i+'][pic_list]['+pic_id+'][pic_img]" value="" type="hidden">';
			    text_append += '</li>';
			    focus_obj.find("div[focus_id='"+i+"'] ul").append(text_append);
			    if(add_type == 'adv') {
			        focus_obj.find("div[focus_id='"+i+"'] li[pic_id='"+pic_id+"']").trigger("click");
			    }
			}
			focus_obj.find("div ul").sortable({ items: 'li' });
			focus_obj.find("div[focus_id='"+i+"'] li[pic_id='1']").trigger("click");//默认选中第一个图片
			break;
		}
	}
}
//焦点区切换小图上传
function add_group_focus(add_type) {//增加
	for (var i = 1; i <= 6; i++) {//防止数组下标重复
		if (focus_obj.find("div[focus_id='"+i+"']").size()==0) {//编号不存在时添加
			var add_html = '';
			var text_type = '图片调用';
			var text_span="";
			if(add_type == 'adv') {
			    text_type = '广告调用';
			}
			add_html = '<div focus_id="'+i+'" class="focus-trigeminy-group" title="可上下拖拽更改显示顺序" style="width:580px">'+text_type+
			'<a class="del" href="JavaScript:del_focus('+i+');" title="删除">X</a><ul></ul></div>';
			focus_obj.find("#btn_add_list").before(add_html);
			for (var pic_id = 1; pic_id <= 1; pic_id++) {
			    var text_append = '';
			    text_append += '<li style="width:490px;height:354px;margin-right: 30px;" list="'+add_type+'" pic_id="'+pic_id+'" onclick="select_focus('+i+',this);" title="可左右拖拽更改图片排列顺序">';
				text_append += '<div class="focus-thumb" style="width:490px;height:354px">';
			    text_append += '<img title="" src=""  style="max-width: 490px;max-height: 354px;"/>';
				text_append += '</div>';
        	    text_append += '<input name="focus_list['+i+'][pic_list]['+pic_id+'][pic_id]" value="'+pic_id+'" type="hidden">';
        	    text_append += '<input name="focus_list['+i+'][pic_list]['+pic_id+'][pic_name]" value="" type="hidden">';
        	    if(add_type == 'adv') {
        	        text_append += '<input name="focus_list['+i+'][pic_list]['+pic_id+'][ap_id]" value="" type="hidden">';
        	    } else {
        	        text_append += '<input name="focus_list['+i+'][pic_list]['+pic_id+'][pic_url]" value="" type="hidden">';
        	    }
        	    text_append += '<input name="focus_list['+i+'][pic_list]['+pic_id+'][pic_img]" value="" type="hidden">';
			    text_append += '</li>';
			    if(i==1){
			    	text_span="门店加盟";
			    }else if(i==2){
			    	text_span="门店加盟";
			    }else if(i==3){
			    	text_span="大渠道展示";
			    }else if(i==4){
			    	text_span="招商加盟入驻";
			    }else if(i==5){
			    	text_span="招商加盟入驻";
			    }else if(i==6){
			    	text_span="招商加盟入驻";
			    }
			    focus_obj.find("div[focus_id='"+i+"'] ul").append(text_append);
			   
			    if(add_type == 'adv') {
			        focus_obj.find("div[focus_id='"+i+"'] li[pic_id='"+pic_id+"']").trigger("click");
			    }
			}
			focus_obj.find("div[focus_id='"+i+"'] ul").append('<span class="bottom_show">'+text_span+'</span>');
			focus_obj.find("div ul").sortable({ items: 'li' });
			focus_obj.find("div[focus_id='"+i+"'] li[pic_id='1']").trigger("click");//默认选中第一个图片
			break;
		}
	}
}

//焦点区切换小图上传
function add_focus(add_type) {//增加
	for (var i = 1; i <= focus_max; i++) {//防止数组下标重复
		if (focus_obj.find("div[focus_id='"+i+"']").size()==0) {//编号不存在时添加
			var add_html = '';
			var text_type = '图片调用';
			if(add_type == 'adv') {
			    text_type = '广告调用';
			}
			add_html = '<div focus_id="'+i+'" class="focus-trigeminy-group" title="可上下拖拽更改显示顺序">'+text_type+
			'<a class="del" href="JavaScript:del_focus('+i+');" title="删除">X</a><ul></ul></div>';
			focus_obj.find("#btn_add_list").before(add_html);
			for (var pic_id = 1; pic_id <= pic_max; pic_id++) {
			    var text_append = '';
			    text_append += '<li list="'+add_type+'" pic_id="'+pic_id+'" onclick="select_focus('+i+',this);" title="可左右拖拽更改图片排列顺序">';
				text_append += '<div class="focus-thumb">';
			    text_append += '<img title="" src=""/>';
				text_append += '</div>';
        	    text_append += '<input name="focus_list['+i+'][pic_list]['+pic_id+'][pic_id]" value="'+pic_id+'" type="hidden">';
        	    text_append += '<input name="focus_list['+i+'][pic_list]['+pic_id+'][pic_name]" value="" type="hidden">';
        	    if(add_type == 'adv') {
        	        text_append += '<input name="focus_list['+i+'][pic_list]['+pic_id+'][ap_id]" value="" type="hidden">';
        	    } else {
        	        text_append += '<input name="focus_list['+i+'][pic_list]['+pic_id+'][pic_url]" value="" type="hidden">';
        	    }
        	    text_append += '<input name="focus_list['+i+'][pic_list]['+pic_id+'][pic_img]" value="" type="hidden">';
			    text_append += '</li>';
			    focus_obj.find("div[focus_id='"+i+"'] ul").append(text_append);
			    if(add_type == 'adv') {
			        focus_obj.find("div[focus_id='"+i+"'] li[pic_id='"+pic_id+"']").trigger("click");
			    }
			}
			focus_obj.find("div ul").sortable({ items: 'li' });
			focus_obj.find("div[focus_id='"+i+"'] li[pic_id='1']").trigger("click");//默认选中第一个图片
			break;
		}
	}
}
function add_focus1(add_type) {//增加
	var text_type = '图片调用';
	for (var i = 1; i <= focus_max; i++) {//防止数组下标重复
		if (focus_obj.find("div[focus_id='"+i+"']").size()==0) {//编号不存在时添加
			var add_html = '';
			if(i==1){
				text_type="独一张门店";
			}else if(i==2){
				text_type="独易网";
			}else if(i==3){
				text_type="食维健门店";
			}
			if(add_type == 'adv') {
			    text_type = '广告调用';
			}
			add_html = '<div focus_id="'+i+'" class="focus-trigeminy-group" title="可上下拖拽更改显示顺序">'+text_type+
			'<a class="del" href="JavaScript:del_focus('+i+');" title="删除">X</a><ul></ul></div>';
			focus_obj.find("#btn_add_list").before(add_html);
			for (var pic_id = 1; pic_id <= 7; pic_id++) {
			    var text_append = '';
			    text_append += '<li list="'+add_type+'" pic_id="'+pic_id+'" onclick="select_focus1('+i+',this);" title="可左右拖拽更改图片排列顺序">';
				text_append += '<div class="focus-thumb">';
			    text_append += '<img title="" src=""/>';
				text_append += '</div>';
        	    text_append += '<input name="focus_list['+i+'][pic_list]['+pic_id+'][pic_id]" value="'+pic_id+'" type="hidden">';
        	    text_append += '<input name="focus_list['+i+'][pic_list]['+pic_id+'][pic_name]" value="" type="hidden">';
        	    if(add_type == 'adv') {
        	        text_append += '<input name="focus_list['+i+'][pic_list]['+pic_id+'][ap_id]" value="" type="hidden">';
        	    } else {
        	        text_append += '<input name="focus_list['+i+'][pic_list]['+pic_id+'][pic_url]" value="" type="hidden">';
        	    }
        	    text_append += '<input name="focus_list['+i+'][pic_list]['+pic_id+'][pic_img]" value="" type="hidden">';
			    text_append += '</li>';
			    focus_obj.find("div[focus_id='"+i+"'] ul").append(text_append);
			    if(add_type == 'adv') {
			        focus_obj.find("div[focus_id='"+i+"'] li[pic_id='"+pic_id+"']").trigger("click");
			    }
			}
			focus_obj.find("div ul").sortable({ items: 'li' });
			focus_obj.find("div[focus_id='"+i+"'] li[pic_id='1']").trigger("click");//默认选中第一个图片
			break;
		}
	}
}
function select_focus(focus_id,pic) {//选中图片
    var obj = $(pic);
    var pic_id = obj.attr("pic_id");
    var list = obj.attr("list");
    focus_obj.find("li").removeClass("selected");
    focus_obj.find("input[name='key']").val(focus_id);
    obj.addClass("selected");
    if(list == 'adv') {
        focus_upload_obj.hide();
        var a_id = obj.find("input[name*='[ap_id]']").val();
        if(a_id == '') {//未选择广告位时用默认的
            $("#ap_id_focus").trigger("onchange");
        } else {
            $("#ap_id_focus").val(a_id);
        }
        focus_ap_obj.show();
    } else {
        focus_ap_obj.hide();
        var pic_name = obj.find("input[name*='[pic_name]']").val();
        var pic_url = obj.find("input[name*='[pic_url]']").val();
        var pic_content = obj.find("textarea[name*='[pic_content]']").val();
        
        focus_obj.find("input[name='slide_id']").val(focus_id);
        focus_obj.find("input[name='pic_id']").val(pic_id);
        focus_obj.find("input[name='focus_pic[pic_name]']").val(pic_name);
        focus_obj.find("input[name='focus_pic[pic_url]']").val(pic_url);
        focus_obj.find("textarea[name='focus_pic[pic_content]']").val(pic_content);
        focus_obj.find(".type-file-file").val('');
        focus_obj.find(".type-file-text").val('');
        focus_upload_obj.show();
    }
}
function select_focus1(focus_id,pic) {//业务体系选中图片
    var obj = $(pic);
    var pic_id = obj.attr("pic_id");
    var list = obj.attr("list");
    focus_obj.find("li").removeClass("selected");
    focus_obj.find("input[name='key']").val(focus_id);
    obj.addClass("selected");
    if(list == 'adv') {
        focus_upload_obj.hide();
        var a_id = obj.find("input[name*='[ap_id]']").val();
        if(a_id == '') {//未选择广告位时用默认的
            $("#ap_id_focus").trigger("onchange");
        } else {
            $("#ap_id_focus").val(a_id);
        }
        focus_ap_obj.show();
    } else {
        focus_ap_obj.hide();
        focus_upload_obj.find("#middle1").hide();
    	focus_upload_obj.find("#middle2").hide();
        var pic_name = obj.find("input[name*='[pic_name]']").val();
        var pic_url = obj.find("input[name*='[pic_url]']").val();
        var pic_txt=  obj.find("input[name*='[pic_txt]']").val();
        focus_obj.find("input[name='slide_id']").val(focus_id);
        focus_obj.find("input[name='pic_id']").val(pic_id);
        focus_obj.find("input[name='focus_pic[pic_name]']").val(pic_name);
        focus_obj.find("input[name='focus_pic[pic_url]']").val(pic_url);
        focus_obj.find("textarea[name='focus_pic[pic_txt]']").val(pic_txt);
        focus_obj.find(".type-file-file").val('');
        focus_obj.find(".type-file-text").val('');
        if(pic_id==1){
        	focus_upload_obj.find(".prompt").html("为确保显示效果正确，请选择W:532px H:214px的清晰图片作为联动广告图组单图。");
        }else if(pic_id==2){
        	focus_upload_obj.find(".prompt").html("为确保显示效果正确，请选择W:354px H:214px的清晰图片作为联动广告图组单图。");
        }else if(pic_id==3){
        	focus_upload_obj.find(".prompt").html("为确保显示效果正确，请选择W:306px H:405px的清晰图片作为联动广告图组单图。");
        }else if(pic_id==4){
        	focus_upload_obj.find("#middle1").show();
        	focus_upload_obj.find("#middle2").show();
        	focus_upload_obj.find(".prompt").html("为确保显示效果正确，请选择W:341px H:446px的清晰图片作为联动广告图组单图。");
        }else if(pic_id==5){
        	focus_upload_obj.find(".prompt").html("为确保显示效果正确，请选择W:341px H:207px的清晰图片作为联动广告图组单图。");
        }else if(pic_id==6){
        	focus_upload_obj.find(".prompt").html("为确保显示效果正确，请选择W:545px H:207px的清晰图片作为联动广告图组单图。");
        }else if(pic_id==7){
        	focus_upload_obj.find(".prompt").html("为确保显示效果正确，请选择W:306px H:463px的清晰图片作为联动广告图组单图。");
        }
        focus_upload_obj.show();
    }
}
function focus_pic(pic_id,pic_img) {//更新图片
	if (pic_img!='') {
	    var focus_id = focus_obj.find("input[name='slide_id']").val();
	    var pic_name = focus_obj.find("input[name='focus_pic[pic_name]']").val();
	    var pic_url = focus_obj.find("input[name='focus_pic[pic_url]']").val();
	    var pic_content = focus_obj.find("textarea[name='focus_pic[pic_content]']").val();
	    var obj = focus_obj.find("div[focus_id='"+focus_id+"'] li[pic_id='"+pic_id+"']");
	    obj.find("img").attr("src",UPLOAD_SITE_URL+'/'+pic_img);
	    obj.find("img").attr("title",pic_name);
        obj.find("input[name*='[pic_name]']").val(pic_name);
        obj.find("input[name*='[pic_url]']").val(pic_url);
        obj.find("input[name*='[pic_img]']").val(pic_img);
        obj.find("textarea[name*='[pic_content]']").val(pic_content);
    }
	focus_obj.find('.web-save-succ').show();
	setTimeout("focus_obj.find('.web-save-succ').hide()",2000);
}
function select_ap_focus() {//选择广告位
    ap_id = $("#ap_id_focus").val();
    if (ap_id > 0 && typeof focus_adv_list[ap_id] !== "undefined") {
        var adv = focus_adv_list[ap_id];
	    var pic_name = adv['ap_name'];
	    var pic_img = adv['ap_img'];
	    var obj = focus_obj.find("li.selected");
	    var pic_id = obj.attr("pic_id");
	    obj.find("img").attr("src",UPLOAD_SITE_URL+'/'+ATTACH_ADV+'/'+pic_img);
	    obj.find("img").attr("title",pic_name);
        obj.find("input[name*='[pic_name]']").val(pic_name);
        obj.find("input[name*='[ap_id]']").val(ap_id);
        obj.find("input[name*='[pic_img]']").val(ATTACH_ADV+'/'+pic_img);
    }
}
function del_focus(focus_id) {//删除切换组
    if (focus_obj.find("div[focus_id]").size()<2) {
         return;//保留一个
    }
	focus_obj.find("div[focus_id='"+focus_id+"']").remove();
	var slide_id = focus_obj.find("input[name='key']").val();
	if (focus_id==slide_id) {
    	focus_obj.find("input[name='key']").val('');
    	focus_upload_obj.hide();
    	focus_ap_obj.hide();
	}
}