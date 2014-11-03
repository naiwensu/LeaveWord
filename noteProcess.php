<?php
	
	require_once 'noteService.class.php';
	//接收用户要删除的用户id
	//创建了EmpService对象实例
	$noteService=new NoteService();
	
	//接收
	
	
	
	//先看看用户要分页还是删除某个雇员
	if(!empty($_REQUEST['flag'])){
		
			//接收flag值.
			$flag=$_REQUEST['flag'];
			//如果$flag="del", 说明用户要执行删除请求
			if($flag=="del"){
				//这是我们知道要删除用户
				$id=$_REQUEST['id'];
				//echo "你希望删除的用户id=$id";
				if($noteService->delNotEById($id)==1){
					//成功!
					header("Location: ok.php");
					exit();
				}else{
					//失败!
					header("Location: error.php");
					exit();
				}
			}else if($flag=="addnote"){
				//说明用户希望执行添加雇员
				//接收数据
				$user=$_POST['user'];
				$title=$_POST['title'];
				$content=$_POST['content'];
				$time=date('Y-m-d H:i:s',time());
				//完成添加->数据库.
				$res=$noteService->addNote($user,$title,$content,$time);
				if($res==1){
					header("Location: ok1.php");
					exit();
				}else{
					//失败!
					header("Location: error1.php");
					exit();
				}
			}//处理修改请求
			else if($flag=="updatenote"){
				//说明用户希望执行修改雇员
				//接收数据
				$id=$_POST['id'];
				$user=$_POST['user'];
				$title=$_POST['title'];
				$content=$_POST['content'];
				$time=$_POST['time'];
				//完成修改->数据库.
				$res=$noteService->updateNote($id,$user,$title,$content,$time);
				if($res==1){
					header("Location: ok.php");
					exit();
				}else{
					//失败!
					header("Location: error.php");
					exit();
				}
				
			}
	}
?>