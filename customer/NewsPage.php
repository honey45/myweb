<meta charset="utf-8">
<?php require "header.php"; ?>

<?php require "headerpic.php";?>
<?php require "list-right.php";?>
<?php
//解决中文乱码,发现不能奏效，则考虑MySQL客户端乱码情况
header("Content-type=text/html;charset=utf-8");
 
$host = "localhost";
$username = "root";
$password = "root";
$dbname = "rs_table";
 
// 开始获取数据库连接
$conn = mysql_connect($host,$username,$password) or die(mysql_error());
// 手动更改客户端编码
mysql_query("set names utf8");
// 选择使用哪一个数据库
mysql_select_db($dbname);
 
// 获取总的记录数
$sql_total_records = "select count(*) from rs_posts";
$total_records_result = mysql_query($sql_total_records);
$total_records = mysql_fetch_row($total_records_result);
//echo "总的记录数位： ".$total_records[0]."<br>";
 
 
// 获得总页数，一般来说页面大小事固定的，所以这里暂且定为一页5个数据
$page_size = 5;
$total_pages = ceil($total_records[0]/$page_size);
//echo "总页数为: ".$total_pages;
 
 
// 通过GET方式获得客户端访问的页码
$current_page_number = isset($_GET['page_number'])?$_GET['page_number']:1;
if($current_page_number<1) {
 $current_page_number =1;
}
if($current_page_number>$total_pages){
 $current_page_number = $total_pages;
}
//echo "要访问的页码为：".$current_page_number;
 
// 获取到了要访问的页面以及页面大小，下面开始分页
$begin_position = ($current_page_number-1)*$page_size;
$sql = "select * from rs_posts limit $begin_position,$page_size";
$result = mysql_query($sql);
 
 
while(($row = mysql_fetch_row($result))){

 echo "<h4 align='center' >".$row[0]."</h4>";
 echo "<p>".$row[1]."</p>";
 echo "</tr>";
  echo "<td>".$row[2]."</td>";
 echo "<td>".$row[3]."</td>";


}

 
// 循环显示总页数

?>
<br>
<?php
echo '<a href="NewsPage.php?page_number=1">first</a>&nbsp;&nbsp;';
for($i=1;$i<=$total_pages;$i++){
    echo '<a href="./NewsPage.php?page_number='.$i.'">'.$i.'</a>&nbsp;&nbsp;';   
}
echo '<a href="NewsPage.php?page_number='.($current_page_number-1).'">pre</a>&nbsp;&nbsp;';
echo '<a href="NewsPage.php?page_number='.($current_page_number+1).'">next</a>&nbsp;&nbsp;';
echo '<a href="NewsPage.php?page_number='.($total_pages).'">last</a>&nbsp;&nbsp;';
// 释放数据连接资源
mysql_free_result($result);
mysql_close($conn);

?>
<?php require "footer.php"; ?>