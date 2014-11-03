<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<title>留言板</title>
<link rel="stylesheet" type="text/css" href="css/reset.css">
<link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>
<div id="top">
	<h1>留言板</h1>
</div>
<div id="content">
	<ul>
	<?php 
	require_once 'noteService.class.php';
	require_once 'fengyePage.class.php';

	
	
	$noteService=new NoteService();
	
	//创建一个FenyePage对象实例
	$fenyePage=new FenyePage();
	
	//给fenyePage指定必须的数据
	$fenyePage->pageNow=1;
	$fenyePage->pageSize=5;
	$fenyePage->gotoUrl="index.php";
	
	
	//这里我们需要根据用户的点击来修改$pageNow这个值
	//这里我们需要判断 是否有这个pageNow发送，有就使用，
	//如果没有，则默认显示第一页
	if(!empty($_GET['pageNow'])){
		$fenyePage->pageNow=$_GET['pageNow'];
	}
	
	//调用getEmpListByPage方法,该方法可以把fenyePage完成
	$noteService->getFenyePage($fenyePage);
	for($i=0;$i<count($fenyePage->res_array);$i++){
	$row=$fenyePage->res_array[$i];
	echo "<li>
	<div class=show>
	<p class=\"show_1\">标题：<span class=\"show_2\">".$row['title']."</span></p>
	<p class=\"show_1\"><span>".$row['user']."</span>：<span class=\"show_2\">".$row['content']."</span></p>
	</div>
	</li>";
	}
	 echo "<div id=\"fenye\">.$fenyePage->navigate. </div>"; 
	?>
	
	</ul>
</div>
<div id="comment">
<form id=liuyan action="noteProcess.php" method="post">
	<dl>
    	<dt>-发布留言-</dt>
    	<dd >标题：<input name="title" class="btn" id='btn_title' class="text" type="text" /></dd>
        <dd>昵称：<input name="user" class="btn" id='btn_name' class="text" type="text" /></dd>
        <dd>内容：<textarea name="content" class="btn" id='btn_msg'></textarea></dd>
        <dd><input  class="btn" id="btn_submit" type="submit" value="提交" /><input type="reset" value="重现填写"/></dd>
        <input type="hidden" name="flag" value="addnote" />
    </dl>
    </form>
</div>
<div id="footer">
<a href="login.php">管理留言</a>
</div>
</body>
</html>