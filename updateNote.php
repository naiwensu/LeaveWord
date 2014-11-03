<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>
<?php
	require_once 'common.php';
	checkUserValidate();
	//先验证

	
	
	
?>
<?php
	//该页面要显示准备修改的用户的信息.
	require_once 'noteService.class.php';
	$id=$_GET['id'];
	if (empty($_GET['id'])) {
		header("Location: noteList.php");
	}
	//通过id来得到该用户的其它信息.
	//查询数据库 ,条sqlHelper
	
	$noteService=new NoteService();
	//$arr=$empService->getEmpById($id);
	$note=$noteService->getNoteById($id);
	
	//显示
?>

<hr/>
<h1>修改留言</h1>
<form action="noteProcess.php" method="post">
<table>
<tr><td>id</td><td><input readonly="readonly"  type="text" name="id" value="<?php echo $note->getId(); ?>" /></td></tr>
<tr><td>用户</td><td><input type="text" name="user" value="<?php echo $note->getUser(); ?>" /></td></tr>
<tr><td>标题</td><td><input type="text" name="title" value="<?php echo $note->getTitle(); ?>"/></td></tr>
<tr><td>内容</td><td><input type="text" name="content" value="<?php echo $note->getContent(); ?>"/></td></tr>
<tr><td>时间</td><td><input type="text" name="timr" value="<?php echo $note->getTime(); ?>"/></td></tr>
<input type="hidden" name="flag" value="updatenote" />
<tr>
<td><input type="submit" value="修改用户" /></td>
<td><input type="reset"  value="重新填写" /></td>
</tr>
</table>
</form>
</html>