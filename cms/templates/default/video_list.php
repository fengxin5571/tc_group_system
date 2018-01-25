<?php defined('InShopNC') or exit('Access Invalid!');?>
<link rel="stylesheet" href="<?php echo CMS_TEMPLATES_URL;?>/css/cms/videolist_sxy.css">
<!--中间内容部分-->
<section class="content_sxy">
    <!--上半部分-->
    <div class="top_content">
        <!--左边-->
        <div class="left_content">
            <!--二级导航开始-->
            <div class="second_nav">
                <span>当前位置</span>
                <i>|</i>
                <a href="<?php echo urlCMS("index","index" )?>">首页</a>
                <img src="<?php echo CMS_TEMPLATES_URL;?>/img/newslist_sxy/arrow_03.png" alt="">
                <a href="<?php echo urlCMS("article","article_list" ,array("class_id"=>0))?>" class="active">视频列表</a>
            </div>
            <!--二级导航结束-->
            <!--精品视频推荐开始-->
            <div class="video_title">
                <span></span>
                <p>精品视频推荐</p>
            </div>
            <ul class="video_list">
                <li>
                    <a href=""><img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/video_list_03.png" alt=""></a>
                   <p class="video_Title">示例标题展示</p>
                </li>
                <li>
                    <a href=""><img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/video_list_05.png" alt=""></a>
                    <p class="video_Title">示例标题展示</p>
                </li>
                <li>
                    <a href=""><img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/video_list_09.png" alt=""></a>
                    <p class="video_Title">示例标题展示</p>
                </li>
            </ul>
            <ul class="video_list1">
                <li>
                    <a href=""><img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/video_list_13.png" alt=""></a>
                    <p class="video_Title">示例标题展示</p>
                </li>
                <li>
                    <a href=""><img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/video_list_15.png" alt=""></a>
                    <p class="video_Title">示例标题展示</p>
                </li>
                <li>
                    <a href=""><img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/video_list_17.png" alt=""></a>
                    <p class="video_Title">示例标题展示</p>
                </li>
            </ul>
            <!--精品视频推荐结束-->
        </div>
        <!--右边视频排行开始-->
        <div class="right_rank">
            <div class="rank_line"></div>
            <div class="rank_box">
                <h1>
                    <span></span>
                    <i>视频排行</i>
                </h1>
                <ul class="rank_list">
                    <li>
                        <i class="iconfont">&#xe635;</i>
                        <div class="rank_title">
                            <a href="">坚持午睡竟有这么多好处!!!</a>
                            <div class="rank_author">
                                <p>作者：<span>示例</span></p>
                                <div class="play_time">
                                    <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/rank_03.png" alt="">
                                    <span>600</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <i class="iconfont">&#xe636;</i>
                        <div class="rank_title">
                            <a href="">坚持午睡竟有这么多好处!!!</a>
                            <div class="rank_author">
                                <p>作者：<span>示例</span></p>
                                <div class="play_time">
                                    <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/rank_03.png" alt="">
                                    <span>600</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <i class="iconfont">&#xe637;</i>
                        <div class="rank_title">
                            <a href="">坚持午睡竟有这么多好处!!!</a>
                            <div class="rank_author">
                                <p>作者：<span>示例</span></p>
                                <div class="play_time">
                                    <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/rank_03.png" alt="">
                                    <span>600</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="rank_after">
                        <p>04</p>
                        <a href="">坚持午睡竟有这么多好处!!!</a>
                        <div class="play_time">
                            <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/rank_06.png" alt="">
                            <span>600</span>
                        </div>
                    </li>
                    <li class="rank_after">
                        <p>05</p>
                        <a href="">坚持午睡竟有这么多好处!!!</a>
                        <div class="play_time">
                            <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/rank_06.png" alt="">
                            <span>600</span>
                        </div>
                    </li>
                    <li class="rank_after">
                        <p>06</p>
                        <a href="">坚持午睡竟有这么多好处!!!</a>
                        <div class="play_time">
                            <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/rank_06.png" alt="">
                            <span>600</span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!--右边视频排行结束-->
    </div>
    <!--下半部分-->
    <section class="bottom_content">
        <div class="category_title">
            <span></span>
            <h1>视频分类</h1>
            <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/arrow_03.png" alt="">
            <ul class="video_category">
                <li class="active">
                    <p>全部</p>
                    <i></i>
                </li>
                <li>
                    <p>示例1</p>
                    <i></i>
                </li>
                <li>
                    <p>示例2</p>
                    <i></i>
                </li>
                <li>
                    <p>示例3</p>
                    <i></i>
                </li>
                <li>
                    <p>示例4</p>
                    <i></i>
                </li>
                <li>
                    <p>示例5</p>
                    <i></i>
                </li>
            </ul>
        </div>
        <ul class="cate_list on">
            <li>
            <a href="">
                <div class="video_img">
                    <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/video_liat_03.png" alt="">
                </div>
                <p>坚持午睡竟有这么多好处！</p>
            </a>
            <div class="upload_info">
                <div>
                    <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/rank_03.png" alt="">
                    <p>200</p>
                </div>
                <h2>上传于<span>3小时前</span> </h2>
            </div>
        </li>
            <li>
                <a href="">
                    <div class="video_img">
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/video_liat_05.png" alt="">
                    </div>
                    <p>坚持午睡竟有这么多好处！</p>
                </a>
                <div class="upload_info">
                    <div>
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/rank_03.png" alt="">
                        <p>200</p>
                    </div>
                    <h2>上传于<span>3小时前</span> </h2>
                </div>
            </li>
            <li>
                <a href="">
                    <div class="video_img">
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/video_liat_07.png" alt="">
                    </div>
                    <p>坚持午睡竟有这么多好处！</p>
                </a>
                <div class="upload_info">
                    <div>
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/rank_03.png" alt="">
                        <p>200</p>
                    </div>
                    <h2>上传于<span>3小时前</span> </h2>
                </div>
            </li>
            <li>
                <a href="">
                    <div class="video_img">
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/video_liat_09.png" alt="">
                    </div>
                    <p>坚持午睡竟有这么多好处！</p>
                </a>
                <div class="upload_info">
                    <div>
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/rank_03.png" alt="">
                        <p>200</p>
                    </div>
                    <h2>上传于<span>3小时前</span> </h2>
                </div>
            </li>
            <li>
                <a href="">
                    <div class="video_img">
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/video_liat_03.png" alt="">
                    </div>
                    <p>坚持午睡竟有这么多好处！</p>
                </a>
                <div class="upload_info">
                    <div>
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/rank_03.png" alt="">
                        <p>200</p>
                    </div>
                    <h2>上传于<span>3小时前</span> </h2>
                </div>
            </li>
            <li>
                <a href="">
                    <div class="video_img">
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/video_liat_05.png" alt="">
                    </div>
                    <p>坚持午睡竟有这么多好处！</p>
                </a>
                <div class="upload_info">
                    <div>
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/rank_03.png" alt="">
                        <p>200</p>
                    </div>
                    <h2>上传于<span>3小时前</span> </h2>
                </div>
            </li>
            <li>
                <a href="">
                    <div class="video_img">
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/video_liat_07.png" alt="">
                    </div>
                    <p>坚持午睡竟有这么多好处！</p>
                </a>
                <div class="upload_info">
                    <div>
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/rank_03.png" alt="">
                        <p>200</p>
                    </div>
                    <h2>上传于<span>3小时前</span> </h2>
                </div>
            </li>
            <li>
                <a href="">
                    <div class="video_img">
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/video_liat_09.png" alt="">
                    </div>
                    <p>坚持午睡竟有这么多好处！</p>
                </a>
                <div class="upload_info">
                    <div>
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/rank_03.png" alt="">
                        <p>200</p>
                    </div>
                    <h2>上传于<span>3小时前</span> </h2>
                </div>
            </li>
            <li>
                <a href="">
                    <div class="video_img">
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/video_liat_03.png" alt="">
                    </div>
                    <p>坚持午睡竟有这么多好处！</p>
                </a>
                <div class="upload_info">
                    <div>
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/rank_03.png" alt="">
                        <p>200</p>
                    </div>
                    <h2>上传于<span>3小时前</span> </h2>
                </div>
            </li>
            <li>
                <a href="">
                    <div class="video_img">
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/video_liat_05.png" alt="">
                    </div>
                    <p>坚持午睡竟有这么多好处！</p>
                </a>
                <div class="upload_info">
                    <div>
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/rank_03.png" alt="">
                        <p>200</p>
                    </div>
                    <h2>上传于<span>3小时前</span> </h2>
                </div>
            </li>
            <li>
                <a href="">
                    <div class="video_img">
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/video_liat_07.png" alt="">
                    </div>
                    <p>坚持午睡竟有这么多好处！</p>
                </a>
                <div class="upload_info">
                    <div>
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/rank_03.png" alt="">
                        <p>200</p>
                    </div>
                    <h2>上传于<span>3小时前</span> </h2>
                </div>
            </li>
            <li>
                <a href="">
                    <div class="video_img">
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/video_liat_09.png" alt="">
                    </div>
                    <p>坚持午睡竟有这么多好处！</p>
                </a>
                <div class="upload_info">
                    <div>
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/rank_03.png" alt="">
                        <p>200</p>
                    </div>
                    <h2>上传于<span>3小时前</span> </h2>
                </div>
            </li>
        </ul>
        <ul class="cate_list">
            <li>
                <a href="">
                    <div class="video_img">
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/video_liat_03.png" alt="">
                    </div>
                    <p>坚持午睡竟有这么多好处！</p>
                </a>
                <div class="upload_info">
                    <div>
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/rank_03.png" alt="">
                        <p>200</p>
                    </div>
                    <h2>上传于<span>3小时前</span> </h2>
                </div>
            </li>
            <li>
                <a href="">
                    <div class="video_img">
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/video_liat_05.png" alt="">
                    </div>
                    <p>坚持午睡竟有这么多好处！</p>
                </a>
                <div class="upload_info">
                    <div>
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/rank_03.png" alt="">
                        <p>200</p>
                    </div>
                    <h2>上传于<span>3小时前</span> </h2>
                </div>
            </li>
            <li>
                <a href="">
                    <div class="video_img">
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/video_liat_03.png" alt="">
                    </div>
                    <p>坚持午睡竟有这么多好处！</p>
                </a>
                <div class="upload_info">
                    <div>
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/rank_03.png" alt="">
                        <p>200</p>
                    </div>
                    <h2>上传于<span>3小时前</span> </h2>
                </div>
            </li>
            <li>
                <a href="">
                    <div class="video_img">
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/video_liat_05.png" alt="">
                    </div>
                    <p>坚持午睡竟有这么多好处！</p>
                </a>
                <div class="upload_info">
                    <div>
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/rank_03.png" alt="">
                        <p>200</p>
                    </div>
                    <h2>上传于<span>3小时前</span> </h2>
                </div>
            </li>
            <li>
                <a href="">
                    <div class="video_img">
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/video_liat_07.png" alt="">
                    </div>
                    <p>坚持午睡竟有这么多好处！</p>
                </a>
                <div class="upload_info">
                    <div>
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/rank_03.png" alt="">
                        <p>200</p>
                    </div>
                    <h2>上传于<span>3小时前</span> </h2>
                </div>
            </li>
            <li>
                <a href="">
                    <div class="video_img">
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/video_liat_09.png" alt="">
                    </div>
                    <p>坚持午睡竟有这么多好处！</p>
                </a>
                <div class="upload_info">
                    <div>
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/rank_03.png" alt="">
                        <p>200</p>
                    </div>
                    <h2>上传于<span>3小时前</span> </h2>
                </div>
            </li>
        </ul>
        <ul class="cate_list">
            <li>
                <a href="">
                    <div class="video_img">
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/video_liat_03.png" alt="">
                    </div>
                    <p>坚持午睡竟有这么多好处！</p>
                </a>
                <div class="upload_info">
                    <div>
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/rank_03.png" alt="">
                        <p>200</p>
                    </div>
                    <h2>上传于<span>3小时前</span> </h2>
                </div>
            </li>
            <li>
                <a href="">
                    <div class="video_img">
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/video_liat_05.png" alt="">
                    </div>
                    <p>坚持午睡竟有这么多好处！</p>
                </a>
                <div class="upload_info">
                    <div>
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/rank_03.png" alt="">
                        <p>200</p>
                    </div>
                    <h2>上传于<span>3小时前</span> </h2>
                </div>
            </li>
            <li>
                <a href="">
                    <div class="video_img">
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/video_liat_07.png" alt="">
                    </div>
                    <p>坚持午睡竟有这么多好处！</p>
                </a>
                <div class="upload_info">
                    <div>
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/rank_03.png" alt="">
                        <p>200</p>
                    </div>
                    <h2>上传于<span>3小时前</span> </h2>
                </div>
            </li>
            <li>
                <a href="">
                    <div class="video_img">
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/video_liat_09.png" alt="">
                    </div>
                    <p>坚持午睡竟有这么多好处！</p>
                </a>
                <div class="upload_info">
                    <div>
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/rank_03.png" alt="">
                        <p>200</p>
                    </div>
                    <h2>上传于<span>3小时前</span> </h2>
                </div>
            </li>
            <li>
                <a href="">
                    <div class="video_img">
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/video_liat_07.png" alt="">
                    </div>
                    <p>坚持午睡竟有这么多好处！</p>
                </a>
                <div class="upload_info">
                    <div>
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/rank_03.png" alt="">
                        <p>200</p>
                    </div>
                    <h2>上传于<span>3小时前</span> </h2>
                </div>
            </li>
            <li>
                <a href="">
                    <div class="video_img">
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/video_liat_09.png" alt="">
                    </div>
                    <p>坚持午睡竟有这么多好处！</p>
                </a>
                <div class="upload_info">
                    <div>
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/rank_03.png" alt="">
                        <p>200</p>
                    </div>
                    <h2>上传于<span>3小时前</span> </h2>
                </div>
            </li>
            <li>
                <a href="">
                    <div class="video_img">
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/video_liat_03.png" alt="">
                    </div>
                    <p>坚持午睡竟有这么多好处！</p>
                </a>
                <div class="upload_info">
                    <div>
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/rank_03.png" alt="">
                        <p>200</p>
                    </div>
                    <h2>上传于<span>3小时前</span> </h2>
                </div>
            </li>
            <li>
                <a href="">
                    <div class="video_img">
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/video_liat_05.png" alt="">
                    </div>
                    <p>坚持午睡竟有这么多好处！</p>
                </a>
                <div class="upload_info">
                    <div>
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/rank_03.png" alt="">
                        <p>200</p>
                    </div>
                    <h2>上传于<span>3小时前</span> </h2>
                </div>
            </li>
            <li>
                <a href="">
                    <div class="video_img">
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/video_liat_07.png" alt="">
                    </div>
                    <p>坚持午睡竟有这么多好处！</p>
                </a>
                <div class="upload_info">
                    <div>
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/rank_03.png" alt="">
                        <p>200</p>
                    </div>
                    <h2>上传于<span>3小时前</span> </h2>
                </div>
            </li>
            <li>
                <a href="">
                    <div class="video_img">
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/video_liat_09.png" alt="">
                    </div>
                    <p>坚持午睡竟有这么多好处！</p>
                </a>
                <div class="upload_info">
                    <div>
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/rank_03.png" alt="">
                        <p>200</p>
                    </div>
                    <h2>上传于<span>3小时前</span> </h2>
                </div>
            </li>
        </ul>
        <ul class="cate_list">
            <li>
                <a href="">
                    <div class="video_img">
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/video_liat_03.png" alt="">
                    </div>
                    <p>坚持午睡竟有这么多好处！</p>
                </a>
                <div class="upload_info">
                    <div>
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/rank_03.png" alt="">
                        <p>200</p>
                    </div>
                    <h2>上传于<span>3小时前</span> </h2>
                </div>
            </li>
            <li>
                <a href="">
                    <div class="video_img">
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/video_liat_05.png" alt="">
                    </div>
                    <p>坚持午睡竟有这么多好处！</p>
                </a>
                <div class="upload_info">
                    <div>
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/rank_03.png" alt="">
                        <p>200</p>
                    </div>
                    <h2>上传于<span>3小时前</span> </h2>
                </div>
            </li>
            <li>
                <a href="">
                    <div class="video_img">
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/video_liat_07.png" alt="">
                    </div>
                    <p>坚持午睡竟有这么多好处！</p>
                </a>
                <div class="upload_info">
                    <div>
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/rank_03.png" alt="">
                        <p>200</p>
                    </div>
                    <h2>上传于<span>3小时前</span> </h2>
                </div>
            </li>
            <li>
                <a href="">
                    <div class="video_img">
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/video_liat_07.png" alt="">
                    </div>
                    <p>坚持午睡竟有这么多好处！</p>
                </a>
                <div class="upload_info">
                    <div>
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/rank_03.png" alt="">
                        <p>200</p>
                    </div>
                    <h2>上传于<span>3小时前</span> </h2>
                </div>
            </li>
            <li>
                <a href="">
                    <div class="video_img">
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/video_liat_09.png" alt="">
                    </div>
                    <p>坚持午睡竟有这么多好处！</p>
                </a>
                <div class="upload_info">
                    <div>
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/rank_03.png" alt="">
                        <p>200</p>
                    </div>
                    <h2>上传于<span>3小时前</span> </h2>
                </div>
            </li>
            <li>
                <a href="">
                    <div class="video_img">
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/video_liat_03.png" alt="">
                    </div>
                    <p>坚持午睡竟有这么多好处！</p>
                </a>
                <div class="upload_info">
                    <div>
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/rank_03.png" alt="">
                        <p>200</p>
                    </div>
                    <h2>上传于<span>3小时前</span> </h2>
                </div>
            </li>
            <li>
                <a href="">
                    <div class="video_img">
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/video_liat_05.png" alt="">
                    </div>
                    <p>坚持午睡竟有这么多好处！</p>
                </a>
                <div class="upload_info">
                    <div>
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/rank_03.png" alt="">
                        <p>200</p>
                    </div>
                    <h2>上传于<span>3小时前</span> </h2>
                </div>
            </li>
        </ul>
        <ul class="cate_list">
            <li>
                <a href="">
                    <div class="video_img">
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/video_liat_03.png" alt="">
                    </div>
                    <p>坚持午睡竟有这么多好处！</p>
                </a>
                <div class="upload_info">
                    <div>
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/rank_03.png" alt="">
                        <p>200</p>
                    </div>
                    <h2>上传于<span>3小时前</span> </h2>
                </div>
            </li>
            <li>
                <a href="">
                    <div class="video_img">
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/video_liat_03.png" alt="">
                    </div>
                    <p>坚持午睡竟有这么多好处！</p>
                </a>
                <div class="upload_info">
                    <div>
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/rank_03.png" alt="">
                        <p>200</p>
                    </div>
                    <h2>上传于<span>3小时前</span> </h2>
                </div>
            </li>
            <li>
                <a href="">
                    <div class="video_img">
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/video_liat_05.png" alt="">
                    </div>
                    <p>坚持午睡竟有这么多好处！</p>
                </a>
                <div class="upload_info">
                    <div>
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/rank_03.png" alt="">
                        <p>200</p>
                    </div>
                    <h2>上传于<span>3小时前</span> </h2>
                </div>
            </li>
            <li>
                <a href="">
                    <div class="video_img">
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/video_liat_07.png" alt="">
                    </div>
                    <p>坚持午睡竟有这么多好处！</p>
                </a>
                <div class="upload_info">
                    <div>
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/rank_03.png" alt="">
                        <p>200</p>
                    </div>
                    <h2>上传于<span>3小时前</span> </h2>
                </div>
            </li>
            <li>
                <a href="">
                    <div class="video_img">
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/video_liat_09.png" alt="">
                    </div>
                    <p>坚持午睡竟有这么多好处！</p>
                </a>
                <div class="upload_info">
                    <div>
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/rank_03.png" alt="">
                        <p>200</p>
                    </div>
                    <h2>上传于<span>3小时前</span> </h2>
                </div>
            </li>
        </ul>
        <ul class="cate_list">
            <li>
                <a href="">
                    <div class="video_img">
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/video_liat_07.png" alt="">
                    </div>
                    <p>坚持午睡竟有这么多好处！</p>
                </a>
                <div class="upload_info">
                    <div>
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/rank_03.png" alt="">
                        <p>200</p>
                    </div>
                    <h2>上传于<span>3小时前</span> </h2>
                </div>
            </li>
            <li>
                <a href="">
                    <div class="video_img">
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/video_liat_09.png" alt="">
                    </div>
                    <p>坚持午睡竟有这么多好处！</p>
                </a>
                <div class="upload_info">
                    <div>
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/rank_03.png" alt="">
                        <p>200</p>
                    </div>
                    <h2>上传于<span>3小时前</span> </h2>
                </div>
            </li>
            <li>
                <a href="">
                    <div class="video_img">
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/video_liat_03.png" alt="">
                    </div>
                    <p>坚持午睡竟有这么多好处！</p>
                </a>
                <div class="upload_info">
                    <div>
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/rank_03.png" alt="">
                        <p>200</p>
                    </div>
                    <h2>上传于<span>3小时前</span> </h2>
                </div>
            </li>
            <li>
                <a href="">
                    <div class="video_img">
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/video_liat_05.png" alt="">
                    </div>
                    <p>坚持午睡竟有这么多好处！</p>
                </a>
                <div class="upload_info">
                    <div>
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/rank_03.png" alt="">
                        <p>200</p>
                    </div>
                    <h2>上传于<span>3小时前</span> </h2>
                </div>
            </li>
            <li>
                <a href="">
                    <div class="video_img">
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/video_liat_07.png" alt="">
                    </div>
                    <p>坚持午睡竟有这么多好处！</p>
                </a>
                <div class="upload_info">
                    <div>
                        <img src="<?php echo CMS_TEMPLATES_URL;?>/img/videolist_sxy/rank_03.png" alt="">
                        <p>200</p>
                    </div>
                    <h2>上传于<span>3小时前</span> </h2>
                </div>
            </li>
        </ul>
    </section>
    <!--分页-->
     <!--分页-->
    <div class="pagination">
        <ul>
            <li class="page_"><span>上一页</span></li>
            <li class="page active"><span>1</span></li>
            <li class="page"><span>2</span></li>
            <li class="page"><span>3</span></li>
            <li class="page"><span>4</span></li>
            <li class="page"><span>5</span></li>
            <li><span>……</span></li>
            <li class="page"><span>12</span></li>
            <li class="page"><span>13</span></li>
            <li class="page_"><span>下一页</span></li>
        </ul>
    </div>
</section>