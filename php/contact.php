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
$mysqli = new mysqli('192.168.1.88', 'root', '123456', 'INDUSTRY');
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
                <div class="about_read">
                    <div class="contactML">
                        <p><img alt="" src="./contact_files/20151028111159_652.png"><span id="transmark">&nbsp;</span>
                        </p>
                        <p>Saky Steel Co.,ltd is a manufactuer for AISI Bar Pipe Sheet Wire foundation in 1995.</p>
                        <p>We have the certificate of ISO SGS CE DNV TUV CCS LRQA ROHS Export License etc.</p>
                    </div>
                    <div class="mess">
                        <div class="mess"><span
                                style="color: #000000; font-size: medium;"><strong>Saky Steel CO., LTD </strong></span>
                        </div>
                        <ul>
                            <li>
                                <dl class="clearfix">
                                    <dt>Tel:</dt>
                                    <dd>0086-21 60446500;60446511;60444500;60444511</dd>
                                </dl>
                                <dl class="clearfix">
                                    <dt>Mobile:</dt>
                                    <dd>0086-13764965049</dd>
                                </dl>
                                <dl class="clearfix">
                                    <dt>Address:</dt>
                                    <dd>No.588 ZhuYuan Road,MinHang District,Shanghai,China 201112</dd>
                                </dl>
                                <dl class="clearfix">
                                    <dt>Email</dt>
                                    <dd>sales@sakysteel.com</dd>
                                </dl>
                                <dl class="clearfix">
                                    <dt>Fax</dt>
                                    <dd>0086-21 51026334</dd>
                                    <dt>Skype</dt>
                                    <dd>saky.steel&nbsp;</dd>
                                </dl>
                            </li>
                        </ul>
                        <p>&nbsp;</p>
                        <p><span
                                style="color: #000000; font-size: medium;"><strong>Xing Hua Saky Steel CO., LTD </strong></span>
                        </p>
                        <ul>
                            <li>
                                <dl class="clearfix">
                                    <dt>Tel:</dt>
                                    <dd>86-17605235523</dd>
                                </dl>
                                <dl class="clearfix">
                                    <dt>Plant:</dt>
                                    <dd>DaiNan Technology Park,Xing Hua City,Jiangsu Province,China <br></dd>
                                </dl>
                                <dl class="clearfix">
                                    <dt>Email</dt>
                                    <dd>sakysteel@163.com</dd>
                                </dl>
                                <dl class="clearfix">
                                    <dt>Fax</dt>
                                    <dd>86-523-83781499</dd>
                                </dl>
                            </li>
                        </ul>
                    </div>
                    <div class="mcePaste" id="_mcePaste"
                         style="position: absolute; left: -10000px; top: 503px; width: 1px; height: 1px; overflow: hidden;">
                        Fax
                    </div>
                    <div class="formtitle"><strong>Online Inquiry</strong>
                        <p>Please feel free to give your inquiry in the form below.We will reply you in 24 hours.</p>
                    </div>
                    <div class="inquirShow">
                        <form method="post" action="http://www.sakysteel.com/index.php?ac=form&amp;at=save" id="contact"
                              name="contact" class="products1-inquiry">
                            <input type="hidden" value="sakysteel@126.com" name="targetemail">
                            <input type="hidden" name="linkurl" value="add">
                            <input type="hidden" name="fgid" id="fgid" value="1">
                            <input type="hidden" name="formcode" id="formcode" value="contact">
                            <input type="hidden" name="did" id="did" value="3">
                            <input type="hidden" name="Title" id="Title" value="ONLINE INQUIRY">
                            <ul class="clearfix">
                                <li class="half">
                                    <p>
                                        <input type="text" name="Email" value="Email"
                                               onfocus="if(value==&#39;Email&#39;){value=&#39;&#39;}"
                                               onblur="if(value==&#39;&#39;){value=&#39;Email&#39;}">
                                    </p>
                                </li>
                                <li class="clearfix"></li>
                                <li class="mess">
                                    <p>
                                        <textarea name="Message" class="txtMess" value=""
                                                  onfocus="if(value==&#39;Message*&#39;){value=&#39;&#39;}"
                                                  onblur="if(value==&#39;&#39;){value=&#39;Message*&#39;}">Message*</textarea>
                                    </p>
                                </li>
                                <li class="btnWrap">
                                    <input class="btn focusOn" type="submit" value="Submit">
                                    <input class="btn focusOn" type="reset" value="Refill">
                                </li>
                            </ul>
                        </form>
                    </div>
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
                        <li>Contacts: Saky Steel</li>
                        <li><a href="mailto:sales@sakysteel.com">sales@sakysteel.com</a></li>
                        <li><a href="skype:saky.steel?chat">Skype: saky.steel</a></li>
                        <li>Tel: 0086-21 60446500;60446511</li>
                        <li>Fax: 0086-21 51026334</li>
                        <li>Address: A205 No.588 ZhuYuan Road,Shanghai,China 201112</li>
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
