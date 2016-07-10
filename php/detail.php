<?php include_once '../php/header_s.php'; ?>
<link rel="stylesheet" type="text/css" href="../resources/css/products/basecss.css">
<link rel="stylesheet" type="text/css" href="../resources/css/products/index.css">
<link rel="stylesheet" type="text/css" href="../resources/css/products/style.css">
<link rel="stylesheet" type="text/css" href="../resources/css/products/media-queries.css">
<?php
if (isset($_GET['pId'])) {
    $pId = $_GET['pId'];
} else {
    $pId = null;
}
if (isset($_GET['cId'])) {
    $cId = $_GET['cId'];
} else {
    $cId = null;
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = 1;
}
$mysqli = new mysqli('stream.gotoftp1.com', 'stream', '3183371911', 'stream');
if (mysqli_connect_errno()) {
    printf("连接失败:%s\n", mysqli_connect_error());
    exit();
}
$queryDetail = 'SELECT
	detail.ID AS productId,
	detail.DESCRIPTION AS description,
	detail.DETAIL AS detail,
	detail.TITLE AS title,
	category.CATEGORY_NAME AS categoryName
FROM
	PRODUCT_DETAIL detail,
	PRODUCT product,
	PRODUCT_CATEGORY category
WHERE
 detail.PRODUCT_ID = product.ID
AND product.CATEGORY_ID = category.ID
AND category.AVAILABLE = 1 
AND detail.ID = '.$id;
$productDetail = $mysqli->query($queryDetail);
$productId = '';
$description = '';
$detail = '';
$title = '';
$categoryName = '';
while (list($productIdTemp,$descriptionTemp,$detailTemp,$titleTemp,$categoryNameTemp) = $productDetail->fetch_row()){
    $productId = $productIdTemp;
    $description = $descriptionTemp;
    $detail = $detailTemp;
    $title = $titleTemp;
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
                <div class="sub_right_tit"><?php echo $categoryName;?></div>
                <div class="goods_read">
                    <div class="pro_view_top">
                        <div class="pro_img">
                            <div class="bpic">
                                <ul>
                                    <li style="display:block;">
                                        <a href="#" class="highslide" onclick="return hs.expand(this)" target="_blank">
                                            <?php
                                            $queryImageSql = "SELECT i.URL,d.TITLE
                                                    FROM product_detail d, product_image pi, image_info i
                                                    WHERE d.ID = pi.PRODUCT_ID AND pi.IMAGE_ID = i.ID AND i.AVAILABLE = 1 AND d.ID = $id";
                                            $imageList = $mysqli->query($queryImageSql);
                                            $imageListArray = $imageList->fetch_row();
                                            echo "<img src='/upload/$imageListArray[0]' id='bigPic' alt='$imageListArray[1]'>";
                                            ?>

                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!--缩图开始-->
                            <script type="text/javascript" src="../resources/js/jcarousel/lib/jquery.jcarousel.pack.js"></script>
                            <link rel="stylesheet" type="text/css" href="../resources/js/jcarousel/skins/tango/skin.css" />
                            <script type="text/javascript">
                                jQuery(document).ready(function() {
                                    jQuery('#mycarousel').jcarousel();
                                });
                                function showBigImg(img) {
                                    $("#bigPic").attr('src',img.src.replace('small/',''));
                                }
                            </script>
                            <ul id="mycarousel" class="jcarousel-skin-tango">
                                <?php
                                $queryImageSql = "SELECT i.URL,i.SMALL_URL 
                                                    FROM product_detail d, product_image pi, image_info i
                                                    WHERE d.ID = pi.PRODUCT_ID AND pi.IMAGE_ID = i.ID AND i.AVAILABLE = 1 AND d.ID = $id";
                                $imageList = $mysqli->query($queryImageSql);
                                while (list($url,$smallUrl) = $imageList->fetch_row()){
                                    echo "<li><img src='/upload/small/$smallUrl' width='75' height='75' alt='' onclick='showBigImg(this)' /></li>";
                                }
                                ?>
                            </ul>
                        </div>
                        <div class="pro_view_inner">
                            <h1><?php echo $title;?></h1>
                            <ul>
                                <li class="pro_name"></li>
                                <li class="pro_dscp">Description:</li>
                                <li>
                                    <div><?php echo $description?></div>
                                </li>
                                <li><a href="http://www.sakysteel.com/stainless-steel-round-bar-53.html#inquiry"
                                       class="conNow">Contact Now</a></li>
                                <li><!-- Go to www.addthis.com/dashboard to generate a new set of sharing buttons -->
                                   <!-- <a href="https://api.addthis.com/oexchange/0.8/forward/pinterest/offer?url=http%3A%2F%2Fsakysteel.com&amp;pubid=ra-5502a49f0c924bd2&amp;ct=1&amp;pco=tbxnj-1.0"
                                       target="_blank"><img src="./detail_files/pinterest.png" border="0"
                                                            alt="Pinterest"></a>
                                    <a href="https://api.addthis.com/oexchange/0.8/forward/linkedin/offer?url=http%3A%2F%2Fsakysteel.com&amp;pubid=ra-5502a49f0c924bd2&amp;ct=1&amp;pco=tbxnj-1.0"
                                       target="_blank"><img src="./detail_files/linkedin.png" border="0" alt="LinkedIn"></a>
                                    <a href="https://api.addthis.com/oexchange/0.8/forward/google_plusone_share/offer?url=http%3A%2F%2Fsakysteel.com&amp;pubid=ra-5502a49f0c924bd2&amp;ct=1&amp;pco=tbxnj-1.0"
                                       target="_blank"><img src="./detail_files/google_plusone_share.png" border="0"
                                                            alt="Google+"></a>
                                    <a href="https://api.addthis.com/oexchange/0.8/forward/facebook/offer?url=http%3A%2F%2Fsakysteel.com&amp;pubid=ra-5502a49f0c924bd2&amp;ct=1&amp;pco=tbxnj-1.0"
                                       target="_blank"><img src="./detail_files/facebook.png" border="0" alt="Facebook"></a>
                                    <a href="https://api.addthis.com/oexchange/0.8/forward/twitter/offer?url=http%3A%2F%2Fsakysteel.com&amp;pubid=ra-5502a49f0c924bd2&amp;ct=1&amp;pco=tbxnj-1.0"
                                       target="_blank"><img src="./detail_files/twitter.png" border="0"
                                                            alt="Twitter"></a>
                                    <a href="https://www.addthis.com/bookmark.php?source=tbx32nj-1.0&amp;v=300&amp;url=http%3A%2F%2Fsakysteel.com&amp;pubid=ra-5502a49f0c924bd2&amp;ct=1&amp;pco=tbxnj-1.0"
                                       target="_blank"><img src="./detail_files/addthis.png" border="0"
                                                            alt="Addthis"></a>-->
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="pro_text">
                        <ul class="tabs clearfix">
                            <li class="active">Details</li>
                        </ul>
                        <div class="tabscon">
                            <dl style="display: block;">
                                <dt>
                                <div style="overflow: auto;"><?php echo $detail;?></div>
                                </dt>
                            </dl>

                        </div>
                    </div>
                </div>
                <div class="inqu_read"><a id="inquiry"></a>
                    <div class="formtitle"><strong>Online Inquiry</strong>
                        <p>Please feel free to give your inquiry in the form below.We will reply you in 24 hours.</p>
                    </div>
                    <div class="inquirShow">
                        <form method="post" action="http://www.sakysteel.com/index.php?ac=form&amp;at=save" id="contact"
                              name="contact" class="contact-iqr">
                            <input type="hidden" value="sakysteel@126.com" name="targetemail">
                            <input type="hidden" name="linkurl" value="add">
                            <input type="hidden" name="fgid" id="fgid" value="1">
                            <input type="hidden" name="formcode" id="formcode" value="contact">
                            <input type="hidden" name="did" id="did" value="53">
                            <input type="hidden" name="Title" id="Title" value="stainless steel round bar">
                            <ul class="clearfix">
                                <li class="half">
                                    <p>
                                        <input type="text" name="Email" value="Email*"
                                               onfocus="if(value==&#39;Email*&#39;){value=&#39;&#39;}"
                                               onblur="if(value==&#39;&#39;){value=&#39;Email*&#39;}">
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
                        while (list($categoryParentId, $categoryParentName) = $categoryParentResult->fetch_row()) {
                            $categoryParentTemp = ($pId == null || $pId == '') ? 1 : $pId;
                            echo '<li class="">';
                            echo "<h5><a href=\"products.php?currPage=1&pId=$categoryParentId\">$categoryParentName</a> </h5>";
                            $queryCategoryList = "SELECT c.ID categoryId,d.ID id,c.PARENT_ID parentId,c.CATEGORY_NAME name 
                                            FROM product_detail d,product p,product_category c 
                                            WHERE d.PRODUCT_ID = p.ID AND p.CATEGORY_ID = c.ID AND c.PARENT_ID = $categoryParentId AND c.AVAILABLE = 1";
                            $categoryResult = $mysqli->query($queryCategoryList);
                            while (list($categoryId, $id, $partenId, $categoryName) = $categoryResult->fetch_row()) {
                                $categoryTemp = ($pId == null || $pId == '') ? 1 : $pId;
                                if ($partenId == $categoryTemp) {
                                    echo '<ul class="erj" style="display: block;">';
                                } else {
                                    echo '<ul class="erj" style="display: none;">';
                                }
                                echo "<li><a href=\"detail.php?cId=$categoryId&id=$id&pId=$partenId\">$categoryName</a> </li>";
                                echo "</ul>";
                            }
                            echo "</li>";
                        }
                        ?>
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
