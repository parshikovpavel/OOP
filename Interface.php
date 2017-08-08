<?php
interface Displayed 
{
	public function display();
}

class Post implements Displayed
{
	public $content = 'Post Content';
	
	public function display() {
		echo $this->content."\n";
	}
}

class Comment implements Displayed
{
	public $text = 'Comment text';
	
	public function display() {
		echo $this->text."\n";
	}
}

class Templater
{
	public function render(Displayed $object)
	{
		$object->display();
	}
}

$post = new Post();
$comment = new Comment();

$templater = new Templater();

$templater->render($post);
$templater->render($comment);

