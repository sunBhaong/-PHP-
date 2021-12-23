<?php 

header('Contenet-Type:text/html;charset = utf-8');
    $dsn  = 'mysql:host=127.0.0.1;dbname=stu';
    $user = 'root';
    $pwd  = '';
	$id = $_POST['id'];
	$psw = $_POST['psw'];
    try{
        $pdo  = new PDO($dsn,$user,$pwd);
        //$sql  = 'SELECT * FROM news WHERE news';
		$sql = "select id,psw from general";
        $res  = $pdo -> query($sql);
        $data = $res -> fetchAll(PDO::FETCH_ASSOC);
        echo '<pre>';
		//print_r($data);
        //print_r($data[0]['id']);
    }catch(PDOException $e){
        echo '数据库连接失败：'.$e -> getMessage();
    }
	if($id == $data[0]['id'] && $psw == $data[0]['psw']){
		header("Location:OpenNews1_1.php");
	}else{
		echo '密码或账号有误！<br>';
		header("Refresh:3;Url='http://127.0.0.1/projectgao/login1_1.html'");
	}
?>