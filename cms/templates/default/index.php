<?php defined('InShopNC') or exit('Access Invalid!');?>
<link rel="stylesheet" href="<?php echo CMS_TEMPLATES_URL;?>/css/cms/health_cloud_sxy.css">
<!--  <div class="cms-content">
<?php 
$index_file = BASE_UPLOAD_PATH.DS.ATTACH_CMS.DS.'index_html'.DS.'index.html';
if(is_file($index_file)) {
    require($index_file);
}
?>

</div>-->
<!--中间主体部分-->
<section class="sxy_content">
    <div id="cont_box">
        <section id="cont_left">
         <?php foreach($output['article_class'] as $class){?>
         <?php if($class['class_id']==15){?>
            <!--天天养生-->
            <div id="health_day">
                <!--标题部分-->
                <div class="cont_title">
                    <p class="tit_eng"><span>Keeping  health</span><i>every day</i></p>
                    <p class="tit_china"><?php echo $class['class_name']?></p>
                </div>
                <!--文章部分-->
                <div class="cont_part">
                    <ul class="cont_pic">
                             <?php foreach($output['dayday_article'] as $dayarticle){?>
                        <li>
                            <a href="<?php echo urlCMS('article','article_detail',array('article_id'=>$dayarticle['article_id']))?>">
                                <div class="img_box">
                                    <img src="<?php echo UPLOAD_SITE_URL.DS.ATTACH_CMS.DS.'article/'.$dayarticle['article_image']['path'].'/'.$dayarticle['article_image']['name'];?>" alt="">
                                </div>
                                <p><?php echo str_cut($dayarticle['article_title'], 25);?></p>
                            </a>
                        </li>
                              <?php }?>
                    </ul>
                    <div class="cont_list">
                        <!--轮播图-->
                        <div class="article_img">
                            <ul class="pic">
                            	<?php echo loadadv(1057);?>
                                <!-- <li class="on">
                                    <a href="javascript:;"><img src="image/hcloud_sxy/health_day_03.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="javascript:;"><img src="image/hcloud_sxy/health_day_04.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="javascript:;"><img src="image/hcloud_sxy/health_day_03.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="javascript:;"><img src="image/hcloud_sxy/health_day_04.jpg" alt=""></a>
                                </li> -->
                            </ul>
                            <ul class="point">
                                <li class="active"></li>
                                <li></li>
                                <li></li>
                                <li></li>
                            </ul>
                        </div>
                        <ul class="article_list">
                         <?php foreach($output['dayday_article_right'] as $dayarticle_right){?>
                            <li>
                                <a href="<?php echo urlCMS('article','article_detail',array('article_id'=>$dayarticle_right['article_id']))?>">
                                    <img src="<?php echo CMS_TEMPLATES_URL.DS.'images/cms/health_day_06.png';?>" alt="" class="gray">
                                    <img src="<?php echo CMS_TEMPLATES_URL.DS.'images/cms/health_day_05.png';?>" alt="" class="orange">
                                    <p><?php echo str_cut($dayarticle_right['article_title'], 50);?></p>
                                    <pre><?php echo $dayarticle_right['article_publish_time'];?></pre>
                                </a>
                            </li>
                            <?php }?>
                            <li class="more_art">
                                <a href="<?php echo urlCMS('article','article_list',array('class_id'=>$class['class_id']))?>">
                                    <img src="<?php echo CMS_TEMPLATES_URL.DS.'images/cms/health_day_02.png';?>" alt="">
                                    <h1>查看更多</h1>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php }elseif($class['class_id']==22){?>
            <!--人人养生-->
            <div class="health_person" id="he_person">
                <!--标题部分-->
                <div class="cont_title">
                    <p class="tit_eng"><span>Health preser</span><i>vation</i></p>
                    <p class="tit_china"><?php echo $class['class_name']?></p>
                </div>
                <!--主体部分-->
                <div class="cont_top">
                    <!--轮播图-->
                    <div class="article_img">
                        <ul class="pic">
                        	<?php echo loadadv(1058);?>
                           <!--  <li class="on">
                                <a href="javascript:;"><img src="image/hcloud_sxy/health_day_03.jpg" alt=""></a>
                            </li>
                            <li>
                                <a href="javascript:;"><img src="image/hcloud_sxy/health_day_04.jpg" alt=""></a>
                            </li>
                            <li>
                                <a href="javascript:;"><img src="image/hcloud_sxy/health_day_03.jpg" alt=""></a>
                            </li>
                            <li>
                                <a href="javascript:;"><img src="image/hcloud_sxy/health_day_04.jpg" alt=""></a>
                            </li> -->
                        </ul>
                        <ul class="point">
                            <li class="active"></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                    </div>
                    <!--热门推荐-->
                    <div class="recommend">
                        <div class="recom_title">
                            <img src="<?php echo CMS_TEMPLATES_URL.DS.'images/cms/health_day_05.png';?>" alt="">
                            <p>热门推荐</p>
                        </div>
                        <?php foreach($output['person_hot_article'] as $hot_article){?>
                        <div class="recom_img">
                            <img src="<?php echo UPLOAD_SITE_URL.DS.ATTACH_CMS.DS.'article/'.$hot_article['article_image']['path'].'/'.$hot_article['article_image']['name'];?>" alt="">
                        </div>
                        <div class="recon_info">        
                            <a href="<?php echo urlCMS('article','article_detail',array('article_id'=>$hot_article['article_id']))?>" class="recon_info_title"><?php echo str_cut($hot_article['article_title'], 30);?></a>
                            <div class="recom_time">
                                <span>|【<?php echo str_cut($hot_article['article_publisher_name'], 5)?>】|</span>
                                <i>|</i>
                                <p><?php echo $hot_article['article_publish_time'];?></p>
                                <a href="javascript:;"><img src="<?php echo CMS_TEMPLATES_URL.DS.'images/cms/health_person.png';?>" alt=""></a>           
                            </div>                   
                        </div>
                         <?php }?>
                    </div>
                </div>
                <div class="cont_line"></div>
                <div class="cont_bottom">
                    <div class="person_list">
                        <ul class="article_list">
                        <?php foreach($output['person_article'] as $personarticle){?>
                            <li>
                                <a href="<?php echo urlCMS('article','article_detail',array('article_id'=>$personarticle['article_id']))?>">
                                   <img src="<?php echo CMS_TEMPLATES_URL.DS.'images/cms/health_day_06.png';?>" alt="" class="gray">
                                    <img src="<?php echo CMS_TEMPLATES_URL.DS.'images/cms/health_day_05.png';?>" alt="" class="orange">
                                    <p><?php echo str_cut($personarticle['article_title'], 50);?></p>
                                    <pre><?php echo $personarticle['article_publish_time'];?></pre>
                                </a>
                            </li>
                        <?php }?>
                        </ul>
                        <div class="person_more">
                            <a href="<?php echo urlCMS('article','article_list',array('class_id'=>$class['class_id']))?>">
                                <img src="<?php echo CMS_TEMPLATES_URL.DS.'images/cms/health_day_02.png';?>" alt="">
                                <p>查看更多</p>
                            </a>
                        </div>
                    </div>
                    <div class="top_img_box">
                        <ul class="topic_img">
                           <?php echo loadadv(1059);?>
                           <!-- <li class="hidden">
                                <img src="image/hcloud_sxy/health_day_03.jpg" alt="">
                            </li>
                            <li class="hidden">
                                <img src="image/hcloud_sxy/health_day_04.jpg" alt="">
                            </li>
                            <li>
                                <img src="image/hcloud_sxy/health_day_03.jpg" alt="">
                            </li>  -->
                        </ul>
                    </div>

                </div>
            </div>
            <?php }elseif ($class['class_id']==23){?>
            <!--处处养生-->
            <div class="health_person health_every">
                <!--标题部分-->
                <div class="cont_title">
                    <p class="tit_eng"><span>Health preser</span><i>vation</i></p>
                    <p class="tit_china"><?php echo $class['class_name']?></p>
                </div>
                <!--主体部分-->
                <div class="cont_top">
                    <!--轮播图-->
                    <div class="article_img">
                        <ul class="pic">
                        <?php echo loadadv(1060);?>
                           <!--  <li class="on">
                                <a href="javascript:;"><img src="image/hcloud_sxy/health_day_03.jpg" alt=""></a>
                            </li>
                            <li>
                                <a href="javascript:;"><img src="image/hcloud_sxy/health_day_04.jpg" alt=""></a>
                            </li>
                            <li>
                                <a href="javascript:;"><img src="image/hcloud_sxy/health_day_03.jpg" alt=""></a>
                            </li>
                            <li>
                                <a href="javascript:;"><img src="image/hcloud_sxy/health_day_04.jpg" alt=""></a>
                            </li> -->
                        </ul>
                        <ul class="point">
                            <li class="active"></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                    </div>
                    <!--热门推荐-->
                    <div class="recommend">
                        <div class="recom_title">
                            <img src="<?php echo CMS_TEMPLATES_URL.DS.'images/cms/health_day_05.png';?>" alt="">
                            <p>热门推荐</p>
                        </div>
                        <?php foreach($output['chuchu_hot_article'] as $hotarticle){?>
                            <div class="recom_img">
                                <img src="<?php echo UPLOAD_SITE_URL.DS.ATTACH_CMS.DS.'article/'.$hotarticle['article_image']['path'].'/'.$hotarticle['article_image']['name'];?>" alt="">
                            </div>
                        	<div class="recon_info">                    	
                                <a href="<?php echo urlCMS('article','article_detail',array('article_id'=>$hotarticle['article_id']))?>"class="recon_info_title"><?php echo str_cut($hotarticle['article_title'], 30);?></a>
                                <div class="recom_time">
                                    <span>|【<?php echo $hotarticle['article_publisher_name']?>】|</span>
                                    <i>|</i>
                                    <p><?php echo $hotarticle['article_publish_time']?></p>
                                    <a href="javascript:;"><img src="<?php echo CMS_TEMPLATES_URL.DS.'images/cms/health_person.png';?>" alt=""></a>
                            	</div>       
                        	</div>
                         <?php }?>
                    </div>
                </div>
                <div class="cont_line"></div>
                <div class="cont_bottom">
                    <ul class="article_list">
                    <?php foreach($output['chuchu_article'] as $cc_article){?>
                            <li>
                                <a href="<?php echo urlCMS('article','article_detail',array('article_id'=>$cc_article['article_id']))?>">
                                   <img src="<?php echo CMS_TEMPLATES_URL.DS.'images/cms/health_day_06.png';?>" alt="" class="gray">
                                    <img src="<?php echo CMS_TEMPLATES_URL.DS.'images/cms/health_day_05.png';?>" alt="" class="orange">
                                    <p><?php echo str_cut($cc_article['article_title'],50);?></p>
                                    <pre><?php echo $cc_article['article_publish_time'];?></pre>
                                </a>
                            </li>
                        <?php }?>
                        <li id="click_more">
                            <a href="<?php echo urlCMS('article','article_list',array('class_id'=>$class['class_id']))?>">
                                <img src="<?php echo CMS_TEMPLATES_URL.DS.'images/cms/health_day_05.png';?>" alt="">
                                <p>查看更多</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
         	 <?php }?>
       <?php }?>
            <!--健康问答-->
            <?php if(is_array($output['question_list']) && !empty($output['question_list'])){?>
            <div id="health_answer">
                <!--标题部分-->
                <div class="cont_title">
                    <p class="tit_eng"><span>Health questi</span><i>on and answer</i></p>
                    <p class="tit_china">健康问答</p>
                </div>
                <!--主体部分-->
                <div class="answer_cont">
                    <div class="answer_left">
                        <div class="answer_img">
                        <?php echo loadadv(1063);?>
<!--                             <img src="image/hcloud_sxy/health_day_03.jpg" alt=""> -->
                        </div>
                        <ul class="answer_list">
                  		 <?php foreach($output['question_list'] as $question){?>
                            <li>
                                <a href="<?php echo urlShop('question','question_show',array('qid'=>$question['question_id']))?>">
                                    <span></span>
                                    <p><?php echo str_cut($question['question_title'], 50);?></p>
                                    <i><?php echo $question['question_member']?></i>
                                </a>
                            </li>
                            <?php }?>                           
                        </ul>
                    </div>
                    <div class="answer_right">
                    <?php echo loadadv(1064);?>
<!--                         <img src="image/hcloud_sxy/health_day_04.jpg" alt=""> -->
                    </div>
                </div>
                <div class="answer_more">
                    <a href="<?php echo urlShop('question','question_list',array('question_status'=>3))?>">
                        <img src="<?php echo CMS_TEMPLATES_URL.DS.'images/cms/health_day_05.png';?>" alt="">
                        <p>查看更多</p>
                    </a>
                </div>
            </div>
            <?php }else{echo '<br/><br/><br/><br/>';}?>
            <!--视频专区-->
            <?php if(is_array($output['video_list']) && !empty($output['video_list'])){?>
            <div id="health_video">
                <!--标题部分-->
                <div class="cont_title">
                    <p class="tit_eng"><span>Health video </span><i>special zone</i></p>
                    <p class="tit_china">视频专区</p>
                </div>
                <!--主体部分-->
                <ul class="video_list">                
                    <?php foreach($output['video_list'] as $video){?>
                        <li>
                            <a href="<?php echo urlshop('video','show',array('video_id'=>$video['video_id']))?>">
                               <img src="<?php echo UPLOAD_SITE_URL.DS."shop/article/".$video['file_name']?>" alt="" onerror="this.src='<?php echo CMS_TEMPLATES_URL.DS.'images/cms/video_sxy_03.png';?>'">
                            </a>
                        </li>
                   <?php }?>                   
                                
                </ul>
                <div class="answer_more">
                    <a href="<?php echo urlShop('video','video',array('vd_id'=>4))?>">
                        <img src="<?php echo CMS_TEMPLATES_URL.DS.'images/cms/health_day_05.png';?>" alt="">
                        <p>查看更多</p>
                    </a>
                </div>
            </div>
            <?php }else{echo '<br/><br/><br/><br/>';}?> 
        </section>
        <section id="cont_right">
            <div class="actity_img">
                <?php echo loadadv(1056);?>
            </div>
            <div class="weixin_account">
                <div class="weixin_orange"></div>
                <div class="weixin_title">
                    <p></p>
                    <h1>微信公众号</h1>
                </div>
                <ul class="weixin_list">
                    <li>
                        <div class="list_top">
                            <div class="wei_img">
                                <img src="<?php echo UPLOAD_SITE_URL.DS.ATTACH_CMS.DS.'health_day_03.jpg';?>" alt="" width='65' height="65">
                            </div>
                            <div class="list_text">
                                <a href="">坚持午睡竟有这么多好处!!!</a>
                                <p>美国阿勒格尼学院研究人员的最新研究发现，如果工作压力人员的最新研究如果工作压力人员的最新研究</p>
                            </div>
                        </div>
                        <div class="list_bottom">
                            <span>09/27</span>
                            <p>独一张</p>
                        </div>
                    </li>
                    <li>
                        <div class="list_top">
                            <div class="wei_img">
                                <img src="<?php echo UPLOAD_SITE_URL.DS.ATTACH_CMS.DS.'health_day_03.jpg';?>" alt="" width='65' height="65">
                            </div>
                            <div class="list_text">
                                <a href="">坚持午睡竟有这么多好处!!!</a>
                                <p>美国阿勒格尼学院研究人员的最新研究发现，如果工作压力人员的最新研究如果工作压力人员的最新研究</p>
                            </div>
                        </div>
                        <div class="list_bottom">
                            <span>09/27</span>
                            <p>独一张</p>
                        </div>
                    </li>
                    <li>
                        <div class="list_top">
                            <div class="wei_img">
                                <img src="<?php echo UPLOAD_SITE_URL.DS.ATTACH_CMS.DS.'health_day_03.jpg';?>" alt="" width='65' height="65">
                            </div>
                            <div class="list_text">
                                <a href="">坚持午睡竟有这么多好处!!!</a>
                                <p>美国阿勒格尼学院研究人员的最新研究发现，如果工作压力人员的最新研究如果工作压力人员的最新研究</p>
                            </div>
                        </div>
                        <div class="list_bottom">
                            <span>09/27</span>
                            <p>独一张</p>
                        </div>
                    </li>
                    <li>
                        <div class="list_top">
                            <div class="wei_img">
                                <img src="<?php echo UPLOAD_SITE_URL.DS.ATTACH_CMS.DS.'health_day_03.jpg';?>" alt="" width='65' height="65">
                            </div>
                            <div class="list_text">
                                <a href="">坚持午睡竟有这么多好处!!!</a>
                                <p>美国阿勒格尼学院研究人员的最新研究发现，如果工作压力人员的最新研究如果工作压力人员的最新研究</p>
                            </div>
                        </div>
                        <div class="list_bottom">
                            <span>09/27</span>
                            <p>独一张</p>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
    </div>
</section>

<script>
    //移上去下拉 独易品
    let wait;
    $('#dyp').hover(
        function () {
            wait = setTimeout(() => {
                $('.dyw_list').slideDown('normal')
            }, 200)
        },
        function () {
            clearTimeout(wait);
            $('.dyw_list').slideUp('normal')
        }
    )
    //手风琴
    $('.cont_bottom .topic_img li').click(function () {
        $('.cont_bottom .topic_img li').addClass('hidden');
        $(this).removeClass('hidden');
    });
    
    //轮播图
    function lb(a,b,c) {
        let box=$(a);//最外层盒子
        let imgs=$(b);//图片li
        let cirs=$(c);//点li
        let now=0;
        let next=0;
        let flag=true;
        function move(way='right'){
            if(way=='right'){
                next=now+1;
                if(next>=imgs.length){
                    next=0;
                }//图片到最后一张后，就要返回到第一张
            }else if(way=='left'){
                next=now-1;
                if(next<0){
                    next=imgs.length-1;
                }//图片到最后一张后，就要返回到第一张
            }
            imgs.eq(next).animate({opacity:1},300,function(){
                flag=true;
            }).end().eq(now).animate({opacity:0},300);
            cirs.eq(next).addClass('active').end().eq(now).removeClass('active');
            now=next;
        }
        let t=setInterval(move,1500);
        box.hover(function(){
            clearInterval(t);
        },function(){
            t=setInterval(move,1500);
        })
        cirs.click(function(){
            imgs.eq($(this).index()).animate({opacity:1},300).end().eq(now).animate({opacity:0},300);
            cirs.eq($(this).index()).addClass('active').end().eq(now).removeClass('active');
            now=$(this).index();
        })
    }
    lb('.cont_part .article_img','.cont_part .article_img .pic  li','.cont_part .article_img .point  li');
    lb('#he_person .article_img','#he_person .article_img .pic  li','#he_person .article_img .point  li');
    lb('.health_every .article_img','.health_every .article_img .pic  li','.health_every .article_img .point  li');
</script>

