<?php
$dbms='mysql'; //数据库类型
$host='192.168.1.142'; //数据库主机名
$dbName='test'; //使用的数据库
$user='root'; //数据库连接用户名
$pass='123456';  //对应的密码
$dsn="$dbms:host=$host;dbname=$dbName";
 $dbh = new PDO($dsn, $user, $pass); //初始化一个PDO对象
$stmt = $dbh->query('select * from user limit 2'); //返回一个PDOStatement对象  

//$row = $stmt->fetch(); //从结果集中获取下一行，用于while循环  
$rows = $stmt->fetchAll(); //获取所有  

$row_count = $stmt->rowCount(); //记录数，2  
echo "<pre>";
print_r($rows);
echo "</pre>";


phpinfo();

?>
