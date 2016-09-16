<?php include_once '../php/header_s.php'; ?>
    <link rel="stylesheet" type="text/css" href="../resources/css/products/basecss.css">
    <link rel="stylesheet" type="text/css" href="../resources/css/products/index.css">
    <link rel="stylesheet" type="text/css" href="../resources/css/products/style.css">
    <link rel="stylesheet" type="text/css" href="../resources/css/products/media-queries.css">
    <script>
        function changeImage(src) {
            $("#serviceImage").attr("src",src);
        }
    </script>
    <section>
        <div class="content">
            <div class="contentIn clearfix">
                <div class="position"><a href="/index.html" rel="nofollow">Home</a>
                    » <a href="/about-2.html" rel="nofollow">Services</a>
                </div>
                <!--左边开始-->
                <div class="caseList">
                    <div class="sub_right_tit">Services</div>
                    <div class="sub_goods">
                        <img width="695px" id="serviceImage" src="../resources/images/services/INSPECTION.png">
                    </div>
                </div>
                <!--左边结束-->
                <!--右边开始-->
                <div class="leftIn">
                    <div class="sidemenu">
                        <ul>
                            <li class="">
                                <h5><a href="">EXPORT LOGISTIC</a> </h5>
                                <ul class="erj" style="display: block;">
                                    <li><a href="javascript:;" onclick="changeImage('../resources/images/services/INSPECTION.png')">INSPECTION</a> </li>
                                </ul>
                                <ul class="erj" style="display: block;">
                                    <li><a href="javascript:;" onclick="changeImage('../resources/images/services/LOADING.png')">LOADING</a> </li>
                                </ul>
                                <ul class="erj" style="display: block;">
                                    <li><a href="javascript:;" onclick="changeImage('../resources/images/services/PACKAGE.png')">PACKAGE</a> </li>
                                </ul>
                            </li>
                            <li class="">
                                <h5><a href="">PROCESS PLATFORM</a> </h5>
                                <ul class="erj" style="display: block;">
                                    <li><a href="javascript:;" onclick="changeImage('../resources/images/services/PROCESS-QUIPMENT.png')">PROCESS EQUIPMENT</a> </li>
                                </ul>
                                <ul class="erj" style="display: block;">
                                    <li><a href="javascript:;" onclick="changeImage('../resources/images/services/QUALITY-EQUIPMENT.png')">QUALITY EQUIPMENT</a> </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="contactSide">
                        <h3>Contact Us</h3>
                        <ul>
                            <li>Contacts: Leader Steel</li>
                            <li><a href="mailto:leadersteelsh@gmail.com">leadersteelsh@gmail.com</a></li>
                            <li><a href="skype:leadersteelsh?chat">Skype: leadersteelsh</a></li>
                            <li>Tel: 0086-21 33323999</li>
                            <li>Fax: 0086-21 33323998</li>
                        </ul>
                    </div>
                </div>
                <!--右边结束-->
            </div>
        </div>
    </section>
    <script type="text/javascript" src="../resources/js/products/this_website.js"></script>
<?php
include_once 'footer.php';
?>