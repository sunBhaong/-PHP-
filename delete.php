<?php

	header('Contenet-Type:text/html;charset = utf-8');
	header("Refresh:3;Url='http://127.0.0.1/projectgao/add.html'");
    $dsn  = 'mysql:host=127.0.0.1;dbname=stu';
    $user = 'root';
    $pwd  = '';
	//从前端页面获取删除条件
	$id = $_POST['id'];
	$title = $_POST['title'];
    try{
        $pdo  = new PDO($dsn,$user,$pwd);
		$sql = "delete from news where id = '$id' and title = '$title'";
        $res  = $pdo -> query($sql);
        $data = $res -> fetchAll(PDO::FETCH_ASSOC);
        echo '<pre>';
        echo "正在加载，请稍等。。。</br>";
        echo "新闻提交成功</br>";
    }catch(PDOException $e){
        echo '数据库连接失败：'.$e -> getMessage();
    }
?>