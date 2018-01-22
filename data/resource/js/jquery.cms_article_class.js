
$(document).ready(function(){
	 $.fn.inline_edit1= function(options) {
	     var settings = $.extend({}, {open: false}, options);
	     return this.each(function() {
	         $(this).click(onClick);
	     });
	    
	     function onClick() {
	         var span = $(this);
	         var old_value = $(this).html();
	         var column_id = $(this).attr("column_id");
	         $('<input type="text">')
	         .insertAfter($(this))
	         .focus()
	         .select()
	         .val(old_value)
	         .blur(function(){
	        	 
	             var new_value = $(this).attr("value");
	             if(new_value != '') {
	                 $.get('index.php?act='+settings.act+'&op='+settings.op+'&branch=ajax',{id:column_id,value:new_value},function(data){
	                     data = $.parseJSON(data);
	                     if(data.result) {
	                         span.show().text(new_value);
	                     } else {
	                         span.show().text(old_value);
	                         alert(data.message);
	                     }
	                 });
	             } else {
	                 span.show().text(old_value);
	             }
	             $(this).remove();
	         })
	         $(this).hide();
	     }
	}
	   //行内ajax编辑
	$('span[nc_type="class_sort_c"]').inline_edit1({act: 'cms_article_class',op: 'update_class_sort'});
	$('span[nc_type="class_name_c"]').inline_edit1({act: 'cms_article_class',op: 'update_class_name'});
	//列表下拉
	$('img[nc_type="flex"]').click(function(){
		var status = $(this).attr('status');
		if(status == 'open'){
			var pr = $(this).parent('td').parent('tr');
			var id = $(this).attr('fieldid');
			var obj = $(this);
			$(this).attr('status','none');
			//ajax
			$.ajax({
				url: 'index.php?act=cms_article_class&op=cms_article_class_list&ajax=1&parent_id='+id,
				dataType: 'json',
				success: function(data){
					var src='';
					for(var i = 0; i < data.length; i++){
						var tmp_vertline = "<img class='preimg' src='templates/images/vertline.gif'/>";
						src += "<tr class='"+pr.attr('class')+" row"+id+"'>";
						src += "<td class='w36'><input type='checkbox'  value='"+data[i].class_id+"' class='checkitem'>";
						if(data[i].have_child == 1){
							src += "<img fieldid='"+data[i].class_id+"' status='open' nc_type='flex' src='"+ADMIN_TEMPLATES_URL+"/images/tv-expandable.gif' />";
						}else{
							src += "<img fieldid='"+data[i].class_id+"' status='none' nc_type='flex' src='"+ADMIN_TEMPLATES_URL+"/images/tv-item.gif' />";
						}
						//图片
						src += "</td><td class='w48 sort'>";
						//排序
						src += "<span nc_type='class_sort_c'   column_id='"+data[i].class_id+"' title='可编辑'     class='editable'>"+data[i].class_sort+"</span></td>";
						//名称
						src += "<td class='name'>";
						for(var tmp_i=1; tmp_i < (data[i].deep-1); tmp_i++){
							src += tmp_vertline;
						}
						if(data[i].have_child == 1){
							src += " <img fieldid='"+data[i].class_id+"' status='open' nc_type='flex' src='"+ADMIN_TEMPLATES_URL+"/images/tv-item1.gif' />";
						}else{
							src += " <img fieldid='"+data[i].class_id+"' status='none' nc_type='flex' src='"+ADMIN_TEMPLATES_URL+"/images/tv-expandable1.gif' />";
						}
						src += " <span nc_type='class_name_c' column_id='"+data[i].class_id+"'  title='可编辑'    class='editable' style='display: inline-block;'>"+data[i].class_name+"</span>";
						//新增下级
						if(data[i].deep < 2){
							src += "<a class='btn-add-nofloat marginleft' href='index.php?act=cms_article_class&op=cms_article_class_add&parent_id="+data[i].class_id+"'><span>新增下级</span></a></span>";
						}
						src += "</td>";
						
						//操作
						src += "<td class='w84'>";
						//src += "<span><a href='index.php?act=cms_article_class&op=cms_article_class_edit&class_id="+data[i].class_id+"'>编辑</a>";
						src += " | <a href=\"javascript:if(confirm('删除该分类将会同时删除该分类的所有下级分类，您确定要删除吗'))window.location = 'index.php?act=cms_article_class&op=cms_article_class_drop&class_id="+data[i].class_id+"';\">删除</a>";
						src += "</td>";
						src += "</tr>";
					}
					//插入
					pr.after(src);
					obj.attr('status','close');
					obj.attr('src',obj.attr('src').replace("tv-expandable","tv-collapsable"));
					$('img[nc_type="flex"]').unbind('click');
					$('span[nc_type="editable"]').unbind('click');
					//重现初始化页面
                   //$.getScript(RESOURCE_SITE_URL+"/js/jquery.edit.js");
					$.getScript(RESOURCE_SITE_URL+"/js/jquery.cms_article_class.js");
					$.getScript(RESOURCE_SITE_URL+"/js/admincp.js");
				},
				error: function(){
					alert('获取信息失败');
				}
			});
		}
		if(status == 'close'){
			$(".row"+$(this).attr('fieldid')).remove();
			$(this).attr('src',$(this).attr('src').replace("tv-collapsable","tv-expandable"));
			$(this).attr('status','open');
		}
	})

});
