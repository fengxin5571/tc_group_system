
    //管理团队轮播图轮播图
    function vision_lb() {
        let team_box = $('.vision_lb_box')[0];
        let team_imgbox = $('.vision_lb_box .vision_img_list')[0];
        let leftarrow = $('.arrow_l')[0];
        let rightarrow = $('.arrow_r')[0];
        let width = parseInt(getComputedStyle(team_box, null).width);
        let lbflag = true;
        function moveleft() {
            animate(team_imgbox, {left: -width/4}, 500, function () {
                lbflag = true;
                let first = team_imgbox.firstElementChild;
                team_imgbox.appendChild(first);
                team_imgbox.style.left = '0';
                change_pic();
            });
        }
        function moveright() {
            let first = team_imgbox.firstElementChild;
            let last = team_imgbox.lastElementChild;
            team_imgbox.insertBefore(last, first);
            team_imgbox.style.left = -width/4 + 'px';
            change_pic();
            animate(team_imgbox, {left: 0}, 500, function () {
                lbflag = true;
            });
        }
        let tt = setInterval(function () {
            moveleft();
        }, 3000);
        leftarrow.onclick = function () {
            if (lbflag) {
                clearInterval(tt);
                lbflag = false;
                moveleft();
            }
            tt=setInterval(function () {
                moveleft();
            }, 3000);
        }
        rightarrow.onclick = function () {
            if (lbflag) {
                clearInterval(tt);
                lbflag = false;
                moveright();
            }
            tt=setInterval(function () {
                moveleft();
            }, 3000);
        }
        //默认展示第一张图片
        function change_pic(){
            let img_url=$('.vision_img_list li:first-child img').attr('src');
            $('.vision_img_list li .vision_mask').css('display','none');
            $('.vision_img_list li:first-child .vision_mask').css('display','block');
            $('.company_img img').attr('src',img_url);
        }
    }
    vision_lb();
    //点击切换展示图片
    $(document).on('click','.vision_img_list li',function () {
        let click_img_url=$(this).find('img').attr('src');
        $('.vision_img_list li .vision_mask').css('display','none');
        $(this).find('.vision_mask').css('display','block');
        $('.company_img img').attr('src',click_img_url);
    })

    function staff_lb() {
        let team_box = $('.staff_lb_box')[0];
        let team_imgbox = $('.staff_lb_box .staff_img_list')[0];
        let leftarrow = $('.arrow_left')[0];
        let rightarrow = $('.arrow_right')[0];
        let width = parseInt(getComputedStyle(team_box, null).width);
        let lbflag = true;
        function moveleft() {
            animate(team_imgbox, {left: -width/4}, 500, function () {
                lbflag = true;
                let first = team_imgbox.firstElementChild;
                team_imgbox.appendChild(first);
                team_imgbox.style.left = '0';
                change_pic();
            });
        }
        function moveright() {
            let first = team_imgbox.firstElementChild;
            let last = team_imgbox.lastElementChild;
            team_imgbox.insertBefore(last, first);
            team_imgbox.style.left = -width/4 + 'px';
            change_pic();
            animate(team_imgbox, {left: 0}, 500, function () {
                lbflag = true;
            });
        }
        let tt = setInterval(function () {
            moveleft();
        }, 3000);
        leftarrow.onclick = function () {
            if (lbflag) {
                clearInterval(tt);
                lbflag = false;
                moveleft();
            }
            tt=setInterval(function () {
                moveleft();
            }, 3000);
        }
        rightarrow.onclick = function () {
            if (lbflag) {
                clearInterval(tt);
                lbflag = false;
                moveright();
            }
            tt=setInterval(function () {
                moveleft();
            }, 3000);
        }
        //默认展示第一张图片
        function change_pic(){
            let img_url=$('.staff_img_list li:first-child img').attr('src');
            $('.staff_img_list li .staff_mask').css('display','none');
            $('.staff_img_list li:first-child .staff_mask').css('display','block');
            $('.staff_img img').attr('src',img_url);
        }
    }
    staff_lb();
    //点击切换展示图片
    $(document).on('click','.staff_img_list li',function () {
        let click_img_url=$(this).find('img').attr('src');
        $('.staff_img_list li .staff_mask').css('display','none');
        $(this).find('.staff_mask').css('display','block');
        $('.staff_img img').attr('src',click_img_url);
    })