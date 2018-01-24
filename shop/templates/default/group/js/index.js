/**
 * Created by yyt on 2017/10/28.
 */



//健康资讯点击选中效果
$('.recom_cont ul li').click(function () {
    $('.recom_cont li').find('.orange').hide();
    $('.recom_cont li').find('.gray').show();
    $(this).find('.gray').hide();
    $(this).find('.orange').show();
    $(this).find('p').addClass('active');
});
//健康资讯点击手风琴样式
$('.cont_list > li').click(function(){
    $('.cont_list > li').addClass('hidden');
    $('.cont_list > li').find('.recom_title_active').removeClass('recom_title_active').addClass('recom_title');
    $(this).removeClass('hidden');
    $(this).find('.recom_title').removeClass('recom_title').addClass('recom_title_active')
})

//招商入驻图片
$('.merchants li').click(function () {
    $('.merchants li').addClass('hidden');
    $(this).removeClass('hidden');
});

//移上去下拉 独易品
$('#dyp').hover(
    function () {
        wait=setTimeout(()=>{
            $('.dyw_list').slideDown('normal')
        },200)
    },
    function () {
        clearTimeout(wait);
        $('.dyw_list').slideUp('normal')
    }
)