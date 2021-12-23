<?php
// $Id:$ //声明变量
// $username = isset($_POST['username']) ? $_POST['username'] : "";
// $password = isset($_POST['password']) ? $_POST['password'] : "";
// $remember = isset($_POST['remember']) ? $_POST['remember'] : ""; //判断用户名和密码是否为空
    header("Content-type:text/html;charset=utf-8");
	$host = 'localhost';
	$username = 'root';
	$password = '';
	$dbname = 'stu';
	$conn = new mysqli($host,$username,$password,$dbname);
	
	
	$id = $_POST['id'];
	$psw = $_POST['psw'];
	
	mysqli_set_charset($conn,"utf8");
	if ($conn->connect_error) {
	    die("连接失败: " . $conn->connect_error);
	}  
	$sql = "select id,psw from root where id ='$id' and psw = '$psw'";
	$ret = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($ret);
	// if ($conn->query($sql) === TRUE) {
	// 	header("Refresh:3;Url='http://127.0.0.1/projectgao/news2.php'");
	// } else {
	//     echo "Error: " . $sql . "<br>" . $conn->error;
	// } 
	// $conn->close();
	 
	if($id == $row['id'] && $psw == $row['psw']){
		//header("Refresh:3;Url='http://127.0.0.1/projectgao/news2.php'");
		header("Location:news2.php");
	}else{
		echo '密码或者账号有误！';
	}
	$conn->close();
// if (!empty($username) && !empty($password)) { //建立连接
//     $conn = mysqli_connect('localhost', 'root', '', 'stu'); //准备SQL语句
//     //$sql_select = "SELECT username,password FROM usertext WHERE username = '$username' AND password = '$password'"; //执行SQL语句
// 	$ret = mysqli_query($conn, $sql_select);
//     $row = mysqli_fetch_array($ret); //判断用户名或密码是否正确
//     if ($username == $row['username'] && $password == $row['password']) 
//     { //选中“记住我”
//         if ($remember == "on") 
//         { //创建cookie
//             setcookie("", $username, time() + 7 * 24 * 3600);
//         } //开启session
//         session_start(); //创建session
//         $_SESSION['user'] = $username; //写入日志
//         $ip = $_SERVER['REMOTE_ADDR'];
//         $date = date('Y-m-d H:m:s');
//         $info = sprintf("当前访问用户：%s,IP地址：%s,时间：%s /n", $username, $ip, $date);
//         $sql_logs = "INSERT INTO logs(username,ip,date) VALUES('$username','$ip','$date')";
//         //日志写入文件，如实现此功能，需要创建文件目录logs
//         $f = fopen('./logs/' . date('Ymd') . '.log', 'a+');
//         fwrite($f, $info);
//         fclose($f); //跳转到loginsucc.php页面
//         header("Location:loginsucc.php"); //关闭数据库,跳转至loginsucc.php
//         mysqli_close($conn);
//     }
//     else 
//     { 
//         //用户名或密码错误，赋值err为1
//         header("Location:login.php?err=1");
//     }
// } else { //用户名或密码为空，赋值err为2
//     header("Location:login.php?err=2");
// } 
?>
