<?php
include_once 'header_s.php';
?>
<link rel="stylesheet" type="text/css" href="../resources/css/about/basecss.css">
<link rel="stylesheet" type="text/css" href="../resources/css/about/index.css">
<link rel="stylesheet" type="text/css" href="../resources/css/about/style.css">
<script>
    function showImg(type) {
        if (type == 1){
            $("#div1").css("display","inline");
            $("#div2").css("display","none");
            $("#div3").css("display","none");
        } else if (type == 2){
            $("#div1").css("display","none");
            $("#div2").css("display","inline");
            $("#div3").css("display","none");
        } else if (type == 3){
            $("#div1").css("display","none");
            $("#div2").css("display","none");
            $("#div3").css("display","inline");
        }
    }
</script>
<section>
    <div class="content">
        <div class="contentIn clearfix">
            <div class="position"> <a href="/index.html" rel="nofollow">Home</a>
                » <a href="/about-2.html" rel="nofollow">Service</a>
            </div>
            <!--右边开始-->
            <div class="caseList">
                <div class="sub_right_tit">Service</div>
                <div class="case_read" id="div1">
                    <img src="http://www.haosteelgroup.com/UploadFiles/201605/2110592678172.jpg" />
                </div>
                <div class="case_read" id="div2" style="display: none;">
                    <img src="http://www.sakysteel.com/upfile/2015/11/06/20151106192535_747.jpg" />
                </div>
                <div class="case_read" id="div3" style="display: none;">
                    <img src="http://www.haosteelgroup.com/UploadFiles/201605/2110592678172.jpg" />
                </div>
            </div>
            <!--右边结束-->
            <!--左边开始-->
            <div class="leftIn">
                <div class="sideLeft">
                    <h3>Service</h3>
                    <ul>
                        <li><a href="javascript:;" onclick="showImg(1)">Process Equipment</a></li>
                        <li><a href="javascript:;" onclick="showImg(2)">Team</a></li>
                        <li><a href="javascript:;" onclick="showImg(3)"> Export Package</a></li>

                    </ul>
                </div>
                
                <div class="contactSide">
                    <h3>Contact Us</h3>
                    <ul>
                        <li>Contacts: Saky Steel</li>
                        <li><a href="mailto:sales@sakysteel.com">sales@sakysteel.com</a></li>
                        <li><a href="skype:saky.steel?chat">Skype: saky.steel</a></li>
                        <li>Tel: 0086-21 60446500;60446511</li>
                        <li>Fax: 0086-21 51026334</li>
                        <li>Address: A205 No.588 ZhuYuan Road,Shanghai,China 201112</li>
                    </ul>
                </div>
            </div>
            <!--左边结束-->
        </div>
    </div>
</section>
<?php
include_once 'footer.php';
?>
