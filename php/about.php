<?php
include_once 'header_s.php';
?>
<link rel="stylesheet" type="text/css" href="../resources/css/about/basecss.css">
<link rel="stylesheet" type="text/css" href="../resources/css/about/index.css">
<link rel="stylesheet" type="text/css" href="../resources/css/about/style.css">

<script>
    function showDiv(id) {
        $(".case_read").css("display","none");
        $("#" + id).css("display","inline");
    }
</script>
<section>
    <div class="content">
        <div class="contentIn clearfix">
            <div class="position"> <a href="index.php" rel="nofollow">Home</a>
                » <a href="about.php" rel="nofollow">About</a>
            </div>
            <!--右边开始-->
            <div class="caseList">
                <div class="sub_right_tit">About</div>
                <div class="case_read" id="aboutDiv" style="display: inline;">
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;
                        LEADER STEEL is sub-company of LEADER WATER INDUSTRY CO.,LTD which founded in 1996, is located in Shanghai, China. Now spreading branches offices to Wuxi, Foshan, Dainan, Wenzhou, Lishui, Tianjin, Zhengzhou, city.<br/>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        LEADER STEEL is a super iron and steel giant that operates iron ore mining, steel production, processing, distribution and trading. This worldwide leading stainless steel producer has an annual capacity of 0.2 million tons steel (of which 30% are stainless steel).<br/>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        Guided by innovation concept and supported by state level technology center and stainless steel material lab, LEADER STEEL cooperated with TISCO, BAOSTEEL, JISCO, JIULI, TPCO, LISCO, PCK has developed several product clusters like stainless steel, silicon steel and high strength high ductility series that own higher energy efficiency and longer service life, with some of them being used in petroleum, chemical, shipbuilding, container, railway, automobile, urban light rail, power generation, spacecrafts and other key sectors and emerging industries. Over 20 steel grades, including duplex steel, heat resistant steel, railway-based steel and wheel axle steel, take the biggest market share in China. Over 30 varieties fill the blank in domestic and oversea market.<br/>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        LEADER STEEL is granted “China Grand Awards for Industry” and “National Quality Reward”, and nominated the first “Quality Prize Awarded by Chinese Government”. Besides, it is honored the titles of “National Leading Company in Circular Economy”, “China Top 10 in Innovation”, “National Demonstration for Technology Innovation”, “Enterprises being most Socially Responsible in China”, “National Model with Harmonious Labor Relations”, “National Leading Enterprises in Company Culture and Ethics Development”, “National Model for Landscaping”, and etc.
                        <br/>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        Looking to the future, LEADER STEEL will make its main business more competitive while carrying out diversified, extensive, green and harmonious development modes, so as to be the most competitive stainless steel producer in the world as well as a worldwide first-class enterprise.
                        <br/>
                    </p>
                    <p><span style="font-family: arial, helvetica, sans-serif; font-size: medium;"><img src="../resources/images/about/20151109094514_790.jpg" alt=""><br></span></p>
                </div>
                <div class="case_read" id="certificateDiv" style="display: none;">
                    <p>
                        <img src="../resources/images/certificates/cer1.jpg" alt="" width="233" height="283"> &nbsp;&nbsp;
                        <img src="../resources/images/certificates/cer2.jpg" alt="" width="210" height="283"> &nbsp;&nbsp;&nbsp;
                        <img src="../resources/images/certificates/cer3.jpg" alt="" width="200" height="283">
                    </p>
                    <p>
                        <img src="../resources/images/certificates/cer4.jpg" alt="" width="221" height="310"> &nbsp;
                    </p>
                </div>
                <div class="case_read" id="teamDiv" style="display: none;">
                    <p>
                        <img src="../resources/images/team/team.png" alt="" /> &nbsp;&nbsp;
                    </p>
                </div>
            </div>
            <!--右边结束-->
            <!--左边开始-->
            <div class="leftIn">
                <div class="sideLeft">
                    <h3>About Us</h3>
                    <ul>
                        <li><a href="javascript:;" onclick="showDiv('certificateDiv');">Certificates</a></li>
                        <li><a href="javascript:;" onclick="showDiv('teamDiv')">Team</a></li>

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
            <!--左边结束-->
        </div>
    </div>
</section>
<?php
include_once 'footer.php';
?>
