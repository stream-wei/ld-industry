<?php
if (isset($_POST['pId'])) {
    $pId = $_POST['pId'];
}
if (isset($_POST['cId'])) {
    $cId = $_POST['cId'];
}
if (isset($_POST['description'])) {
    $description = $_POST['description'];
}
if (isset($_POST['detail'])) {
    $detail = $_POST['detail'];
}
$mysqli = new mysqli('stream.gotoftp1.com', 'stream', '3183371911', 'stream');
if (mysqli_connect_errno()) {
    printf("连接失败:%s\n", mysqli_connect_error());
    exit();
}
$updateSql = "UPDATE product_detail d,product p SET DETAIL = '$detail' , DESCRIPTION = '$description' WHERE d.PRODUCT_ID = p.ID AND p.CATEGORY_ID = $cId";
echo $updateSql;
$mysqli->query($updateSql);
$mysqli->close();
?>