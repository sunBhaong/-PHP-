<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
	.cd{
		color: #00BFFF;
		align-items: center;
	}
</style>
<?php 
 
	function showPage($page, $total_page) {
		$html = '<a class="cd" href="?page=1"> 【首页】 </a>';
		$pre_page = $page-1 <= 0 ? $page : ($page - 1);
		$html .= '<a class="cd" href="?page='.$pre_page.'"> 【上一页】</a>';
		$next_page = $page+1 > $total_page ? $page : ($page + 1);
		$html .= '<a class="cd" href="?page='.$next_page.'"> 【下一页】</a>';	
		$html .= '<a class="cd" href="?page='.$total_page.'"> 【尾页】</a>';	
		return $html;
	}
?>