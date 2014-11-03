<?php

	//这个类的一个对象实例
	class Note{
	
		private $id;
		private $user;
		private $title;
		private $content;
		private $time;
	/**
	 * @return unknown
	 */
	public function getId() {
		return $this->id;
	}
	
	/**
	 * @return unknown
	 */
	public function getUser() {
		return $this->user;
	}
	
	/**
	 * @return unknown
	 */
	public function getTitle() {
		return $this->title;
	}
	
	/**
	 * @return unknown
	 */
	public function getContent() {
		return $this->content;
	}
	
	/**
	 * @return unknown
	 */
	public function getTime() {
		return $this->time;
	}
	
	/**
	 * @param unknown_type 
	 */
	public function setUser($user) {
		$this->user = $user;
	}
	
	/**
	 * @param unknown_type 
	 */
	public function setTitle($title) {
		$this->title = $title;
	}
	
	/**
	 * @param unknown_type 
	 */
	public function setId($id) {
		$this->id = $id;
	}
	
	/**
	 * @param unknown_type 
	 */
	public function setContent($content) {
		$this->content = $content;
	}
	
	/**
	 * @param unknown_type 
	 */
	public function setTime($time) {
		$this->time = $time;
	}
	
		
	}
?>