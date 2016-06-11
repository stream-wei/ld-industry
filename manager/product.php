<?php
if(isset($_GET['currPage'])){
    $currPage = $_GET['currPage'];
} else {
    $currPage = 1;
}
$pageSize = 9;
$mysqli = new mysqli('localhost', 'root', '123456', 'INDUSTRY');
if (mysqli_connect_errno()) {
    printf("连接失败:%s\n", mysqli_connect_error());
    exit();
}
?>
<form action="product.php">
    <input type="text" name="productName" value="" />
    <input type="text" name="title" value="" />
    <select name="categoryId">
        <?php
        
        ?>
    </select>

</form>
