<?php include_once '../php/header_s.php'; ?>
<link rel="stylesheet" type="text/css" href="../resources/css/products/basecss.css">
<link rel="stylesheet" type="text/css" href="../resources/css/products/index.css">
<link rel="stylesheet" type="text/css" href="../resources/css/products/style.css">
<link rel="stylesheet" type="text/css" href="../resources/css/products/media-queries.css">
<?php
if (isset($_GET['categoryParent'])) {
    $categoryParent = $_GET['categoryParent'];
} else {
    $categoryParent = null;
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = 1;
}
$mysqli = new mysqli('localhost', 'stream', '3183371911', 'stream');
if (mysqli_connect_errno()) {
    printf("连接失败:%s\n", mysqli_connect_error());
    exit();
}
$queryDetail = 'SELECT
	detail.ID AS productId,
	detail.DESCRIPTION AS description,
	detail.DETAIL AS detail,
	detail.TITLE AS title,
	category.CATEGORY_NAME AS categoryName,
	image.URL AS url
FROM
	PRODUCT_DETAIL detail,
	IMAGE_INFO image,
	PRODUCT product,
	PRODUCT_CATEGORY category
WHERE
	image.ID = detail.IMAGE_ID
AND detail.PRODUCT_ID = product.ID
AND product.CATEGORY_ID = category.ID
AND image.AVAILABLE = 1
AND category.AVAILABLE = 1 
AND image.TYPE = 3 AND detail.PRODUCT_ID = '.$id;
$productDetail = $mysqli->query($queryDetail);
$productId = '';
$description = '';
$detail = '';
$title = '';
$categoryName = '';
$url = '';
while (list($productIdTemp,$descriptionTemp,$detailTemp,$titleTemp,$categoryNameTemp,$urlTemp) = $productDetail->fetch_row()){
    $productId = $productIdTemp;
    $description = $descriptionTemp;
    $detail = $detailTemp;
    $title = $titleTemp;
    $url = $urlTemp;
    $categoryName = $categoryNameTemp;
}
?>
<style>

</style>
<section>
    <div class="content">
        <div class="contentIn clearfix">
            <div class="position"><a href="/index.html" rel="nofollow">Home</a>
                » <a href="/about-2.html" rel="nofollow">Products</a>
                »  <a href="#" rel="nofollow"><?php echo $categoryName;?></a>
            </div>
            <!--左边开始-->
            <div class="caseList">
                <div class="sub_right_tit">Contact Us</div>
                <div id="article-lsf">
                    <div><strong style="line-height: 25.2px;"><span style="font-family: verdana;font-weight: bold">SHANGHAI EXPORT DEPARTMENT&nbsp;</span></strong></div>
                    <div><strong style="line-height: 25.2px;"><span style="font-family: verdana;font-weight: bold">LEADER STEEL CO., LTD&nbsp;</span></strong></div>
                    <div style="line-height: 25.2px;">
                        <span style="font-family: verdana;"><strong style="font-weight: bold">ADD:</strong>&nbsp;FLOOR 9, KELI MANSION, NO. 1801 HONGMEI RD. MINHANG DISTRICT, SHANGHAI, CHINA</span></div>
                    <div style="line-height: 25.2px;">
                        <span style="font-family: verdana;"><strong style="font-weight: bold">TEL:</strong>&nbsp;0086-21-33323999;&nbsp;</span></div>
                    <div style="line-height: 25.2px;">
                        <span style="font-family: verdana;"><strong style="font-weight: bold">FAX:</strong>&nbsp;0086-21-33323998;&nbsp;</span></div>
                    <div style="line-height: 25.2px;">
                        <span style="font-family: verdana;"><strong style="font-weight: bold">EMAIL:</strong>&nbsp;leadersteelsh@gmail.com</span></div>
                    <div style="line-height: 25.2px;">
                        <span style="font-family: verdana;"><strong style="font-weight: bold">Skype:</strong>&nbsp;leadersteelsh</span></div>

                    <br/>

                    <div><strong style="line-height: 25.2px;"><span style="font-family: verdana;font-weight: bold">ZHENGZHOU BRANCH OFFICE&nbsp;</span></strong></div>
                    <div><strong style="line-height: 25.2px;"><span style="font-family: verdana;font-weight: bold">LEADER WATER INDUSTRY CO.,LTD&nbsp;</span></strong></div>
                    <div style="line-height: 25.2px;">
                        <span style="font-family: verdana;"><strong style="font-weight: bold">ADD:</strong>&nbsp;ROOM1210, NO. 288 NORTHTONBAI RD. ZHONGYUAN DISTRICT, ZHENGZHOU,HENAN, CHINA</span></div>
                    <div style="line-height: 25.2px;">
                        <span style="font-family: verdana;"><strong style="font-weight: bold">TEL:</strong>&nbsp;0086-371-60972128;&nbsp;</span></div>
                    <div style="line-height: 25.2px;">
                        <span style="font-family: verdana;"><strong style="font-weight: bold">FAX:</strong>&nbsp;0086-371-60972100;&nbsp;</span></div>

                    <br/>

                    <div><strong style="line-height: 25.2px;"><span style="font-family: verdana;font-weight: bold">ZHEJIANG FACTORY&nbsp;</span></strong></div>
                    <div><strong style="line-height: 25.2px;"><span style="font-family: verdana;font-weight: bold">LEADER WATER INDUSTRY CO., LTD&nbsp;</span></strong></div>
                    <div style="line-height: 25.2px;">
                        <span style="font-family: verdana;"><strong style="font-weight: bold">ADD:</strong>&nbsp;SHAMEN,BIBGGNG DEVELOPMENT ZONE,TAIZHOU ZHEJIANG</span></div>
                    <div style="line-height: 25.2px;">
                        <span style="font-family: verdana;"><strong style="font-weight: bold">TEL:</strong>&nbsp;0086-576-80739665;&nbsp;</span></div>
                    <div style="line-height: 25.2px;">
                        <span style="font-family: verdana;"><strong style="font-weight: bold">FAX:</strong>&nbsp;0086-576-89675832;&nbsp;</span></div>


                    <script>
                        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

                        ga('create', 'UA-78633206-1', 'auto');
                        ga('send', 'pageview');

                    </script>
                </div>
            </div>
            <!--左边结束-->
            <!--右边开始-->
            <div class="leftIn">
                <div class="sidemenu">
                    <ul>
                        <?php
                        $queryCategoryParentList = 'SELECT c.ID AS id,c.CATEGORY_NAME AS name FROM PRODUCT_CATEGORY c WHERE c.PARENT_ID = 0 AND c.AVAILABLE = 1';
                        $categoryParentResult = $mysqli->query($queryCategoryParentList);
                        while (list($categoryParentId, $categoryParentName) = $categoryParentResult->fetch_row()){
                        $categoryParentTemp = ($categoryParent == null || $categoryParent == '') ? 1 : $categoryParent;
                        echo '<li class="">';
                        ?>
                        <h5>
                            <a href="products.php?currPage=1&categoryParent=<?php echo "$categoryParentId"; ?>"><?php echo "$categoryParentName"; ?></a>
                        </h5>
                        <?php
                        $queryCategoryList = "SELECT c.ID AS id,c.CATEGORY_NAME AS name,c.PARENT_ID AS parentId FROM PRODUCT_CATEGORY c WHERE c.PARENT_ID = $categoryParentId AND c.AVAILABLE = 1";
                        $categoryResult = $mysqli->query($queryCategoryList);
                        while (list($categoryId, $categoryName, $partenId) = $categoryResult->fetch_row()){
                        $categoryTemp = ($categoryParent == null || $categoryParent == '') ? 1 : $categoryParent;
                        if ($partenId == $categoryTemp) {
                            echo '<ul class="erj active" style="display: block;">';
                        } else {
                            echo '<ul class="erj" style="display: none;">';
                        }
                        ?>
                        <li>
                            <a href="products.php?currPage=1&category=<?php echo "$categoryId"; ?>"><?php echo "$categoryName"; ?></a>
                        </li>

                    </ul>
                    <?php } ?>
                    </li>
                    <?php } ?>


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
$mysqli->close();
include_once 'footer.php';
?>
