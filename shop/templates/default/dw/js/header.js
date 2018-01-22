$(function () {
    if (document.all && !document.querySelector) {
       $(".ie_seven").css("display","block")
    }
    if (document.all && document.querySelector && !document.addEventListener) {
        $(".ie_seven").css("display","block")
    }
})
