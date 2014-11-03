<?php

	require_once 'SqlHelper.class.php';
	require_once 'note.class.php';
	class NoteService{
		
		
		function updateNote($id,$user,$title,$content,$time){
			$sql="update note set user='$user',title='$title',content='$content' where id=$id";
			$sqlHelper=new SqlHelper();
			$res=$sqlHelper->execute_dml($sql);
			$sqlHelper->close_connect();
			return $res;
		}
		
		//根据id好获取一个雇员的信息
		function getNoteById($id){
			
			$sql="select * from note where id=$id";
			$sqlHelper=new SqlHelper();
			$arr=$sqlHelper->execute_dql2($sql);
			$sqlHelper->close_connect();;
			//二次封装.$arr->Emp对象实例[演示..]
			//创建 Emp对象实例
			$note=new Note();
			$note->setId($arr[0]['id']);
			$note->setUser($arr[0]['user']);
			$note->setTitle($arr[0]['title']);  
			$note->setContent($arr[0]['content']);
			$note->setTime($arr[0]['time']);
			return $note;
		}
		
		//添加一个方法
		function addNote($user,$title,$content,$time){
			
			//做一个$sql语句
			$sql="insert into note (user,title,content,time) values('$user','$title','$content','$time')";
			//同sqlHelper完成添加
			$sqlHelper=new SqlHelper();
			$res=$sqlHelper->execute_dml($sql);
			$sqlHelper->close_connect();
			return $res;
		}
		
		
		//一个函数可以获取共有多少页
		function getPageCount($pageSize){
			
			//需要查询$rowCount
			$sql="select count(id) from note";
			$sqlHelper=new SqlHelper();
			$res=$sqlHelper->execute_dql($sql);
			
			//这样就可以计算$pageCount
			if($row=mysql_fetch_row($res)){
				$pageCount=ceil($row[0]/$pageSize);	
			}
			//释放资源关闭连接
			mysql_free_result($res);
			//关闭连接 
			$sqlHelper->close_connect();
			return $pageCount;
		}
		
		//一个函数可以获取应当显示的雇员信息
		function getNoteListByPage($pageNow,$pageSize){
			
			$sql="select * from note limit ".($pageNow-1)*$pageSize.",$pageSize";
			
			
			$sqlHelper=new SqlHelper();
			//这里的$res就是一个二维数组
			$res=$sqlHelper->execute_dql2($sql);

			//释放资源和关闭连接
			//关闭连接
			$sqlHelper->close_connect();
			
			return $res;
			
		}
		
		//第二种使用封装的方式完成的分页(业务逻辑到这里)
		function getFenyePage($fenyePage){
			
			//创建一个SqlHelper对象实例
			$sqlHelper=new SqlHelper();
			
			$sql1="select * from note order by id desc limit "
			.($fenyePage->pageNow-1)*$fenyePage->pageSize.",".$fenyePage->pageSize;
			
			
			
			$sql2="select count(id) from note";
			$sqlHelper->exectue_dql_fenye($sql1,$sql2,$fenyePage);
			
			$sqlHelper->close_connect();
		}
		
		//根据输入id删除某个用户
		function delNoteById($id){
			
			//
			$sql="delete from note where id=$id";
			//创建SqlHelper对象实例
			$sqlHelper=new SqlHelper();
			//0, 1 ,2
			return $sqlHelper->execute_dml($sql);
		}
	}
?>