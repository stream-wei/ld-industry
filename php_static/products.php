<?php include_once '../php/header_s.php'; ?>
<link rel="stylesheet" type="text/css" href="../resources/css/products/basecss.css">
<link rel="stylesheet" type="text/css" href="../resources/css/products/index.css">
<link rel="stylesheet" type="text/css" href="../resources/css/products/style.css">
<link rel="stylesheet" type="text/css" href="../resources/css/products/media-queries.css">
<?php
if (isset($_GET['currPage'])) {
    $currPage = $_GET['currPage'];
} else {
    $currPage = 1;
}
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
$pageSize = 9;
$mysqli = new mysqli('stream.gotoftp1.com', 'stream', '3183371911', 'stream');
if (mysqli_connect_errno()) {
    printf("连接失败:%s\n", mysqli_connect_error());
    exit();
}

$startPage = ($currPage - 1) * $pageSize;
$queryList = "SELECT 
  p.PRODUCT_NAME, 
  p.TITLE, 
  i.URL, 
  i.IMAGE_DESC ,
  pd.ID, 
  p.CATEGORY_PARENT_ID, 
  p.CATEGORY_ID 
FROM PRODUCT p, IMAGE_INFO i,PRODUCT_DETAIL pd ";
$queryCount = "SELECT count(p.PRODUCT_NAME) FROM PRODUCT p, IMAGE_INFO i ,PRODUCT_DETAIL pd ";
$querySql = '';
if (($pId != null && $pId != '') || ($cId != null && $cId != '')) {
    $querySql = $querySql . ", PRODUCT_CATEGORY c ";
}
$querySql = $querySql . "WHERE p.IMAGE_ID = i.ID AND i.TYPE = 2 AND p.AVAILABLE = 1 AND i.AVAILABLE = 1 AND pd.PRODUCT_ID = p.ID ";
if ($pId != null && $pId != '') {
    $querySql = $querySql . "AND p.CATEGORY_PARENT_ID = c.ID and c.AVAILABLE = 1 and p.CATEGORY_PARENT_ID=$pId ";
}
if ($cId != null && $cId != '') {
    $querySql = $querySql . "AND p.CATEGORY_ID = c.ID and c.AVAILABLE = 1 and p.CATEGORY_ID=$cId ";
}
$limitSql = " order by p.sort ";
$limitSql = $limitSql . " limit $startPage,$pageSize";
echo $queryList.$querySql.$limitSql;
$result = $mysqli->query($queryList . $querySql . $limitSql);
$countResult = $mysqli->query($queryCount . $querySql);
$total = $countResult->fetch_row()[0];
?>

<section>
    <div class="content">
        <div class="contentIn clearfix">
            <div class="position"><a href="index.html" rel="nofollow">Home</a>
                » <a href="about.html" rel="nofollow">Products</a>
            </div>
            <!--左边开始-->
            <div class="caseList">
                <div class="sub_right_tit">Products</div>
                <div class="sub_goods">
                    <ul class="clearfix">
                        <?php
                        while (list($product_name, $title, $url, $image_desc,$dId,$pIdTemp,$cIdTemp) = $result->fetch_row()) {
                            echo "<li><a href='".str_replace(' ','_',$product_name)."' title='$title'> <img src='$url' alt='$image_desc'/></a>";
                            echo "<p><a href='#' title='$title'>$product_name</a></p>";
                            echo "</li>";
                        }
                        ?>
                    </ul>

                </div>
                <?php
                $rowCount = ceil($total / $pageSize);
                if ($rowCount != 1) {
                    ?>
                    <div class="list_pages" style="margin-left:20px;">
                        <div class="digg">
                            <a class="p1" title="Home" href="products.php?currPage=1">Home</a>
                            <a class="p1" title="Prev" href="products.php?currPage=<?php if ($currPage == 1) {
                                echo $currPage;
                            } else {
                                echo $currPage - 1;
                            } ?>">Prev</a>
                            <!--                        <span class="current disabled">1</span>-->
                            <?php
                            if ($currPage <= 3) {
                                for ($i = 1; $i <= $rowCount; $i++) {
                                    if ($i > 5) {
                                        break;
                                    }
                                    if ($i == $currPage) {
                                        echo "<a class='current disabled' title='$i' href='products.php?currPage=$i'>$i</a>";
                                    } else {
                                        echo "<a title='$i' href='products.php?currPage=$i'>$i</a>";
                                    }
                                }
                            } else {
                                $temp = $currPage + 2 > $rowCount ? $rowCount : $currPage + 2;
                                for ($i = ($currPage - 2); $i <= $temp; $i++) {
                                    if ($i == $currPage) {
                                        echo "<a class='current disabled' title='$i' href='products.php?currPage=$i'>$i</a>";
                                    } else {
                                        echo "<a title='$i' href='products.php?currPage=$i'>$i</a>";
                                    }
                                }
                            }
                            ?>
                            <a class="p1" title="Next" href="products.php?currPage=<?php if ($currPage == $rowCount) {
                                echo $currPage;
                            } else {
                                echo $currPage + 1;
                            } ?>">Next</a>
                            <a class="p1" title="Last" href="products.php?currPage=<?php echo $rowCount ?>">Last</a>
                        </div>
                    </div>
                <?php } ?>
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
