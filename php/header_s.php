<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>web</title>
    <meta name="keywords" content="web">
    <link href="../resources/css/global/style.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="../resources/js/global/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="../resources/js/global/common.js"></script>
    <!--首页banner滚动-->
    <script type="text/javascript" src="../resources/js/global/jquery.SuperSlide.js"></script>
</head>
<body class="body_index"><!--顶部 开始-->
<div id="top_main">
    <div id="top">
        <div id="logo"><!--网站Logo 开始-->
            <div class="WebLogo">
                <a href="#" target="_self">
                    <img style="margin-top: 10px;" src="../resources/images/global/logo.png" title="某某公司" alt="某某公司">
                </a>
            </div><!--网站Logo 结束--></div>
        <div id="top_2">
            <div id="navigation">
                <ul class="navigationlist">
                    <li><a href="index.php" target="_self" >Home</a><!----></li>
                    <li><a href="about.php" target="_self">About us</a>
                        <!--<ul class="subnavigationlist">
                            <li><a href="/culture.html" target="_self">企业文化</a></li>
                            <li><a href="/honor.html" target="_self">资质荣誉</a></li>
                            <li><a href="/video.html" target="_self">宣传视频</a></li>
                        </ul>-->
                    </li>
                    <li><a href="products.php" target="_self">Products</a>
                        <!--<ul class="subnavigationlist"><li><a href="/companynews.html" target="_self">公司新闻</a></li><li><a href="/industrytrends.html" target="_self">行业动态</a></li></ul>-->
                    </li>
                    <li><a href="#" target="_self">Service</a>
                        <!--<ul class="subnavigationlist"><li><a href="/snzm.html" target="_self">室内照明</a></li><li><a href="/dgcp.html" target="_self">电工产品</a></li><li><a href="/gyzm.html" target="_self">光源照明</a></li><li><a href="/hwzm.html" target="_self">户外照明</a></li><li><a href="/zycp.html" target="_self">专业产品</a></li><li><a href="/jcdd.html" target="_self">集成吊顶</a></li></ul>-->
                    </li>
                    <li><a href="#" target="_self">Contact Us</a><!----></li>
                </ul>
            </div>
        </div>
    </div>
</div><!--顶部 结束--><!--Flash幻灯片 开始--><!--
<div id="banner_main"><div id="banner"></div></div>--><!--Flash幻灯片 结束--><!--JS幻灯片 开始-->
<div id="banner_main"><!--幻灯片 开始-->

</div>
<script>
    if ($(".bannerlist li").length > 0) {
        $('#banner_main').slide({
            titCell: '.hd ul',
            mainCell: '#banner ul',
            autoPlay: true,
            autoPage: true,
            delayTime: 500,
            effect: 'left'
        });
        $(window).resize(function () {
            CenterBanner();
        });
        $(document).ready(function (e) {
            CenterBanner();
        });
    } else {
        $("#banner_main").hide();
    }

    function CenterBanner() {
        var imgWidth = parseInt($(".bannerlist li img:first").width());
        if (imgWidth <= 0) return;
        var winWidth = parseInt($(window).width());
        var offset = parseInt((winWidth - imgWidth) / 2);
        $(".bannerlist li img").css("margin-left", offset + 'px');
    }
</script><!--JS幻灯片 结束--><!--主体内容 开始-->


