<?php
	//它的一个对象实例就表示admin表的一条记录
	class Admin{
		private $name;
		private $password;

		
		/**
		 * @return unknown
		 */
		public function getName() {
			return $this->name;
		}
		
		/**
		 * @return unknown
		 */
		public function getPassword() {
			return $this->password;
		}
		
	
		public function setName($name) {
			$this->name = $name;
		}
		
		/**
		 * @param unknown_type $password
		 */
		public function setPassword($password) {
			$this->password = $password;
		}

		
	}
?>