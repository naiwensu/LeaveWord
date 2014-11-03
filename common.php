<?php
	function getLastTime(){
		
		
		if(!empty($_COOKIE['lastVisit'])){
			echo "你上次登陆时间是".$_COOKIE['lastVisit'];
			//更新时间
			setcookie("lastVisit",date("Y-m-d  H:i:s"),time()+24*3600*30);
		}else{
			//说明用户是第一次登陆
			echo "你是第一次登陆";
			//更新时间
			setcookie("lastVisit",date("Y-m-d  H:i:s"),time()+24*3600*30);
		}
	}
	
	function getCookieVal($key){
		
		if(empty($_COOKIE[$key])){
			return "";
		}else{
			return $_COOKIE[$key];
		}
		
	}
	
	//把验证用户是否合法封装函数
	function checkUserValidate(){
		session_start();
		//先写在封
		if(empty($_SESSION['loginuser'])){
			header("Location: login.php?errno=1");
		}
		
	}
	
	
?>