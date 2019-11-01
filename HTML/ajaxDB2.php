<?
header("content-type:text/html; charset=utf-8"); 
$mysql_hostname = 'localhost';//localhost
$mysql_username = 'mans122';//root
$mysql_password = 'Qwas7946!';
$mysql_database = 'mans122';//testdb
$mysql_table = 'products';
$mysql_col1 = 'name';
$mysql_col2 = 'price';
$mysql_col3 = 'age';
//$mysql_port = '3306';
$sql = "SELECT * FROM ".$mysql_table;
$connect = mysqli_connect($mysql_hostname, $mysql_username, $mysql_password, $mysql_database);
mysqli_select_db($connect, $mysql_database) or die('DB 선택 실패');
$result = mysqli_query($connect, $sql);
while($info=mysqli_fetch_array($result)){
    echo $info[$mysql_col1]." | ";
    echo $info[$mysql_col2]."<br/>\n";
    // echo $info[$mysql_col2]." | ";
    // echo $info[$mysql_col3]."<br/>\n";
}
mysqli_close($connect);
?>