<?php include_once '../php/header.php';?>
<link rel="stylesheet" type="text/css" href="../resources/css/products/basecss.css">
<link rel="stylesheet" type="text/css" href="../resources/css/products/index.css">
<link rel="stylesheet" type="text/css" href="../resources/css/products/style.css">
<link rel="stylesheet" type="text/css" href="../resources/css/products/media-queries.css">
<?php
if(isset($_GET['currPage'])){
    $currPage = $_GET['currPage'];
} else {
    $currPage = 1;
}
if(isset($_GET['categoryParent'])){
    $categoryParent = $_GET['categoryParent'];
} else {
    $categoryParent = null;
}
if(isset($_GET['category'])){
    $category = $_GET['category'];
} else {
    $category = null;
}
$pageSize = 9;
$mysqli = new mysqli('localhost', 'root', '123456', 'INDUSTRY');
if (mysqli_connect_errno()) {
    printf("连接失败:%s\n", mysqli_connect_error());
    exit();
}

$startPage = ($currPage - 1)*$pageSize;
$queryList = "SELECT 
  p.PRODUCT_NAME, 
  p.TITLE, 
  i.URL, 
  i.IMAGE_DESC 
FROM PRODUCT p, IMAGE_INFO i ";
$queryCount = "SELECT count(p.PRODUCT_NAME) FROM PRODUCT p, IMAGE_INFO i ";
$querySql = '';
if(($categoryParent != null && $categoryParent != '') || ($category != null && $category != '')){
    $querySql = $querySql.", PRODUCT_CATEGORY c ";
}
$querySql = $querySql."WHERE p.IMAGE_ID = i.ID AND i.TYPE = 2 AND p.AVAILABLE = 1 AND i.AVAILABLE = 1 ";
if($categoryParent != null && $categoryParent != ''){
    $querySql = $querySql."AND p.CATEGORY_PARENT_ID = c.ID and c.AVAILABLE = 1 and p.CATEGORY_PARENT_ID=$categoryParent ";
}
if($category != null && $category != ''){
    $querySql = $querySql."AND p.CATEGORY_ID = c.ID and c.AVAILABLE = 1 and p.CATEGORY_ID=$category ";
}
$limitSql = " limit $startPage,$pageSize";
//echo $queryList.$querySql.$limitSql;
$result = $mysqli->query($queryList.$querySql.$limitSql);
$countResult = $mysqli->query($queryCount.$querySql);
$total = $countResult->fetch_row()[0];
?>

<section>
    <div class="bannerBox"></div>
    <div class="content">
        <div class="contentIn clearfix">
            <!--左边开始-->
            <div class="caseList">
                <div class="sub_right_tit">Products</div>
                <div class="sub_goods">
                    <ul class="clearfix">
                        <?php
                        while (list($product_name,$title,$url,$image_desc) = $result->fetch_row()){
                        ?>
                        <li> <a href="#" title="<?php echo $title;?>"><img src="<?php echo $url; ?>" alt="<?php echo $image_desc;?>"></a>
                            <p><a href="#" title="<?php echo $title;?>"><?php echo $product_name; ?></a></p>
                        </li>
                        <?php
                        }
                        ?>
                    </ul>

                </div>
                <?php
                $rowCount = ceil($total / $pageSize);
                if ($rowCount != 1){?>
                <div class="list_pages" style="margin-left:20px;">
                    <div class="digg">
                        <a class="p1" title="Home" href="products.php?currPage=1">Home</a>
                        <a class="p1" title="Prev" href="products.php?currPage=<?php if($currPage == 1){echo $currPage;} else {echo $currPage - 1;}?>">Prev</a>
<!--                        <span class="current disabled">1</span>-->
                        <?php
                            if($currPage <= 3){
                                for($i=1;$i<=$rowCount;$i++){
                                    if($i > 5){
                                        break;
                                    }
                                    if($i == $currPage){
                                        echo "<a class='current disabled' title='$i' href='products.php?currPage=$i'>$i</a>";
                                    } else {
                                        echo "<a title='$i' href='products.php?currPage=$i'>$i</a>";
                                    }
                                }
                            } else {
                                $temp = $currPage + 2 > $rowCount ? $rowCount : $currPage + 2;
                                for($i=($currPage - 2);$i<=$temp;$i++){
                                    if($i == $currPage){
                                        echo "<a class='current disabled' title='$i' href='products.php?currPage=$i'>$i</a>";
                                    } else {
                                        echo "<a title='$i' href='products.php?currPage=$i'>$i</a>";
                                    }
                                }
                            }
                        ?>
                        <a class="p1" title="Next" href="products.php?currPage=<?php if($currPage == $rowCount){echo $currPage;} else {echo $currPage + 1;}?>">Next</a>
                        <a class="p1" title="Last" href="products.php?currPage=<?php echo $rowCount?>">Last</a>
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
                        while (list($categoryParentId,$categoryParentName) = $categoryParentResult->fetch_row()){
                            $categoryParentTemp = ($categoryParent == null || $categoryParent == '') ? 1 : $categoryParent;
                            if($categoryParentId == $categoryParentTemp){
                                echo '<li class="">';
                            } else {
                                echo '<li class="">';
                            }
                        ?>
                            <h5><a href="products.php?currPage=1&categoryParent=<?php echo "$categoryParentId";?>"><?php echo "$categoryParentName";?></a></h5>
                            <?php
                            $queryCategoryList = "SELECT c.ID AS id,c.CATEGORY_NAME AS name,c.PARENT_ID AS parentId FROM PRODUCT_CATEGORY c WHERE c.PARENT_ID = $categoryParentId AND c.AVAILABLE = 1";
                            $categoryResult = $mysqli->query($queryCategoryList);
                            while (list($categoryId,$categoryName,$partenId) = $categoryResult->fetch_row()){
                                $categoryTemp = ($categoryParent == null || $categoryParent == '') ? 1 : $categoryParent;
//                                echo $categoryTemp.'===========';
//                                echo $categoryId.'---------';
                                if($partenId == $categoryTemp){
                                    echo '<ul class="erj active" style="display: block;">';
                                } else {
                                    echo '<ul class="erj" style="display: none;">';
                                }
                            ?>
                                <li><a href="products.php?currPage=1&category=<?php echo "$categoryId"; ?>"><?php echo "$categoryName"; ?></a>
                                </li>

                            </ul>
                            <?php } ?>
                        </li>
                        <?php } ?>



                    </ul>
                </div>

                <div class="cert">
                    <h3>OUR CERTIFICATION</h3>
                    <ul class="clearfix">

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



<ul>
<?php
$startPage = ($currPage - 1)*$pageSize;
$result = $mysqli->query("SELECT * FROM product limit $startPage,$pageSize");

while (list($product_name,$url) = $result->fetch_row()){
//    echo $product_name.'<br/>'.'<img src="../upload/1.jpg" />';
}

$mysqli->close();
?>
</ul>
<?php
//$rowCount = ceil($total / $pageSize);
//echo "<span>";
//echo "<a href='products.php?currPage=1' style='color: black;'>Home</a>";
//if($currPage != 1){
//    echo "<a href='products.php?currPage=".($currPage - 1)."' style='color: black;'>Prev</a>";
//}
//for ($i = 1;$i <= $rowCount;$i++){
//    if($currPage == $i){
//        echo "<a href='products.php?currPage=$i' style='color: red;'>$i</a>";
//    } else {
//        echo "<a href='products.php?currPage=$i' style='color: black;'>$i</a>";
//    }
//}
//if($currPage != $rowCount){
//    echo "<a href='products.php?currPage=".($currPage + 1)."' style='color: black;'>Next</a>";
//}
//echo "<a href='products.php?currPage=$rowCount' style='color: black;'>End</a>";
//?>
