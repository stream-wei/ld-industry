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

$countResult = $mysqli->query('SELECT COUNT(1) AS countP FROM PRODUCT');
$total = $countResult->fetch_row()[0];
$startPage = ($currPage - 1)*$pageSize;
$querySql = "SELECT 
  p.PRODUCT_NAME, 
  p.TITLE, 
  i.URL, 
  i.IMAGE_DESC 
FROM PRODUCT p, IMAGE_INFO i, PRODUCT_CATEGORY c 
WHERE p.IMAGE_ID = i.ID AND i.TYPE = 2";
if($categoryParent != null && $categoryParent != ''){
    $querySql = $querySql.'AND p.CATEGORY_PARENT_ID = c.ID';
}
if($category != null && $category != ''){
    $querySql = $querySql.'AND p.CATEGORY_ID = c.ID';
}
$querySql = $querySql."limit $startPage,$pageSize";
echo $querySql;
echo "<script>alert($querySql);</script>";
$result = $mysqli->query($querySql);
?>
