   $(window).scroll(function(){
        if($(window).scrollTop()>=700){
            $('.history li:nth-child(1)').addClass('on_1');
            $('.history li:nth-child(2)').addClass('on_2');
            $('.history li:nth-child(3)').addClass('on_3');
            $('.history li:nth-child(4)').addClass('on_4');
            $('.history li:nth-child(5)').addClass('on_5');
        }else{
            $('.history li:nth-child(1)').removeClass('on_1');
            $('.history li:nth-child(2)').removeClass('on_2');
            $('.history li:nth-child(3)').removeClass('on_3');
            $('.history li:nth-child(4)').removeClass('on_4');
            $('.history li:nth-child(5)').removeClass('on_5');
        }
    })
    //太常快讯鼠标移入效果
    $('.left_news_list li').on('mouseenter',function () {
        $('.left_news_list li').removeClass('on');
        $(this).addClass('on');
    })

    //热门资讯轮播图
    let swiper = new Swiper('.news_lb', {
        spaceBetween: 0,
        centeredSlides: true,
        autoplay: {
            delay: 3600,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
    let h=$('.development_bg').height();
    $('.dev_history').height(h);
    window.onresize=function () {
        let h=$('.development_bg').height();
        $('.dev_history').height(h);
    }

    //管理团队轮播图轮播图
    let team_imgbox = $('.team_lb .team_img')[0];
    let leftarrow = $('.arrow_left')[0];
    let rightarrow = $('.arrow_right')[0];
    let width = 200;
    let lbflag = true;
    //展示最中间的人员信息
    function people_info() {
        let Tpeople_img=$('.team_img li:nth-child(3) img').attr('src');
        let people_position=$('.team_img li:nth-child(3) .people_position').val();
        let people_name=$('.team_img li:nth-child(3) .people_name').val();
        let people_desc=$('.team_img li:nth-child(3) .people_desc').val();
        let people_link=$('.team_img li:nth-child(3) .people_link').val();
        $('.people_img img').attr('src',Tpeople_img);
        $('.people_instroduce h2').html(people_position);
        $('.people_instroduce h3').html(people_name);
        $('.people_instroduce p').html(people_desc);
        $('.people_instroduce a').attr('href',people_link);
    }
    people_info();
    function moveleft() {
        animate(team_imgbox, {left: -width}, 500, function () {
            lbflag = true;
            let first = team_imgbox.firstElementChild;
            team_imgbox.appendChild(first);
            team_imgbox.style.left = '0';
            people_info();
        });
    }
    function moveright() {
        let first = team_imgbox.firstElementChild;
        let last = team_imgbox.lastElementChild;
        team_imgbox.insertBefore(last, first);
        team_imgbox.style.left = -width + 'px';
        people_info();
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
