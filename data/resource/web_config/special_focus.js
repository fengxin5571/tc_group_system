  var screen_max = 5;//大图数
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
		    $('form[name!="add_form"]').hide();
		    $("#homepageFocusTab li").removeClass("current");
		    $('#'+pic_form).show();
		    $(this).addClass("current");
		});
		screen_obj = $("#upload_screen_form");//初始化焦点大图区数据
		screen_honor_obj=$("#upload_honor_form");//初始化荣誉资质
		upload_recure_obj=$("#upload_recure_form");//初始化康复案例
		screen_store_obj=$("#upload_store_form");//初始化店面展示
		screen_canvass_obj=$("#upload_canvass_form");//初始化招商加盟
		
	    ap_obj = $("#ap_screen");
	    upload_obj = $("#upload_screen");//初始化banner上传表格
	    upload_honor_obj=$('#upload_honor_screen');//初始化荣誉资质上传表格
	    upload_recure_table=$("#upload_recure_table")//初始化康复案例上传表格
	    upload_store_table=$("#upload_store_table");//初始化店面展示上传表格
	    upload_canvass_obj=$("#upload_canvass_screen");//初始化招商加盟上传表格
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
  function add_screen(add_type,obj_name) {//增加图片
	  var obj_form;
	 if(obj_name=="upload_screen"){//是否为banner图
		 obj_form=screen_obj;
		 screen_max=screen_max;
	 }else if(obj_name=="upload_honor"){//是否为荣誉资质
		 obj_form=screen_honor_obj;
		 screen_max=4;
	 }else if(obj_name=="upload_canvass"){//是否为招商加盟
		 obj_form=screen_canvass_obj;
		screen_max=6;
	 }
  	for (var i = 1; i <= screen_max; i++) {//防止数组下标重复
  		if (obj_form.find("li[screen_id='"+i+"']").size()==0) {//编号不存在时添加
      	    var text_input = '';
      	    var text_type = '图片调用';
      	    var ap = 0;
      	    if(obj_name=="upload_honor"){
      	    	text_input += '<input name="screen_honor_list['+i+'][pic_id]" value="'+i+'" type="hidden">';
          	    text_input += '<input name="screen_honor_list['+i+'][pic_name]" value="" type="hidden">';
          	    text_input += '<input name="screen_honor_list['+i+'][pic_url]" value="" type="hidden">';
          
          	    text_input += '<input name="screen_honor_list['+i+'][color]" value="" type="hidden">';
          	    text_input += '<input name="screen_honor_list['+i+'][pic_img]" value="" type="hidden">';
      	    }else if(obj_name=="upload_canvass"){
      	    	 text_input += '<input name="screen_canvass_list['+i+'][pic_id]" value="'+i+'" type="hidden">';
 	    	    text_input += '<input name="screen_canvass_list['+i+'][pic_name]" value="" type="hidden">';
 	    	    text_input += '<input name="screen_canvass_list['+i+'][pic_url]" value="" type="hidden">';
 	    
 	    	    text_input += '<input name="screen_canvass_list['+i+'][color]" value="" type="hidden">';
 	    	    text_input += '<input name="screen_canvass_list['+i+'][pic_img]" value="" type="hidden">';
      	    	
      	    }   else {
	      	    text_input += '<input name="screen_list['+i+'][pic_id]" value="'+i+'" type="hidden">';
	    	    text_input += '<input name="screen_list['+i+'][pic_name]" value="" type="hidden">';
	    	    text_input += '<input name="screen_list['+i+'][pic_url]" value="" type="hidden">';
	    
	    	    text_input += '<input name="screen_list['+i+'][color]" value="" type="hidden">';
	    	    text_input += '<input name="screen_list['+i+'][pic_img]" value="" type="hidden">';
      	    }
      	  
  			var add_html = '';
  			add_html = '<li ap="'+ap+'" screen_id="'+i+'" title="可上下拖拽更改显示顺序">'+text_type+
  			'<a class="del" href="JavaScript:del_screen('+i+
  			',\''+obj_name+'\');" title="删除">X</a><div class="focus-thumb" onclick="select_screen('+i+',\''+obj_name+'\');" title="点击编辑选中区域内容"><img src="" /></div>'+text_input+'</li>';
  			obj_form.find("ul").append(add_html);
  			select_screen(i,obj_name);
  			break;
  		}
      }
  }
  function select_screen(pic_id,obj_name) {//选中图片
	    var obj_from;
	    var upload_table;
	    if(obj_name=="upload_screen"){
	    	obj_from=screen_obj;
	    	upload_table=upload_obj;
		 }else if(obj_name=="upload_honor"){
			 obj_from=screen_honor_obj;
			 upload_table=upload_honor_obj;
		 }else if(obj_name =="upload_canvass"){
			 obj_from=screen_canvass_obj;
			 upload_table=upload_canvass_obj;
		 }
	    var obj = obj_from.find("li[screen_id='"+pic_id+"']");
	    var ap = obj.attr("ap");
	    obj_from.find("li").removeClass("selected");
	    obj_from.find("input[name='key']").val(pic_id);
	    obj.addClass("selected");
        ap_obj.hide();
        var pic_name = obj.find("input[name='screen_list["+pic_id+"][pic_name]']").val();
        var pic_url = obj.find("input[name='screen_list["+pic_id+"][pic_url]']").val();
        var color = obj.find("input[name='screen_list["+pic_id+"][color]']").val();
        $("input[name='screen_id']").val(pic_id);
        $("input[name='screen_pic[pic_name]']").val(pic_name);
        $("input[name='screen_pic[pic_url]']").val(pic_url);
        $("input[name='screen_pic[color]']").val(color);
        upload_table.find(".type-file-file").val('');
        upload_table.find(".type-file-text").val('');
        upload_table.show();
        upload_table.find('.evo-pointer').css("background-color",color);
	   
	}
//焦点区切换小图上传
  function add_focus(add_type,obj_name) {//增加
	var obj_form;
	if(obj_name=="upload_recure"){//如果是康复案例
		obj_form=upload_recure_obj;
		pic_max=3;
	}else if(obj_name=="upload_store"){//如果是店面展示
		obj_form=screen_store_obj;
		pic_max=4;
	};
  	for (var i = 1; i <= focus_max; i++) {//防止数组下标重复
  		if (obj_form.find("div[focus_id='"+i+"']").size()==0) {//编号不存在时添加
  			var add_html = '';
  			var text_type = '图片调用';
  			if(add_type == 'adv') {
  			    text_type = '广告调用';
  			}
  			add_html = '<div focus_id="'+i+'" class="focus-trigeminy-group" title="可上下拖拽更改显示顺序">'+text_type+
  			'<a class="del" href="JavaScript:del_focus('+i+');" title="删除">X</a><ul></ul></div>';
  			obj_form.find("#btn_add_list").before(add_html);
  			for (var pic_id = 1; pic_id <= pic_max; pic_id++) {
  			    var text_append = '';
  			    text_append += '<li list="'+add_type+'" pic_id="'+pic_id+'" onclick="select_focus('+i+',this,\''+obj_name+'\');" title="可左右拖拽更改图片排列顺序">';
  				text_append += '<div class="focus-thumb">';
  			    text_append += '<img title="" src=""/>';
  				text_append += '</div>';
  				if(obj_name=="upload_recure"){
  					 text_append += '<input name="screen_recure_list['+i+'][pic_list]['+pic_id+'][pic_id]" value="'+pic_id+'" type="hidden">';
  	          	     text_append += '<input name="screen_recure_list['+i+'][pic_list]['+pic_id+'][pic_name]" value="" type="hidden">';
  	          	     text_append += '<input name="screen_recure_list['+i+'][pic_list]['+pic_id+'][pic_url]" value="" type="hidden">';
  	          	     text_append += '<input name="screen_recure_list['+i+'][pic_list]['+pic_id+'][pic_img]" value="" type="hidden">';
  				}else if(obj_name=="upload_store"){
  					 text_append += '<input name="screen_store_list['+i+'][pic_list]['+pic_id+'][pic_id]" value="'+pic_id+'" type="hidden">';
  	          	     text_append += '<input name="screen_store_list['+i+'][pic_list]['+pic_id+'][pic_name]" value="" type="hidden">';
  	          	     text_append += '<input name="screen_store_list['+i+'][pic_list]['+pic_id+'][pic_url]" value="" type="hidden">';
  	          	     text_append += '<input name="screen_store_list['+i+'][pic_list]['+pic_id+'][pic_img]" value="" type="hidden">';
  				}
  			    text_append += '</li>';
  			    obj_form.find("div[focus_id='"+i+"'] ul").append(text_append);
  			    if(add_type == 'adv') {
  			    	obj_form.find("div[focus_id='"+i+"'] li[pic_id='"+pic_id+"']").trigger("click");
  			    }
  			}
  			obj_form.find("div ul").sortable({ items: 'li' });
  			obj_form.find("div[focus_id='"+i+"'] li[pic_id='1']").trigger("click");//默认选中第一个图片
  			break;
  		}
  	}
  }
  function select_focus(focus_id,pic,obj_name) {//选中图片
	    var obj_from;
	    var upload_table;
	    if(obj_name=="upload_recure"){//如果为康复案例
	    	obj_from=upload_recure_obj;
	    	upload_table=upload_recure_table;
	    }else if (obj_name=="upload_store"){//如果是店面展示
	    	obj_from=screen_store_obj;
	    	upload_table=upload_store_table;
	    }
	    var obj = $(pic);
	    var pic_id = obj.attr("pic_id");
	    var list = obj.attr("list");
	    obj_from.find("li").removeClass("selected");
	    obj_from.find("input[name='key']").val(focus_id);
	    obj.addClass("selected");
	    if(list == 'adv') {
	    	upload_table.hide();
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
            console.log(obj_from);
	        obj_from.find("input[name='slide_id']").val(focus_id);
	        obj_from.find("input[name='pic_id']").val(pic_id);
	        obj_from.find("input[name='focus_pic[pic_name]']").val(pic_name);
	        obj_from.find("input[name='focus_pic[pic_url]']").val(pic_url);
	        obj_from.find(".type-file-file").val('');
	        obj_from.find(".type-file-text").val('');
	        upload_table.show();
	    }
	}
  function screen_pic(pic_id,pic_img,obj_name) {//更新图片
	   var obj_form;
	   if(obj_name=="upload_screen"){//是否为banner图
			 obj_form=screen_obj;
		 }else if(obj_name=="upload_honor"){//是否为荣誉资质
			 obj_form=screen_honor_obj;
		 }else if(obj_name="upload_canvass"){//是否为招商加盟
			 obj_form=screen_canvass_obj;
		 }
		if (pic_img!='') {
		    var color = obj_form.find("input[name='screen_pic[color]']").val();
		    var pic_name = obj_form.find("input[name='screen_pic[pic_name]']").val();
		    var pic_url = obj_form.find("input[name='screen_pic[pic_url]']").val();
		    var obj = obj_form.find("li[screen_id='"+pic_id+"']");
		    obj.find("img").attr("src",UPLOAD_SITE_URL+'/'+pic_img);
		    obj.find("img").attr("title",pic_name);
	        obj.find("input[name='screen_list["+pic_id+"][pic_name]']").val(pic_name);
	        obj.find("input[name='screen_list["+pic_id+"][pic_url]']").val(pic_url);
	        obj.find("input[name='screen_list["+pic_id+"][color]']").val(color);
	        obj.find("input[name='screen_list["+pic_id+"][pic_img]']").val(pic_img);
		    obj.find("div").css("background-color",color);
		}
		obj_form.find('.web-save-succ').show();
		setTimeout("screen_obj.find('.web-save-succ').hide()",2000);
	}
  function focus_pic(pic_id,pic_img,obj_name) {//更新图片
	   var obj_form;
	   if(obj_name =="upload_recure"){//如果是康复案例
		   obj_form=upload_recure_obj;
	   }else if(obj_name=="upload_store"){//如果是店面展示
		   obj_form=screen_store_obj;
	   }
		if (pic_img!='') {
		    var focus_id = obj_form.find("input[name='slide_id']").val();
		    var pic_name = obj_form.find("input[name='focus_pic[pic_name]']").val();
		    var pic_url = obj_form.find("input[name='focus_pic[pic_url]']").val();
		    var obj = obj_form.find("div[focus_id='"+focus_id+"'] li[pic_id='"+pic_id+"']");
		    obj.find("img").attr("src",UPLOAD_SITE_URL+'/'+pic_img);
		    obj.find("img").attr("title",pic_name);
	        obj.find("input[name*='[pic_name]']").val(pic_name);
	        obj.find("input[name*='[pic_url]']").val(pic_url);
	        obj.find("input[name*='[pic_img]']").val(pic_img);
	    }
		obj_form.find('.web-save-succ').show();
		setTimeout("focus_obj.find('.web-save-succ').hide()",2000);
	}
  function del_screen(pic_id,obj_name) {//删除图片
	  var obj_form;
	  var upload_table;
	  if(obj_name=='upload_screen'){//如果是banner图
		  obj_form=screen_obj;
		  upload_table=upload_obj;
	  }else if(obj_name=="upload_honor"){//如果是荣誉资质
		  obj_form=screen_honor_obj;
		  upload_table=upload_honor_obj;
	  }else if(obj_name=="upload_canvass"){//如果是招商加盟
		  obj_form=screen_canvass_obj;
		  upload_table=upload_canvass_obj;
	  }
	    if (obj_form.find("li").size()<2) {
	         return;//保留一个
	    }
	    obj_form.find("li[screen_id='"+pic_id+"']").remove();
		var slide_id = obj_form.find("input[name='key']").val();
		if (pic_id==slide_id) {
			obj_form.find("input[name='key']").val('');
	    	ap_obj.hide();
	    	upload_table.hide();
		}
	}
  function del_focus(focus_id,obj_name) {//删除切换组
	   var  obj_form;
	   var upload_table;
	   if(obj_name=="upload_recure"){//如果是康复案例
		   obj_form=upload_recure_obj;
		   upload_table=upload_recure_table;
	   }else if(obj_name="upload_store"){//如果是店面展示
		   obj_form=screen_store_obj;
		   upload_table=upload_store_table;
		   }
	    if (obj_form.find("div[focus_id]").size()<2) {
	         return;//保留一个
	    }
	    obj_form.find("div[focus_id='"+focus_id+"']").remove();
		var slide_id = obj_form.find("input[name='key']").val();
		if (focus_id==slide_id) {
			obj_form.find("input[name='key']").val('');
			upload_table.hide();
	    	focus_ap_obj.hide();
		}
	}