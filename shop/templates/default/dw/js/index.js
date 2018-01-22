$(function () {
    function lunbotu() {
        var banner_array = ["red","blue","yellow","#ccc"];
        var banner_b = $(".banner_b");
        var btn_one = $(".btn_one");
        btn_one[0].style.background="#9cc813";
        var num = 0;
        for(var i=0;i<btn_one.length;i++){
           // banner_b[i].style.background=banner_array[i];
        }
        btn_one.on("mouseover",function () {
            btn_one.css("background","");
            $(this).css("background","#9cc813");
            banner_b.css("opacity","0");
            banner_b[$(this).index()].style.opacity="1";
            num = $(this).index();
        })
        $(".btn_left").on("click",function () {
            if(num-1<0){
                num=btn_one.length
            }
            btn_one.css("background","");
            btn_one[num-1].style.background="#9cc813";
            banner_b.css("opacity","0");
            banner_b[num-1].style.opacity="1";
            num--;
        })
        $(".btn_right").on("click",function () {
            if(num+1>btn_one.length-1){
                num=-1
            }
            btn_one.css("background","");
            btn_one[num+1].style.background="#9cc813";
            banner_b.css("opacity","0");
            banner_b[num+1].style.opacity="1";
            num++;
        })
        var tt=setInterval(lunbo,4000);
        function lunbo() {
            if(num+1>btn_one.length-1){
                num=-1
            }
            btn_one.css("background","");
            btn_one[num+1].style.background="#9cc813";
            banner_b.css("opacity","0");
            banner_b[num+1].style.opacity="1";
            num++;
        }
        $(".banner_s").on("mouseover",function () {
            clearInterval(tt)
        })
        $(".banner_s").on("mouseout",function () {
            tt=setInterval(lunbo,4000)
        })
    }
    lunbotu()
//    *****************************************************************************
    function find_something() {
        $(".find_md").hide().eq(0).show();
        $(".find_dct_a").on("mouseover",function () {
            $(".find_md").hide().eq($(this).index()).show();
        });
        $(".health_k_q").on("mouseover",function () {
            $(".health_k_q").css({"background":"#dddddd","color":"#717171"});
            $(this).css({"background":"#fff","color":"#9cc813"});
            $(".health_zs").hide().eq($(this).index()).show();
        })
    }
    find_something()


















})