<?php

trait Singleton 
{
	static public $instance;
	
	static public function getInstance()
	{
		if(static::$instance === null) {
			static::$instance = new static();
		}
		
		return static::$instance;
	}
	
	
}

class Application 
{
	use Singleton;
	
	private $language;
	
	public function setLanguage($_language) 
	{
		$this->language = $_language;
	}
	
	public function getLanguage() 
	{
		return $this->language;
	}
}

$app1 = Application::getInstance();
$app1->setLanguage('ru');

$app2 = Application::getInstance();
var_dump($app2->getLanguage());


