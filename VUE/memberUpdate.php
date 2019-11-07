<?php
header("access-control-allow-origin: *");
header("Content-Type: text/json; charset=UTF-8"); 
$mysql_hostname = 'localhost';
$mysql_username = 'mans122';
$mysql_password = 'Qwas7946!';
$mysql_database = 'mans122';
$mysql_port = '3306';
$mysql_charset = 'utf8';

if(!isset($_POST['name']) || !isset($_POST['address'])) exit;

$name = $_POST['name'];
$address = $_POST['address'];

$connect = mysqli_connect($mysql_hostname, $mysql_username, $mysql_password); 
if(!$connect){
    echo '[연결실패] : '.mysqli_error().'<br>'; 
    die('MySQL 서버에 연결할 수 없습니다.');
} 

mysqli_select_db($connect,$mysql_database) or die('DB 선택 실패');

mysqli_query($connect,' SET NAMES '.$mysql_charset);
$query = "update member set name='".$name."',address='".$address."' where id='".$_POST["id"]."';";
// $query = "update member set name,address value where id = id";
mysqli_query($connect,$query);

echo '{
    "message":"수정되었습니다"
}';
 
mysqli_close($connect);
?>