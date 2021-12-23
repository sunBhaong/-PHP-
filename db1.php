<?php

	header('Contenet-Type:text/html;charset = utf-8');
    $dsn  = 'mysql:host=127.0.0.1;dbname=stu';
    $user = 'root';
    $pwd  = '';
    try{
        $pdo  = new PDO($dsn,$user,$pwd);
        //$sql  = 'SELECT * FROM news WHERE news';
		$sql = 'select * from root';
        $res  = $pdo -> query($sql);
        $data = $res -> fetchAll(PDO::FETCH_ASSOC);
        echo '<pre>';
		print_r($data);
        //print_r($data[0]['id']);
    }catch(PDOException $e){
        echo '数据库连接失败：'.$e -> getMessage();
    }
?>