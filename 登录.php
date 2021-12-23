<?php

	header('Contenet-Type:text/html;charset = utf-8');
    $dsn  = 'mysql:host=127.0.0.1;dbname=stu';
    $user = 'root';
    $pwd  = '';
	$id = $_POST['id'];
	$psw = $_post['psw'];
    try{
        $pdo  = new PDO($dsn,$user,$pwd);
	
			$sql1 = select * from general where id = '$id' and psw = '$psw';
        $res  = $pdo -> query($sql);
        $data = $res -> fetchAll(PDO::FETCH_ASSOC);
        echo '<pre>';
        //print_r($data);
		if($id == ){
			
		}
    }catch(PDOException $e){
        echo '数据库连接失败：'.$e -> getMessage();
    }
	if(){
		
	}
?>