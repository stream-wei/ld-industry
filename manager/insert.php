<?php
if (isset($_GET['currPage'])) {
    $currPage = $_GET['currPage'];
} else {
    $currPage = 1;
}
$pageSize = 9;
$mysqli = new mysqli('stream.gotoftp1.com', 'stream', '3183371911', 'stream');
if (mysqli_connect_errno()) {
    printf("连接失败:%s\n", mysqli_connect_error());
    exit();
}
$queryCategoryParentSql = "SELECT id,CATEGORY_NAME FROM stream.product_category WHERE PARENT_ID = 0";
$queryCategoryChildSql = "SELECT id,CATEGORY_NAME FROM stream.product_category WHERE PARENT_ID = ";
$queryCategoryParent = $mysqli->query($queryCategoryParentSql);
$parentOptions = '';
$childOptions1 = '';
$childOptions2 = '';
$childOptions3 = '';
$childOptions4 = '';
$count = 1;
while (list($pId, $pName) = $queryCategoryParent->fetch_row()) {
    $parentOptions .= "<option value='$count'>$pName</option>";
    $queryCategoryChild = $mysqli->query($queryCategoryChildSql . $pId);
    while (list($cId, $cName) = $queryCategoryChild->fetch_row()) {
        if ($count == 1) {
            $childOptions1 .= "<option value='$cId'>$cName</option>";
        } else if ($count == 2) {
            $childOptions2 .= "<option value='$cId'>$cName</option>";
        } else if ($count == 3) {
            $childOptions3 .= "<option value='$cId'>$cName</option>";
        } else if ($count == 4) {
            $childOptions4 .= "<option value='$cId'>$cName</option>";
        }
    }
    $count++;
}
echo "<script>
    var childOptions1 = \"$childOptions1\";
    var childOptions2 = \"$childOptions2\";
    var childOptions3 = \"$childOptions3\";
    var childOptions4 = \"$childOptions4\";
</script>";
?>
<html>
<head>
    <script>
        function changeChild(value) {
            if(value == 1){
                document.getElementById("cId").innerHTML = "";
                document.getElementById("cId").innerHTML = childOptions1;
            } else if(value == 2){
                document.getElementById("cId").innerHTML = "";
                document.getElementById("cId").innerHTML = childOptions2;
            } else if(value == 3){
                document.getElementById("cId").innerHTML = "";
                document.getElementById("cId").innerHTML = childOptions3;
            } else if(value == 4){
                document.getElementById("cId").innerHTML = "";
                document.getElementById("cId").innerHTML = childOptions4;
            }
        }
    </script>
    <script type="text/javascript" charset="utf-8" src="../utf8-php/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="../utf8-php/ueditor.all.min.js"> </script>
    <script type="text/javascript" charset="utf-8" src="../utf8-php/lang/zh-cn/zh-cn.js"></script>
    <script type="text/javascript">
        var ue = UE.getEditor('editor');
        function getContent() {
            var arr = [];
            arr.push("使用editor.getContent()方法可以获得编辑器的内容");
            arr.push("内容为：");
            arr.push(UE.getEditor('editor').getContent());
            alert(arr.join("\n"));
        }
        function getPlainTxt() {
            var arr = [];
            arr.push("使用editor.getPlainTxt()方法可以获得编辑器的带格式的纯文本内容");
            arr.push("内容为：");
            arr.push(UE.getEditor('editor').getPlainTxt());
            alert(arr.join('\n'))
        }

        function getContentTxt() {
            var arr = [];
            arr.push("使用editor.getContentTxt()方法可以获得编辑器的纯文本内容");
            arr.push("编辑器的纯文本内容为：");
            arr.push(UE.getEditor('editor').getContentTxt());
            alert(arr.join("\n"));
        }
        function hasContent() {
            var arr = [];
            arr.push("使用editor.hasContents()方法判断编辑器里是否有内容");
            arr.push("判断结果为：");
            arr.push(UE.getEditor('editor').hasContents());
            alert(arr.join("\n"));
        }
    </script>
</head>
<body>
<form id="form" action="">
    <select name="pId" id="pId" onchange="changeChild(this.value);">
        <?php
        echo $parentOptions;
        ?>
    </select><br/><br/><br/><br/><br/>
    <select name="cId" id="cId">
        <?php
        echo $childOptions1;
        ?>
    </select><br/><br/><br/><br/><br/>
    <textarea name="description">
        
    </textarea><br/><br/><br/><br/><br/>
    <script id="editor" type="text/plain" style="width:1024px;height:500px;"></script>
</form>
</body>
</html>
