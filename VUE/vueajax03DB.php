<?
header("access-control-allow-origin: *"); 
header("content-type:text/json; charset=utf-8"); 
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
$query = 'select name,price from products;';
$result = mysqli_query($connect, $sql);
$output='';
while($row = mysqli_fetch_array($result))
{	
    if ($output!="")
    {
        $output.= ",";//콤마붙이기
    }
    // $output.='{"zipcode":"'.$row['zipcode'].'"}';  
    $output.='{"name":"'.$row['name'].'",';
    $output.='"price":"'.$row['price'].'"}';  
}
$output='['.$output.']';

echo $output;


mysqli_close($connect);
?>