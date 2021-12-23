<?php 

//设置字符集
header('Contenet-Type:text/html;charset = utf-8');
//设置数据库的DSN信息
$dsn = 'mysql:host=localhost;dbname = stu';
try{
	$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "set names 'utf8'");
	$pdo = new PDO($dsn,'root','',$options);
	print_r($pdo);
}catch(PDOException $e){
	exit('PDO连接数据库失败：'.$e->getMesage());
}

?>