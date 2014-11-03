<?php
$action=$_GET['action'];

if($action==0){
	session_start();
	unset($_SESSION['loginuser']);
	

	header("Location: login.php");
}
	require_once 'AdminService.class.php';
	//接收用户的数据
	
	//1.name
	$name=$_POST['name'];
	//2.密码
	$password=$_POST['password'];
	
	$checkCode=$_POST['checkcode'];
	
	
	//先看看验证码是否 ok
	session_start();
	if($checkCode!=$_SESSION['myCheckCode']){
		header("Location: login.php?errno=2");
		exit();
	}
			
	
	//3. 获取用户是否选中了保存id
	if(empty($_POST['keep'])){
		if(!empty($_COOKIE['name'])){
		setcookie("name",$name,time()-100);
		}
	}else{
		setcookie("name",$name,time()+7*2*24*3600);
	}
	
	
	
	
	//实例化一个AdminServive方法
	$adminService=new AdminService();
	$realname=$adminService->chekcAdimn($name,$password);
	if($realname!=""){
		//把登陆信息写入cookie 'loginname':$name
		//把登陆表 把登陆的人ip id..
		//合法
		session_start();
		$_SESSION['loginuser']=$realname;
		header("Location: noteList.php?name=$realname"); 
		exit();
	}else{
		//非法
		header("Location: login.php?errno=1");
		exit();
	}
	
	
?>