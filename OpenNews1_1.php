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
	require 'E:/WampServe/www/projectgao/换页.php';
		
	//连接数据库
	  header('Contenet-Type:text/html;charset = utf-8');
	  $dsn  = 'mysql:host=127.0.0.1;dbname=stu';
	  $user = 'root';
	  $pwd  = '';
	  try{
	      $pdo  = new PDO($dsn,$user,$pwd);
	  	$sql = 'select * from news';
	      $res  = $pdo -> query($sql);
	      $data = $res -> fetchAll(PDO::FETCH_ASSOC);
	      echo '<pre>';
	      
	  }catch(PDOException $e){
	      echo '数据库连接失败：'.$e -> getMessage();
	  }
	    
		//设置每一页显示信息条数极限
		$total_num = count($data);
		$perpage = 1;
		$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
		$total_page = ceil($total_num/$perpage);
		$page = max($page, 1);
		$page = min($page, $total_page);
		$start_index = $perpage * ($page - 1);
		$end_index = $perpage * $page - 1;
		$end_index = min($end_index, $total_num - 1);
		
	?>
	
<body>
		<div class="box">
			<div class="top">
				<div class="title" align="center">新闻发布系统</div>
				<div class="nav">
					<a href="select.html">点击查看详情</a>&nbsp;<a href="add.html">添加新闻</a>&nbsp;<a href="update.html">编辑新闻</a>
				</div>
			</div>
			<div class="main">
				<center>
					<table class="news-list">
						<tr align="center">
							<th width="150">新闻序号</th>
							<th width="150">新闻标题</th>
							<th width="150">新闻内容</th>
							<th width="150">发布时间</th>
						
						</tr>
						<?php for($i = $start_index; $i <= $end_index; ++$i) {?>
						<tr align="center">
							<td><?php echo $data[$i]['id']; ?></td>
							<td><?php echo $data[$i]['title']; ?></td>
							<td><?php echo $data[$i]['content']; ?></td>
						    <td><?php echo $data[$i]['addtime']; ?></td>
						</tr>
						<?php }?>
					</table>
					  <?php echo showPage($page, $total_page); ?>
				</center>
			</div>
		</div>
</body>
		