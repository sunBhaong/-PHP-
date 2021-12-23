

<style type="text/css">
			body{
				margin: 0;
				font-family: "microsoft yahei";
				/* background: url(images/bg.png); */
				background: url(images/gaitubao_1_jpg.jpg);
			}
			.box{
				width: 1001px;
				margin: 0 auto;
			}
			.top{
				height: 179px;
				background: url(images/top.jpg);
				position: relative;
			}
			.title{
				padding-left: 60px;
				color: #000000;
				font-size: 40px;
				letter-spacing: 5px;
				line-height: 160px;
			}
			.nav{
				position: absolute;
				right: 0;
				bottom: 6px;
				
			}
			.nav a{
				color: #000000;
				padding: 6px 12px;
				background: #9cb945;
				text-decoration: none;
			}
			.nav a:hover{
				color: #FFFFFF;
			}
			.main{
				padding-bottom: 10px;
				background: #FFFFFF;
			}
			.news-list{
				background: skyblue;
				color: #FFFFFF;
				padding-top: 5px;
				padding-bottom: 5px;
				border: 2px solid #FFFFFF;
			}
			.news-list th{
				border-bottom: #00088cc;
				color: #FFFFFF;
				padding-top: 5px;
				padding-bottom: 5px;
				border: 2px solid #FFFFFF;
			}
			.news-list td{
				border-bottom: 2px dashed #DCDCDC;
				padding: 8px;
			}
			.news-list .news-title{
				text-indent: 20px;
			}
			.center{
				text-align: center;
			}
</style>

<?php


	header('Contenet-Type:text/html;charset = utf-8');
    $dsn  = 'mysql:host=127.0.0.1;dbname=stu';
    $user = 'root';
    $pwd  = '';
	//$id = $_POST['id'];
	$title = $_POST['title'];
	//$addtime = $_POST['addtime'];
    try{
        $pdo = new PDO($dsn,$user,$pwd);
		$sql ="select content from news where title = '$title'";
        $res = $pdo -> query($sql);
        $data = $res -> fetchAll(PDO::FETCH_ASSOC);
        echo '<pre>';
	
    }catch(PDOException $e){
        echo '数据库连接失败：'.$e -> getMessage();
    }
	
	?>
		<body>
			<div class="box">
				<div class="top">
					<div class="title" align="center">新闻发布系统</div>
					<div class="nav">
						<a href="OpenNews.php">返回</a>
					</div>
				</div>
				<div class="main">
					<center>
						<table class="news-list">
							<tr>
								<th width="150"><?php echo $title;?></th>
							</tr>
							<?php foreach($data as $v):?> 
								<tr>
									<td class="center"><?php echo $v['content'];?></td>
								</tr>
							<?php endforeach;?>
						</table>
					</center>
				</div>
			</div>
	 </body>
			