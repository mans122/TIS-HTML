<?php
header("access-control-allow-origin: *");
header("Content-Type: text/json; charset=UTF-8"); 
$mysql_hostname = 'localhost';
$mysql_username = 'mans122';
$mysql_password = 'Qwas7946!';
$mysql_database = 'mans122';
$mysql_port = '3306';
$mysql_charset = 'utf8';

$connect = mysqli_connect($mysql_hostname, $mysql_username, $mysql_password); 
if(!$connect){
    echo '[연결실패] : '.mysqli_error().'<br>'; 
    die('MySQL 서버에 연결할 수 없습니다.');
} 
mysqli_select_db($connect,$mysql_database) or die('DB 선택 실패');
mysqli_query($connect,' SET NAMES '.$mysql_charset);
$query = "select id,name,address from member where id='".$_REQUEST["id"]."';";
$result = mysqli_query($connect,$query);
$output='';

while($row = mysqli_fetch_array($result))
{   
    if ($output!=""){
        $output.= ",";//콤마붙이기
    }
$output.='{"id":"'.$row['id'].'","name":"'.$row['name'].'","address":"'.$row['address'].'"}';  
}
// $output='['.$output.']';
echo $output;
mysqli_close($connect);
?>