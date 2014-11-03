<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<title>留言列表</title>
<script type="text/javascript">
<!--

	function confirmDele(val){
		return window.confirm("是否要删除="+val+"的用户");
	}
//-->
</script>
</head>
<?php
	require_once 'common.php';
	checkUserValidate();
	//先验证
	echo "欢迎 ".$_GET['name']." 登录成功!";
	echo "<br/><a href='loginProcess.php?action=0'>安全退出登陆</a><br />";
	echo "<a href='index.php'>返回首页</a>";
	
	//显示上次登录时间
	getLastTime();
	
	
	
	
?>
<hr/>
<?php

	require_once 'noteService.class.php';
	require_once 'fengyePage.class.php';
	require_once 'common.php';
	checkUserValidate();
	
	
	$noteService=new NoteService();
	
	//创建一个FenyePage对象实例
	$fenyePage=new FenyePage();
	
	//给fenyePage指定必须的数据
	$fenyePage->pageNow=1;
	$fenyePage->pageSize=6;
	$fenyePage->gotoUrl="noteList.php";
	
	
	//这里我们需要根据用户的点击来修改$pageNow这个值
	//这里我们需要判断 是否有这个pageNow发送，有就使用，
	//如果没有，则默认显示第一页
	if(!empty($_GET['pageNow'])){
		$fenyePage->pageNow=$_GET['pageNow'];
	}
	
	//调用getEmpListByPage方法,该方法可以把fenyePage完成
	$noteService->getFenyePage($fenyePage);
	
	echo "<table border='1px' bordercolor='green'  cellspacing='0px'  width='700px'>";
	echo "<tr><th>id</th><th>user</th><th>title</th><th>content</th><th>time</th><th>删除留言</th><th>修改留言</th></tr>"; 
	
	for($i=0;$i<count($fenyePage->res_array);$i++){
		$row=$fenyePage->res_array[$i];
			echo "<tr><td>{$row['id']}</td><td>{$row['user']}</td><td>{$row['title']}</td><td>{$row['content']}</td><td>{$row['time']}</td>".
		"<td><a onclick='return confirmDele({$row['id']})' href='noteProcess.php?flag=del&id={$row['id']}'>删除用户</a></td><td><a href='updateNote.php?id={$row['id']}'>修改用户</a></td></tr>"; 
	}
	echo "<h1>雇员信息列表 </h1>";
	echo "</table>";
	
	
	//显示上一页和下一页
	
	echo $fenyePage->navigate;
	
	//可以使用for打印超链接
	
	
/*	
	
	//指定跳转到某页
	echo "<br/><br/>";*/
	?>
	<form action="noteList.php">
	跳转到:<input type="text" name="pageNow" />
	<input type="submit" value="GO">
	</form>
	<hr/>

</html>