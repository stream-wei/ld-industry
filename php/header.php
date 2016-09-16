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
                    <img style="margin-top: 10px;" src="../resources/images/global/logo.png" title="leader steel" alt="leader steel">
                </a>
            </div><!--网站Logo 结束--></div>
        <div id="top_2">
            <div id="navigation">
                <ul class="navigationlist">
                    <li><a href="indexbak.php" target="_self" >Home</a><!----></li>
                    <li><a href="about.php" target="_self">About us</a>
                        <!--<ul class="subnavigationlist">
                            <li><a href="/culture.html" target="_self">企业文化</a></li>
                            <li><a href="/honor.html" target="_self">资质荣誉</a></li>
                            <li><a href="/video.html" target="_self">宣传视频</a></li>
                        </ul>-->
                    </li>
                    <li><a href="products.php" target="_self">Products</a>
                    </li>
                    <li><a href="service.php" target="_self">Service</a>
                    </li>
                    <li><a href="contact.php" target="_self">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </div>
</div><!--顶部 结束--><!--Flash幻灯片 开始--><!--
<div id="banner_main"><div id="banner"></div></div>--><!--Flash幻灯片 结束--><!--JS幻灯片 开始-->
<div id="banner_main"><!--幻灯片 开始-->
    <div id="banner">
        <ul class="bannerlist">
            <li><img style="width: 100%;height: 100%;" src="../resources/images/global/banner1.jpg"></li>
            <li><img style="width: 100%;height: 100%;" src="../resources/images/global/banner2.jpg"></li>
            <li><img style="width: 100%;height: 100%;" src="../resources/images/global/banner3.jpg"></li>
        </ul>
    </div>
    <div class="hd">
        <ul>
            <li class="">1</li>
            <li class="on">2</li>
        </ul>
    </div><!--幻灯片 结束--></div>
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


